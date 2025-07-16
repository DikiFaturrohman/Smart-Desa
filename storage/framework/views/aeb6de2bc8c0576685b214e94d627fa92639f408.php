<?php $__env->startSection('title'); ?> Berita Desa <?php $__env->stopSection(); ?>

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

<div class="row py-2 my-2">

    <!-- main -->

    <div class="col-lg-8 col-md-6">

        <div class="container">
            <?php if(count($beritas) > 0): ?>
            <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="sidelist shadow">

                <div class="row">

                    <div class="col-md-4 img-container">

                        <img class="img-side-fit" width="100%"
                            src="<?php echo e(($row->img)?asset('backend/images/informasi/berita/'.$row->img):asset('backend/images/default.jpg')); ?>"
                            alt="<?php echo e(($row->title)); ?>" />

                    </div>

                    <div class="col-md-7 px-2 py-2">

                        <small class="f1-s-3">

                            <i
                                class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y')); ?>&nbsp;|&nbsp;

                            <i class="fa fa-eye"></i>&nbsp;<?php echo e($row->hit); ?> Dilihat

                        </small>

                        <h5 class="pt-1">

                            <a href="<?php echo e(route('frontend.berita.detail',['slug'=>$row->slug])); ?>" class="">

                                <?php echo e($row->title); ?>


                            </a>

                        </h5>

                        <p class="text-justify f1-s-5">

                            <?php echo e($row->short_content); ?>&nbsp;<a
                                href="<?php echo e(route('frontend.berita.detail',['slug'=>$row->slug])); ?>"
                                class="badge badge-secondary">Selengkapnya....</a>

                        </p>

                    </div>

                </div>

            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <center>
                <h2>Belum ada data</h2>
            </center>
            <?php endif; ?>

        </div>

        <div class="pt-3">

            <?php echo e($beritas->links('frontend.layout.pagination')); ?>


        </div>

        <div class="line" id="content-mobile"></div>

    </div>

    <!-- aside -->
    <div class="col-lg-4 col-md-6">
        <div class="container">
            <!-- agenda pengumuman -->
            <div class="card pb-1 mb-4 shadow-sm">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="side-list" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#pengumuman" role="tab" aria-controls="pengumuman"
                                aria-selected="true">Pengumuman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#agenda" role="tab" aria-controls="agenda"
                                aria-selected="false">Agenda</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-3">
                        <!-- pengumuman -->
                        <div class="tab-pane active" id="pengumuman" role="tabpanel">
                            <?php if(count($pengumuman)>0): ?>
                            <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabpengumuman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sidelist shadow">
                                <div class="row">
                                    <div class="col-md-4 img-container">
                                        <img class="img-to-fit" width="100%"
                                            src="<?php echo e(($tabpengumuman->img)?asset('backend/images/informasi/pengumuman/'.$tabpengumuman->img):asset('backend/images/default.jpg')); ?>"
                                            alt="<?php echo e(($tabpengumuman->title)); ?>" />
                                    </div>
                                    <div class="col-md-7 px-2 py-2">
                                        <small class="f1-s-3">
                                            <i
                                                class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($tabpengumuman->created_at)->translatedFormat('l, d F Y')); ?>&nbsp;|&nbsp;
                                            <i class="fa fa-eye"></i>&nbsp;<?php echo e($tabpengumuman->hit); ?> Dilihat
                                        </small>
                                        <h5 class="pt-1">
                                            <a href="<?php echo e(route('frontend.pengumuman.detail',['slug'=>$tabpengumuman->slug])); ?>"
                                                class="">
                                                <?php echo e($tabpengumuman->title); ?>

                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <center>
                                <strong>Belum ada data</strong>
                            </center>
                            <?php endif; ?>
                        </div>
                        <!-- agenda -->
                        <div class="tab-pane" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 mb-2 ">
                                    <div class="row py-1">
                                        <div class="col-md-12 col-sm-12">
                                            <?php
                                            $i = 1;
                                            ?>
                                            <?php if(count($agenda)>0): ?>
                                            <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabagenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card mb-1">
                                                <div class="card-header">
                                                    <div class="row ">
                                                        <div
                                                            class="col-sm-3 py-0 my-0 pl-1 pr-1 d-flex justify-content-center align-items-center border rounded text-white shadow-sm">
                                                            <div class="align-self-center text-center my-2">
                                                                <center>
                                                                    <h2 class="py-0 my-0">
                                                                        <strong><?php echo e(\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('d')); ?></strong>
                                                                    </h2>
                                                                    <p class="py-0 my-0 f1-m-1">
                                                                        <?php echo e(\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('M y')); ?>

                                                                    </p>
                                                                </center>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="container">
                                                                <small class="text-white">
                                                                    <i
                                                                        class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($tabagenda->created_at)->translatedFormat('d F Y')); ?>&nbsp;|&nbsp;
                                                                    <i class="fa fa-eye"></i>&nbsp;<?php echo e($tabagenda->hit); ?>

                                                                    Dilihat
                                                                </small>
                                                                <div class="tablistjudul">
                                                                    <h5 class="judulagenda">
                                                                        <a data-toggle="collapse" href="#agenda-<?php echo e($i); ?>"
                                                                            aria-expanded="true"
                                                                            aria-controls="agenda-<?php echo e($i); ?>"
                                                                            id="head-<?php echo e($i); ?>" class="d-block">
                                                                            <?php echo e($tabagenda->title); ?>

                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="agenda-<?php echo e($i); ?>" class="collapse" aria-labelledby="head-<?php echo e($i); ?>">
                                                    <div class="card-body">
                                                        <table>
                                                            <tr>
                                                                <td valign="top"><i class="fa fa-map-marker-alt"></i>
                                                                </td>
                                                                <td>&nbsp;</td>
                                                                <td valign="top"><?php echo $tabagenda->address; ?></td>
                                                            </tr>
                                                        </table>
                                                        <i
                                                            class="fa fa-clock"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('h.i')); ?>

                                                        -
                                                        <?php echo e(\Carbon\Carbon::parse($tabagenda->end_date)->translatedFormat('h.i')); ?>

                                                        WIB
                                                        <br><i class="fa fa-calendar-alt"></i>&nbsp;
                                                        <?php echo e(\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('d F Y')); ?>

                                                        -
                                                        <?php echo e(\Carbon\Carbon::parse($tabagenda->end_date)->translatedFormat('d F Y')); ?>

                                                        <table>
                                                            <tr>
                                                                <td valign="top"><i class="fa fa-sticky-note"></i></td>
                                                                <td>&nbsp;</td>
                                                                <td valign="top"><?php echo $tabagenda->description; ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="<?php echo e(route('frontend.agenda.detail',['slug'=>$tabagenda->slug])); ?>"
                                                            class="btn btn-secondary">More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <center>
                                                <strong>Belum ada data</strong>
                                            </center>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- berita artikel -->
            <div class="card pb-1 mb-4 shadow-sm">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="side-list2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#berita" role="tab" aria-controls="berita"
                                aria-selected="true">Berita</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-3">
                        <!-- berita -->
                        <div class="tab-pane active" id="berita" role="tabpanel">
                            <?php if(count($berita)>0): ?>
                            <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabberita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sidelist shadow">
                                <div class="row">
                                    <div class="col-md-4 img-container">
                                        <img class="img-to-fit" width="100%"
                                            src="<?php echo e(($tabberita->img)?asset('backend/images/informasi/berita/'.$tabberita->img):asset('backend/images/default.jpg')); ?>"
                                            alt="<?php echo e(($tabberita->title)); ?>" />
                                    </div>
                                    <div class="col-md-7 px-2 py-2">
                                        <small class="f1-s-3">
                                            <i
                                                class="fa fa-calendar-alt"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($tabberita->created_at)->translatedFormat('l, d F Y')); ?>&nbsp;|&nbsp;
                                            <i class="fa fa-eye"></i>&nbsp;<?php echo e($tabberita->hit); ?> Dilihat
                                        </small>
                                        <h5 class="pt-1">
                                            <a href="<?php echo e(route('frontend.berita.detail',['slug'=>$tabberita->slug])); ?>"
                                                class="">
                                                <?php echo e($tabberita->title); ?>

                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <center>
                                <strong>Belum ada data</strong>
                            </center>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

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

<script type="text/javascript">
    $('#side-list a').on('click', function (e) {

        e.preventDefault()

        $(this).tab('show')

    });

    $('#side-list2 a').on('click', function (e) {

        e.preventDefault()

        $(this).tab('show')

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/frontend/berita/list.blade.php ENDPATH**/ ?>