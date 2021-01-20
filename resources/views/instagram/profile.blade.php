@extends('layouts.layoutsInsta')
@section('content')
<main class="profile-container">
    <section class="profile">
  
            
      
        <header class="profile__header">
            <div class="profile__avatar-container">
                <img 
                src="{{asset('storage/'.$info['photo'])}}"
                    class="profile__avatar"
                />
            </div>
            <div class="profile__info">
                <div class="profile__name">
                    <h1 class="profile__title">{{Auth::user()->name}}</h1>
                    <a href="{{route('edit_profile',['id'=>Auth::user()->id])}}" class="profile__button u-fat-text">Modifier Profile</a>
                    <i class="fa fa-cog fa-2x" id="cog"></i>
                </div>
                <ul class="profile__numbers">
                    <li class="profile__posts">
                        <span class="profile__number u-fat-text">{{$data->count()}}</span> publications
                    </li>
                    <li class="profile__followers">
                        <span class="profile__number u-fat-text">1,5M</span> abonnés

                    </li>
                    <li class="profile__following">
                        <span class="profile__number u-fat-text">134</span> abonnements
                    </li>
                </ul>
                <div class="profile__bio">
                    <span class="profile__full-name u-fat-text">{{$info["username"]}}</span>
                    <p class="profile__full-bio">{{$info["bio"]}}.</p>
                    <a href="http://serranoarevalo.com" class="profile__link u-fat-text">{{$info["website"]}}</a>
                </div>
            </div>
        </header> 
        <div class="profile__pictures">
           @forelse ($data as $posts)
               <a href="image-detail.html" class="profile-picture">
                <img
                    src="{{asset('storage/'.$posts->photo)}}"
                    class="profile-picture__picture"
                />  
                <div class="profile-picture__overlay">
                    <span class="profile-picture__number">
                        <i class="fa fa-heart"></i>{{$posts->can_have_likes->count()}}
                    </span>
                    <span class="profile-picture__number">
                        <i class="fa fa-comment"></i> {{$posts->can_have_comments->count()}}
                    </span>
                </div>
            </a>    
      @empty
                
            @endforelse
         
          
        </div>   
   
    </section>
</main>
@endsection