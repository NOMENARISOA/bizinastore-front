@extends('layouts.template')
@section('content')
<style>
   .search_query::placeholder{
        color: white !important;
        font-family: segouil;
        font-weight: 100;
        font-size: 1.2em
    }
    #titre::placeholder{
        font-family: segouil;
        font-size: 1.2em;
        font-weight: 100;
    }
    .forum-list{
        background-color: white;
        border-radius: 0.5em;
        padding-top: 1%;
        padding-left: 3%;
        padding-bottom: 2%;
        min-height: 100px;
        max-height: 100px;
    }
    .forum-list:hover{
        background-color: #00A1F1;
    }
    .forum-list a :hover{
        color: white !important;
    }
    .forum-list a :hover{
        color: white !important;
    }
</style>
@include('layouts.carousel')
@livewireStyles
<script>
    $('#forum').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
<livewire:forum-show/>
@livewireScripts
@endsection
