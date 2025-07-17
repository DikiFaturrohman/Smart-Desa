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
<section class="py-3">
    <div class="">
    </div>
    <div class="container">
        <h2 class="subjudul-home"><span class="span-judul">Progres Pemohon</span></h2>

        <?php if(count($progress) > 0): ?>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="tracking-pre"></div>
                <div id="tracking">
                    <div class="text-center tracking-status-proses">
                        <p class="tracking-status text-tight">
                            <?php if($suket == 'sku'): ?>
                            <strong>Surat Keterangan Usaha</strong>
                            <?php elseif($suket == 'skp'): ?>
                            <strong>Surat Keterangan Penghasilan</strong>
                            <?php elseif($suket == 'skrt'): ?>
                            <strong>Surat Keterangan Riwayat Tanah</strong>
                            <?php elseif($suket == 'skn'): ?>
                            <strong>Surat Keterangan Status Pernikahan</strong>
                            <?php elseif($suket == 'skm'): ?>
                            <strong>Surat Keterangan Kematian</strong>
                            <?php elseif($suket == 'skk'): ?>
                            <strong>Surat Keterangan Kelahiran</strong>
                            <?php elseif($suket == 'skbn'): ?>
                            <strong>Surat Keterangan Beda Nama</strong>
                            <?php elseif($suket == 'sktm'): ?>
                            <strong>Surat Keterangan Tidak Mampu</strong>
                            <?php elseif($suket == 'skaw'): ?>
                            <strong>Surat Keterangan Ahli Waris</strong>
                            <?php else: ?>
                            <strong>Surat Keterangan Sapu Jagad</strong>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="tracking-list">
                        <?php if(!empty($user)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-selesai">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="tracking-date">
                                <?php echo e(\Carbon\Carbon::parse($user->updated_at)->translatedFormat('d F Y')); ?><span><?php echo e(\Carbon\Carbon::parse($user->updated_at)->translatedFormat('H:i')); ?></span>
                            </div>
                            <div class="tracking-content">USER
                                <span><?php echo e($user->pesan); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($operator)): ?>
                        <?php if($operator->status == 'tolak'): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-gagal">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">OPERATOR DESA
                                <?php if($jenis_suket == 'sku'): ?>
                                <?php $suket = 'usaha'; ?>
                                <?php elseif($jenis_suket == 'sktm'): ?>
                                <?php $suket = 'tidakMampu'; ?>
                                <?php elseif($jenis_suket == 'skm'): ?>
                                <?php $suket = 'kematian'; ?>
                                <?php elseif($jenis_suket == 'skk'): ?>
                                <?php $suket = 'skl'; ?>
                                <?php elseif($jenis_suket == 'skp'): ?>
                                <?php $suket = 'penghasilan'; ?>
                                <?php elseif($jenis_suket == 'skn'): ?>
                                <?php $suket = 'status'; ?>
                                <?php elseif($jenis_suket == 'skbn'): ?>
                                <?php $suket = 'bedanama'; ?>
                                <?php elseif($jenis_suket == 'skrt'): ?>
                                <?php $suket = 'tanah'; ?>
                                <?php elseif($jenis_suket == 'skaw'): ?>
                                <?php $suket = 'ahliwaris'; ?>
                                <?php else: ?>
                                <?php $suket = 'sapujagad'; ?>
                                <?php endif; ?>
                                <span><?php echo e($operator->pesan); ?></span>
                                <span class="text-danger"><a
                                        href="<?php echo e(route('frontend.suket.'.$suket.'.edit',['id' => base64_encode($suket_id)])); ?>">Perbaiki</a></span>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-selesai">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="tracking-date">
                                <?php echo e(\Carbon\Carbon::parse($operator->updated_at)->translatedFormat('d F Y')); ?><span><?php echo e(\Carbon\Carbon::parse($operator->updated_at)->translatedFormat('H:i')); ?></span>
                            </div>
                            <div class="tracking-content">OPERATOR DESA
                                <span><?php echo e($operator->pesan); ?></span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php else: ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-proses">
                                <i class="fas fa-clock"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">OPERATOR DESA
                                <span>Dalam Proses Verifikasi Operator Desa</span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($kasi)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-selesai">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="tracking-date">
                                <?php echo e(\Carbon\Carbon::parse($kasi->updated_at)->translatedFormat('d F Y')); ?><span><?php echo e(\Carbon\Carbon::parse($kasi->updated_at)->translatedFormat('H:i')); ?></span>
                            </div>
                            <div class="tracking-content">KASI DESA
                                <span><?php echo e($kasi->pesan); ?></span>
                            </div>
                        </div>
                        <?php elseif(empty($operator) || $operator->status == 'tolak'): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-intransit">
                                <i class="fas fa-circle"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">KASI DESA
                                <span>Menunggu Data</span>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-proses">
                                <i class="fas fa-clock"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">KASI DESA
                                <span>Dalam Verifikasi Kasi Desa</span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($sekdes)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-selesai">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="tracking-date">
                                <?php echo e(\Carbon\Carbon::parse($sekdes->updated_at)->translatedFormat('d F Y')); ?><span><?php echo e(\Carbon\Carbon::parse($sekdes->updated_at)->translatedFormat('H:i')); ?></span>
                            </div>
                            <div class="tracking-content">SEKRETARIS DESA
                                <span><?php echo e($sekdes->pesan); ?></span>
                            </div>
                        </div>
                        <?php elseif(empty($kasi)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-intransit">
                                <i class="fas fa-circle"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">SEKRETARIS DESA
                                <span>Menunggu Data</span>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-proses">
                                <i class="fas fa-clock"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">SEKRETARIS DESA
                                <span>Dalam Proses Verifikasi Sekretaris Desa</span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($kades)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-selesai">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="tracking-date">
                                <?php echo e(\Carbon\Carbon::parse($kades->updated_at)->translatedFormat('d F Y')); ?><span><?php echo e(\Carbon\Carbon::parse($kades->updated_at)->translatedFormat('H:i')); ?></span>
                            </div>
                            <div class="tracking-content">KEPALA DESA
                                <span><?php echo e($kades->pesan); ?></span>
                            </div>
                        </div>
                        <?php elseif(empty($sekdes)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-intransit">
                                <i class="fas fa-circle"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">KEPALA DESA
                                <span>Menunggu Data</span>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-proses">
                                <i class="fas fa-clock"></i>
                            </div>
                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->
                            <div class="tracking-content">KEPALA DESA
                                <span>Dalam Proses Verifikasi Kepala Desa</span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($kades)): ?>
                        <div class="tracking-item">
                            <div class="tracking-icon status-selesai">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="tracking-date">
                                <?php echo e(\Carbon\Carbon::parse($kades->updated_at)->translatedFormat('d F Y')); ?><span><?php echo e(\Carbon\Carbon::parse($kades->updated_at)->translatedFormat('H:i')); ?></span>
                            </div>
                            <div class="tracking-content">SELESAI
                                <span class="text-success"><a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#exampleModal">Preview</a></span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <center>Data Tidak Ditemukan</center>
        <?php endif; ?>
    </div>
</section>
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pratinjau Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="<?php echo e($url); ?>" frameborder="0" width="100%" height="450px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="<?php echo e($url); ?>" download="<?php echo e($dokumen->dokumen); ?>" type="button" class="btn btn-success" id="download">Download</a>
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
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
    $('#download').click(function(){
        $('#exampleModal').modal('hide')
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/progress.blade.php ENDPATH**/ ?>