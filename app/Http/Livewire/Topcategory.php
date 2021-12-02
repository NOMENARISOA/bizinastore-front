<?php

namespace App\Http\Livewire;

use App\Models\annonce;
use App\Models\categorie;
use Livewire\Component;

class Topcategory extends Component
{
    public $categories ;
    public $categorie_selected;

    public function mount(){
        $this->categories = categorie::take(5)->get();
        $this->categorie_selected = $this->categories->first()->id;
    }

    public function selected_article($select_article){
        $this->categorie_selected = $select_article;
    }
    public function render()
    {
        $annonces = annonce::where("categorie_id","=",$this->categorie_selected)->take(6)->get();
        return view('livewire.topcategory',[
            'categories'=>$this->categories,
            'annonces' =>$annonces,
            'categorie_selected'=>$this->categorie_selected,
        ]);
    }
}
