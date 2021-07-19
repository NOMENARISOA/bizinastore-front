<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    public function comment(){
        return $this->hasMany('App\Models\comment','blog_id');
    }
}
