<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etat extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->hasMany('App\Models\annonce','etat_id');
    }
}
