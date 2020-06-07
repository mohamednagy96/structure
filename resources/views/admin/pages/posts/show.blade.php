@extends('admin.layouts.master')
@section('content')
    
@component('admin.components.box',['title'=>'Posts List','create'=>route('admin.posts.create')])

  @if(!$post->photo == null)
  <div class="row" style="width:60%;margin-left:20%;border-top-right-radius:5px;border-top-left-radius:5px;border:1px solid #595959">
    <div class="col-md-9 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-right: 0;border-bottom: 0;text-decoration:underline;height:45px">
      {{$post->admin->name}}
    </div>
    @if($post->admin_id == auth('admin')->user()->id)
    <div class="dropdown col-md-3"  style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-bottom: 0;border-left: 0;text-decoration:underline">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;margin-top:10px;background:white;border:1px solid #595959" >
        <i class="fal fa-ellipsis-h-alt"></i>
         <span style="font-weight:bolder"> ... </span>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
        <a href="{{ route('admin.posts.edit', $post->id) }}"  class="dropdown-item">
          <span class="fa fa-pencil" > Edit</span>
        </a>
        <br>
        <form method="Post" action="{{route('admin.posts.destroy',$post->id)}}">
          @method("DELETE")
          @csrf
        <button type="submit" class="dropdown-item" >        
            <span class="fa fa-trash"> Delete</span>
        </button>
        </form>
      </div>
    </div>  
    @else
    <div class="col-md-3 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-left:0;border-bottom:0;height:45px">
    </div>
    @endif
    <div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-top:0">
      <h4 style="float:left">{{$post->title}}</h4>
      <span style="float:right;padding-top:1%">{{$post->created_at ? $post->created_at->diffForhumans():null}}</span>
    </div>
    <div class="col-md-3 p-0 " style="background:white;border-bottom-left-radius:5px;border-color:#E6FFFD;height:210px">
    <img  id="preview" src="{{ asset('images/posts/'.$post->photo) }}" style="width:102%;height:102%;border-color:E6FFFD" alt="...">
    </div>
{{-- ------ make comment on post----------- --}}  
        <form method="post" action="{{route('admin.comments.store')}}">
          <div  class="col-xs-10 col-sm-10" style="padding: 0;background:white;height: 0px">
              <input type="hidden" name="post_id" value="{{$post->id}}">
              <textarea name="comment"  style="resize: none;width:100%;height:47px;border-top-right-radius:25px;border-bottom-right-radius:25px" placeholder="Write YOur Comment ... " required>  </textarea>
          </div>
          <div  class="col-xs-2 col-sm-2" style="padding: 0;border-right:2px solid #00618F">
              <button type="submit" class="btn btn-primary" style="height:47px;border-radius:50px">Write Comment</button>
          </div>
        </form>
{{-- ----------- --}}
{{-- show comments in post --}}
@if($post->comments->count() > 0)
  @foreach($post->comments as $comment)
    <div class="col-md-12 " style="background:white;font-family:serif;display:inline-block;border:1px solid #F5F2F2;border-left: 2px solid #00618F;border-bottom: 2px solid #00618F;border-right: 2px solid #00618F;border-top: 2px solid white">
      <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white;height: 0px">
        <h5 style="text-decoration:underline  double #00618F;background:white;color:black">{{$comment->admin->name}}</h5>
      </div>

      <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white;display:inline-block">
        <h5 style="float:right">{{$comment->created_at ? $comment->created_at->diffForhumans() :null}}</h5>
      </div>
      
       @if($comment->admin_id == auth('admin')->user()->id)
        {{-- <div style="display:inline-block;margin-left:20%"> --}}
        {{-- <h5 style="display:inline-block;margin-left:50%">{{$comment->created_at ? $comment->created_at->diffForhumans() :null}}</h5> --}}
        {{-- </div> --}}

          <a href="{{route('admin.comments.edit',$comment->id)}}" style="margin-left: 82%;margin-top: 7px;display:inline-block;color:#163A77" >
            <span class="fa fa-pencil" > Edit</span>
          </a>
          <form method="Post" action='{{route('admin.comments.destroy',$comment->id)}}' style="float: right">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-link"  style="float: right;color:red">        
              <span class="fa fa-trash"> Delete</span>
          </button>
      </form>
      @endif
        <textarea  style="resize: none;float:left;text-family:Serif,Helvetica,Times;width:100%;margin-bottom:10px" disabled>{{$comment->comment}}  </textarea>
      </div>
  @endforeach
@endif
{{-- end show comment --}}
<div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-top:0;height:40px">
  {{-- facebook --}}
  <div class="fb-share-button" data-href="https://localhost:8000/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
  {{-- facebook end--}}
   
  {{-- add this --}}
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_inline_share_toolbox_r0ij" style="margin-left:22%"></div>
  {{-- add this end--}}   
  </div>
</div>

<br>
<br>
<br>
@else

