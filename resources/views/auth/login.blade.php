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
        font-family: segouil !important;
        border-radius: 0.5em !important;
        border: none !important;
        border: 1px solid rgba(0, 0, 0, 0.15) !important;
        font-weight: 100 !important;
        font-size: 1em !important;
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

    .btn {
        padding: 0px;
    }
    .btn-validate{
        border-radius: 0.5em;
        background-color: #f75314;
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
        {{-- <h4 class="text-center" style="font-family: segouil;">Connexion </h2> --}}
        <p class="text-center">Saisissez votre e-mail pour vous connecter</p>
            <form class="text-center" method="POST" action="{{ route('login') }}">
                @csrf
                <input class="inputtext" type="email" name="email" id="email" placeholder="E-mail " required>
                <input class="inputtext" type="password" name="password" id="password" placeholder="Mot de passe" required>
                <div class="row" style="margin-top: 5%">
                    <div class="col-md-6" >
                        <div class="row">
                            <div class="col-md-1">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div>
                            <div class="col-md-9 text-left">
                                <label for="remember" class="remeber">Se souvenir de moi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-validate shadow" formaction="{{route('login')}}">Connexion</button>
                    </div>

                </div>
                <div class="col-md-12" style="font-family: segouil">
                   Vous n'avez pas de compte ? <a  class="" href="{{route('users.create')}}" style="color: #00A1F1">Inscrivez-vous</a>
                </div>
        </form>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <a href="{{ route('socialite.redirect', 'google') }}" title="Connexion/Inscription avec Google" class="btn" style="background-color: #f75314;color:white;font-family: segouil;font-weight: 100;padding-left: 2%;padding-right: 2%;font-size: 0.7em;min-width:50px;border-radius:50%"> <i class="fa fa-google"></i></a>

            </div>
            <div class="col-md-2">
                <a href="{{ route('socialite.redirect', 'facebook') }}" title="Connexion/Inscription avec Facebook" class="btn" style="background-color: #3b5998;color:white;font-family: segouil;font-weight: 100;padding-left: 2%;padding-right: 2%;font-size: 0.7em;min-width:50px;border-radius:50%"> <i class="fa fa-facebook"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
