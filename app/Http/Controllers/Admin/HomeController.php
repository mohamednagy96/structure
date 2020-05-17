<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Resources\PackageResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ServiceResource;
use App\Models\Admin;
use App\Models\Chat;
use App\Models\Package;
use App\Models\Product;
use App\Models\Service;
use Carbon\Carbon;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
// use FCM;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Facades\FCM;

use App\Http\Controllers\Controller;
class HomeController extends Controller
{

    public function index()
    {

        return view('admin.pages.home');
    }

    public function chatIndex()
    {

        $chat = Chat::all();
        $mytime = Carbon::now();
        return view('admin.pages.chats.chat', [
            'chats' => $chat,
            'mytime' => $mytime,

        ]);
    }



    public function createChat(Request $request)
    {
        $input = $request->all();
        $message = $input['message'];

        $chat = new Chat([
            'sender_id' => Auth::guard('admin')->user()->id,
            'sender_name' => Auth::guard('admin')->user()->name,
            'message' => $message

        ]);

        $this->broadcastMessage(auth()->user('admin')->name, $message);
        $chat->save();

        return redirect()->back();
    }

    private function broadcastMessage($senderName, $message)
    {

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder('New Massage From :' . $senderName);
        $notificationBuilder->setBody($message)
            ->setSound('default')
            ->setClickAction('http://localhost:8000/admin');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData([
            'sender_name' => $senderName,
            'message' => $message

        ]);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $tokens = Admin::all()->pluck('fcm_token')->toArray();
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        return  $downstreamResponse->numberSuccess();
    }



}
