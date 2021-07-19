<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class annonceur extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name','lastname','region_id','phone','password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function annonce(){
        return $this->hasMany('App\Models\annonce','annonceur_id');
    }
    public function conversation(){
        return $this->hasMany('App\Models\conversation','annonceur_id');
    }
    public function message(){
        return $this->hasMany('App\Models\message','annonceur_id');
    }
    public function forum(){
        return $this->hasMany('App\Models\forum','annonceur_id');
    }
    public function comment(){
        return $this->hasMany('App\Models\comment','annonceur_id');
    }
}
