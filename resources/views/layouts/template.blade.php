<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bizinastore</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/plazaicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}">
    <style type="text/css">
        @font-face {
            font-family: segouil;
            src: url('{{asset('assets/fonts/segoeuil.ttf')}}');
            }
    </style>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/select2.min.css')}}">
    <!-- DataTable -->
    <link rel="stylesheet" href="{{asset('assets/css/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatable/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatable/dataTables.bootstrap.min.css')}}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/helper.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

     <!-- jQuery JS -->
    <script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js') }}"></script>
    <!--notification js -->
    <link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}"/>
    <script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/letter-avatar.css')}}">
    <script src="{{asset('assets/js/letter-avatar.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .site-main-nav .site-nav ul > li > a {
            font-size: 1em !important;
            font-family: segouil;
            font-weight: 100;
            color: #fff;
            text-transform: none !important;
        }
        .site-main-nav .site-nav ul > li > a > i  {
            font-size: 1.3em !important;
            color: #fff;
            position: absolute !important;
            padding-top: 15px
        }
        .home-right{
            font-family: segouil;
            font-size: 1em;
            color: #fff;
            text-align: center;
            font-weight: 100;
            padding: 2%;
        }
        .home-right > i{
            font-size: 1.3em;
            color: #fff
        }
        .footer-area{
            background-color : #FFF;
            /* color: black !important; */
        }
        .footer-widget .footer-widget-menu ul li a{
            font-family: segouil;
            color: black !important;
        }
    </style>
    @if(session()->has('error'))
        <script>
            $(document).ready(function() {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-exclamation-triangle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    width: 600,
                    msg:'{{session()->get('error')}}'
                });
            });
        </script>
    @endif
    @if(session()->has('success'))
        <script>
            $(document).ready(function() {
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-check-circle-o',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    width: 600,
                    msg:'{{session()->get('success')}}'
                });

            });
        </script>
    @endif
</head>

