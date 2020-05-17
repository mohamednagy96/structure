<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class MediaController extends Controller
{
    public function store(Media $media){

        $this->resetDefaultFile($media->model_id);

        $media->update([
            'isDefault' => 1
        ]);

        return redirect()->back()->with('success', 'Default file changed');
    }

    public function resetDefaultFile($model_id){
        if($media = Media::where('model_id', $model_id)->where('isDefault', 1)->first()){
            $media->update([
                'isDefault' => 0
            ]);
        }
    }

    public function destroy(Media $media){
        $media->delete();
        return redirect()->back()->with('success', 'File Deleted Successfully');
    }
}
