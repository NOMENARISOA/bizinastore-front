<?php

namespace App\Http\Livewire;

use App\Models\annonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AnnonceurHome extends Component
{
    public $query ="";
    public $annonce_menu = "1";

    public function change_menu($id){
        $this->annonce_menu = $id;
    }
    use WithPagination;



    public function paginationView(){

        return 'livewire.pagination';

    }
    public function render()
    {
        $total = annonce::where('user_id','=',Auth::user()->id)->count();
        if(annonce::where('user_id','=',Auth::user()->id)->count()> 0){
            $vendue = (int)annonce::where('user_id','=',Auth::user()->id)->where('etat_annonce','=','2')->count()*100/ (int)$total;
            $nonvendue = (int)annonce::where('user_id','=',Auth::user()->id)->where('etat_annonce','=','1')->count()*100/ (int)$total;
            $annonce_vendue_month = annonce::where('created_at','like','%'.date('Y').'%')->where('etat_annonce','=','2')->select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) month'))
                                ->orderBy("created_at",'ASC')
                                ->groupBy('month')
                                ->get() ;
            $annonce_nonvendue_month = annonce::where('created_at','like','%'.date('Y').'%')->where('etat_annonce','=','1')->select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) month'))
                            ->orderBy("created_at",'ASC')
                            ->groupBy('month')
                            ->get() ;
        }else{
            $vendue = 0;
            $nonvendue = 0;
            $annonce_vendue_month = [] ;
            $annonce_nonvendue_month = [];
        }

        return view('livewire.annonceur-home',[
            'vendue' => $vendue,
            'nonvendue' => $nonvendue,
            'annonce_vendue_month' => $annonce_vendue_month,
            'annonce_nonvendue_month' => $annonce_nonvendue_month,
            'annonces' => annonce::where('user_id','=',Auth::user()->id)->where('titre','LIKE',"%{$this->query}%")->paginate(10),
        ]);
    }
}