<div class="row" style="width:60%;margin-left:20%;border-top-right-radius:5px;border-top-left-radius:5px;border:1px solid #595959">
  <div class="col-md-9 " style="background:white;font-family:serif;display:inline-block;border:2px solid #595959;border-right: 0;border-bottom: 0;height:45px">
   <span style="border:1px solid white;background:black;color:white"> {{$post->admin->name}} </span>
  </div>
  @if($post->admin_id == auth('admin')->user()->id)
  <div class="dropdown col-md-3"  style="background:white;font-family:serif;display:inline-block;border:2px solid #595959;border-bottom: 0;border-left: 0;text-decoration:underline">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;margin-top:10px;background:white;border:1px solid #595959" >
      <i class="fal fa-ellipsis-h-alt"></i>
       <span style="font-weight:bolder"> ... </span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
      <a href="{{ route('admin.posts.edit', $post->id) }}"  class="dropdown-item">
        <span class="fa fa-pencil" > Edit</span>
      </a>
      <br>
      <form method="Post" action="{{route('admin.posts.destroy',$post->id)}}">
        @method("DELETE")
        @csrf
      <button type="submit" class="dropdown-item" >        
          <span class="fa fa-trash"> Delete</span>
      </button>
      </form>
    </div>
  </div>  
  @else
  <div class="col-md-3 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-left:0;border-bottom:0;height:45px">
  </div>
  @endif

      <div class="col-md-12 " style="background:white;border:2px solid #595959;border-top: 0;border-bottom: 0">
        <h2>{{$post->body}}</h2>
        <br>      
      </div>
      @if($post->admin_id == auth('admin')->user()->id)
      <div class="col-md-12"  style="background:white;border-bottom-right-radius:5px;border:1px solid #595959;border:0;;border-left:2px solid #595959;border-right:2px solid #595959">
        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-dark" style="margin-left:40%;border-radius:20px;margin-top:30px">
          <h6>
            <span style="color:white;width:25px;float:left;border-radius:50px;background:black">{{ $post->comments()->count()}}</span>
            Show All Comments
          </h6>
      </a>
    </a>
  </div>
  @endif
{{-- ------ make comment on post----------- --}}  
<form method="post" action="{{route('admin.comments.store')}}">
<div  class="col-xs-10 col-sm-10" style="padding: 0;background:white;height: 0px">
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <textarea name="comment"  style="resize: none;width:100%;height:47px;border-left:2px solid #00618F;border-top-right-radius:25px;border-bottom-right-radius:25px" placeholder="Write YOur Comment ... " required>  </textarea>
</div>
<div  class="col-xs-2 col-sm-2" style="padding: 0;border-right:2px solid #00618F">
    <button type="submit" class="btn btn-primary" style="height:47px;border-radius:50px">Write Comment</button>
</div>
</form>
{{-- ----------- --}}

{{-- show comments in post --}}
@if($post->comments->count() > 0)
@foreach($post->comments as $comment)
<div class="col-md-12 " style="background:white;font-family:serif;display:inline-block;border:1px solid #F5F2F2;border-left: 2px solid #00618F;border-right: 2px solid #00618F;border-top: 2px solid white">
  <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white;height: 0px">
    <h5 style="text-decoration:underline  double black;background:white;color:#00618F">{{$comment->admin->name}}</h5>
  </div>
  <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white;display:inline-block">
    <h5 style="float:right">{{$comment->created_at ? $comment->created_at->diffForhumans() :null}}</h5>
  </div>
  
   @if($comment->admin_id == auth('admin')->user()->id)
    {{-- <div style="display:inline-block;margin-left:20%"> --}}
    {{-- <h5 style="display:inline-block;margin-left:50%">{{$comment->created_at ? $comment->created_at->diffForhumans() :null}}</h5> --}}
    {{-- </div> --}}

      <a href="{{route('admin.comments.edit',$comment->id)}}" style="margin-left: 82%;margin-top: 7px;display:inline-block;color:#163A77" >
        <span class="fa fa-pencil" > Edit</span>
      </a>
      <form method="Post" action='{{route('admin.comments.destroy',$comment->id)}}' style="float: right">
        @method("DELETE")
        @csrf
        <button type="submit" class="btn btn-link"  style="float: right;color:red">        
          <span class="fa fa-trash"> Delete</span>
      </button>
  </form>
  @endif
    <textarea  style="resize: none;float:left;text-family:Serif,Helvetica,Times;width:100%;margin-bottom:10px" disabled>{{$comment->comment}}  </textarea>
  </div>
@endforeach
@endif
{{-- end show comment --}}
  <div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;height:40px">
    {{-- facebook --}}
    <div class="fb-share-button" data-href="https://localhost:8000/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    {{-- facebook end--}}
     
    {{-- add this --}}
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_inline_share_toolbox_r0ij" style="margin-left:22%"></div>
    {{-- add this end--}}   
    </div>
</div>
<br>
@endif

@endcomponent


@include('admin.partials.delete-modal')
@endsection