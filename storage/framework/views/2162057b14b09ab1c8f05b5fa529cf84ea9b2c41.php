<?php $__env->startSection('title'); ?> Progress Pemohon <?php $__env->stopSection(); ?>
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
<section class="py-3">
    <div class="">
    </div>
    <div class="container">
        <h2 class="subjudul-home"><span class="span-judul">Progres Pemohon</span></h2>
        <table id="table" class="display">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Tanggal</td>
                    <td>Surat</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>           
                <?php $i=1; ?>     
                <?php $__currentLoopData = $suket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                <tr>
                    <td><?php echo e($i); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')); ?></td>
                    <td><?php echo e($data->category); ?></td>
                    <td>
                        <a class="btn btn-secondary" href="<?php echo e(route('frontend.lihatprogress',['id' => base64_encode($data->id), 'jenis_suket' => $data->jenis_suket])); ?>" title="lihat progress"><i class="fas fa-search"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="line"></div>
        
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
<script type="text/javascript">
$('#slideshow .slick').slick({
	autoplay: true,
	dots: false,
	fade: true,
	infinite: true,
	adaptiveHeight: true,
	swipe: true
});
</script>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/listprogress.blade.php ENDPATH**/ ?>