@extends('layouts.template')
@section('content')
 <style>
     .title{
        background-color: #4286f5;
        border-radius: 48px;
     }
     .title-deposer{
        background-color: #4286f5;
        font-family: segouil;
        padding: 2%;
        color: white !important;
        border-radius: 50px;
        font-weight: 100!important;
        font-size: 1.2em !important
     }
     .form-search{
         border-radius: 20px
     }
     .shadow{
        box-shadow: 10px 5px 5px black;
     }

     .inputtext{
        border-radius: 50px ;
        background-color: #ebebeb !important;
     }
     .option-buttion-label{
         padding-top:3px !important;
         font-size: 1.6em;
         font-weight: 100 !important
     }
     .select-left{
        background-color: #ebebeb !important;
        border-radius: 50px ;
        width: 100% !important;
        height: 40px;
        padding-top: 8px !important;
        background: url('http://localhost:8000/assets/icon/icon-menu.png') no-repeat left;
     }
 </style>
 @livewireStyles

<!--Shop Start-->
<livewire:annonce-search />
@livewireScripts
<!--Shop End-->
@endsection
