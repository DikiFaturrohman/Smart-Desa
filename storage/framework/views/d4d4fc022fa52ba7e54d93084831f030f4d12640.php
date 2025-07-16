<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php echo $__env->yieldContent('meta'); ?>

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?> <?php echo e(ucwords(strtolower(Session::get('nama_desa')))); ?> Kabupaten Subang</title>
    <link rel="shortcut icon" href="<?php echo e(asset('frontend/img/favicon.png')); ?>" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.css')); ?>">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery.mCustomScrollbar.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/all.min.css')); ?>">
    <script src="<?php echo e(asset('frontend/js/all.min.js')); ?>"></script>
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
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldContent('top-resource'); ?>
    <?php echo toastr_css(); ?>
</head>


<body>
<!--   
  	<div class="preloader">
        <div class="loading">
            <img src="<?php echo e(asset('assets/img/loading.gif')); ?>" width="250">
        </div>
    </div> -->

    <!-- Search Overlay -->
    
    <div id="myOverlay" class="overlay-search">

        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>

        <div class="overlay-content">

            <form action="<?php echo e(route('frontend.search')); ?>">

                <?php echo e(csrf_field()); ?>


                <input type="text" placeholder="Cari..." name="keyword">

                <button type="submit"><i class="fa fa-search"></i></button>

            </form>

        </div>

    </div>

    <!-- /Search Overlay -->

    <!-- Slider Banner -->

    <?php echo $__env->yieldContent('header'); ?>

    <!-- /Slider Banner -->

    <!-- Top Nav -->

    <?php echo $__env->make('frontend.layout.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- /Top Nav -->


    <div class="wrapper">

        <!-- Sidebar  -->

        <?php echo $__env->make('frontend.layout.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content  -->

        <?php echo $__env->yieldContent('content'); ?>

        <!-- Footer -->

        <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>



    <div class="overlay"></div>



    <!-- jQuery -->

    <!-- <script src="<?php echo e(asset('frontend/js/jquery-3.5.1.min.js')); ?>"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->

    <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- jQuery Custom Scroller -->

    <script src="<?php echo e(asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('bottom-resource'); ?>
    <?php echo toastr_js(); ?>
    <?php echo app('toastr')->render(); ?>
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
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=YOUR_PROPERTY_KEY&product=inline-share-buttons' async='async'></script>
</body>

</html>
<?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/layout/app.blade.php ENDPATH**/ ?>