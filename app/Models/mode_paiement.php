<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mode_paiement extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->hasMany('App\Models\annonce','mode_paiement_id');
    }
}
