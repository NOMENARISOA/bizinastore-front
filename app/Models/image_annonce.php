<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_annonce extends Model
{
    use HasFactory;

    public function image(){
        return $this->belongsTo('App\Models\image','image_id');
    }
    public function annonce(){
        return $this->belongsTo('App\Models\annonce','annonce_id');
    }
}
