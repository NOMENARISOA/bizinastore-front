@extends('layouts.template')
@section('content')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
 {{--  @include('layouts.carousel')  --}}
 @livewireStyles

<!--Shop Start-->
<livewire:annonce-search />
@livewireScripts
<!--Shop End-->
@endsection
