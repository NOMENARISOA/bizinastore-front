<?php

namespace App\Http\Livewire;

use App\Models\annonce;
use App\Models\favoris;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class FavoriShow extends Component
{
    use WithPagination;

    public function paginationView(){

        return 'livewire.pagination';

    }

    public function delete_favoris($id){

        if(Auth::check()){
            $favoris = favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$id)->first();
            $favoris->delete();;
        }
    }

    public function render()
    {
        $annonces = DB::table('favoris')
                     ->join('annonces','annonces.id','=','favoris.annonce_id')
                     ->where('favoris.user_id','=', Auth::user()->id)
                     ->select('annonces.*')
                     ->get();
        $annonce_query = [];
        foreach($annonces as $annonce){
            array_push($annonce_query,annonce::findOrFail($annonce->id));
        }
        $annonces = collect($annonce_query);
        $perPage = 6;
        $items = $annonces->forPage($this->page, $perPage);
        $annonces = new LengthAwarePaginator($items, $annonces->count(), $perPage, $this->page);
        return view('livewire.favori-show',[
            'annonces' => $annonces
        ]);
    }
}
