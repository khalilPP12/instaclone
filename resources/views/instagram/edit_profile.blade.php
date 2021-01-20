@extends('layouts.layoutsInsta')
@section('content')
<main class="edit-profile">
    <section class="profile-form">
        @foreach ($data as $item)
            
       
        <header class="profile-form__header">
            <div class="profile-form__avatar-container">
                <img 
                    src="{{asset('storage/'.$item->photo)}}"
                    class="profile-form__avatar"
                />
            </div>
            <h4 class="profile-form__title">{{$item->name}}</h4>
        </header>
        <form action="{{route('update_profil',['id'=>$item->id])}}" method="POST" enctype="multipart/form-data" class="edit-profile__form">
            @csrf
            @method('PATCH')
            {{-- <div class="edit-profile__form-row">
                <label for="name" class="edit-profile__label">Name
                </label>
                <input 
                    id="name"
                    name=""
                    type="text"
                    value="{{$item->name}}"
                    class="edit-profile__input"
                />
            </div> --}}
            <div class="edit-profile__form-row">
                <label for="username" class="edit-profile__label">
                    Username
                </label>
                <input 
                    type="text"
                    id="username"
                  name="username"
                  value="{{$item->username}}"
                    class="edit-profile__input"
                />
            </div>
            <div class="edit-profile__form-row">
                <label for="website" class="edit-profile__label">
                    Website
                </label>
                <input
                    type="text"
                    id="website"
                    name="website"
                    class="edit-profile__input"
                    value="{{$item->website}}"
                />
            </div>
            <div class="edit-profile__form-row">
                <label for="bio" class="edit-profile__label">
                    Bio
                </label>
                <textarea id="bio" 
                 name="bio" class="edit-profile__textarea">{{$item->bio}}</textarea>
            </div>
            <div class="edit-profile__form-row">
                <label for="email" class="edit-profile__label">
                    Email
                </label>
                <input 
                    type="email"
                    name="email"
                    class="edit-profile__input"
                    id="email"
                    value="{{$item->email}}"
                />
            </div>
            <div class="edit-profile__form-row">
                <label for="phone-number" class="edit-profile__label">
                    Phone Number
                </label>
                <input 
                    type="text"
                    name="phone"
                    class="edit-profile__input"
                    value="{{$item->phone}}"
                    id="phone-number"
                />
            </div>
                
            <div class="edit-profile__form-row">
                <label for="username" class="edit-profile__label">
                 post
                </label>
                <input 
                    type="file"
                    id="username"
                    class="edit-profile__input"
                    name="photo"
                />
            </div>
            <div class="edit-profile__form-row">
                <label for="gender" class="edit-profile__label">Gender</label>
                <select name="gender" value="{{$item->gender}}" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="whatever">Whatever</option>
                </select>
            </div>
            {{-- <div class="edit-profile__form-row">
                <span class="edit-profile__label">Similar Account Suggestions</span>
                <input type="checkbox" id="similar" checked>
                <label for="similar">Include your account when recommending similar accounts people might want to follow. <a href="#">[?]</a></label>
            </div> --}}
            <div class="edit-profile__form-row">
                <label class="edit-profile__label"></label>
                <input type="submit" value="Submit">
            </div>
        </form>
        @endforeach
    </section>
</main>
@endsection