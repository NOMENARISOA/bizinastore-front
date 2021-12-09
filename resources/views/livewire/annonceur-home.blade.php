<div>
    <style>
        .my-account-menu .account-menu-list li a:hover, .my-account-menu .account-menu-list li a.active{
            background-color: #00a1f1;
        }
    </style>
    <!--My Account Start-->

    <div class="row" style="padding-top: 2%;padding-left: 5%">
        <div class="shadow col-md-2 form-search"  style="background-color: #00A1F1;border-radius: 0.5em;">
            <h3 class="text-center" style="font-family: segouil; font-weight: 100;color:white" >Backoffice Annoce</h3>
        </div>
    </div>
    <style>
        .btn-header{
            font-weight: 100 !important;
            border-radius: 0.5em !important;
            background-color: #00BB26;
            color :white !important
        }
        .btn-header:hover{
            background-color: #E70001 !important;
        }
        .btn-active{
            background-color: #E70001 !important;
        }
    </style>
    <div class="row" style="padding: 2%;padding-left: 5%">
        <div class="col-md-2 form-search">
            <button class="btn btn-header @if($annonce_menu == "1") btn-active @endif shadow" wire:click="change_menu(1)" style="">Tableau de bord</button>
        </div>
        <div class="col-md-2 form-search">
            <button class="btn btn-header @if($annonce_menu == "2") btn-active @endif shadow" wire:click="change_menu(2)">Annonce</button>
        </div>
        {{--  <div class="col-md-2 form-search">
            <button class="btn btn-header @if($annonce_menu == "3") btn-active @endif shadow" wire:click="change_menu(3)" >Mon profil</button>
        </div>
        <div class="col-md-2 form-search ">
            <button class="btn btn-header @if($annonce_menu == "4") btn-active @endif shadow" wire:click="change_menu(4)">Modification mot de passe</button>
        </div>  --}}
    </div>
    {{-- TABLEAU DE BOARD --}}
    @if($annonce_menu == "1")
        <div class="row" style="padding: 2%;">
            <div class="col-md-3">
                <div class="shadow card">
                    <div class="card-header" style="background-color: #FFF; border:none;border-radius: 0.5em">
                        <div class="text-center card-title">
                            <div class="row">
                                <h3 style="font-weight: bold;font-family: segouil">Annonce Vendue/En Vente</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="shadow card">
                    <div class="card-header" style="background-color: #FFF; border:none;border-radius: 0.5em">
                        <div class="text-center card-title">
                            <div class="row">
                                <h3 style="font-weight: bold;font-family: segouil">Annonce Vente / En Vente Par mois</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart_mois"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var options = {
            series: [{
            name: 'Vendue',
            data: [
                @if(! empty($annonce_vendue_month))
                    @if($annonce_vendue_month->where('month','1')->count() > 0) {{ $annonce_vendue_month->where('month','1')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','2')->count() > 0) {{ $annonce_vendue_month->where('month','2')->first()->tota }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','3')->count() > 0) {{ $annonce_vendue_month->where('month','3')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','4')->count() > 0) {{ $annonce_vendue_month->where('month','4')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','5')->count() > 0) {{ $annonce_vendue_month->where('month','5')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','6')->count() > 0) {{ $annonce_vendue_month->where('month','6')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','7')->count() > 0) {{ $annonce_vendue_month->where('month','7')->first()->total  }} @else 0 @endif,
                    @if($annonce_vendue_month->where('month','8')->count() > 0) {{ $annonce_vendue_month->where('month','8')->first()->total}} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','9')->count() > 0) {{ $annonce_vendue_month->where('month','9')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','10')->count() > 0) {{ $annonce_vendue_month->where('month','10')->first()->total }} @else 0  @endif,
                    @if($annonce_vendue_month->where('month','11')->count() > 0) {{ $annonce_vendue_month->where('month','11')->first()->total  }} @else 0 @endif,
                    @if($annonce_vendue_month->where('month','12')->count() > 0) {{ $annonce_vendue_month->where('month','12')->first()->total }}  @else 0 @endif,
                @endif
                ]
          }, {
            name: 'En Vente',
            data: [
                @if(! empty($annonce_vendue_month) )
                    @if($annonce_nonvendue_month->where('month','1')->count() > 0) {{ $annonce_nonvendue_month->where('month','1')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','2')->count() > 0) {{ $annonce_nonvendue_month->where('month','2')->first()->tota }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','3')->count() > 0) {{ $annonce_nonvendue_month->where('month','3')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','4')->count() > 0) {{ $annonce_nonvendue_month->where('month','4')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','5')->count() > 0) {{ $annonce_nonvendue_month->where('month','5')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','6')->count() > 0) {{ $annonce_nonvendue_month->where('month','6')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','7')->count() > 0) {{ $annonce_nonvendue_month->where('month','7')->first()->total  }} @else 0 @endif,
                    @if($annonce_nonvendue_month->where('month','8')->count() > 0) {{ $annonce_nonvendue_month->where('month','8')->first()->total}} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','9')->count() > 0) {{ $annonce_nonvendue_month->where('month','9')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','10')->count() > 0) {{ $annonce_nonvendue_month->where('month','10')->first()->total }} @else 0  @endif,
                    @if($annonce_nonvendue_month->where('month','11')->count() > 0) {{ $annonce_nonvendue_month->where('month','11')->first()->total  }} @else 0 @endif,
                    @if($annonce_nonvendue_month->where('month','12')->count() > 0) {{ $annonce_nonvendue_month->where('month','12')->first()->total }}  @else 0 @endif,
                @endif
            ]
          }],
            chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: ['Jav','Fev','Mars','Avr','Mai','Juin','juil','Aout','Sept','Oct','Nov','Déc'],
          },
          yaxis: {
            title: {
              text: 'Nombre annonce'
            }
          },
          fill: {
            opacity: 1
          }
          };
          var char_pie = {
            series: [{{$vendue  }}, {{  $nonvendue}}],
            colors: ['#F64E60', '#1BC5BD'],
            chart: {
            width: 380,
            type: 'pie',
          },
          labels: ['Vendue', 'En Vente'],
          responsive: [{
            breakpoint: 480,
            options: {
              chart: {
                width: 200
              },
              legend: {
                position: 'bottom'
              },

            }
          }]
          };

          var chart_pie = new ApexCharts(document.querySelector("#chart"), char_pie);
          var chart = new ApexCharts(document.querySelector("#chart_mois"), options);
          chart.render();
          chart_pie.render();
        </script>
    @endif
    @if($annonce_menu =="2")
        <div class="row justify-content-center" style='padding:2%'>
            <div class="col-md-10 col-lg-10">
                <div class="shadow card">
                    <div class="card-header rounded" style="background-color: #FFF; border:none;">
                        <div class="card-title ">
                            <div class="row" style="">
                                <h3 style="font-weight: bold;font-family: segouil">Liste des annonces</h3>
                                <input type="text" style="position: absolute;right:0; width:30%;margin-right:2%" class="form-control" wire:model.debounce.500ms="query" placeholder="Recherche..."  />
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <style>
                            th{
                                font-weight: 100;
                                font-family: segouil
                            }
                            td{
                                font-weight: 100;
                                font-family: segouil
                            }
                        </style>
                        <table  class="table table-hover" id="table-annonce" >
                            <thead>
                                <tr class ='text-center'>
                                    <th>Titre</th>
                                    <th>Prix</th>
                                    <th>Region</th>
                                    <th>Status Paiement</th>
                                    <th>Status Publication</th>
                                    <th>Status annonce</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annonces as $annonce )
                                    <tr class="text-center">
                                        <td>{{$annonce->titre}}</td>
                                        <td>{{$annonce->prix}}</td>
                                        <td>{{$annonce->region->name}}</td>
                                        <td>
                                            @if ($annonce->status_payant == null)
                                                <p style="color :#00BB26"> Gratuit</p>
                                            @elseif($annonce->status_payant == 1)
                                                <p class="text-danger">Non Payer</p>
                                            @else
                                                <p style="color :#00a1f1" >Payée</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($annonce->status == 1)
                                                <p style="color :#00BB26"> Publié</p>
                                            @elseif($annonce->status == 2)
                                                <p style="color:#FFBB02" >En attente validation</p>
                                            @else
                                                <p class="text-danger" >Bloqué</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($annonce->etat_annonce == 1)
                                                <p style="color :#00BB26"> Disponible</p>
                                            @else
                                                <p class="text-danger">Vendu</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($annonce->etat_annonce == 1)
                                                <a href="{{route('annonce.changetat',[$annonce->id,'2'])}}" data-toggle="tooltip" title="Marqué comme Vendue" style=" background-color: #FFBB02; color:white;width: 30px; height: 30px;"> <span style="margin: 5px"><i class="fa fa-cart-arrow-down"></i></span></a>
                                            @else
                                                <a href="{{route('annonce.changetat',[$annonce->id,'1'])}}" data-toggle="tooltip" title="Marqué disponible"style=" background-color: #00BB26; color:white;width: 30px; height: 30px;"> <span style="margin: 5px"><i class="fa fa-bullhorn"></i></span></a>
                                            @endif
                                            <a href="{{route('annonce.show',[$annonce->id])}}" style=" background-color: #00a1f1; color:white;width: 30px; height: 30px;"> <span ><i class="fa fa-eye"></i></span></a>
                                            <a href="{{route('annonce.destroy',[$annonce->id])}}" style=" background-color: #E70001; color:white;width: 30px; height: 30px;"> <span style="margin: 5px"><i class="fa fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {{ $annonces->links() }}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
