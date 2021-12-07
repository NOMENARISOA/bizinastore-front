<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\conversation;
use App\Models\favoris;
use App\Models\message;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if($request->get("password") == $request->get("confirm")){
                $user = new User();

                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->phone = $request->get('phone');
                $user->password = bcrypt($request->get('password'));

                $user->save();

                return redirect()->route('login')->with('success','Votre compte à été bien crée');
            }else{
                return redirect()->back()->with('error',"Veuillez confirmer votre mot de passe S'il vous plaît !");
            }
        }catch(Exception $e){
            return redirect()->back()->with('error','Adresse email déjà existé');
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
        $users_id = Auth::user()->id;
        $users = User::findOrFail($users_id);
        $users->update([
            'name' =>$request->get('name'),
            'lastname' =>$request->get('lastname'),
            'phone' =>$request->get('phone'),
            'region_id' =>$request->get('region'),
        ]);
        $users->save();

        return redirect()->back()->with('success','Modification éffectuée');
    }


    public function password(Request $request)
    {
        if (!(Hash::check($request->get('old'), Auth::user()->password))) {
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

        $user = User::findOrFail(Auth::user()->id);
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
    public function destroy($id)
    {
        //
    }
    public function home()
    {
        return view('users.home');
    }
    public function favoris()
    {
        return view('users.favoris');
    }
    public function historique()
    {
        return view('users.historique');
    }
    public function parametre()
    {
        return view('users.parametre');
    }
    public function message()
    {
        return view('users.message');
    }
    public function send_message(Request $request){
        $conversation = new conversation();
        $conversation->annonce_id = $request->get('annonce_id');
        $conversation->sender = $request->get('user_id');
        $conversation->received = Auth::user()->id;
        $conversation->save();
        // MESSAGE
        $message = new message();
        $message->conversation_id = $conversation->id;
        $message->user_id = Auth::user()->id;
        $message->message = $request->get('message');
        $message->save();

        return redirect()->back()->with('success','Votre message a été bien envoyer');
    }

    public function mark_favorie($annonce_id){

        $annonce = annonce::findOrFail($annonce_id);
        $favoris = new favoris();
        $favoris->annonce_id = $annonce->id;
        $favoris->user_id = Auth::user()->id;
        $favoris->save();

        return redirect()->back()->with('success','L\'annonce a été ajouter sur votre favoris');
    }

    public function backoffice_annonce(){

        return view('users.backoffice');
    }

    public function changer_etat($id,$type)
    {
        if($type == 1){ // avadika disponible
            $annonce = annonce::findOrFail($id);
            $annonce->update([
                'etat_annonce' =>'1',
            ]);
            $annonce->save();

            return redirect()->back()->with('success','Votre produit à été marquer comme Disponible');
        }else{

            $annonce = annonce::findOrFail($id);
            $annonce->update([
                'etat_annonce' =>'2',
            ]);
            $annonce->save();

            return redirect()->back()->with('success','Votre produit à été marquer comme Vendu');
        }
    }

    public function destroy_annonce($id)
    {
        $annonce = annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->back()->with('success','Suppression avec succès');
    }


    public function complete(){

        return view("auth.complete");
    }

    public function complete_store(Request $request){
    //   dd("ok");
        $users = Auth::user();
        $users->update([
            "name"=>$request->name,
            "lastname"=>$request->lastname,
            "phone"=>$request->phone,
            "is_active"=>0
        ]);
        $users->save();

        return redirect()->route('home')->with("success","Votre compte a été bien activer");
    }
}
