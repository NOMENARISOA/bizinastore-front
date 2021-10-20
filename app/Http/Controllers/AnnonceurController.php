<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\annonceur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnnonceurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonceur.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(strcmp($request->get('password'), $request->get('confirm_password')) == 0){
            $annonceur = new annonceur();
            $annonceur->name  = $request->get('name');
            $annonceur->lastname  = $request->get('lastname');
            $annonceur->email  = $request->get('email');
            $annonceur->phone  = $request->get('phone');
            $annonceur->password  = bcrypt($request->get('password'));
            $annonceur->save();

            return redirect()->route('annonceur.login')->with('success','Votre compte à été bien crée');
        }else{
            return redirect()->back()->with('error','Veuillez confirmer votre mot de passe');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $annonceur_id = Auth::guard('annonceurs')->user()->id;
        $annonceur = annonceur::findOrFail($annonceur_id);
        $annonceur->update([
            'name' =>$request->get('name'),
            'lastname' =>$request->get('lastname'),
            'phone' =>$request->get('phone'),
            'region_id' =>$request->get('region'),
        ]);
        $annonceur->save();

        return redirect()->back()->with('success','Modification éffectuée');
    }
    public function password(Request $request){

        if (!(Hash::check($request->get('old'), Auth::guard('annonceurs')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
        }
        if(strcmp($request->get('old'), $request->get('new')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Nouveau mot de passe ne peut pas être le même que votre mot de passe actuel. Veuillez choisir un mot de passe différent");
        }
        if($request->get('new')!= $request->get('confirm')){
            return redirect()->back()->with("error","Veuillez retaper le même de votre nouveau mot de passe");
        }

        $user_id = Auth::guard('annonceurs')->user()->id;
        $user = User::findOrfail($user_id);
        $user->password = bcrypt($request->get('new'));
        $user->save();

        return redirect()->back()->with("success","Le mot de passe a été changé avec succès !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('annonceur.login');
    }
    public function home()
    {
        return view('annonceur.home');
    }
    public function changer_etat($id,$type)
    {
        if($type == 1){ // avadika disponible
            $annonce = annonce::findOrFail($id);
            $annonce->update([
                'etat_produit' =>'1',
            ]);
            $annonce->save();

            return redirect()->back()->with('success','Votre produit à été marquer comme Disponible');
        }else{

            $annonce = annonce::findOrFail($id);
            $annonce->update([
                'etat_produit' =>'2',
            ]);
            $annonce->save();

            return redirect()->back()->with('success','Votre produit à été marquer comme Vendu');
        }
    }
    public function destroy($id)
    {
        $annonce = annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->back()->with('success','Suppression avec succès');
    }

    public function message()
    {

        return view('annonceur.message');
    }
}
