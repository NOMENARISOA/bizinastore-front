@extends('layouts.template')

@section('content')
<style>
    .zoomWrapper img{
        max-width: 100% !important;
        max-height: 80% !important;
    }
</style>
 <!--Shop Single Start-->
 <div class="shop-single-page section-padding-4" style="padding-bottom: 4%">

    <div class="container" >
        <!--Shop Single Start-->
        <span style="color: #00A1F1;font-weight: bold">{{ $annonce->region->name }} > {{ $annonce->categorie->name }} > {{ $annonce->titre }} </span>

        <div class="row justify-content-center" style="background-color: #FFF">

            <div class="col-lg-6 col-md-8">
                <div class="shop-image" style="margin-top: 20px !important; width: 100%; height: 60%; margin-bottom: 30px">
                    <div class="shop-single-preview-image" style="width: 100%; height: 350px;">
                        <img class="product-zoom" src="{{route('file.open',[$annonce->image->first()->image->folder,$annonce->image->first()->image->url])}}" alt="">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div id="gallery_01" class="shop-single-thumb-image shop-thumb-active swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($annonce->image as $image )
                                        <div class="swiper-slide single-product-thumb" style="max-width: 100px; height: 100px; margin: 0px">
                                            <a href="#" style="width: 100%; height: 100%;border: 1px solid rgba(0, 0, 0, 0.123)" data-image="{{route('file.open',[$image->image->folder,$image->image->url])}}">
                                                <img style="width: 100%; height: 100%;" src="{{route('file.open',[$image->image->folder,$image->image->url])}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shop-single-content" style="margin-top: 20px">
                            <p style="font-family: segouil;font-weight: 100;font-size: 0.8em">{{ $annonce->categorie->name }}</p>
                            <h5 class="title" style="font-weight: bold;font-family: segouil">{{$annonce->titre}}</h5>

                            <p class="title" style="font-weight: 100;font-family: segouil; color:#FFBB02; text-transform: none; font-size: 1.3em; border-top: 1px solid rgba(0, 0, 0, 0.322);padding-top: 0.3em; ">Description du produit</p>
                            <p style="font-family: segouil;">{{$annonce->description}}</p>

                            @if($annonce->sub_category_value->count() > 0)
                                <ul>
                                    <div class="row">
                                            @foreach ($annonce->sub_category_value  as $sub_category_value )
                                            <div class="col-md-6">
                                                @if($sub_category_value->sub_category->sub_category_list->count() > 0)
                                                    <li>
                                                        <span style="font-weight: 100;font-family: segouil;text-decoration: underline; white-space: normal">{{ $sub_category_value->sub_category->libelle }} :</span>
                                                        <span style="font-weight: ;font-family: segouil">
                                                          &nbsp;  {{ $sub_category_value->sub_category->sub_category_list->where("id","=",$sub_category_value->value)->first()->value }}
                                                        </span>
                                                    </li>
                                                @else
                                                <li>
                                                    <span style="font-weight: 100;font-family: segouil; text-decoration: underline; white-space: normal">{{ $sub_category_value->sub_category->libelle }} :</span>
                                                    <span style="font-weight: 200;font-family: segouil">
                                                        &nbsp;  {{ $sub_category_value->value }}
                                                    </span>
                                                </li>
                                                @endif
                                            </div>
                                        @endforeach

                                    </div>
                                </ul>
                            @endif
                            <h2 class="title" style="font-weight: 100;font-family: segouil; color:black; margin-top:3%;font-size: 2em">Prix : {{ number_format($annonce->prix, 0,',',' ') }}  Ar</h2>
                            <div style="border-top: 1px solid rgba(0, 0, 0, 0.322);border-bottom: 1px solid rgba(0, 0, 0, 0.322); padding-bottom: 10px; padding-top: 10px;margin-bottom: 20px">
                                <span  style=" font-weight: 100;font-family: segouil; text-decoration: underline; white-space: normal">Vendue par :</span><span style="color: black; font-weight: 100; font-size: 0.8em"> &nbsp; {{$annonce->user->name}}</span> <br>
                                <span  style=" font-weight: 100;font-family: segouil; text-decoration: underline; white-space: normal">Contact :</span><span style="color: black; font-weight: 100; font-size: 0.8em">&nbsp; {{$annonce->phone}}</span><br>
                                <span  style=" font-weight: 100;font-family: segouil; text-decoration: underline; white-space: normal">Adresse mail :</span><span style="color: black; font-weight: 100; font-size: 0.8em" > &nbsp; {{$annonce->email}}</span><br>
                                <span  style=" font-weight: 100;font-family: segouil; text-decoration: underline; white-space: normal">Adresse mail :</span><span style="color: black; font-weight: 100; font-size: 0.8em" > &nbsp; {{$annonce->region->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-left: 2%;padding-right: 2%; padding-top: 1%; padding-bottom: 2%">
                        <div class="row ">
                            {{--  <div class="col-md-6">
                                <button type="submit" class="title-deposer" style="background-color: #FFBB02 ; font-family: segouil; width: 100%; height: 50px; border: none; color:white;padding :4px; font-size: 1.2em;"> Acheter</button>
                            </div>  --}}
                            <div class="col align-self-end">
                                <button type="button" class="title-deposer shadow" data-toggle="modal" data-target="#message" style="background-color: #FFBB02 ; font-family: segouil; width: max-content; height: 50px; border: none; color:white;padding :4px; font-size: 1.2em;border-radius: 20px;padding-left: 2%;padding-right: 2%"> Envoyer un message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Shop Single End-->
    </div>
</div>
<!--Shop Single End-->
{{-- MODAL MESSAGE --}}
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="message" aria-hidden="true">
    <div class="modal-dialog " style="max-width: 40%;" role="document">
        <div class="modal-content">
            <form action="{{route('users.send.message')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="message" style="font-family: segouil; font-weight: 100">Envoyer une Message</h5>
                </div>
                <input type="hidden" name="annonce_id" id="annonce_id" value="{{$annonce->id}}">
                <input type="hidden" name="user_id" id="user_id" value="{{$annonce->user->id}}">
                <div class="modal-body" style="padding: 5px">
                    <textarea name="message" id="message" cols="30" rows="10" style="width: 100%; height: 200px;font-family: segouil; font-weight: 100;"></textarea>
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
    $('#message').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
@endsection
