<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\annonce_signal;
use App\Models\annonce_sub_categorie_value;
use App\Models\categorie;
use App\Models\etat;
use App\Models\image;
use App\Models\image_annonce;
use App\Models\marque;
use App\Models\mode_paiement;
use App\Models\model_produit;
use App\Models\region;
use App\Models\type_produit;
use App\Models\view_annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode_paiements  = mode_paiement::all();
        $categories = categorie::all();
        $type_produits = type_produit::all();
        $marques = marque::all();
        $model_produits = model_produit::all();
        $etats = etat::all();
        $regions = region::all();
        $annonceur = Auth::user();
        return view('annonce.create', compact('mode_paiements','annonceur','categories','type_produits','marques','model_produits','etats','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = Auth::user();

        $annonce = new annonce();
        $annonce->titre = $request->get('titre');
        $annonce->description = $request->get('description');
        $annonce->prix = $request->get('prix');
        $annonce->email = $request->get('email');
        $annonce->phone = $request->get('phone');
        $annonce->region_id = $request->get('region_id');
        $annonce->user_id = $users->id;
        $annonce->categorie_id = $request->get('category');
        /*$annonce->type_produit_id = $request->get('type_produit');
        $annonce->type_annonce_id = 1;
        $annonce->marque_id = $request->get('marque');
        $annonce->model_produit_id = $request->get('model_produit');
        $annonce->etat_produit_id = $request->get('etat');*/
        $annonce->mode_paiement_id = $request->get('mode_paiement');

        //ADD VALUE SUB CATEGORY ANNONCE
     //   dd($request->all());

        $annonce->save();

        $category = categorie::findOrfail($request->get('category'));
        if($category->sub_category->count()>0){
            foreach($category->sub_category as $sub_category){
                $annonce_sub_category_value = new annonce_sub_categorie_value();
                $annonce_sub_category_value->annonce_id = $annonce->id;
                $annonce_sub_category_value->sub_category_id = $sub_category->id;
                $annonce_sub_category_value->value = $request->get($sub_category->name);
                $annonce_sub_category_value->save();
            }
        }

        // AJOUT IMAGE
        if($request->image){
            $foler_for_image = preg_replace('~[\\\\/$^."\':*?"<>|]~','_',$request->get('titre'));
            $foler_for_image = str_replace(['à','è','é','ô','ê','ù',' '],'_',$foler_for_image);
            foreach($request->image as $image)
            {
                $image_name = $image->getClientOriginalName().time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('annonce/image_user_id_'.$users->id.'/'.$foler_for_image.'/',$image_name);

                $image = new image();
                $image->url = $image_name;
                $image->folder = strtolower('annonce/image_user_id_'.$users->id.'/'.$foler_for_image);
                $image->save();

                $image_annonce = new image_annonce();

                $image_annonce->annonce_id = $annonce->id;
                $image_annonce->image_id = $image->id;

                $image_annonce->save();
            }
        }
        return redirect()->back()->with("success","Votre annonce a été bien publier");
    }

    public function payante(Request $request){

        $users = Auth::user();

        $annonce = new annonce();
        $annonce->titre = $request->get('titre');
        $annonce->description = $request->get('description');
        $annonce->prix = $request->get('prix');
        $annonce->email = $request->get('email');
        $annonce->phone = $request->get('phone');
        $annonce->payant = 1;
        $annonce->status = 2;
        $annonce->status_payant = 1;
        $annonce->region_id = $request->get('region_id');
        $annonce->user_id = $users->id;
        $annonce->categorie_id = $request->get('category');
        $annonce->type_produit_id = $request->get('type_produit');
        $annonce->type_annonce_id = 1;
        $annonce->marque_id = $request->get('marque');
        $annonce->model_produit_id = $request->get('model_produit');
        $annonce->etat_produit_id = $request->get('etat');
        $annonce->mode_paiement_id = $request->get('mode_paiement');

        $annonce->save();
        // AJOUT IMAGE
        if($request->image){
            $foler_for_image = preg_replace('~[\\\\/$^."\':*?"<>|]~','_',$request->get('titre'));
            $foler_for_image = str_replace(['à','è','é','ô','ê','ù',' '],'_',$foler_for_image);
            foreach($request->image as $image)
            {
                $image_name = $image->getClientOriginalName().time().'.'.$image->getClientOriginalExtension();
                $image->storeAs('annonce/image_user_id_'.$users->id.'/'.$foler_for_image.'/',$image_name);

                $image = new image();
                $image->url = $image_name;
                $image->folder = strtolower('annonce/image_user_id_'.$users->id.'/'.$foler_for_image);
                $image->save();

                $image_annonce = new image_annonce();

                $image_annonce->annonce_id = $annonce->id;
                $image_annonce->image_id = $image->id;

                $image_annonce->save();
            }
        }

        return redirect()->route('annonce.payant.process',[$annonce->id])->with("success","Votre annonce a été bien enregistrer");

    }
    public function payante_process($annonce_id){
        return view('annonce.payement', compact('annonce_id'));

    }

    public function vanillapay(Request $request){

        $annonce = annonce::findOrfail($request->get('annonce_id'));
        $annonce->update([
            'status_payant' => 2,
        ]);
        $annonce->save();

        return redirect()->route('user.backoffice.annonce')->with('success','Votre payement est avec succès votre annonce sera publier après validation');
    }
    public function search()
    {


        return view('annonce.search');
        //
    }

    public function search_post(Request $request){
        return redirect()->route('annonce.search',['type_annonce'=>$request->get('type_annonce'),'category'=>$request->get('category'),'query'=>$request->get('search'),'region'=>$request->get('region')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = annonce::findOrFail($id);

        $view_annonce = new view_annonce();
        $view_annonce->annonce_id = $id;

        $view_annonce->save();
        return view('annonce.show',compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function signaler(Request $request){
        $signaler = new annonce_signal();
        $signaler->annonce_id = $request->get('annonce_id');
        $signaler->user_id = Auth::user()->id;
        $signaler->message = $request->get('message');
        $signaler->save();

        return redirect()->back()->with('success','Votre signalement a été bien envoyer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
