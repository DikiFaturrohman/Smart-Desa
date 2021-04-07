@extends('frontend.layout.app')

@section('title') Visi dan Misi @endsection

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

<section class="py-4">
	<div class="container">
		@if(count($profil) > 0)
		@foreach($profil as $data)
		<div class="row">
				<div class="container">
					<h2 class="subjudul-home"><span class="span-judul"><a href="#">Visi</a></span></h2>
				</div>
		</div>
		<div class="row mb-2">
				<div class="container">
						<div>
							{!! $data->visi !!}
						</div>
				</div>
		</div>

		<div class="row">
				<div class="container">
					<h2 class="subjudul-home"><span class="span-judul"><a href="#">Misi</a></span></h2>
				</div>
		</div>
		<div class="row pt-2">
				<div class="container">
						<div>
							{!! $data->misi !!}
						</div>
				</div>
		</div>
		@endforeach
		@else
		<h3>Belum Ada Data</h3>
		@endif
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
