<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_produit extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->hasMany('App\Models\annonce','type_produit_id');
    }
}
