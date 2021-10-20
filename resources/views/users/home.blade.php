@extends('users.template')

@section('content-back')
<style>
    {{-- .text-success {
        color: #00A1F1 !important;
        font-weight: bold !important;
    } --}}
</style>
<div class="row justify-content-center" >
    <div class="text-center shadow col-md-3 row justify-content-center" style="background-color: white; padding :2%; border-radius: 20px">
        <div class="icon-span" style="padding-right: 2px;padding-left: 0px;padding-bottom: 0px;margin-top: -16%;padding-top: 7px;"><i class="ti ti-time" style="color: white"></i></div>
        <div>
            <a href="{{route('user.backoffice.annonce')}}" style="width: 100% !important; margin-top: 10%; font-family: segouil">
                <p class="text-center " style="font-weight: 300;font-family: segouil;color: #00A1F1" >Backoffice Annonce</p>
                <p class="text-center" style="font-family: segouil;padding-top: 3%" >Gestion de votre annonce et de votre publication</p>
            </a>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="text-center shadow col-md-3 row justify-content-center" style="background-color: white; padding :2%; border-radius: 20px;font-family: segouil">
        <div class="icon-span" style="padding-right: 0px;padding-left: 0px;padding-bottom: 0px;margin-top: -16%;padding-top: 5px;"><i class="fa fa-bookmark-o" style="color: white"></i></div>
        <div>
            <a href="{{route('users.favoris')}}" style="width: 100% !important; margin-top: 10%">
                <p class="text-center" style="font-weight: 300;font-family: segouil;color: #00A1F1" >Favoris</p>
                <p class="text-center" style="font-family: segouil;padding-top: 3%">Consultez vos favoris</p>
            </a>
        </div>
    </div>
</div>
<div class="row justify-content-center"  >
    <div class="text-center shadow col-md-3 row justify-content-center" style="background-color: white; padding :2%; border-radius: 20px;margin-top: 2%;margin-bottom: 2%;font-family: segouil">
        <div class="icon-span" style="padding-right: 0px;padding-left: 0px;padding-bottom: 0px;margin-top: -16%;padding-top: 5px;"><i class="fa fa-envelope-o" style="color: white"></i></div>
        <div>
            <a href="{{route('users.message')}}" style="width: 100% !important; margin-top: 10%;font-family: segouil">
                <p class="text-center" style="font-weight: 300;font-family: segouil;color: #00A1F1" >Messages</p>
                <p class="text-center" style="font-family: segouil;padding-top: 3%">Consultez votre boite de messagerie</p>
            </a>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="text-center shadow col-md-3 row justify-content-center" style="background-color: white; padding :2%; border-radius: 20px;margin-top: 2%;margin-bottom: 2%">
        <div class="icon-span" style="padding-right: 0px;padding-left: 0px;padding-bottom: 0px;margin-top: -16%;padding-top: 7px;"><i class="ti ti-settings" style="color: white;"></i></div>
        <div>
            <a href="{{route('users.parametre')}}" style="width: 100% !important; margin-top: 10%">
                <p class="text-center " style="font-weight: 300; font-family: segouil;color: #00A1F1" >Paramètres</p>
                <p class="text-center" style="font-family: segouil;padding-top: 3%">Modifiez votre profil</p>
            </a>
        </div>
    </div>
</div>
{{-- <div class="row justify-content-center" >
    <div class="text-center shadow col-md-3 row justify-content-center" style="background-color: white; padding :2%; border-radius: 20px;margin-top: 2%;margin-bottom: 2%">
        <div class="icon-span"><i class="ti ti-power-off" style="color: white"></i></div>
        <div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="width: 100% !important; margin-top: 10%;font-family: segouil"><p class="text-center text-success" style="font-weight: 300;font-family: segouil" >Déconnexion</p></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
        </div>
    </div>
</div> --}}

@endsection
