<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('meta')

    <title>@yield('title')</title>

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
    @livewireStyles
    @livewireScripts
    @yield('top-resource')
    @toastr_css
</head>



<body>

<!-- Search Overlay -->

	<div id="myOverlay" class="overlay-search">

	  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>

	  <div class="overlay-content">

		<form action="#" method="post">

		  <!-- {{csrf_field()}} -->

		  <input type="text" placeholder="Search.." name="search">

		  <button type="submit"><i class="fa fa-search"></i></button>

		</form>

	  </div>

	</div>

<!-- /Search Overlay -->

<!-- Slider Banner -->

<!-- /Slider Banner -->

<!-- Top Nav -->

<!-- /Top Nav -->


  <div class="wrapper">

        <!-- Sidebar  -->


        <!-- Content  -->

		    @yield('content')

        <!-- Footer -->

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



</body>

</html>

