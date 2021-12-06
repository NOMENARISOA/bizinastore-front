<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = forum::all();
        return view('forum.index',compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forum = new forum();

        $forum->titre = $request->get('titre');
        $forum->content = $request->get('content');

        $forum->user_id = Auth::user()->id;
        /*if(Auth::guard('annonceurs')->check()){
            $forum->annonceur_id = Auth::guard('annonceurs')->user()->id;
        }*/
        $forum->save();

        return redirect()->back()->with('success','Votre sujet a été bien publier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = forum::findOrFail($id);
        return view('forum.show',compact('forum'));
    }

    public function commentaire(Request $request){
        $comment = new comment();

        $comment->comment = $request->get('commentaire');
        $comment->forum_id = $request->get('forum_id');

        $comment->user_id = Auth::user()->id;
      /*  if(Auth::guard('annonceurs')->check()){
            $comment->annonceur_id = Auth::guard('annonceurs')->user()->id;
        }*/

        $comment->save();

        return redirect()->back()->with('success','Votre réponse a été envoyer');
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
