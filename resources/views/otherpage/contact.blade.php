@extends('layouts.template')

@section('content')
<div class="row justify-content-center" style="padding-top: 2%;margin-bottom: 2%">
    <div class="col-md-10 col-lg-8 shadow form-search"  style="background-color: white; padding :2%">
       <div style="color:#00a1f1;font-weight: bold; font-size: 1.5em">
        Contactez-nous
       </div>
       <style>
           label{
               color:#00a1f1;
               font-size: 1.2em;
               font-weight: 100;
               font-family: segouil;
           }
           input::placeholder{
            font-weight: 100;
            font-family: segouil;
           }
       </style>
       <form action="{{ route('contact.store') }}" style="margin-top: 2%" method="POST">
           @csrf
           <div class="row">
                <div class="col-md-6">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" placeholder="Nom" required>
                </div>
                <div class="col-md-6">
                    <label for="sujet">Sujet</label>
                    <input type="text" name="sujet" id="sujet" placeholder="Sujet" required>
                </div>
           </div>
           <div class="row" style="margin-top: 2%">
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="col-md-6">
                    <label for="phone">Numéro téléphone</label>
                    <input type="text" name="phone" id="phone" placeholder="Numéro téléphone" required>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <div class="col-md-6">
                    <label for="message">Votre message</label>
                    <textarea name="message" id="message" cols="30" rows="40" style="min-height: 200px" minlength="20" required></textarea>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-2" style="background-color: #00a1f1;border-radius: 50px; position: absolute; margin-top: 15px">
                    <button class="title-deposer" wire:click="search" style="background-color: transparent;border: none; color:white;padding :4px; font-size: 1.2em"> Envoyer</button>
                </div>
            </div>
       </form>
    </div>
</div>
@endsection
