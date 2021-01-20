@extends('layouts.layoutsInsta')
@section('content')
<main class="edit-profile">
    <section class="profile-form">
        <header class="profile-form__header">
           
            <div class="profile-form__avatar-container">
                <img 
                    src="images/avatar.jpg"
                    class="profile-form__avatar"
                />
            </div>
            <h4 class="profile-form__title">serranoarevalo</h4>
        </header>
        <form action="{{route('store')}}" class="edit-profile__form"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit-profile__form-row">
                <label for="name" class="edit-profile__label">Titre
                </label>
                <input 
                    id="name"
                    type="text"
                    value=""
                    class="edit-profile__input"
                    placeholder="Titre"
                    name="title"
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
                <label class="edit-profile__label"></label>
                <input type="submit" value="Add new post">
            </div>
        </form>
    </section>
</main>
@endsection