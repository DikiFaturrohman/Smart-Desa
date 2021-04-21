@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Kematian @endsection

@section('meta')



@endsection


@section('content')

@livewire('frontend.skm-update',['surat'=>$skm]);

@endsection



@section('top-resource')

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}" />

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}" />

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

<script src="{{asset('frontend/js/savy.min.js')}}"></script>

<script src="{{asset('frontend/js/jquery.accordion-wizard.min.js')}}"></script>

<!-- Slick -->

<script type="text/javascript" src="{{asset('frontend/js/slick.min.js')}}"></script>

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
    $('.auto-save').savy('load', function () {

        console.log("All data from savy are loaded");

    });

</script>

<script>
    // Add the following code if you want the name of the file appear on select

    $(".custom-file-input").on("change", function () {

        var fileName = $(this).val().split("\\").pop();

        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

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
