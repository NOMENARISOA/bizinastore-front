<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class view_annonce extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->belongsTo('App\Models\annonce','annonce_id');
    }
}
