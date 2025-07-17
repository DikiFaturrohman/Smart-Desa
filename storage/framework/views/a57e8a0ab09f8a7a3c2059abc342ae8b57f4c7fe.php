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
        <h2 class="pl-5 ml-2 f1-l-1"><?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?> <?php echo e(ucwords(strtolower($lokasi->nama))); ?> Kecamatan
            <?php echo e(ucwords(strtolower($lokasi->kecamatan->nama))); ?></h2>
    </div>
</header>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.sku-create')->html();
} elseif ($_instance->childHasBeenRendered('6qeaf1N')) {
    $componentId = $_instance->getRenderedChildComponentId('6qeaf1N');
    $componentTag = $_instance->getRenderedChildComponentTagName('6qeaf1N');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6qeaf1N');
} else {
    $response = \Livewire\Livewire::mount('frontend.sku-create');
    $html = $response->html();
    $_instance->logRenderedChild('6qeaf1N', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

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
<script>    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script>
  $('.auto-save').savy('load', function () {
    console.log("All data from savy are loaded");
  });
</script>


<script type="text/javascript">
    $('#reset').on('click', function () {
        $('.auto-save').savy('destroy');
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
<!-- <script>
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

</script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/formSurat/sku.blade.php ENDPATH**/ ?>