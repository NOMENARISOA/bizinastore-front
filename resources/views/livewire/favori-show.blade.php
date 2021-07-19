<div>
    <div class="row" style="padding-top: 2%;padding-left: 5%">
        <div class="shadow col-md-2 form-search"  style="background-color: #00A1F1;border-radius: 20px;">
            <h3 class="text-center" style="font-family: segouil; font-weight: 100;color:white" >Mes Favoris</h3>
        </div>
    </div>
    <div class="row justify-content-center list-annonce" style="margin-bottom: 2%">
        <div class="col-md-10 col-lg-6">
            @foreach ( $annonces as $annonce )
                <div class="shadow annonce form-search" href="" style="background-color: white;margin-top:2%;padding-left: 0px;padding-right: 0px;">
                    <div class="row">
                        <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
                            <img style="min-height: 150px; max-height: 150px;border-radius: 20px 0px 0px 20px" src="{{route('file.open',[$annonce->image->first()->image->folder,$annonce->image->first()->image->url])}}" alt="">
                        </div>
                        <div class="col-md-9" style="position: relative">
                            <a href="{{route('annonce.show',[$annonce->id])}}">
                                <h3 style="font-family: segouil;font-weight: bold; margin-bottom: 0px;">{{ $annonce->titre }} </h3>
                                <span style="color:#00a1f1;font-weight: bold">Ar {{ $annonce->prix  }}</span> <br>
                                <span style="font-weight: 100;font-family: segouil">Ar {{ substr($annonce->description,0,150)  }}</span>
                            </a>
                            <div style="position:absolute;top:0 ;right:0;margin-right: 4%;font-size: 2em">
                                @if (Auth::check())
                                    @if(App\Models\favoris::where('user_id','=',Auth::user()->id)->where('annonce_id','=',$annonce->id)->count() > 0)
                                        <button class="button-favoris" style="background-color: transparent;border:none; box-shadow: none" wire:click="delete_favoris({{ $annonce->id }})"><i style="color:#E70001" class="fa fa-heart"></i></button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="page-pagination" style="border: 0px">
            <ul class="pagination justify-content-center" style="border: 0px">
                {{$annonces->links()}}
            </ul>
        </div>
    </div>
    <!--Pagination Start-->

</div>
