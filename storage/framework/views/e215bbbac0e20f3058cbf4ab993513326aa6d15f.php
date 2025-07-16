<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('backend/images/favicon.png')); ?>" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/jqvmap/dist/jqvmap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/summernote/dist/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css')); ?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/components.css')); ?>">
    <?php echo $__env->yieldContent('top-resource'); ?>
    <?php echo toastr_css(); ?>
</head>

<body>
    <!-- <div class="preloader">
        <div class="loading">
            <img src="<?php echo e(asset('backend/images/loading.gif')); ?>" width="125">
            <p>Harap Tunggu</p>
        </div>
    </div> -->
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?php echo $__env->make('backend.shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="main-sidebar">
                <?php echo $__env->make('backend.shared.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('backend.shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo e(asset('backend/js/stisla.js')); ?>"></script>
    <?php echo $__env->yieldContent('bottom-resource'); ?>

    <!-- JS Libraies -->
    <script src="<?php echo e(asset('backend/node_modules/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/node_modules/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/node_modules/owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/node_modules/summernote/dist/summernote-bs4.js')); ?>"></script>
    <!-- Template JS File -->
    <script src="<?php echo e(asset('backend/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/custom.js')); ?>"></script>
    <!-- Page Specific JS File -->
    <!-- <script src="<?php echo e(asset('backend/js/page/index-0.js')); ?>"></script> -->
    <script>
        $('.table-1').DataTable()

    </script>
	<script>
         $(document).on('click','button.btn-primary',function(){
            $('button.btn-primary').addClass('disabled btn-progress')
			setTimeout(function() {
    		$('button.btn-primary').removeClass('disabled btn-progress')
  			}, 10000);
        })

    </script>    
<!-- <script>
        $(document).ready(function () {
            $(".preloader").delay(1000).fadeOut();
        })

    </script> -->
    <?php echo toastr_js(); ?>
    <?php echo app('toastr')->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>