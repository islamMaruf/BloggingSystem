<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
