<div>
    <link rel="stylesheet" href="{{ asset("assets/css/range-price.css") }}">
    <style>
        .title{
           background-color: #00a1f1;
           border-radius: 48px;
        }
        .title-deposer{
           background-color: #00a1f1;
           font-family: Rubik;
           padding: 2%;
           color: white !important;
           border-radius: 50px;
           font-weight: 100!important;
           font-size: 0.9em !important
        }
        .form-search{
            /*border-radius: 20px*/
        }
        .shadow{
           box-shadow: 10px 5px 5px black;
        }

        .inputtext{

           background-color: #ebebeb !important;
        }
        .option-buttion-label{
            padding-top:0.45rem !important;
            font-size: 1.2em;
            font-weight: 500 !important
        }
       .form-check-input{
           margin-top: 0.45em;

       }
        .select-category{
           background-color: #ebebeb !important;
           width: 100% !important;
           height: 40px;
           padding-top: 8px !important;
           background: url('http://localhost:8000/assets/icon/list.svg') no-repeat left;
        }
        .select-region{
           background-color: #ebebeb !important;
           width: 100% !important;
           height: 40px;
           padding-top: 8px !important;
           background: url('http://localhost:8000/assets/icon/map-pin.svg') no-repeat left;
        }


    </style>
    <style>
        input[type=number] {
            -moz-appearance: textfield;
          }
          input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
          }
        .banner_result_count{
            font-family: segouil !important;
            font-weight: 100 !important;
            font-size: 0.9em;
            color: white;
            background-color:  #82bd01;
            padding-left: 8px;
            padding-right: 8px;
            border-radius: 30px;
            width: 100%;
            text-align: center;
            display: inline-block;

        }

        .btn_valide_subactegory{
            font-size: 0.6em;
            font-weight: 100;
            padding-left: 10px;
            padding-right: 10px;
            line-height: 2px;
            max-height: 30px;
            margin-bottom: 10px;
            margin-left: 10px;
            background-color: #FFBB02;
            border: none;
        }
    </style>
    <script >
        $(document).on("click",function (event){
            var $trigger = $(".dropdown-custom-menu");
         //   $trigger.data('click')
            var value_clicked = false;
            if($(event.target).parent().hasClass("dropdown-custom-menu")){
                value_clicked = true ;
            }
            if($(event.target).parent().parent().parent().hasClass("dropdown-custom-menu")){
                value_clicked = true ;
            }
            if($(event.target).parent().parent().hasClass("dropdown-custom-menu")){
                value_clicked = true ;
            }
            if($trigger.hasClass("show") && value_clicked == false){
                console.log($trigger.hasClass("show"));
                $trigger.removeClass("show");
            }
        })
    </script>
    <div class="row justify-content-center" style="padding-top: 2%">
        <div class="col-md-10 col-sm-8 col-lg-8 shadow"  style="background-color: white; padding :2%">
            <div class="row" style="margin-bottom: 2%">
                <div class="col-md-3">
                    <div class="form-check inputtext" style="padding: 2%">
                        <input class="form-check-input" style="margin-left:0px;" type="radio" wire:click="select_type_annonce(1)" checked name="type_annonce" value="1" id="offre">
                        <label class="form-check-label" style="margin-left: 2rem" for="offre">
                          <p class="option-buttion-label">Offres</p>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check inputtext" style="padding: 2%">
                        <input class="form-check-input" style="margin-left:0px;" type="radio" wire:click="select_type_annonce(2)" name="type_annonce" value="2" id="demande">
                        <label class="form-check-label" style="margin-left: 2rem" for="demande">
                          <p class="option-buttion-label">Demandes</p>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputtext" >
                        <div class="row">
                            <div class="col-1 text-center">
                                <div style="background-color: transparent;color:black; width: 30px;height: 30px;border-radius: 50px;margin-top: 4px">
                                    <i  class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <input type="text" style="background-color: transparent; border:none" placeholder="Recherche" wire:model="search_query" name="search" id="search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 2%">
                <div class="col-md-4">
                    <div style="padding: 0px;padding-right: 2px">
                        <select class="select-category" wire:model="category_query" name="category" id="category">
                            <option value="0"> &nbsp;&nbsp;&nbsp;Toutes catégorie</option>
                            @foreach ($categories as $categorie)
                                <option value="{{$categorie->id}}"> &nbsp;&nbsp;&nbsp;{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="padding: 0px;padding-right: 2px">
                        <select class="select-region" name="region"  wire:model="region_query" id="region" wire:model="region_query">
                            <option value="0">&nbsp;&nbsp;&nbsp; Toutes Régions</option>
                            @foreach (App\Models\region::all() as $region)
                                <option value="{{$region->id}}"> &nbsp;&nbsp;&nbsp;{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 shadow" style="border-radius: 1%!important" >
                    <div class="wrapper" style="padding: 0px;">
                        <div class="container-range">
                            <div class="slider-track"></div>
                            <input type="range" style="border: none !important" min="0" max="10000000" wire:model.defer="prix_min_query" value="0" id="slider-min" oninput="slideMin()">
                            <input type="range" style="border: none !important" min="0" max="10000000" wire:model.defer="prix_max_query" value="10000000" id="slider-max" oninput="slideMax()">
                            <span style="left: 0">
                                Min
                            </span>
                            <span style="right: 0;position: absolute;">
                                Max
                            </span>
                        </div>
                        <div style="width: 100% !important;position: relative;font-weight: 200;margin-top: -2em;font-size: 0.9em">
                            <span id="range-min" style="left: 0">
                                0
                            </span>
                            <span id="range-max" style="right: 0;position: absolute;">
                                10 000 000 et +
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-2" style="background-color: #00a1f1; position: absolute; margin-top: 1.2%">
                    <button wire:click="search" class="title-deposer" style="background-color: transparent;border: none; color:white;padding :4px; font-size: 1.2em"> Rechercher ({{ $annonces->count() }} résultats)</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .list-annonce .annonce:hover{
            color:black;
            box-shadow: 4px 3px #00a1f1a2 !important
        }
        .button-favoris:hover{
            color:red;
        }
        @media only screen and (max-width: 768px) {
            .mobil-padding{
                padding-left: 6%;
                padding-bottom: 2%
            }
        }
    </style>

    <div class="row justify-content-center" style="padding-top: 2%">
        <div class="col-md-10 col-sm-8 col-lg-8 ">
            <div class="row" style="" >
                <div class="col-md-2" style="padding: 0px !important;margin-top:1%">
                    <div class="shadow" style="background-color: white;padding: 2%;">
                        <h3 style="font-weight: 100;font-family: segouil;font-size: 1em;border-bottom: 1px solid rgba(0, 0, 0, 0.274)">Dernières Annonces</h3>
                        @foreach ($last_annonces as $last_annonce )
                            <a class="row" href="{{route('annonce.show',[$last_annonce->id])}}" style="min-height: 5em">
                                <div class="col-md-5">
                                    <div style="text-align: center;width: 100%;margin-bottom: 1%">
                                        <img  src="{{route('file.open',[$last_annonce->image->first()->image->folder,$last_annonce->image->first()->image->url])}}" style="max-height: 5em !important;max-width: 90%; align-content: center" alt="" srcset="">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <p style="font-size: 0.7em">{{ $last_annonce->titre }}</p>
                                    <p style="font-size: 0.7em;font-weight: bold">{{ number_format($last_annonce->prix, 0,',',' ') }} Ar</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="shadow" style="background-color: white;padding: 2%;margin-top: 10%;margin-bottom: 10%">
                        <h3 style="font-weight: 100;font-family: segouil;font-size: 1em;border-bottom: 1px solid rgba(0, 0, 0, 0.274)">Top Annonces</h3>
                        @foreach ($top_annonces as $top_annonce )
                            <a class="row" href="{{route('annonce.show',[$top_annonce->id])}}" style="min-height: 5em">
                                <div class="col-md-5">
                                    <div style="text-align: center;width: 100%;margin-bottom: 1%">
                                        <img  src="{{route('file.open',[App\Models\annonce::findOrfail($top_annonce->id)->image->first()->image->folder,App\Models\annonce::findOrfail($top_annonce->id)->image->first()->image->url])}}" style="max-height: 5em !important;max-width: 90%; align-content: center" alt="" srcset="">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <p style="font-size: 0.7em">{{ $top_annonce->titre }}</p>
                                    <p style="font-size: 0.7em;font-weight: bold">{{ number_format($top_annonce->prix, 0,',',' ') }} Ar</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7">
                    @foreach ( $annonces as $annonce )
                        <div class="shadow annonce form-search" style="background-color: white;margin-top:2%;padding-left: 0px;padding-right: 0px;">
                            <div class="row" style="padding-left: 2%">
                                <div class="col-md-3" style="padding-left: 2%;padding-right: 0px;position: relative">
                                    @if($annonce->payant == 1)
                                    <span style="top:0;left: 0; background-color: #E70001 ;color:white;position: absolute; font-family: segouil;font-size: 0.8em;padding-left:5%;padding-right:5%">Annonce PRO</span>
                                    @endif
                                    <img style="min-height: 125px; max-height: 125px;border-radius: 20px 0px 0px 20px;margin-left: 2%" src="{{route('file.open',[$annonce->image->first()->image->folder,$annonce->image->first()->image->url])}}" alt="">
                                </div>
                                <div class="col-md-9" style="position: relative;padding-top: 2%;padding-bottom: 2%;padding-right: 2%" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="mobil-padding" href="{{route('annonce.show',[$annonce->id])}}">
                                                <h3 style="font-family: segouil;font-weight: bold; margin-bottom: 0px;font-size: 1em;color:#00a1f1">{{ $annonce->titre }} </h3>
                                               <span style="font-weight: 100;font-family: segouil;font-size: 0.8em"> {{ substr($annonce->description,0,150)  }}</span>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 style="font-family: segouil;font-weight: 100; margin-bottom: 0px;font-size: 1.1em;">{{ number_format($annonce->prix, 0,',',' ') }} Ar</h3>
                                                {{--  <div class=""  style="background-color: #FFBB02;border-radius: 20px;">  --}}
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8" style="margin-top: 1em">
                                                        <a class="btn btn-warning" style="text-align: center;width: 100%;height: 100%;border-radius: 20px;line-height: 2em; ;font-weight: 100;font-family: segouil; color: white;font-size: 1em;text-transform: none;padding :0px;">Voir détails</a>
                                                    </div>
                                                </div>
                                                {{--  </div>  --}}
                                                <div class="row mobil-padding" style="margin-top: 1em" >
                                                    <div class="col-md-4 col-4">
                                                        @if (Auth::check())
                                                            @if(App\Models\favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$annonce->id)->count() > 0)
                                                                <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-size: 100;color:color:rgba(0, 0, 0, 0.589);font-size: 0.8em" wire:click="delete_favoris({{ $annonce->id }})"><i style="color:#E70001;font-size: 1.2em" class="fa fa-heart"></i> &nbsp Favoris </button>
                                                            @else
                                                                <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;padding-top: 2px; font-family: segouil;font-size: 100;color:color:rgba(0, 0, 0, 0.589);font-size: 0.8em" wire:click="add_favoris({{ $annonce->id }})"><i class="icon-heart" style="font-size: 1.2em" style=""></i>&nbsp Favoris</button>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4 col-4" >
                                                        <button class="button-favoris" type="button" id="shareButtonAnnonce{{ $annonce->id }}" data-toggle="dropdown" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:rgba(0, 0, 0, 0.589);font-size: 0.8em">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                                                            Partager
                                                        </button>
                                                        <div class="dropdown-menu social-buttons" aria-labelledby="shareButtonAnnonce{{ $annonce->id }}">
                                                            <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('annonce.show',[$annonce->id])) }}" style="color:#3b5998 "> <i class="fa fa-facebook-official"></i> Facebook</a>
                                                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('annonce.show',[$annonce->id])) }}" style="color:#00a1f1"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-4">
                                                        <button style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:rgba(0, 0, 0, 0.589);font-size: 0.8em" data-Id="{{ $annonce->id }}" data-toggle="modal" data-target="#signalement">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                            </svg>
                                                            Signaler
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="page-pagination d-flex flex-row-reverse shadow" style="border: 0px;background-color: white;margin-bottom: 2%;margin-top: 2%">
                        <ul class="pagination" style="border: 0px;padding-right: 5%">
                            {{$annonces->links()}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-3" style="padding:0px">
                    @foreach ($annonces_payantes as $annonces_payante)
                        <div class="shadow "  style="background-color: white;margin-top:5%;padding:2%;width: 100%;padding-right: 10%;">
                            <div class="row">
                                <div class="col-md-6" style="position: relative">
                                    <span style="top:0;left: 0; background-color: #E70001 ;color:white;position: absolute; font-family: segouil;font-size: 0.8em;padding-left:5%;padding-right:5%">Annonce PRO</span>
                                    <img style="border-radius: 20px 0px 0px 20px; margin-top: 2em" src="{{route('file.open',[$annonces_payante->image->first()->image->folder,$annonces_payante->image->first()->image->url])}}" alt="">
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('annonce.show',[$annonces_payante->id])}}" style="font-weight: bold;font-family: segouil;margin-bottom: 0px;font-size: 0.8em;color:#00a1f1;margin-bottom: 2em">{{ $annonces_payante->titre }}</a>
                                    <p  style="font-weight: 100;font-family: segouil;">{{ number_format($annonces_payante->prix, 0,',',' ') }} Ar</p>
                                    <div class="row" style="margin-top: -1em;border-top: 1px solid rgba(0, 0, 0, 0.205)">
                                        <div class="col-md-4 col-4">
                                            @if (Auth::check())
                                                @if(App\Models\favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$annonces_payante->id)->count() > 0)
                                                    <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-size: 100;color:rgba(0, 0, 0, 0.589)" wire:click="delete_favoris({{ $annonces_payante->id }})"><i style="color:#E70001;font-size: 1.2em" class="fa fa-heart"></i></button>
                                                @else
                                                    <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;padding-top: 2px; font-family: segouil;font-size: 100;color:rgba(0, 0, 0, 0.589)" wire:click="add_favoris({{ $annonces_payante->id }})"><i class="icon-heart" style="font-size: 1.2em" style=""></i></button>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <button class="button-favoris" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:rgba(0, 0, 0, 0.589)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                                            </button>
                                            <div class="dropdown-menu social-buttons" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('annonce.show',[$annonces_payante->id])) }}" style="color:#3b5998 "> <i class="fa fa-facebook-official"></i> Facebook</a>
                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('annonce.show',[$annonces_payante->id])) }}" style="color:#00a1f1"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <button style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:rgba(0, 0, 0, 0.589)" data-Id="{{ $annonces_payante->id }} " data-toggle="modal" data-target="#signalement">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
        </div>

    </div>

    <div class="modal fade" id="signalement" tabindex="-1" role="dialog" aria-labelledby="signalement" aria-hidden="true">
        <div class="modal-dialog " style="max-width: 40%;" role="document">
            <div class="modal-content">
                <form action="{{route('annonce.signaler')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="message" style="font-family: segouil; font-weight: 100">Raison de votre signalement</h5>
                    </div>
                    <input type="hidden" name="annonce_id" id="annonce_id" value="">
                    <div class="modal-body" style="padding: 5px">
                        <textarea name="message" id="message" minlength="10" cols="30" rows="10" style="width: 100%; height: 200px;font-family: segouil; font-weight: 100;" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style=" font-family: segouil; font-weight: 100; background-color: #E70001; border: 0px;" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" style=" font-family: segouil; font-weight: 100; background-color: #00a1f1; border: 0px;">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function addValueCheckBox(id,subcategory_id_btn){
            $target_btn = $('#btn-span-'+subcategory_id_btn);
            $target_list = $('#'+subcategory_id_btn+"-list");
            $target_btn.text("");
            i = 0;
            j = 0;
            text_of_btn = "";
            $target_list.children().each(function($item){

                if($(this).children()[0].checked == true){
                    if(i<3){
                        text_of_btn += $(this).children()[0].value +","
                        i++
                    }else{
                        j++
                    }
            //        @this.set('sub_query_temp.'+subcategory_id_btn, text_of_btn);
                }

                console.log($(this).children()[0].checked)
            })

            if(text_of_btn == ""){
                $target_btn.text($target_btn.data("name"));
            }else{
                if(j == 0){
                    $target_btn.text(text_of_btn.slice(0,-1));
                }else{
                    $target_btn.text(text_of_btn.slice(0,-1) + "+"+j);
                }

            }
            console.log(text_of_btn)
        }
    </script>
    <script>
        function btn_valider_subcategory(id){
            $target_btn = $('#btn-span-'+id);
            $target_max = $('#'+id+'-max');
            $target_min = $('#'+id+'-min');
            var text_value ="";
            if($target_min.val() !="" && $target_max.val()!=""){
                if($target_min.val()>$target_max.val()){
                    alert("Valeur minimum doit inférieur à valeur Maximum")
                }else{
                    text_value =$target_min.val() +"-" + $target_max.val();
                    $target_btn.text($target_min.val() +"-" + $target_max.val())
                    $('#'+"dropdown-"+id).removeClass('show');
                }
            }else{
                if($target_min.val()!=""){
                    $target_btn.text("> à " + $target_min.val());
                    text_value =$target_min.val()+"-";
                    $('#'+"dropdown-"+id).removeClass('show');
                }else{
                    if($target_max.val()!=""){
                        text_value ="-" + $target_max.val();
                        $target_btn.text("< à " + $target_max.val());
                        $('#'+"dropdown-"+id).removeClass('show');
                    }else{
                        $target_btn.text($target_btn.data("name"));
                        $('#'+"dropdown-"+id).removeClass('show');
                    }
                }

            }
         //   @this.set('sub_query_temp.'+id, text_value);
        }
    </script>
    <script>
        function showDropdown(id){
            name = "dropdown-"+id;
            if($('#'+name).hasClass('show')){
                $('#'+name).removeClass('show');
            }else{
                $('#'+name).addClass('show');
            }
            window.event.cancelBubble = true
        }
    </script>
    <script>
        $('#signalement').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var id = button.attr('data-Id');

            var modal = $(this);

            modal.find('#annonce_id').val(id);
        });
    </script>
    <script>
        var popupSize = {
            width: 780,
            height: 550
        };
        $(document).on('click', '.social-buttons > a', function(e){

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
    <script src="{{ asset("assets/js/range-price.js") }}"></script>
</div>
