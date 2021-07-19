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
    <div class="container" style="background-color: #FFF">
        <!--Shop Single Start-->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="shop-image" style="margin-top: 20px !important; width: 100%; height: 60%; margin-bottom: 30px">
                    <div class="shop-single-preview-image" style="width: 100%; height: 350px;">
                        <img class="product-zoom" src="{{route('file.open',[$annonce->image->first()->image->folder,$annonce->image->first()->image->url])}}" alt="">
                    </div>
                    <div id="gallery_01" class="shop-single-thumb-image shop-thumb-active swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($annonce->image as $image )
                                <div class="swiper-slide single-product-thumb" style="width: 150px; height: 150px; margin: 0px">
                                    <a href="#" style="width: 100%; height: 100%;" data-image="{{route('file.open',[$image->image->folder,$image->image->url])}}">
                                        <img style="width: 100%; height: 100%;" src="{{route('file.open',[$image->image->folder,$image->image->url])}}" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-8">
                        <div class="shop-single-content" style="margin-top: 20px">
                            <h4 class="title" style="font-weight: bold; color:#00A1F1">{{$annonce->titre}}</h4>
                            <h4 class="title" style="font-weight: bold; color:#FFBB02; margin-top: 5%">{{$annonce->prix}} Ar </h4>
                            <p class="title" style="font-weight: bold; color:#00A1F1; text-transform: none; font-size: 1.3em; border-bottom: 2px solid #00A1F1;padding-bottom: 15px; margin-top: 2%">Description du produit</p>
                            <p>{{$annonce->description}}</p>
                            <div style="border-top: 2px solid #00A1F1;border-bottom: 2px solid #00A1F1; padding-bottom: 10px; padding-top: 10px;margin-bottom: 20px">
                                <span>Vendue par :</span> <span style="color: #00A1F1; font-weight: bold; font-size: 0.8em"> &nbsp; {{$annonce->user->name}}</span> <br>
                                <span>Contact :</span>  <span style="color: #00A1F1; font-weight: bold; font-size: 0.8em">&nbsp; {{$annonce->phone}}</span><br>
                                <span>Adresse mail :</span> <span style="color: #00A1F1; font-weight: bold; font-size: 0.8em" > &nbsp; {{$annonce->email}}</span>
                            </div>
                            <div style="margin-bottom: 40px">
                                <span>Localisation :</span> <span style="color: #00A1F1; font-weight: bold; font-size: 0.8em"> &nbsp; {{$annonce->region->name}}</span> <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 2%;padding-right: 2%; padding-top: 30%">
                        <button type="submit" class="title-deposer" style="background-color: #00A1F1 ; font-family: segouil; width: 100%; height: 50px; border: none; color:white;padding :4px; font-size: 1.2em;"> Acheter</button>
                        <button type="button" class="title-deposer" data-toggle="modal" data-target="#message" style="background-color: #00A1F1 ; font-family: segouil; width: 100%; height: 50px; border: none; color:white;padding :4px; font-size: 1.2em; margin-top: 10%"> Envoyer un message</button>
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
