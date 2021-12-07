<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'phone',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function conversation(){
        return $this->hasMany('App\Models\conversation','sender');
    }
    public function message(){
        return $this->hasMany('App\Models\message','user_id');
    }
    public function comment(){
        return $this->hasMany('App\Models\comment','user_id');
    }
    public function forum(){
        return $this->hasMany('App\Models\forum','user_id');
    }
    public function favoris(){
        return $this->hasMany('App\Models\favoris','user_id');
    }
    public function annonce(){
        return $this->hasMany('App\Models\annonce','user_id');
    }

}
