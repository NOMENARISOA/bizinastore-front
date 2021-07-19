<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function annonceur(){
        return $this->belongsTo('App\Models\annonceur','annonceur_id');
    }
    public function forum(){
        return $this->belongsTo('App\Models\forum','forum_id');
    }
    public function blog(){
        return $this->belongsTo('App\Models\blog','blog_id');
    }
}
