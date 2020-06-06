<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\services\MediaService;
use Illuminate\Cache\RedisStore;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with(['comments'=>function($q){
            $q->take(5);
        }])->get();
        // dd($posts->image);
        return view('admin.pages.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request=$request->all();
        // dd(isset($request['photo']) && $request['photo'] != null );
        if(isset($request['photo']) && $request['photo'] != null){
            // dd($request['photo'] && $request['photo'] != null);
            $file_ext=$request['photo']->getClientOriginalExtension();
            $file_name=time().'.'.$file_ext;
            $path='images/posts';
            $request['photo']->move($path,$file_name);
            $request['photo']=$file_name;
        }
        $request['admin_id']=auth('admin')->user()->id;
        $post=Post::create($request);
        // if($request['photo']){

        //      $post->addMedia($request->photo)->toMediaCollection('images');
        //     MediaService::uploadFile($request['photo'], $post);
        //    }         
        return redirect()->route('admin.posts.index')->with('success', 'Post is Published .. !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.pages.posts.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.pages.posts.edit',compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request=$request->all();
        if(isset($request['photo']) && $request['photo'] != null){
            $file_ext=$request['photo']->getClientOriginalExtension();
            $file_name=time().'.'.$file_ext;
            $path='images/posts';
            $request['photo']->move($path,$file_name);
            $request['photo']=$file_name;
        }
        $request['admin_id']=auth('admin')->user()->id;
        $post->update($request);
        return redirect()->route('admin.posts.index')->with('success', 'Post is Updated .. !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return $this->redirectRouteWithSuccessDelete('admin.posts.index');
    }
}
