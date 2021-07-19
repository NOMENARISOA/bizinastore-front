<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_categorie extends Model
{
    use HasFactory;

    public function categorie(){
        return $this->hasMany('App\Models\categorie','groupe_categorie_id');
    }
}
