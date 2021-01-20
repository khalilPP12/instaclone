@extends('layouts.layoutsInsta')
@section('content')
<main class="feed">  
     @forelse ($data as $posts)
    <section class="photo">
     
          <header class="photo__header">

            <div class="photo__header-column">
                <img
                    class="photo__avatar"
                    src="{{asset('storage/'.$posts->user->photo)}}"
                    />
            </div>
            <div class="photo__header-column">
                <span class="photo__username"><a href="{{route('follow_page',['id'=>$posts->user->id])}}">
                    {{$posts->user->name}}
                </a></span>
                <span class="photo__location">{{$posts->title}}</span>
                {{-- <span class="photo__location">European Art of Living Center - Bad Antogast</span> --}}
            </div>
        </header>
        <div class="photo__file-container">
            <img
                class="photo__file"
                src="{{asset('storage/'.$posts->photo)}}"
            />
        </div>
        <div class="photo__info">
            <div class="photo__icons">
                <span class="photo__icon">
                    {{-- <form method="post" action="{{route('likes')}}" enctype="multipart/form-data">
                        @csrf --}}
                        <input type="hidden" name="post_id" value="{{$posts->id}}">
                        @if (Auth::user()->can_likes()->where('post_id',$posts->id)->first())
                     

                            <span id ="heart"><i style="color:red;cursor:pointer;font-size:24px;margin-right:10px" class="fa fa-heart" aria-hidden="true" ></i> </span>

                       
                        @else
                        <span id ="heart"><i  style="color:rgb(0, 0, 0);cursor:pointer;font-size:24px;margin-right:10px" class="fa fa-heart-o" aria-hidden="true" ></i> </span>
                        @endif
                      
                    {{-- </form> --}}
                </span>
                <span class="photo__icon">
                    <i class="fa fa-comment-o fa-lg"></i>
                </span>
            </div>
            <span class="photo__likes">{{$posts->can_have_likes->count()}}</span>
            <ul class="photo__comments">
                @foreach ($posts->can_have_comments as $data)
                  <li class="photo__comment">
                    <span class="photo__comment-author">{{$data->pivot->username}}</span>{{$data->pivot->content}}
                </li>  
                @endforeach
                
               
            </ul>
            <span class="photo__time-ago">11 hours ago</span>
            <div class="photo__add-comment-container">
                <form action="{{route('comments')}}" method="POST"> 
                    @csrf
                    <input type="hidden" name="post_id" value="{{$posts->id}}">
                     <textarea placeholder="Ajouter un commentaire..." name="content" class="photo__add-comment"></textarea>
                   <button class="btn btn-info">comments</button>
                    </form>
              
                <i class="fa fa-ellipsis-h"></i>
            </div>
        </div>
    </section>   
        @empty
            
        @endforelse
       
    {{-- <section class="photo">
        <header class="photo__header">
            <div class="photo__header-column">
                <img
                    class="photo__avatar"
                    src="{{asset('instagram/images/avatar.jpg')}}"
                />
            </div>
            <div class="photo__header-column">
                <span class="photo__username">serranoarevalo</span>
                <span class="photo__location">European Art of Living Center - Bad Antogast</span>
            </div>
        </header>
        <div class="photo__file-container">
            <img
                class="photo__file"
                src="{{asset('instagram/images/feedPhoto.jpg')}}"
            />
        </div>
        <div class="photo__info">
            <div class="photo__icons">
                <span class="photo__icon">
                    <i class="fa fa-heart-o heart fa-lg"></i>
                </span>
                <span class="photo__icon">
                    <i class="fa fa-comment-o fa-lg"></i>
                </span>
            </div>
            <span class="photo__likes">35 likes</span>
            <ul class="photo__comments">
                <li class="photo__comment">
                    <span class="photo__comment-author">serranoarevalo</span>wow this is great!
                </li>
                <li class="photo__comment">
                    <span class="photo__comment-author">lynn</span>no is not!
                </li>
            </ul>
            <span class="photo__time-ago">11 hours ago</span>
            <div class="photo__add-comment-container">
                <textarea placeholder="Add a comment..." class="photo__add-comment"></textarea>
                <i class="fa fa-ellipsis-h"></i>
            </div>
        </div>
    </section> --}}
</main>
@endsection