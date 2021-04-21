<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('meta')

    <title>@yield('title') | {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower(Session::get('nama_desa')))}} Kabupaten Subang</title>

    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}" />

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">

    <!-- Our Custom CSS -->

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <!-- Scrollbar Custom CSS -->

    <link rel="stylesheet" href="{{asset('frontend/css/jquery.mCustomScrollbar.min.css')}}">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">

    <script src="{{asset('frontend/js/all.min.js')}}"></script>
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgb(0, 0, 0);
            opacity: 0.9;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

    </style>
    @livewireStyles
    @livewireScripts
    @yield('top-resource')
    @toastr_css
</head>


<body>
  
  	<div class="preloader">
        <div class="loading">
            <img src="{{asset('assets/img/loading.gif')}}" width="250">
<!--             <p>Harap Tunggu</p> -->
        </div>
    </div>

    <!-- Search Overlay -->
    
    <div id="myOverlay" class="overlay-search">

        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>

        <div class="overlay-content">

            <form action="{{route('frontend.search')}}">

                {{csrf_field()}}

                <input type="text" placeholder="Cari..." name="keyword">

                <button type="submit"><i class="fa fa-search"></i></button>

            </form>

        </div>

    </div>

    <!-- /Search Overlay -->

    <!-- Slider Banner -->

    @yield('header')

    <!-- /Slider Banner -->

    <!-- Top Nav -->

    @include('frontend.layout.topnav')

    <!-- /Top Nav -->


    <div class="wrapper">

        <!-- Sidebar  -->

        @include('frontend.layout.sidemenu')

        <!-- Content  -->

        @yield('content')

        <!-- Footer -->

        @include('frontend.layout.footer')

    </div>



    <div class="overlay"></div>



    <!-- jQuery -->

    <script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>

    <!-- Bootstrap JS -->

    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

    <!-- jQuery Custom Scroller -->

    <script src="{{asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    @yield('bottom-resource')
    @toastr_js
    @toastr_render
    <!-- search button -->

    <script>
        function openSearch() {

            document.getElementById("myOverlay").style.display = "block";

        }



        function closeSearch() {

            document.getElementById("myOverlay").style.display = "none";

        }

    </script>

    <!-- side menu -->

    <script type="text/javascript">
        $(document).ready(function () {

            $("#sidebar").mCustomScrollbar({

                theme: "minimal"

            });

            $('#dismiss, .overlay').on('click', function () {

                $('#sidebar').removeClass('active');

                $('.overlay').removeClass('active');

            });

            $('#sidebarCollapse').on('click', function () {

                $('#sidebar').addClass('active');

                $('.overlay').addClass('active');

                $('.collapse.in').toggleClass('in');

                $('a[aria-expanded=true]').attr('aria-expanded', 'false');

            });

        });

    </script>
    <script>
        $(window).on('load', function () {
            setTimeout(removeLoader, 250); //wait for page load PLUS two seconds.
        });

        function removeLoader() {
            $(".preloader").fadeOut(250, function () {
                // fadeOut complete. Remove the loading div
                $(".preloader").remove(); //makes page Selengkapnya lightweight 
            });
        }

        
        Livewire.on('confirmation', function () {
            $('#confirmation').modal("show")
            // $('.modal-backdrop').remove();
        });

        Livewire.on('closeModal', function () {
            $('#confirmation').modal("hide")
        });

    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e574b73280b5fb9"></script>
</body>

</html>
