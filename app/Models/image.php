<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->hasMany('App\Models\image_annonce','image_id');
    }
}
