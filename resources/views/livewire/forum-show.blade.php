<div>
    <div class="row row justify-content-between" style="padding-top: 2%;padding-left: 5%;padding-right: 8%">
        <div class="col-md-1 shadow form-search rounded"  style="background-color: #00A1F1;">
            <h3 class="text-center" style="font-family: segouil; font-weight: 100;color:white" >Forum</h3>
        </div>

        <div class="col-md-3  shadow form-search rounded"  style="background-color: #00A1F1;padding-left: 1%;">
            <input type="text" class="search_query" name="search_query" id="search_query" wire:model.debounce.500ms="search" placeholder="Recherche" style="background-color: transparent;border:0px;width: 100%; font-family: segouil;color:white;font-weight: 100; font-size: 1.2em">
        </div>
    </div>
    <div class="row justify-content-end " style="padding-left: 5%;padding-top: 1%;padding-right: 8%">
        {{--  <div class="col-md-2"></div>  --}}
        {{--  <div class="col-md-8"></div>  --}}
        <div class="col-md-2 align-self-end shadow form-search rounded"  style="background-color: #FFBB02;padding-left: 1%;">
            <button class="btn" data-toggle="modal" data-target="#forum" style="width: 100%; font-weight: 100;font-family: segouil; color: white;font-size: 1.2em;text-transform: none;padding :0px;">Créer un sujet</button>
        </div>
    </div>
    <div class="row" style="padding-top: 2%;padding-left :4% ; padding-right: 7%; padding-bottom: 2%">
        @foreach ($forums as $forum )
        <div class="col-md-6" style="margin-bottom: 2%">
            <div class="forum-list shadow">
                <a href="{{route('forum.show',[$forum->id])}}" class="row">
                    {{-- <div class="col-md-1" style="padding: 0px;">
                        <img width="50" height="50" class="round" @if($forum->user) avatar="{{$forum->user->name}}" @elseif($forum->annonceur) avatar="{{$forum->annonceur->name}}" @endif>
                    </div> --}}
                    <div class="col-md-11">
                        <p style="font-weight: 100; font-family: segouil;font-size: 1.4em;margin-bottom: 0px" >{{$forum->titre}}</p>
                        <p style="font-weight: 100; font-family: segouil">{{substr($forum->content,0,100)}} ...</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        <div class="page-pagination"  style="border: 0px">
            <ul class="pagination justify-content-center" style="border: 0px">
                {{$forums->links()}}
            </ul>
        </div>
    </div>
    <!--Pagination Start-->

    <div class="modal fade" id="forum" tabindex="-1" role="dialog" aria-labelledby="forum" aria-hidden="true">
        <div class="modal-dialog " style="max-width: 40%;" role="document">
            <div class="modal-content">
                <form action="{{route('forum.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="forum" style="font-family: segouil; font-weight: 100">Envoyer une Message</h5>
                    </div>
                    <div class="modal-body" style="padding: 5px">
                        <input type="text" name="titre" id="titre" placeholder="Objet du sujet" required>
                        <textarea name="content" id="content" placeholder="Votre sujet" cols="30" rows="10" style="margin-top: 2%; width: 100%; height: 200px;font-family: segouil; font-weight: 100;" minlength="50" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style=" font-family: segouil; font-weight: 100; background-color: #E70001; border: 0px;" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" style=" font-family: segouil; font-weight: 100; background-color: #00a1f1; border: 0px;">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
