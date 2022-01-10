@extends('layouts.template')

@section('content')
<style>
    h4{
        font-weight: bold;
        color: #f75314;
        font-family: Rubik;
    }
    p  {
        font-weight: 100;
    }
    .inputtext{
        border-radius: 0.5em !important;
        border: 1px solid rgba(0, 0, 0, 0.15) !important;
        font-weight: 100 !important;
        font-size: 1em !important;
        font-family: segouil !important;
        width: 90%;
        margin-bottom: 3%;
    }
    .inputtext:focus{
        border: 1px solid #FFBB02 !important;
    }
    label{
        font-weight: 100;
        font-size: 0.8 em;
        text-transform :none;
    }
    .form-check-input{
        margin-top: 3%
    }
    .btn-link{
        font-size: 0.8em;
        font-weight: 100;
        padding: 0px;
        margin-top: -9%;
        color: #00A1F1;
    }

    {{--  .btn {
        padding: 0px;
    }  --}}
    .btn-validate{
        background-color: #f75314;
       // border-radius: 50px;
        color: white;
        font-weight: bold;
        padding-left: 5%;
        padding-right: 5%;
        margin-top: 6%;
        text-transform :none;
        width: 100%;
        font-family:segouil;
        line-height:30px;
        height:40px;
    }
    .remeber{
        font-size: 0.8em;
        font-weight: 100;
        margin-top: 1%;
    }
</style>
<div class="row justify-content-center" style="padding: 2%;">
    <div class="col-md-4 col-lg-3 shadow form-search"  style="background-color: white; padding :2%; border-radius: 20px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="{{ asset("assets/images/logo.png") }}" style="width: 100%">
            </div>
        </div>
        {{-- <h4 class="text-center">Inscription </h2> --}}
        <p class="text-center" style="font-family: segouil; margin-top: 2%">Merci de remplir les champs obligatoires</p>
            <form class="text-center" method="POST" action="{{ route('login') }}">
                @csrf
                <input class="inputtext" type="text" name="name" id="name" placeholder="Votre Nom (*)" required>
                <input class="inputtext" type="text" name="lastname" id="lastname" placeholder="Votre Prénom (*)" required>
                <input class="inputtext" type="email" name="email" id="email" placeholder="E-mail (*)" required>
                <input class="inputtext" type="text" name="phone" id="phone" placeholder="Numéro téléphone (*)" required>
                <input class="inputtext" type="password" name="password" id="password" placeholder="Mot de passe (*)" required>
                <input class="inputtext" type="password" name="confirm" id="confirm" placeholder="Confirmer votre mot de passe (*)" required>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-validate shadow rounded" formaction="{{route('users.store')}}">S'inscrire</button>
                    </div>
                </div>
                <div class="col-md-12" style="font-family: segouil">
                    Déjà une compte ? <a  class="" href="{{route('login')}}" style="color: #00A1F1">Connectez-vous</a>
                </div>
        </form>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <a href="{{ route('socialite.redirect', 'google') }}" title="Connexion/Inscription avec Google" class="btn shadow" style="background-color: white;color:white;font-family: segouil;font-weight: 100;padding-left: 2%;padding-right: 2%;font-size: 0.7em;min-width:50px;border-radius:50%"> <img src="{{ asset("assets/images/gmail_logo.png") }}" alt="logo_google" srcset=""></a>

            </div>
            <div class="col-md-2">
                <a href="{{ route('socialite.redirect', 'facebook') }}" title="Connexion/Inscription avec Facebook" class="btn shadow" style="background-color: #1877f2;color:white;font-family: segouil;font-weight: 100;padding-left: 2%;padding-right: 2%;font-size: 0.7em;min-width:50px;border-radius:50%;padding-top:0px"> <img src="{{ asset("assets/images/fb_logo.png") }}" alt="logo_facebook" srcset=""></a>
            </div>
        </div>
    </div>
</div>
@endsection
