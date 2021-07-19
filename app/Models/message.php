<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    public function conversation(){
        return $this->belongsTo('App\Models\conversation','conversation_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function annonceur(){
        return $this->belongsTo('App\Models\annonceur','annonceur_id');
    }
}
