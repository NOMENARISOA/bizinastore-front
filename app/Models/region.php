<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->belongsTo('App\Models\annonce','region_id');
    }
}
