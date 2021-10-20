@extends('layouts.template')
@section('content')
<div class="row justify-content-center" style="padding: 2%;">
    <div class="shadow col-md-6 form-search"  style="background-color: white; padding :2%; border-radius: 50px">
        <div class="row">
            <p style="font-weight: 100; font-family: segouil;">Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.</p>
            <h4 style="font-weight: bold; font-family: segouil;text-decoration: underline" sty>Mode de paiement :</h4>
            <form action="{{route('annonce.payant.vanillapay')}}" method="POST">
                @csrf
                <input type="hidden" name="annonce_id"  value="{{ $annonce_id }}">
                <button type="submit" style="background: transparent;box-shadow: none;border: none; width:fit-content" ><img style="width: 20%" src="{{ asset('assets/images/logoVanilla.png') }}" alt="vanilapay_bizinastore"></button>
            </form>

        </div>
    </div>
</div>
@endsection
