<?php $__env->startSection('title'); ?> Surat Keterangan Usaha <?php $__env->stopSection(); ?>

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
<div class="container py-3">
    <center>
    <h3>Halaman Unggah Dokumen</h3>
    </center>
    
    <div class="line"></div>
    <!-- content -->
    <form action="<?php echo e(route('frontend.unggah.proses')); ?>" method="post" enctype="multipart/form-data" id="mainform">
        <?php echo e(csrf_field()); ?>

        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto KTP</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="file_ktp" id="file_ktp"  accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_ktp">Unggah File</label>
                    <?php if($errors->has('file_ktp')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_ktp')); ?></small>
                    <?php endif; ?>
                </div>
                <img src="<?php echo e(($unggah)?asset('storage/backend/images/uploads/'.$unggah->file_ktp):asset('backend/images/default.jpg')); ?>"
                    id="preview-file_ktp" alt="" width="200px" style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Kartu Keluarga</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    <?php if($errors->has('file_kk')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_kk')); ?></small>
                    <?php endif; ?>
                </div>
                <img src="<?php echo e(($unggah)?asset('storage/backend/images/uploads/'.$unggah->file_kk):asset('backend/images/default.jpg')); ?>"
                    id="preview-file_kk" alt="" width="200px" style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" id="tes" class="btn btn-gelap float-right"><?php echo e(($unggah)?'Ubah':'Simpan'); ?></button>
            </div>
        </div>
    </form>
    <br />
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<style media="screen">
    #slideshow .slick div>img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        position: relative;
    }

    .logo-holder {
        width: auto;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.1.0/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/gh/medabida/savy/savy.min.js"></script>

<!-- Slick -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
    })

</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgId = '#preview-' + $(input).attr('id');
                $(imgId).attr('src', e.target.result);
                // $('.uploading1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    // CKEDITOR.replace('ckeditor');
    $("form#mainform input[type='file']").change(function () {
        readURL(this);
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/unggah.blade.php ENDPATH**/ ?>