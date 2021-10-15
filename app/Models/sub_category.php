<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;


    public function category(){
        return $this->belongsTo('App\Models\categorie','category_id');
    }

    public function annonce_sub_category_value(){
        return $this->hasMany('App\Models\annonce_sub_category_value','sub_category_id');
    }
    public function sub_category_list(){
        return $this->hasMany('App\Models\sub_category_list','sub_category_id');
    }
}
