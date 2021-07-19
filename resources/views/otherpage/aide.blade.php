@extends('layouts.template')
@section('content')
<div class="row" style="padding-top: 2%;padding-left: 5%">
    <div class="col-md-2 shadow form-search"  style="background-color: #00A1F1;border-radius: 20px;">
        <h3 class="text-center" style="font-family: segouil; font-weight: 100;color:white" >Aide</h3>
    </div>
</div>
<div class="row justify-content-center" style="padding-top: 2%;margin-bottom: 2%">
    <div class="col-md-10 col-lg-6 shadow form-search"  style="background-color: white; padding :2%">
        {!! App\Models\pageTexte::all()->first()->aide !!}
    </div>
</div>
@endsection
