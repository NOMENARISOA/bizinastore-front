@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/letter-avatar.css')}}">
<script src="{{asset('assets/js/letter-avatar.js')}}"></script>
<style>
    h2{
        font-family: segouil;
        font-weight: 100;
        color: green;
        font-size: 1.4em
    }
    h4{
        font-family: segouil !important;
        font-weight: bold;
        text-transform: none;
        color: rgb(4, 122, 10);
    }
    p{
        text-transform: none;
        font-family: segouil;
        font-weight: 100;
        font-size: 0.9em;
        margin-top: -8%;

    }

    a i:hover{
        color:green;
    }

    .active{
        color: green !important;
    }
    .icon-span{
        background-color: green;
        border-radius: 50%;
        color: white !important;
        width: 40px;
        height: 40px;
        font-size: 1.6em;
        text-align: center;
        padding: 5px;
        margin-top: -16%;
    }
    label
    {
        text-transform: none;
    }
    .chat-client-list a:hover{
        background-color: #00A1F1;
        color: white;
    }
    .chat-client{
        background-color: white;
        padding :2%;
        border-radius: 20px;
        margin-top: 2%;
        width: 100%;
    }
    .active-chat{
        background-color: #00A1F1 !important;
        color: white !important;
    }

</style>
{{-- <div class="row justify-content-center" style="padding: 2%; min-height: 600px;max-height: 600px">
    <div class="col-md-3">
        <div class="shadow" style="background-color: #00A1F1; padding :2%; border-radius: 20px; max-height: 10%">
            <h2 class="text-center" style="color:white;">Liste des vendeurs</h2>
        </div> --}}
        {{-- START CHAT CLIENT --}}
        {{-- <div class="chat-client-list" style="max-height: 90%">
            <a class="shadow chat-client" >
                <div class="row">
                    <div class="col-md-3 text-center" style="padding-right: 0px !important">
                        <img width="50" height="50" class="round" avatar="{{Auth::guard('users')->user()->name}}">
                    </div>
                    <div class="col-md-8" style="padding-left: 0px !important">
                        <span style="font-family: segouil;font-weight: bold"> Nom d'utilisateur</span> <br>
                        <span style="font-family: segouil;">Lorem ipsum sit amen dolor</span>
                    </div>
                </div>
            </a>
            <a class="shadow chat-client" >
                <div class="row">
                    <div class="col-md-3 text-center" style="padding-right: 0px !important">
                        <img width="50" height="50" class="round" avatar="R">
                    </div>
                    <div class="col-md-8" style="padding-left: 0px !important">
                        <span style="font-family: segouil;font-weight: bold"> Nom d'utilisateur</span> <br>
                        <span style="font-family: segouil;">Lorem ipsum sit amen dolor</span>
                    </div>
                </div>
            </a>
            <a class="shadow chat-client active-chat" >
                <div class="row">
                    <div class="col-md-3 text-center" style="padding-right: 0px !important">
                        <img width="50" height="50" class="round" avatar="M">
                    </div>
                    <div class="col-md-8" style="padding-left: 0px !important">
                        <span style="font-family: segouil;font-weight: bold"> Nom d'utilisateur</span> <br>
                        <span style="font-family: segouil;">Lorem ipsum sit amen dolor</span>
                    </div>
                </div>
            </a>
            <a class="shadow chat-client" >
                <div class="row">
                    <div class="col-md-3 text-center" style="padding-right: 0px !important">
                        <img width="50" height="50" class="round" avatar="V">
                    </div>
                    <div class="col-md-8" style="padding-left: 0px !important">
                        <span style="font-family: segouil;font-weight: bold"> Nom d'utilisateur</span> <br>
                        <span style="font-family: segouil;">Lorem ipsum sit amen dolor</span>
                    </div>
                </div>
            </a>
        </div> --}}
        {{-- END CHAT CLIENT --}}
    {{-- </div>
    <div class="col-md-6 shadow form-search"  style="background-color: white; padding :2%; border-radius: 20px; margin-left: 2%">
        <img width="100" height="100" class="round" avatar="{{Auth::guard('users')->user()->name}}">
    </div>
</div> --}}
{{-- @endsection  --}}
@livewireStyles
<livewire:message/>
@livewireScripts
@endsection
