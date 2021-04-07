@extends('frontend.layout.app')

@section('title') Galeri Video @endsection

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

<div class="row py-2 my-2">

    <!-- main -->

    <div class="col-lg-8 col-md-6">

        <div class="container">
            @if(count($video) == 0)
            <center>
                <h2>Belum ada data</h2>
            </center>
            @else
            @foreach($video as $row)
            <div class="sidelist shadow">
                <div class="row">
                    <div class="col-md-4 img-container">
                        <img class="img-side-fit" width="100%"
                            src="{{($row->img)?asset('backend/images/galeri/video/'.$row->img):asset('backend/images/default.jpg')}}" alt="{{($row->title)}}" />
                    </div>
                    <div class="col-md-7 px-2 py-2">
                        <small class="f1-s-3">
                            <i
                                class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y')}}&nbsp;|&nbsp;
                            <i class="fa fa-eye"></i>&nbsp;{{$row->hit}} Dilihat
                        </small>
                        <h5 class="pt-1">
                            <a href="{{route('frontend.video.detail',['slug'=>$row->slug])}}" class="">
                                {{$row->title}}
                            </a>
                        </h5>
                        <p class="text-justify f1-s-5">
                            {!!$row->description!!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
        <div class="pt-3">
            {{$video->links('frontend.layout.pagination')}}
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
                            @if(count($pengumuman)>0)
                            @foreach($pengumuman as $tabpengumuman)
                            <div class="sidelist shadow">
                                <div class="row">
                                    <div class="col-md-4 img-container">
                                        <img class="img-to-fit" width="100%"
                                            src="{{($tabpengumuman->img)?asset('backend/images/informasi/pengumuman/'.$tabpengumuman->img):asset('backend/images/default.jpg')}}"
                                            alt="{{($tabpengumuman->title)}}" />
                                    </div>
                                    <div class="col-md-7 px-2 py-2">
                                        <small class="f1-s-3">
                                            <i
                                                class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($tabpengumuman->created_at)->translatedFormat('l, d F Y')}}&nbsp;|&nbsp;
                                            <i class="fa fa-eye"></i>&nbsp;{{$tabpengumuman->hit}} Dilihat
                                        </small>
                                        <h5 class="pt-1">
                                            <a href="{{route('frontend.pengumuman.detail',['slug'=>$tabpengumuman->slug])}}"
                                                class="">
                                                {{$tabpengumuman->title}}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <center>
                                <strong>Belum ada data</strong>
                            </center>
                            @endif
                        </div>
                        <!-- agenda -->
                        <div class="tab-pane" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 mb-2 ">
                                    <div class="row py-1">
                                        <div class="col-md-12 col-sm-12">
                                            @php
                                            $i = 1;
                                            @endphp
                                            @if(count($agenda)>0)
                                            @foreach($agenda as $tabagenda)
                                            <div class="card mb-1">
                                                <div class="card-header">
                                                    <div class="row ">
                                                        <div
                                                            class="col-sm-3 py-0 my-0 pl-1 pr-1 d-flex justify-content-center align-items-center border rounded text-white shadow-sm">
                                                            <div class="align-self-center text-center my-2">
                                                                <center>
                                                                    <h2 class="py-0 my-0">
                                                                        <strong>{{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('d')}}</strong>
                                                                    </h2>
                                                                    <p class="py-0 my-0 f1-m-1">
                                                                        {{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('M y')}}
                                                                    </p>
                                                                </center>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="container">
                                                                <small class="text-white">
                                                                    <i
                                                                        class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($tabagenda->created_at)->translatedFormat('d F Y')}}&nbsp;|&nbsp;
                                                                    <i class="fa fa-eye"></i>&nbsp;{{$tabagenda->hit}}
                                                                    Dilihat
                                                                </small>
                                                                <div class="tablistjudul">
                                                                    <h5 class="judulagenda">
                                                                        <a data-toggle="collapse" href="#agenda-{{$i}}"
                                                                            aria-expanded="true"
                                                                            aria-controls="agenda-{{$i}}"
                                                                            id="head-{{$i}}" class="d-block">
                                                                            {{$tabagenda->title}}
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="agenda-{{$i}}" class="collapse" aria-labelledby="head-{{$i}}">
                                                    <div class="card-body">
                                                        <table>
                                                            <tr>
                                                                <td valign="top"><i class="fa fa-map-marker-alt"></i>
                                                                </td>
                                                                <td>&nbsp;</td>
                                                                <td valign="top">{!!$tabagenda->address!!}</td>
                                                            </tr>
                                                        </table>
                                                        <i
                                                            class="fa fa-clock"></i>&nbsp;{{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('h.i')}}
                                                        -
                                                        {{\Carbon\Carbon::parse($tabagenda->end_date)->translatedFormat('h.i')}}
                                                        WIB
                                                        <br><i class="fa fa-calendar-alt"></i>&nbsp;
                                                        {{\Carbon\Carbon::parse($tabagenda->start_date)->translatedFormat('d F Y')}}
                                                        -
                                                        {{\Carbon\Carbon::parse($tabagenda->end_date)->translatedFormat('d F Y')}}
                                                        <table>
                                                            <tr>
                                                                <td valign="top"><i class="fa fa-sticky-note"></i></td>
                                                                <td>&nbsp;</td>
                                                                <td valign="top">{!!$tabagenda->description!!}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{route('frontend.agenda.detail',['slug'=>$tabagenda->slug])}}"
                                                            class="btn btn-secondary">More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            @else
                                            <center>
                                                <strong>Belum ada data</strong>
                                            </center>
                                            @endif
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
                            @if(count($berita)>0)
                            @foreach($berita as $tabberita)
                            <div class="sidelist shadow">
                                <div class="row">
                                    <div class="col-md-4 img-container">
                                        <img class="img-to-fit" width="100%"
                                            src="{{($tabberita->img)?asset('backend/images/informasi/berita/'.$tabberita->img):asset('backend/images/default.jpg')}}"
                                            alt="{{($tabberita->title)}}" />
                                    </div>
                                    <div class="col-md-7 px-2 py-2">
                                        <small class="f1-s-3">
                                            <i
                                                class="fa fa-calendar-alt"></i>&nbsp;{{\Carbon\Carbon::parse($tabberita->created_at)->translatedFormat('l, d F Y')}}&nbsp;|&nbsp;
                                            <i class="fa fa-eye"></i>&nbsp;{{$tabberita->hit}} Dilihat
                                        </small>
                                        <h5 class="pt-1">
                                            <a href="{{route('frontend.berita.detail',['slug'=>$tabberita->slug])}}"
                                                class="">
                                                {{$tabberita->title}}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <center>
                                <strong>Belum ada data</strong>
                            </center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

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
