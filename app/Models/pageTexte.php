<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageTexte extends Model
{
    use HasFactory;

    protected $fillable = [
        'apropos',
        'aide',
        'mention_legale',
        'cgu',
        'cgv',
        'vie_priver'
    ];
}
