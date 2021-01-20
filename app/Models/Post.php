<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function can_have_comments(){
        return $this->belongsToMany(User::class,"comments","post_id","user_id")->withPivot('content','username');
    }
    public function can_have_likes(){
        return $this->belongsToMany(User::class,"likes","post_id","user_id");
    }
}
