@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Kelahiran @endsection

@section('meta')



@endsection


@section('content')

@livewire('frontend.skk-update',['surat'=>$skl]);

@endsection



@section('top-resource')

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

<style>
    div[data-acc-content] {
        display: none;
    }

    div[data-acc-step]:not(.open) {
        background: #6c757d;
    }

    div[data-acc-step]:not(.open) h5 {
        color: #fff;
    }

    div[data-acc-step]:not(.open) .badge-primary {
        background: #263238;
    }

</style>

@endsection

@section('bottom-resource')

<!-- <script src="{{asset('frontend/js/jquery.chained.min.js')}}"></script> -->
<script src="https://cdn.jsdelivr.net/gh/medabida/savy/savy.min.js"></script>

<script src="{{asset('frontend/js/jquery.accordion-wizard.min.js')}}"></script>

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



<script type="text/javascript">
    $(function () {

        $("#mainform").accWizard({

            start: 1, // start step

            mode: "wizard", // or 'edit'

            enableScrolling: true, // auto scroll the page to the current step

            scrollPadding: 5, // padding in pixels

            autoButtons: true, // auto add next/back buttons

            autoButtonsNextClass: 'btn btn-gelap float-right', // CSS classes for next/back buttons

            autoButtonsPrevClass: 'btn btn-secondary', // CSS classes for next/back buttons

            autoButtonsShowSubmit: true, // auto show submit button

            autoButtonsSubmitText: 'Submit', // submit text

            autoButtonsEditSubmitText: 'Save', // save text

            stepNumbers: true, // show step number

            stepNumberClass: 'badge badge-pill badge-gelap mr-1', // CSS class for step number



            beforeNextStep: function (currentStep) {

                return true;

            },

            onSubmit: function (element) {

                $('#mainform').submit();

            }

        });

    });

</script>

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
<!-- <script>
  $(document).ready(function() {
    $("#kota").chained("#provinsi");
    $("#kecamatan").chained("#kota");
		$("#desa").chained("#kecamatan");
  });
</script> -->


<script>
    $('.auto-save').savy('load', function () {

        console.log("All data from savy are loaded");

    });

</script>
<script>
    window.addEventListener("flutterInAppWebViewPlatformReady", function (event) {
        // call flutter handler with name 'mySum' and pass one or more arguments
        window.flutter_inappwebview.callHandler('result', true).then(function (result) {
            // get result from Flutter side. It will be the number 64.
            console.log(result);
        });
    });

</script>
<script>
    $('.provinsi_ibu').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            console.log(data)
            var kota_ibu = $('#kota_ibu')
            kota_ibu.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_ibu.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_ibu').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_ibu = $('#kecamatan_ibu')
            kecamatan_ibu.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_ibu.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_ibu').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_ibu = $('#desa_ibu')
            desa_ibu.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_ibu.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_ayah').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_ayah = $('#kota_ayah')
            kota_ayah.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_ayah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_ayah').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_ayah = $('#kecamatan_ayah')
            kecamatan_ayah.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_ayah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_ayah').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_ayah = $('#desa_ayah')
            desa_ayah.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_ayah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_pelapor').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_pelapor = $('#kota_pelapor')
            kota_pelapor.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_pelapor.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_pelapor').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_pelapor = $('#kecamatan_pelapor')
            kecamatan_pelapor.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_pelapor.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_pelapor').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_pelapor = $('#desa_pelapor')
            desa_pelapor.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_pelapor.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_saksi1').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_saksi1 = $('#kota_saksi1')
            kota_saksi1.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_saksi1.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_saksi1').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_saksi1 = $('#kecamatan_saksi1')
            kecamatan_saksi1.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_saksi1.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_saksi1').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_saksi1 = $('#desa_saksi1')
            desa_saksi1.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_saksi1.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_saksi2').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_saksi2 = $('#kota_saksi2')
            kota_saksi2.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_saksi2.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_saksi2').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_saksi2 = $('#kecamatan_saksi2')
            kecamatan_saksi2.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_saksi2.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_saksi2').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_saksi2 = $('#desa_saksi2')
            desa_saksi2.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_saksi2.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
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
@endsection
