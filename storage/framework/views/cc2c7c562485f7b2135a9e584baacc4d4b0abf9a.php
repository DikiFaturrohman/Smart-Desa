<?php $__env->startSection('title'); ?> Registrasi <?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('header'); ?>

<header id="content-desktop">
    <section id="slideshow">
        <div class="slick">
            <?php if(count($slider) > 0): ?>
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <img src="<?php echo e(($list->img)?asset('backend/images/slider/'.$list->img):asset('backend/images/default.jpg')); ?>"
                    class="" alt="">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div>
                <img src="<?php echo e(asset('frontend/img/background-header.png')); ?>" class="" alt="">
            </div>
            <div>
                <img src="<?php echo e(asset('frontend/img/background-header2.png')); ?>" class="" alt="">
            </div>
            <div>
                <img src="<?php echo e(asset('frontend/img/background-header3.png')); ?>" class="" alt="">
            </div>
            <?php endif; ?>
        </div>
    </section>
    <div class="logo-holder">
        <img src="<?php echo e(asset('frontend/img/logoweb.png')); ?>" alt="">
        <h2 class="pl-5 ml-2 f1-l-1"><?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?>

            <?php echo e(ucwords(strtolower($lokasi->nama))); ?> Kecamatan
            <?php echo e(ucwords(strtolower($lokasi->kecamatan->nama))); ?></h2>
    </div>
</header>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<section class="text-center">

    <div class="row no-gutters" >

        <div class="col-lg-12 col-sm-12 px-5 py-4 bg-white wow ">

            <h1 class="text-center">Registrasi</h1><br>

            <form action="" method="post" autocomplete="off">

                <?php echo e(csrf_field()); ?>


                <?php if($errors->has('nik')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control <?php echo e($errors->has('nik')?'is-invalid':''); ?>" placeholder="NIK" name="nik" value="<?php echo e(old('nik')); ?>">

                </div>

                <?php if($errors->has('nama')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control <?php echo e($errors->has('nama')?'is-invalid':''); ?>" placeholder="Nama Lengkap" name="nama"
                        value="<?php echo e(old('nama')); ?>">

                </div>

                <?php if($errors->has('email')): ?>
                <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control <?php echo e($errors->has('email')?'is-invalid':''); ?>" placeholder="Email Anda" name="email"
                        value="<?php echo e(old('email')); ?>">

                </div>

                <?php if($errors->has('password')): ?>
                <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control <?php echo e($errors->has('password')?'is-invalid':''); ?>" placeholder="Password" name="password">

                </div>

                <?php if($errors->has('confirmation_password')): ?>
                <small class="text-danger"><?php echo e($errors->first('confirmation_password')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control <?php echo e($errors->has('confirmation_password')?'is-invalid':''); ?>" placeholder="Konfirmasi Password"
                        name="confirmation_password">

                </div>

                <?php if($errors->has('no_telpon')): ?>
                <small class="text-danger"><?php echo e($errors->first('no_telpon')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control <?php echo e($errors->has('no_telpon')?'is-invalid':''); ?>" placeholder="Nomor Telepon" name="no_telpon"
                        value="<?php echo e(old('no_telpon')); ?>">

                </div>

                <?php if($errors->has('tgl_lahir')): ?>
                <small class="text-danger"><?php echo e($errors->first('tgl_lahir')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control <?php echo e($errors->has('tgl_lahir')?'is-invalid':''); ?>" placeholder="Tanggal Lahir" name="tgl_lahir"
                        value="<?php echo e(old('tgl_lahir')); ?>">

                </div>

                <?php if($errors->has('alamat')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat')); ?></small>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <textarea class="form-control <?php echo e($errors->has('alamat')?'is-invalid':''); ?>" rows="6" name="alamat"
                        placeholder="Masukan Alamat Lengkap"><?php echo e(old('alamat')); ?></textarea>
                </div>

                <span>Sudah punya akun? <a href="<?php echo e(route('frontend.login')); ?>">Login Disini</a></span>
                <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
                <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
            </form>



        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('top-resource'); ?>
<!-- Slick -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/slick.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/slick-theme.css')); ?>" />
<style media="screen">
    #slideshow .slick div>img {
        width: 100%;
        height: 420px;
        object-fit: fill;
        position: relative;
    }

    .logo-holder {
        width: auto;
        /* height: 350px; */
        height: auto;
        background: transparent;
        color: white;
        text-shadow: 2px 2px 6px #444;
        -webkit-text-stroke: 1px black;
        position: absolute;
        top: 20px;
        left: 25px;
        z-index: 5;
    }

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">
    $('#slideshow .slick').slick({
        autoplay: true,
        dots: false,
        fade: false,
        infinite: true,
        adaptiveHeight: false,
        loop: true,
        swipe: true
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/register.blade.php ENDPATH**/ ?>