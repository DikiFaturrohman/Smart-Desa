<?php $__env->startSection('title'); ?> Lupa Kata Sandi <?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('header'); ?>

<header id="content-desktop">
	<section id="slideshow">
	  <div class="slick">
    <?php if(count($slider) > 0): ?>
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <img src="<?php echo e(($list->img)?asset('backend/images/slider/'.$list->img):asset('backend/images/default.jpg')); ?>" class="" alt="">
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
		<h2 class="pl-5 ml-2 f1-l-1"><?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?> <?php echo e(ucwords(strtolower($lokasi->nama))); ?> Kecamatan
            <?php echo e(ucwords(strtolower($lokasi->kecamatan->nama))); ?></h2>
  </div>
</header>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<section>

    <div class="row no-gutters">

        <div class="col-lg-12 col-sm-12 px-5 py-4 bg-white wow">

            <h1 class="text-center">Lupa Kata Sandi Akun</h1><br>

            <form action="<?php echo e(route('frontend.password.reset')); ?>" method="post" >
                <?php echo e(csrf_field()); ?>				
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="number" min="0" class="form-control" placeholder="Masukan no. hp yang terdaftar" name="no_hp" value="<?php echo e(old('old_hp')); ?>">
                </div>  
                <?php if($errors->has('no_hp')): ?>
                <small class="text-danger"><?php echo e($errors->first('no_hp')); ?></small>
                <?php endif; ?>           
                <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
				<button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
            </form>



        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('top-resource'); ?>

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/slick.css')); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/slick-theme.css')); ?>"/>
<style media="screen">
#slideshow .slick div > img {
	width: 100%;
	height: 420px;
	object-fit: fill;
	position: relative;
}
.logo-holder{
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
  z-index:5;
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


<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/password.blade.php ENDPATH**/ ?>