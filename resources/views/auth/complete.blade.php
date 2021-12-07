@extends('layouts.template')

@section('content')
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
        border: none !important;
        border-bottom: 1px solid rgba(0, 128, 0, 0.322) !important;
        font-weight: 100 !important;
        font-size: 1em !important;
        width: 90%;
        margin-bottom: 3%;
        margin-top: 3%;
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
        background-color: #00A1F1;
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
        margin-top:10%;
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
        <p class="text-center" style="font-family: segouil; margin-top: 2%">Completez votre profil pour l'activer</p>
            <form class="text-center" method="POST" action="{{ route('users.complete.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input class="inputtext" type="text" name="name" id="name" placeholder="Votre Nom" required>
                    </div>
                    <div class="col-md-6">
                        <input class="inputtext" type="text" name="lastname" id="lastname" placeholder="Votre Prénom" required>
                    </div>
                </div>
                <input class="inputtext" type="text" name="phone" id="phone" placeholder="Numéro téléphone" required>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-validate shadow" >Enregistrer</button>
                    </div>
                </div>
        </form>

    </div>
</div>
@endsection
