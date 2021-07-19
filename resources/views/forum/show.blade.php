@extends('layouts.template')
@section('content')
<div class="container" style="padding-top: 2%">
    <h3 class=" shadow" style="background-color: #00A1F1;border-radius: 20px;font-family: segouil; font-weight: 100;color:white; width:max-content; padding: 10px" >{{$forum->titre}}</h3>
    <p class="shadow" style="background-color: #FFF;border-radius: 20px;font-family: segouil; width: max-content; padding: 2%">{{$forum->content}}</p>
</div>
<div class="container" style="margin-bottom: 3%">
    <div class="row" style=" margin-top: 2%">
        <div class="col-md-2">
            <h3 class="shadow text-center" style="background-color: #82bd01;border-radius: 20px;font-family: segouil; font-weight: 100;color:white; width:100%; padding: 10px; font-size: 1.2em;" >Réponse</h3>
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-4">
            <button class="btn" data-toggle="modal" data-target="#commentaire" style="background-color: #f35220; font-family: segouil;font-weight: 100; color: #FFF; border-radius: 20px">Envouyer une réponse</button>
        </div>
    </div>
    @if($forum->comment->count() > 0)
        @foreach ($forum->comment as $comment )
            <div class="row" style="margin-top: 2%;background-color: #FFF; padding: 2%; border-radius: 20px">
                <div class="col-md-1" style="padding: 0px;">
                    <img width="50" height="50" class="round" @if($comment->user) avatar="{{$comment->user->name}}" @elseif($comment->annonceur) avatar="{{$comment->annonceur->name}}" @endif>
                </div>
                <div class="col-md-11">
                    <p style="font-weight: 100; font-family: segouil;font-size: 1.4em;margin-bottom: 0px" >@if($comment->user) {{$comment->user->name}} @elseif($comment->annonceur) {{$comment->annonceur->name}} @endif</p>
                    <p style="font-weight: 100; font-family: segouil">{{$comment->comment}}</p>
                </div>
            </div>
        @endforeach
    @endif

</div>
<div class="modal fade" id="commentaire" tabindex="-1" role="dialog" aria-labelledby="commentaire" aria-hidden="true">
    <div class="modal-dialog " style="max-width: 40%;" role="document">
        <div class="modal-content">
            <form action="{{route('forum.commentaire')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="forum" style="font-family: segouil; font-weight: 100">Envoyer une Message</h5>
                </div>
                <div class="modal-body" style="padding: 5px">
                    <input type="hidden" name="forum_id" id="forum_id" value="{{$forum->id}}">
                    <textarea name="commentaire" id="commentaire" placeholder="Votre réponse" cols="30" rows="10" style="margin-top: 2%; width: 100%; height: 200px;font-family: segouil; font-weight: 100;" minlength="50" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style=" font-family: segouil; font-weight: 100; background-color: #E70001; border: 0px;" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" style=" font-family: segouil; font-weight: 100; background-color: #00a1f1; border: 0px;">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- @if($forum->user) avatar="{{$forum->user->name}}" @elseif($forum->annonceur) avatar="{{$forum->annonceur->name}}" @endif --}}
