<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function users(){
        return $this->hasMany(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
