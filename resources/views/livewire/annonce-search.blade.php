<div>
    <style>
        .badge_search{
            margin-top: 10px;
            font-size: 0.8em;
            margin-right: 5px;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            background-color: #E70001;
            cursor: pointer;
            border-radius: 20px;
            color: white;
            text-align: center;
            font-weight: 300;
            width: max-content;
            min-width: 50px;
        }
        .badge_search:hover{
            background-color: #82bd01;
        }
        .dropdown-menu{
            padding-right: 10px;
            padding-left: 10px;
        }
        .btn_valider{
            margin-top: 10px;
            font-weight: 100;
            background-color: #00a1f1;
            color: white;
            box-shadow: none;
            border: none;
        }
    </style>
    <style>
        .dropdown-custom-menu{
            background-color: white;
            margin-top: 4%;
            position: absolute;
            display: none;
            z-index: 99;
            max-height: 150px;
            overflow: auto;
            max-width: max-content;
            box-shadow: 2px 2px 2px rgba(0, 161, 241, 0.719)
        }
        .dropdown-custom-menu::-webkit-scrollbar {
            width: 3px;
        }
        .dropdown-custom-menu::-webkit-scrollbar-track {
            background: white;
          }
          .dropdown-custom-menu::-webkit-scrollbar-thumb {
            background: #82bd01;
          }
        .show {
            display: block !important;
        }
    </style>
    <style>
        .banner_result_count{
            font-family: segouil !important;
            font-weight: bold !important;
            font-size: 0.9em;
            color: #E70001;
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
    {{--  @dump($sub_query_temp)  --}}
    <div class="row justify-content-center" style="padding-top: 2%;margin-bottom: 2%">
        <div class="shadow col-md-10 col-lg-6 col-10 form-search"  style="background-color: white;padding-left: 2%;padding-top: 1%;;padding-bottom: 0.2%">
            <div class="row">
                <div class="col-lg-2 col-md-2" >
                    <div class="form-check" >
                        <input class="form-check-input" style="width: 0.8em;height: 0.8em;" type="radio" checked name="type_annonce" id="offre"  value="1" wire:click="select_type_annonce(1)">
                        <label class="form-check-label" for="offre">
                          <p class="option-buttion-label" style="font-size: 1.2em">Offres</p>
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check" >
                        <input class="form-check-input" style="width: 0.8em;height: 0.8em;" type="radio" name="type_annonce" id="demande"  value="2" wire:click="select_type_annonce(2)">
                        <label class="form-check-label" for="demande">
                          <p class="option-buttion-label" style="font-size: 1.2em">Demandes</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 3%">
                <div class="col-md-3">
                    <div style="padding: 0px;padding-right: 2px;">
                        <select class="select-left" name="category" id="category" wire:model="category_query">
                            <option value="0"> &nbsp;&nbsp;&nbsp;Toutes Catégorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{$categorie->id}}"> &nbsp;&nbsp;&nbsp;{{$categorie->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inputtext">
                        <div class="row">
                            <div class="text-center col-2">
                                <div style="background-color: white;color:#4286f5; width: 30px;height: 30px;border-radius: 50px;margin-top: 4px">
                                    <i  class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="col-9">
                                <input type="text" style="background-color: transparent; border:none" placeholder="Recherche" wire:model.defer="search_query" name="search" id="search">
                                <script type="text/javascript">
                                    var route = "{{ route('api.autocompleteSearch') }}";

                                    $('#search').typeahead({
                                        source: function (query, process) {
                                            return $.get(route, {
                                                term: query
                                            }, function (data) {
                                                console.log(data);
                                                return process(data);
                                            });
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="padding: 0px;padding-right: 2px">
                        <select class="select-left" name="region" id="region" wire:model="region_query">
                            <option value="0">&nbsp;&nbsp;&nbsp; Toutes Régions</option>
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}"> &nbsp;&nbsp;&nbsp;{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row" >
                        @if($category_query != 0)
                            <span class="badge_search  dropdown-toggle" id="dropdown-prix" data-toggle="dropdown">Prix</span>
                            <div class="dropdown-menu" aria-labelledby="dropdown-prix" style="width: max-content">
                                <div class="row justify-content-between" style="padding-right: 10px;padding-left:10px" >
                                    <div class="col-md-6">
                                        <input type="text" name="prix_min"   id="prix_min"  wire:model.defer="prix_min" value="2" placeholder="Prix minimum">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="prix_max"  wire:model.defer ="prix_max" value="3" placeholder="Prix maximum">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn_valider" wire:click="clear_prix"  style="background-color: #E70001 !important" >Effacer</button>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn_valider" > Valider </button>
                                    </div>
                                </div>
                            </div>

                            @foreach (App\Models\sub_category::where("category_id",$category_query)->get() as $sub_category )
                                <span class="badge_search dropdown-toggle" data-name="{{$sub_category->name}}" id="btn-span-{{$sub_category->id}}"  onclick="showDropdown({{ $sub_category->id }})">{{ $sub_category->libelle }}</span>
                                @if($sub_category->sub_category_list->count() > 0)
                                    <div class="dropdown-custom-menu"  id="dropdown-{{ $sub_category->id }}"  >
                                        <input type="text" id="{{ $sub_category->name }}"  name="{{ $sub_category->name }}"   placeholder="Recherche une valeur">
                                        <div class="dropdown-list" id="{{ $sub_category->id }}-list">
                                            @foreach ($sub_category->sub_category_list as $list)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" onclick="addValueCheckBox({{ $list->id }},{{ $sub_category->id }})" value="{{ $list->value }}"   id="check-{{ $list->id }}">
                                                    <label class="form-check-label" style="line-height: 2;" for="check-{{ $list->id }}">
                                                        {{ $list->value }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="drop">

                                        </div>
                                    </div>
                                @endif


                                <script>

                                    $('#{{ $sub_category->name }}').keyup(function() {

                                        var value = $('#{{ $sub_category->name }}').val();
                                        console.log(value.length);
                                        $.ajax({
                                            url: '{{ url("/") }}/api/subcategory_list/search/value',
                                            type: 'POST',
                                            data:{query:value,_token: "{{ csrf_token() }}"},
                                            success: function(data) {
                                                console.log(data)
                                                var $container = $('#{{ $sub_category->id }}-list');
                                                if(data.length >  0 ){

                                                    $container.empty();
                                                    var input = "";
                                                    data.forEach(function(item){
                                                        input = '<div class="form-check">'
                                                            + '<input class="form-check-input" type="checkbox" value="'+ item.id +'" id="check-'+ item.id +'">'
                                                            +'<label class="form-check-label" style="line-height: 2;" for="check-'+ item.id +'">'
                                                            + item.name
                                                            +'</label>'
                                                            +'</div>';
                                                         $container.append(input);
                                                    });
                                                }
                                            }
                                        });


                                     });
                                </script>
                            @endforeach

                        @endif
                    </div>
                </div>
            </div>

            <div class="text-center row justify-content-center">
                <div class="col-md-2 col-6" style="background-color: #00a1f1;border-radius: 50px; position: absolute; margin-top: -1%">
                    <button class="title-deposer" wire:click="search" style="background-color: transparent;border: none; color:white;padding :4px; font-size: 0.9em"> Rechercher ({{ $annonces->count() }} résultats)</button>
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
    <div class="row justify-content-center ">
        <div class="col-md-10 col-lg-6 col-10">
            <div class="row " >
                <div class="col-md-3 banner_result_count">
                    Annonces : {{ $annonces->count() }}
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" id="particulier" type="checkbox">
                        <label class="form-check-label banner_result_count" style="line-height: 1.6;" for="particulier">
                            Particuliers : {{ $annonces->count() }}
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" id="professionnel" type="checkbox">
                        <label class="form-check-label banner_result_count" style="line-height: 1.6;" for="professionnel">
                            Professionnels : {{ $annonces->count() }}
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-center list-annonce" style="margin-bottom: 2%">
        <div class="col-md-10 col-lg-10 col-10">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    @foreach ( $annonces as $annonce )
                        <div class="shadow annonce form-search" style="background-color: white;margin-top:2%;padding-left: 0px;padding-right: 0px;">
                            <div class="row">
                                <div class="col-md-3" style="padding-left: 2%;padding-right: 0px;">
                                    <img style="min-height: 125px; max-height: 125px;border-radius: 20px 0px 0px 20px;margin-left: 2%" src="{{route('file.open',[$annonce->image->first()->image->folder,$annonce->image->first()->image->url])}}" alt="">
                                </div>
                                <div class="col-md-9" style="position: relative;" >
                                    <a class="mobil-padding" href="{{route('annonce.show',[$annonce->id])}}">
                                        <h3 style="font-family: segouil;font-weight: bold; margin-bottom: 0px;font-size: 1em">{{ $annonce->titre }} </h3>
                                        <span style="color:#00a1f1;font-weight: bold;font-size: 0.8em">Ar {{ $annonce->prix  }}</span> <br>
                                        <span style="font-weight: 100;font-family: segouil;font-size: 0.8em"> {{ substr($annonce->description,0,150)  }}</span>
                                    </a>
                                    <div class="row mobil-padding" >
                                        <div class="col-md-4 col-4">
                                            @if (Auth::check())
                                                @if(App\Models\favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$annonce->id)->count() > 0)
                                                    <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-size: 100;color:#00a1f1;font-size: 0.8em" wire:click="delete_favoris({{ $annonce->id }})"><i style="color:#E70001;font-size: 1.2em" class="fa fa-heart"></i> &nbsp Favoris </button>
                                                @else
                                                    <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;padding-top: 2px; font-family: segouil;font-size: 100;color:#00a1f1;font-size: 0.8em" wire:click="add_favoris({{ $annonce->id }})"><i class="icon-heart" style="font-size: 1.2em" style=""></i>&nbsp Favoris</button>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <button class="button-favoris" type="button" id="shareButtonAnnonce{{ $annonce->id }}" data-toggle="dropdown" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:#00a1f1;font-size: 0.8em">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                                                Partager
                                            </button>
                                            <div class="dropdown-menu social-buttons" aria-labelledby="shareButtonAnnonce{{ $annonce->id }}">
                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('annonce.show',[$annonce->id])) }}" style="color:#3b5998 "> <i class="fa fa-facebook-official"></i> Facebook</a>
                                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('annonce.show',[$annonce->id])) }}" style="color:#00a1f1"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <button style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:#00a1f1;font-size: 0.8em" data-Id="{{ $annonce->id }}" data-toggle="modal" data-target="#signalement">
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
                    @endforeach
                </div>
                <div class="col-md-2">
                    @foreach ($annonces_payantes as $annonces_payante)
                        <div class="text-center shadow annonce form-search"  style="background-color: white;margin-top:5%;padding:2%;padding-left: 4%;width: 90%;">
                            <a href="{{route('annonce.show',[$annonces_payante->id])}}">
                                <p style="font-weight: 100;font-family: segouil;margin-bottom: 0px;">{{ $annonces_payante->titre }}</p>
                                <p  style="font-weight: bold;font-family: segouil;color:#00a1f1">{{ $annonces_payante->prix }}</p>
                                <div>
                                    <img style="min-height: 100px; max-height: 100px;border-radius: 20px 0px 0px 20px" src="{{route('file.open',[$annonces_payante->image->first()->image->folder,$annonces_payante->image->first()->image->url])}}" alt="">
                                </div>
                            </a>
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    @if (Auth::check())
                                        @if(App\Models\favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$annonces_payante->id)->count() > 0)
                                            <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-size: 100;color:#00a1f1" wire:click="delete_favoris({{ $annonces_payante->id }})"><i style="color:#E70001;font-size: 1.2em" class="fa fa-heart"></i></button>
                                        @else
                                            <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none;padding-top: 2px; font-family: segouil;font-size: 100;color:#00a1f1" wire:click="add_favoris({{ $annonces_payante->id }})"><i class="icon-heart" style="font-size: 1.2em" style=""></i></button>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-4 col-4">
                                    <button class="button-favoris" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:#00a1f1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                                    </button>
                                    <div class="dropdown-menu social-buttons" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('annonce.show',[$annonces_payante->id])) }}" style="color:#3b5998 "> <i class="fa fa-facebook-official"></i> Facebook</a>
                                        <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('annonce.show',[$annonces_payante->id])) }}" style="color:#00a1f1"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4">
                                    <button style="background-color: transparent;border:none; box-shadow: none;font-family: segouil;font-weight: 100;color:#00a1f1" data-Id="{{ $annonces_payante->id }} " data-toggle="modal" data-target="#signalement">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="page-pagination" style="border: 0px">
            <ul class="pagination justify-content-center" style="border: 0px">
                {{$annonces->links()}}
            </ul>
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
/*
            name_check_box = "check-"+id;
            $target_checkbox = $('#'+name_check_box);
            $target_btn = $('#btn-span-'+subcategory_id_btn);
            txt_btn = $target_btn.text();
            if($target_checkbox.checked=true){

                val = $target_checkbox.val();

                txt_btn += val;

            }else{
                val = $target_checkbox.val();
                console.log(ato)
                list_selected = list_selected.filter(function(ele){return ele != val})
            }
            $target_btn.text(txt_btn);*/
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

</div>
