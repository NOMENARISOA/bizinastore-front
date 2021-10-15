<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category_list extends Model
{
    use HasFactory;

    public function sub_category(){
        return $this->belongsTo('App\Models\sub_category','sub_category_id');
    }
}
