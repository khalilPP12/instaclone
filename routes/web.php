<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
Route::get('/',[PostsController::class,'feed']);
Route::get('/profile',[PostsController::class,'profile']);
Route::get('/edit_profile/{id}',[PostsController::class,'edit_profile'])->name('edit_profile');
Route::get('/add_post',[PostsController::class,'add_post']);
Route::post('/store',[UserController::class,'store'])->name('store');
Route::get('/Showpost',[UserController::class,'Showpost'])->name('Showpost');
Route::post('/comments',[UserController::class,'comments'])->name('comments');
Route::post('/likes',[UserController::class,'likes'])->name('likes');
Route::patch('/update_profil/{id}',[PostsController::class,'update_profil'])->name('update_profil');
Route::get('follow_page/{id}',[UserController::class,'follow_page'])->name('follow_page');
Route::post('follow',[UserController::class,'follow'])->name('follow');
Route::post('like',[UserController::class,'like'])->name('like');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
