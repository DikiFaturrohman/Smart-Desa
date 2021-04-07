@extends('frontend.layout.app')

@section('title') {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower(Session::get('nama_desa')))}} Kabupaten Subang @endsection

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

            <h1 class="text-center">Hubungi Kami</h1><br>

            <form action="{{route('frontend.hubungikami.kirim')}}" method="post">

                {{csrf_field()}}

                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-user"></i></span>

                    </div>

                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">

                </div>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>

                    </div>

                    <input type="email" class="form-control" placeholder="Email" name="email">

                </div>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-phone"></i></span>

                    </div>

                    <input type="text" class="form-control" placeholder="Telepon" name="telepon">

                </div>

                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fa fa-paperclip"></i></span>

                    </div>

                    <input type="text" class="form-control" placeholder="Subjek" name="subjek">

                </div>

                <div class="input-group mb-3">

                    <textarea class="form-control" rows="6" name="pesan"></textarea>

                </div>

                <button type="submit" class="btn btn-secondary float-right">Kirim</button>

            </form>



        </div>

    </div>

</section>

<div class="line"></div>

@endsection



@section('top-resource')

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}"/>
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

@endsection

@section('bottom-resource')

<script type="text/javascript" src="{{asset('frontend/js/slick.min.js')}}"></script>
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
@endsection

