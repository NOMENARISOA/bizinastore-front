@extends('users.template')

@section('content-back')
<div class="row justify-content-center" style="padding: 2%;">
    <div class="shadow col-md-8 form-search"  style="background-color: white; padding :2%; border-radius: 20px">
        <div>
            <h4 style="text-decoration: underline ;font-family: segouil">Mon profil</h2>
            <div>
                <form action="{{route('users.update')}}" method="POST">
                    @csrf
                    <div class="account-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Nom</label>
                                    <input type="text" placeholder="Nom" name="name" id="name" value="{{Auth::user()->name}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Prénom</label>
                                    <input type="text" placeholder="Prénom" name="lastname" id="lastname" value="{{Auth::user()->lastname}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Email</label>
                                    <input type="text" placeholder="email" name="email" id="email" disabled value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Numéro Téléphone</label>
                                    <input type="text" placeholder="Numéro Téléphone" name="phone" id="phone" value="{{Auth::user()->phone}}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-form">
                                    <button type="submit" class="btn btn-primary" style="background-color: #00A1F1; border: none; font-family: segouil" ><span style="margin-left: 5px;margin-right: 5px">Sauvegarder la modification</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="margin-top: 2%">
            <h4 style="text-decoration: underline">Changer mot de passe</h2>
            <div>
                <form action="{{route('users.password')}}" method="POST">
                    @csrf
                    <div class="account-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Mot de passe actuel</label>
                                    <input type="password" name="old" id="old" placeholder="Mot de passe actuel">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Nouveau mot de passe</label>
                                    <input type="password" name="new" id="new" placeholder="Nouveau mot de passe">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <label>Confirmer le nouveau mot de passe</label>
                                    <input type="password" name="confirm" id="confirm" placeholder="Confirmer le nouveau mot de passe">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-form">
                                    <button class="btn btn-primary" style="background-color: #00A1F1; border: none; font-family: segouil">Sauvegarder la modification</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
