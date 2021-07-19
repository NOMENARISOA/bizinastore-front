<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\contact;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function welcome()
    {
        $categories = categorie::all();
        return view('welcome',compact('categories'));
    }

    public function about()
    {
        return view('otherpage.about');
    }


    public function aide()
    {
        return view('otherpage.aide');
    }


    public function mention()
    {
        return view('otherpage.mention');
    }


    public function cgv()
    {

        return view('otherpage.cgv');
    }


    public function cgu()
    {
        return view('otherpage.cgu');
    }


    public function vie()
    {

        return view('otherpage.vie');
    }


    public function localisation()
    {
        return view('otherpage.localisation');
    }

    public function contact(){
        return view('otherpage.contact');
    }
    public function contact_store(Request $request){
        $contact = new contact();

        $contact->name = $request->get('name');
        $contact->sujet = $request->get('sujet');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->message= $request->get('message');

        $contact->save();
        return redirect()->back()->with('success','Votre message a été bien envoyer, notre commercial vous contacera plustard');
    }
}
