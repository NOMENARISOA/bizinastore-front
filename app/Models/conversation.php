<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversation extends Model
{
    use HasFactory;
    public function annonce(){
        return $this->belongsTo('App\Models\annonce','annonce_id');
    }
    public function sender(){
        return $this->belongsTo('App\Models\User','sender');
    }
    public function received(){
        return $this->belongsTo('App\Models\User','received');
    }
    public function message(){
        return $this->hasMany('App\Models\message','conversation_id');
    }
}
