@extends('frontend.layout.app')

@section('title') Verifikasi @endsection

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

            <h1 class="text-center">Verifikasi Akun</h1><br>

            <form action="{{route('frontend.verifikasi')}}" method="post" >
                {{csrf_field()}}				
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="hidden" name="id" value="{{Session::get('user_id')}}">
                    <input type="number" min="0" class="form-control" placeholder="Masukan kode otp" name="otp">
                </div>  
                @if($errors->has('otp'))
                <small class="text-danger">{{$errors->first('otp')}}</small>
                @endif           
                <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
				<button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
            </form>



        </div>

    </div>

</section>

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
@endsection

