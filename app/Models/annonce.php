<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'etat_annonce',
        'status',
        'payant',
        'status_payant'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function categorie(){
        return $this->belongsTo('App\Models\categorie','categorie_id');
    }

    public function type_produit(){
        return $this->belongsTo('App\Models\type_produit','type_produit_id');
    }

    public function type_annonce(){
        return $this->belongsTo('App\Models\type_annonce','type_annonce_id');
    }
    public function marque(){
        return $this->belongsTo('App\Models\marque','marque_id');
    }

    public function model_produit(){
        return $this->belongsTo('App\Models\model_produit','model_produit_id');
    }

    public function etat(){
        return $this->belongsTo('App\Models\etat','etat_id');
    }

    public function mode_paiement(){
        return $this->belongsTo('App\Models\mode_paiement','mode_paiement_id');
    }

    public function region(){
        return $this->belongsTo('App\Models\region','region_id');
    }

    public function image(){
        return $this->hasMany('App\Models\image_annonce','annonce_id');
    }
    public function conversation(){
        return $this->hasMany('App\Models\conversation','annonce_id');
    }
    public function favoris(){
        return $this->hasMany('App\Models\favoris','annonce_id');
    }
    public function view(){
        return $this->hasMany('App\Models\view_annonce','annonce_id');
    }

    public function sub_category_value(){
        return $this->hasMany('App\Models\annonce_sub_categorie_value','annonce_id');
    }

    public function signal(){
        return $this->hasMany('App\Models\annonce_signal','annonce_id');
    }


}
