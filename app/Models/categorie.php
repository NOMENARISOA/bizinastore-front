<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->hasMany('App\Models\annonce','categorie_id');
    }

    public function groupe_categorie(){
        return $this->belongsTo('App\Models\groupe_categorie','groupe_categorie_id');
    }
}
