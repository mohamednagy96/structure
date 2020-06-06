@extends('admin.layouts.master')
@section('content')
    
@component('admin.components.box',['title'=>'Posts List','create'=>route('admin.posts.create')])

  @if(!$post->photo == null)
    <div class="row border " style="width:60%;margin-left:20%;border-top-right-radius:5px;border-top-left-radius:5px;border:1px solid #595959">
      <div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-bottom: 0;text-decoration:underline">
        {{$post->admin->name}}
      </div>
      <div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-top:0">
        <h4 style="float:left">{{$post->title}}</h4>
        <span style="float:right;padding-top:1%">{{$post->created_at ? $post->created_at->diffForhumans():null}}</span>
      </div>
      <div class="col-md-3 p-0 " style="background:white;border-bottom-left-radius:5px;border-color:#E6FFFD">
          <img class="col-sm-12 p-0 " id="preview" src="{{asset('/images/'.$post->photo)}}" style="width:25rem;height:15rem;border-color:E6FFFD" alt="...">
      </div>
      <div class="col-md-9 border " style="background:white;border-bottom-right-radius:5px;border:1px solid #595959">
          <h6>{{$post->body}}</h6>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          @if($post->admin_id == auth('admin')->user()->id)
              <form method="Post" action="{{route('admin.posts.destroy',$post->id)}}" style="float:right;border-radius:20px">
                    @method("DELETE")
                    @csrf
                  <button type="submit" class="btn btn-danger" style="border-radius: 50px">        
                      <span class="fa fa-trash" > Delete</span>
                  </button>
              </form>
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning " style="float:left;border-radius:20px">
                  <span class="fa fa-pencil" > Edit</span>
                </a>
                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-dark" style="margin-left:25%;border-radius:20px">
                    <h6>
                      <span style="color:white;width:25px;float:left;border-radius:50px;background:black">{{ $post->comments->count()}}</span>
                      Show All Comments
                    </h6>
                </a>
          @endif
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
    <div class="col-md-12 " style="background:white;font-family:serif;display:inline-block;border:1px solid #F5F2F2;border-left: 2px solid #00618F;border-right: 2px solid #00618F;border-top: 2px solid white">
      <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white;height: 0px">
        <h5 style="text-decoration:underline  double black;background:white;color:#00618F">{{$comment->admin->name}}</h5>
      </div>
      <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white">
        <h5 style="float:right">{{$comment->created_at ? $comment->created_at->diffForhumans() :null}}</h5>
      </div>
        <textarea  style="resize: none;float:left;text-family:Serif,Helvetica,Times;width:100%" disabled>{{$comment->comment}}  </textarea>
        <br>
        <br>
        <br>
        <br>
        <br>
      @if($comment->admin_id == auth('admin')->user()->id)
        <a href="{{route('admin.comments.edit',$comment->id)}}"> <button class="btn btn-warning" style="width:10%;margin-bottom:5px;display:inline-block">Edit</button> </a>
          <form method="Post" action='{{route('admin.comments.destroy',$comment->id)}}' style="float:right">
            @method("DELETE")
            @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      @endif
    </div>
  @endforeach
@endif
{{-- end show comment --}}
</div>

<br>
<br>
<br>
@else


   <div class="row" style="width:60%;margin-left:20%">
          <div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-bottom: 0;text-decoration:underline">
            {{$post->admin->name}}
          </div>
          <div class="col-md-12 " style="background:#EDEDED;font-family:serif;display:inline-block;border:2px solid #595959;border-top:0">
            <h4 style="float:left">{{$post->title}}</h4>
            <span style="float:right;padding-top:1%">{{$post->created_at ? $post->created_at->diffForhumans():null}}</span>
          </div>

          <div class="col-md-12 " style="background:white;border:2px solid #595959;border-top: 0;border-bottom: 0">
            <h2>{{$post->body}}</h2>
            <br>      
          </div>
          @if($post->admin_id == auth('admin')->user()->id)
          <div class="col-md-12" style="background:white;font-family:serif;display:inline-block;border:2px solid #595959;border-bottom: 0;border-top: 0;padding-bottom:5px">


             <form method="Post" action="{{route('admin.posts.destroy',$post->id)}}" style="float:right;border-radius:20px">
              @method("DELETE")
              @csrf
              <button type="submit" class="btn btn-danger" style="border-radius: 50px">        
                     <span class="fa fa-trash" > Delete</span>
              </button>
            </form>
                     <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning " style="float:left;border-radius:20px">
          <span class="fa fa-pencil" > Edit</span>
        </a>
        
        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-dark" style="margin-left:30%;border-radius:20px">
           <h6>
              <span style="color:white;width:25px;float:left;border-radius:50px;background:black">
                {{ $post->comments->count()}}
              </span>
              Show All Comments
           </h6>
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
      <div  class="col-xs-6 col-sm-6" style="padding: 0;background:white">
        <h5 style="float:right">{{$comment->created_at ? $comment->created_at->diffForhumans() :null}}</h5>
      </div>
        <textarea  style="resize: none;float:left;text-family:Serif,Helvetica,Times;width:100%" disabled>{{$comment->comment}}  </textarea>
        <br>
        <br>
        <br>
        <br>
        <br>
      @if($comment->admin_id == auth('admin')->user()->id)
        <a href="{{route('admin.comments.edit',$comment->id)}}"> <button class="btn btn-warning" style="width:10%;margin-bottom:5px;display:inline-block">Edit</button> </a>
          <form method="Post" action='{{route('admin.comments.destroy',$comment->id)}}' style="float:right">
            @method("DELETE")
            @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      @endif
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