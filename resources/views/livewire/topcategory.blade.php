<div>
    <style>
        .categorie-list-home{
            padding: 5%;
            border-bottom: 1px solid rgba(122, 120, 120, 0.185);
            font-weight: 100;
            font-family: segouil;
            width: 100%;
            padding-left: 10%;
        }
        .categorie-list-end{
            padding: 5%;
            font-weight: 100;
            font-family: segouil;
            padding-left: 10%;
        }
    </style>
   <div class="row" style="height: max-content">
        <div class="col-md-3">
            @foreach ($categories as $categorie )
                @if($categorie->id == $categories->last()->id)
                <a class="categorie-list-end" @if($categorie_selected == $categorie->id) style="font-weight:bold!important;color:#00a1f1" @endif wire:click="selected_article({{ $categorie->id }})">{{ $categorie->name }}</a>
                @else
                    <a class="categorie-list-home" @if($categorie_selected == $categorie->id) style="font-weight:bold!important;color:#00a1f1" @endif wire:click="selected_article({{ $categorie->id }})">{{ $categorie->name }}</a>
                @endif
            @endforeach
        </div>
        <div class="col-md-3" style="padding-bottom: 1%;padding-top: 0px">
            <img src="{{ asset("assets/images/background.jpg") }}" style="width: 100%;height: 100%;" alt="" srcset="">
        </div>
        <div class="col-md-6" style="margin-bottom: 3%">
            <div class="row" style="padding:0px;">
                @php
                    $i=0;
                @endphp
                @foreach ($annonces as $annonce )
                @php
                    $i++;
                @endphp

                    <div class="col-md-4 col-sm-4 col-lg-4 " style="margin-top: 2%;max-height: 150px;min-height: 150px !important;height: 150px;">
                        <div @if($i%3!=0)style="border-right: 1px solid rgba(0, 0, 0, 0.274)"@endif>
                            <a href="http://" style="min-height: 150px;position: relative">
                                <h4 style="font-family: segouil;font-weight: bold;font-size: 0.8em;color:#00a1f1">{{ $annonce->titre }}</h4>
                                <div style="text-align: center;width: 100%;margin-bottom: 1%">
                                    <img  src="{{route('file.open',[$annonce->image->first()->image->folder,$annonce->image->first()->image->url])}}" style="max-height: 5em !important;max-width: 90%; align-content: center" alt="" srcset="">
                                </div>
                                <div style="position: absolute;bottom: 0;">
                                    <span style="font-family: segouil;font-weight: 100;">{{ number_format($annonce->prix, 0,',',' ') }} Ar</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
   </div>
</div>
