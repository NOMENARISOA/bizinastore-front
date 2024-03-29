<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function annonceur(){
        return $this->belongsTo('App\Models\annonceur','annonceur_id');
    }
    public function comment(){
        return $this->hasMany('App\Models\comment','forum_id');
    }
}
