<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
       $request=$request->all(); 
        $request['admin_id']=auth('admin')->user()->id;
        $comment=Comment::create($request);
        $data=[
            'user_id'=>$request['admin_id'],
            'comment'=>$request['comment'],
            'post_id'=>$request['post_id']
        ];
        event(new NewNotification($data));
        return back()->with(['success'=>'DONE']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.pages.comments.edit',compact('comment'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        // dd($omment);
        $comment->update(['comment'=>$request->comment]);
        // return redirect()->back();
        return $this->redirectRouteWithSuccessUpdate('admin.posts.show',$comment->post_id);
        // return redirect()->route('admin.posts.show',$comment->post_id);
        // dd($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        $comment->delete();
        return $this->redirectRouteWithSuccessDelete();
    }
}
