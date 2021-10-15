<?php

namespace App\Http\Livewire;

use App\Models\annonce;
use App\Models\categorie;
use App\Models\favoris;
use App\Models\historique_search;
use App\Models\region;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use SebastianBergmann\Environment\Console;

class AnnonceSearch extends Component
{
    use WithPagination;
    public $sub_menu_query = array();
    public $sub_query_temp = array();
    public $prix_max ="";
    public $prix_min ="";
    public $etat= null;
    public $category =0;
    public $search = null;
    public $location = null;
    public $region = 0;
    public $type_annonce =0;
    public $category_query =null;
    public $region_query = null;
    public $search_query = null;
    public $type_annonce_query = null;


    public function paginationView(){

        return 'livewire.pagination';

    }

    public function clear_prix(){
        $this->prix_max = 0;
        $this->prix_min = 0;
    }
    public function mount(){
        if(!empty(request()->query())){
            $this->type_annonce  = request()->query('type_annonce');
            $this->category = request()->query('category');
            $this->search = request()->query('query');
            $this->region  = request()->query('region');
        }

    }


    public function search(){
        $this->region = $this->region_query;
        $this->category = $this->category_query;
        $this->type_annonce = $this->type_annonce_query;
        $this->search = $this->search_query;

         dd($this->sub_menu_query);
    }

    public function select_type_annonce($type){
        if($type == 1 ){
            $this->type_annonce_query = 1;
        }else{
            $this->type_annonce_query = 2;
        }
    }

    public function add_favoris($id){
        if(Auth::check()){
            $annonce = annonce::findOrFail($id);
            $favoris = new favoris();
            $favoris->annonce_id = $annonce->id;
            $favoris->user_id = Auth::user()->id;
            $favoris->save();
        }
        session()->flash('success', 'Annonce a été ajouter à votre favoris');
    }
    public function delete_favoris($id){
        if(Auth::check()){
            $favoris = favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$id)->first();
            $favoris->delete();

            // session()->flash('success', 'Annonce a été supprimer à votre favoris');
        }
    }
    public function render()
    {
            $annonces = annonce::where('etat_annonce','=','1')->where('status','=','1');

            if($this->type_annonce != 0){
                $annonces = $annonces->where('type_annonce_id','=',$this->type_annonce);
            }
            if($this->category != 0){
                $annonces = $annonces->where('categorie_id','=',$this->category);
            }
            if($this->region != 0){
                $annonces = $annonces->where('region_id','=',$this->region);
            }
            if(! empty($this->search)){
                $annonces = $annonces->where('titre','LIKE','%'.$this->search.'%');
            }
            return view('livewire.annonce-search',[
                'annonces'=> $annonces->paginate(12),
                'categories'=>categorie::all(),
                'regions'=>region::all(),
                'annonces_payantes'=> $annonces->where('payant','=','1')->orderBy('id','DESC')->get()->take(5)
            ]);
    }
}