<body>

    <div class="main-wrapper" style="background-color: #ecf0f1 !important">
        <!--Header Section Start-->
        <div class="header-section d-none d-lg-block" style="padding-top: 0px !important; padding-bottom: 0px !important; background-color: #00a1f1">
            <div class="main-header">
                <div class="position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="header-logo">
                                <a href="{{url('/')}}"><img src="{{asset('assets/images/logo.jpg')}}" style="width: 20%" alt="logo_bizinastore"></a>
                            </div>
                        </div>
                        <div class="col-lg-3 position-static">
                            <div class="site-main-nav">
                                <nav class="site-nav">
                                    <ul>
                                        <li><a href="{{route('annonce.create')}}"> <i class="icon-plus-circle"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Déposer une annonce </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <a class="home-right"  href="{{route('annonce.search')}}"> <i class="ti ti-search" style="position: absolute !important; padding-top: 7px"></i><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Recherche</span></a>
                        </div>
                        <div class="col-lg-4">
                            <a class="home-right"  href="{{route('forum.index')}}"> <i class="ti ti-comments"></i><span><br> Forum</span></a>
                            <a class="home-right"  href="{{route('users.favoris')}}"> <i class="ti ti-bookmark-alt"></i><span><br> Favoris</span></a>
                            {{-- MESSAGE --}}
                            <a class="home-right"  href="{{route('users.message')}}"> <i class="ti ti-email"></i><span><br>Message</span></a>
                            {{-- COMPTE --}}
                            <a class="home-right"  href="{{route('users.home')}}"> <i class="fa fa-user-circle-o"></i><span><br> Mon compte</span></a>
                            @if(Auth::check())
                                <a class="home-right" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><span><br> Déconnexion</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .leftheader{
                    border-radius: 0px 20px 20px 0px;
                    background-color: #00a1f1;
                    border:none
                }
            </style>
            <div class="buttonMenuHeader" style="position: fixed;z-index: 1;font-family: segouil">
                <div>
                    <a href="{{route('annonce.create')}}" class="btn btn-success leftheader" data-toggle="tooltip" title="Déposer une annonce"><i class="icon-plus-circle"></i></a>
                </div>
                <div style="margin-top: 2%">
                    <a href="{{route('annonce.search')}}" class="btn btn-success leftheader" data-toggle="tooltip" title="Recherche"><i class="ti ti-search"></i></a>
                </div>
                <div style="margin-top: 2%">
                    <a href="{{route('forum.index')}}" class="btn btn-success leftheader" data-toggle="tooltip" title="Forum"><i class="ti ti-comments"></i></a>
                </div>
                <div style="margin-top: 2%">
                    <a href="{{route('users.favoris')}}" class="btn btn-success leftheader" data-toggle="tooltip" title="Favoris"><i class="ti ti-bookmark-alt"></i></a>
                </div>
                <div style="margin-top: 2%">
                    <a href="{{route('users.message')}}" class="btn btn-success leftheader" data-toggle="tooltip" title="Message"><i class="ti ti-email"></i></a>
                </div>
                <div style="margin-top: 2%">
                    <a href="{{route('users.home')}}" class="btn btn-success leftheader" data-toggle="tooltip" title="Mon compte"><i class="fa fa-user-circle-o"></i></a>
                </div>


            </div>
        </div>
        <!--Header Section End-->

        <div class="overlay"></div>
        <!--Overlay-->
        {{-- CONTAINTE MAIN --}}
        @yield('content')
        {{-- CONTAINTE --}}
        <!--Footer Section Start-->
        <div class="footer-area" style="background-color: #00a1f1;color:white !important">
            <div class="container-fluid">
                <div class="footer-widget-area" >
                    <div class="row justify-content-between">

                        <!--Footer Widget Start-->
                        <div class="col-lg-2 col-md-2 col-12" style="padding-left: 0px;">
                            <div class="footer-widget " style="margin-top: 0px">
                                <div>
                                    <a class="footer-logo" style="width: 30%;margin-bottom: 0px;" href="#"><img src="{{asset('assets/images/logo_footer.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Footer Widget End-->
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="footer-widget" style="margin-top: 0px;">
                                <div class="footer-widget-menu" >
                                    <ul>
                                        <li><a style="color:white !important" href="#">Particulier</a></li>
                                        <li><a style="color:white !important" href="#">Solution Pros</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="footer-widget" style="margin-top: 0px;">
                                <div class="footer-widget-menu">
                                    <ul>

                                        <li><a style="color:white !important" href="{{route('about')}}">A propos</a></li>
                                        <li><a style="color:white !important" href="{{route('aide')}}">Aide</a></li>
                                        <li><a style="color:white !important" href="{{route('mention')}}">Mentions légales</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-6" >
                            <div class="footer-widget" style="margin-top: 0px;">
                                <div class="footer-widget-menu">
                                    <ul>
                                        <li><a style="color:white !important" href="{{route('cgu')}}">Conditions générales d'utilisation</a></li>
                                        <li><a style="color:white !important" href="{{route('cgv')}}">Condition générales de vente</a></li>
                                        <li><a style="color:white !important" href="{{route('vie')}}">Vie privée et cookies</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="footer-widget" style="margin-top: 0px;">
                                <div class="footer-widget-menu">
                                    <ul>
                                        <li><a style="color:white !important" href="#">Blog</a></li>
                                        <li><a style="color:white !important" href="{{route('contact')}}">Contact</a></li>
                                        <li><a style="color:white !important" href="{{route('localisation')}}">Suivez-nous sur </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Footer Section End-->

        <!--Back To Start-->
        <a href="#" class="back-to-top" style="background-color: #00a1f1">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!--Back To End-->





    </div>
    <script>
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
    <!-- JS
    ============================================ -->

    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/plugins/jquery.elevateZoom.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ajax-contact.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.buttonMenuHeader').hide();
        });

        $(document).scroll(function () {
            var y = $(this).scrollTop();
            if (y > 100) {
                $('.buttonMenuHeader').show();
                $('.buttonMenuHeader').fadeIn();

            } else {
                $('.buttonMenuHeader').hide();
                $('.buttonMenuHeader').fadeOut();
            }

        });
    </script>
    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <script src="assets/js/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
