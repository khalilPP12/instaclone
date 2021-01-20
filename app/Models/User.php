<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function profils(){
        return $this->hasOne(Profil::class);
    }
    
    public function can_comments(){
        return $this->belongsToMany(Post::class,"comments","user_id","post_id");
    }
    public function can_likes(){
        return $this->belongsToMany(Post::class,'likes',"user_id","post_id");
    }
    public function following()
    {
        return $this->belongsToMany(User::class,'follow','user_id_1','user_id_2');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class,'follow','user_id_2','user_id_1');
    }
}
