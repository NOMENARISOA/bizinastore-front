@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/letter-avatar.css')}}">
<script src="{{asset('assets/js/letter-avatar.js')}}"></script>
<style>
    h2{
        font-family: segouil;
        font-weight: bold;
        color: #00A1F1;
        font-size: 1.4em
    }
    h4{
        font-family: segouil !important;
        font-weight: bold;
        text-transform: none;
        color: #00A1F1;
    }
    p{
        text-transform: none;
        font-family: segouil;
        font-weight: 100;
        font-size: 0.9em;
        margin-top: -8%;

    }
    {{-- i{
        color: #00A1F1;
    } --}}
    a i:hover{
        color:green;
    }

    .active{
        color: green !important;
    }
    .icon-span{
        background-color: #00A1F1;
        border-radius: 50%;
        color: white !important;
        width: 40px;
        height: 40px;
        font-size: 1.6em;
        text-align: center;
        padding: 2%;

        font-weight: 100;
        margin-top: -16%;
    }
    label
    {
        text-transform: none;
    }

</style>
<div class="row justify-content-center" style="padding: 2%;">
    <div class="shadow col-md-4 form-search"  style="background-color: white; padding :2%; border-radius: 50px">
        <div class="row">
            <div class="col-md-4">
                <img width="100" height="100" class="round" avatar="{{Auth::user()->name}}">
            </div>
            <div class="col-md-8">
                <h2 >{{substr(Auth::user()->name,0,20)}} </h2>
                <span style="font-weight: 100">{{Auth::user()->email}}</p>
                <span style="font-weight: 100">{{Auth::user()->phone}}</p>
            </div>
        </div>
    </div>
</div>
@yield('content-back')
@endsection
