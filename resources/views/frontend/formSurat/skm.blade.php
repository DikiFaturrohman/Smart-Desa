@extends('frontend.layout.app')

@section('title') Surat Keterangan Kematian @endsection

@section('meta')



@endsection



@section('header')

<header id="content-desktop">

    <section id="slideshow">

        <div class="slick">

            @if(count($slider) > 0)
            @foreach($slider as $list)
            <div>
                <img src="{{($list->img)?asset('backend/images/slider/'.$list->img):asset('backend/images/default.jpg')}}"
                    class="" alt="">
            </div>
            @endforeach
            @else
            <div>
                <img src="{{asset('frontend/img/background-header.png')}}" class="" alt="">
            </div>
            <div>
                <img src="{{asset('frontend/img/background-header2.png')}}" class="" alt="">
            </div>
            <div>
                <img src="{{asset('frontend/img/background-header3.png')}}" class="" alt="">
            </div>
            @endif

        </div>

    </section>

    <div class="logo-holder">

        <img src="{{asset('frontend/img/logoweb.png')}}" alt="">

        <h2 class="pl-5 ml-2 f1-l-1">{{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}
            {{ucwords(strtolower($lokasi->nama))}} Kecamatan
            {{ucwords(strtolower($lokasi->kecamatan->nama))}}</h2>

    </div>

</header>

@endsection

@section('content')

@livewire('frontend.skm-create')

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

<script src="https://cdn.jsdelivr.net/gh/medabida/savy/savy.min.js"></script>

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
