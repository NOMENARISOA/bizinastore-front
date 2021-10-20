<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce_sub_categorie_value extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->belongsTo('App\Models\annonce','annonce_id');
    }

    public function sub_category(){
        return $this->belongsTo('App\Models\sub_category','sub_category_id');
    }
}
