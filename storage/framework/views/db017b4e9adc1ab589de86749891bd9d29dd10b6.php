<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login | Desa</title>
    <link rel="shortcut icon" href="<?php echo e(asset('backend/images/favicon.png')); ?>" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-social/bootstrap-social.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/izitoast/dist/css/iziToast.min.css')); ?>">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/custom.css')); ?>">
    <style>
        body {
            background: url('/backend/images/default.jpg') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <?php echo toastr_css(); ?>
</head>

<body>
    <!-- <div class="preloader">
        <div class="loading">
            <img src="<?php echo e(asset('backend/images/loading.gif')); ?>" width="125">
            <p>Harap Tunggu</p>
        </div>
    </div> -->
    <?php if(Auth::guard('admin')->check()): ?>
    <script>
        window.location.href = "<?php echo e(route('backend.dashboard')); ?>";

    </script>
    <?php elseif(!empty($session)): ?>
        Anda Tidak Dapat Mengakses halaman ini karena telah melakukan gagal login lebih dari 3 kali
    <?php else: ?>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Halaman Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <label for="email">Email atau Username</label>
                                        <input id="email" type="text" class="form-control <?php echo e(($errors->has('username'))?'is-invalid':''); ?>" name="username"
                                            placeholder="Masukan Email atau Username" value="<?php echo e(old('username')); ?>" autofocus>
                                            <?php if($errors->has('username')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('username')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="javascript:void(0)" class="text-small">
                                                    Lupa Kata Sandi?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                        <input id="pass_log_id" type="password" class="form-control <?php echo e(($errors->has('password'))?'is-invalid':''); ?>" name="password"
                                            placeholder="Masukan password">
                                        <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary"><i toggle="#password-field" class="fas fa-eye-slash toggle-password"></i></button>
                                        </div>
                                        </div>
                                        
                                            <?php if($errors->has('password')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('password')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="refereshrecapcha"><?php echo captcha_img('flat'); ?></label>
                                        <a href="javascript:void(0)" style="padding-right:20px" onclick="refreshCaptcha()">Refresh</a>
                                        <input type="text" class="form-control <?php echo e(($errors->has('captcha'))?'is-invalid':''); ?>" name="captcha"
                                            placeholder="Masukan captcha">
                                        
                                            <?php if($errors->has('captcha')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('captcha')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <span id="pesan" class="text-danger"></span>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Masuk
                                        </button>
                                    </div>
                                </form>
                            	
                            	<center>
 				 				<div class="mt-4 mb-3">
                                <div class="text-job text-muted">Didukung oleh : </div>
                                    <img src="<?php echo e(asset('backend/images/diskominfo.png')); ?>" alt="" width="100px">
                                    <img src="<?php echo e(asset('backend/images/logo-bsre.png')); ?>" alt="" width="100px">
                            	</div>
                        </center>
                            
                        </div>
                    </div>
                </div>
        </section>
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

    <!-- JS Libraies -->
    <script src="<?php echo e(asset('backend/node_modules/izitoast/dist/js/iziToast.min.js')); ?>"></script>

    <!-- Page Specific JS File -->
    <script src="<?php echo e(asset('backend/js/page/modules-toastr.js')); ?>"></script>
    <!-- Template JS File -->
    <script src="<?php echo e(asset('backend/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/custom.js')); ?>"></script>
    <script>
        function refreshCaptcha(){
            $.ajax({
            url: "<?php echo e(route('backend.captcha')); ?>",
            type: 'get',
            dataType: 'html',        
            success: function(json) {
                $('.refereshrecapcha').html(json);
            },
            error: function(data) {
                alert('Try Again.');
            }
            });
        }
        $(document).on('click', '.toggle-password', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $("#pass_log_id");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
            });
        
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
        var url = "https://youtube.com"; // url tujuan
        var count = 10; // dalam detik
        function countDown() {
            if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#pesan').html('Anda akan di redirect ke ' + url + ' dalam ' + waktu + ' detik.');
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = url;
            }
        }
        countDown();

    </script> -->
    <!-- Page Specific JS File -->
    <!-- <script>
        $(document).ready(function () {
            $(".preloader").delay(1000).fadeOut();
        })

    </script> -->
    <?php echo toastr_js(); ?>
    <?php echo app('toastr')->render(); ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\app\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>