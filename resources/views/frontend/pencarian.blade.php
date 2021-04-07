@extends('frontend.layout.app')

@section('title') Hasil Pencarian @endsection

@section('meta')



@endsection



@section('header')

<header id="content-desktop">
    <section id="slideshow">
        <div class="slick">
        @if(count($slider) > 0)
            @foreach($slider as $list)
            <div>
                <img src="{{($list->img)?asset('backend/images/slider/'.$list->img):asset('backend/images/default.jpg')}}" class="" alt="">
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
        <h2 class="pl-5 ml-2 f1-l-1">{{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower($lokasi->nama))}} Kecamatan
            {{ucwords(strtolower($lokasi->kecamatan->nama))}}</h2>
    </div>
</header>

@endsection



@section('content')

<section>

    <div class="row no-gutters">

        <div class="col-lg-12 col-sm-12 px-5 py-4 bg-white wow">

            <h4 class="text-center">Hasil Pencarian dengan kata kunci : <b><u>{{$keyword}}</u></b></h4><br>

            <div class="container">
                @if(count($results) > 0)
                @foreach($results as $row)
                <div class="sidelist shadow">

                    <div class="row">
                    <div class="col-md-4 img-container">

                        <img class="" width="100px" height="100px"
                            src="{{($row->img)?asset('backend/images/informasi/'.$row->tabel.'/'.$row->img):asset('backend/images/default.jpg')}}"
                            alt="{{($row->title)}}" />

                        </div>
                        <div class="col-md-7 px-2 py-2">

                            <small class="f1-s-3">

                                <a href="{{route('frontend.'.$row->tabel.'.detail',['slug' => $row->slug])}}">{{route('frontend.'.$row->tabel.'.detail',['slug' => $row->slug])}}</a>

                            </small>

                            <h5 class="pt-1">

                                <a href="{{route('frontend.'.$row->tabel.'.detail',['slug' => $row->slug])}}" class="">

                                    {{$row->title}}

                                </a>

                            </h5>

                            <p class="text-justify f1-s-5">

                                {{$row->content}}

                            </p>

                        </div>

                    </div>

                </div>

                @endforeach
                @else
                <center>
                    <h3>Data tidak ditemukan dengan kata kunci <b>{{$keyword}}</b></h3>
                </center>
                @endif

            </div>
        </div>

    </div>

</section>

<div class="line"></div>

@endsection



@section('top-resource')

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}" />
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

@endsection

@section('bottom-resource')

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
@endsection
