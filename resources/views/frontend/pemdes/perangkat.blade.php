@extends('frontend.layout.app')

@section('title') Perangkat Desa @endsection

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
		<div class="row">
				<div class="container">
					<h2 class="subjudul-home"><span class="span-judul"><a href="#">Perangkat Desa</a></span></h2>
				</div>
		</div>
		<div class="row">
				<div class="container">
						<div class="row py-2 my-2">
              @foreach($pegawai as $orang)
              <div class="col-md-4 col-xs-12">
                <div class="profile-card-4 text-center">
                  <div style="height:300px auto;object-fit:fill">
                    <img src="{{($orang->img)?asset('backend/images/pegawai/'.$orang->img):asset('backend/images/avatar/avatar-1.png')}}" class="" style="height:300px">
                  </div>                  
                  <div class="profile-content">
                    <div class="profile-name">
                      {{$orang->name}}
                      <p>{{--$orang->nip--}}</p>
                    </div>
                    <div class="profile-description"><strong>{{$orang->position}}</strong></div>
                    {{-- <!--<div class="row">
                       <div class="col-xs-4">
                          <div class="profile-overview">
                             <p>TWEETS</p>
                             <h4>1300</h4>
                          </div>
                       </div>
                       <div class="col-xs-4">
                          <div class="profile-overview">
                             <p>FOLLOWERS</p>
                             <h4>250</h4>
                          </div>
                       </div>
                       <div class="col-xs-4">
                          <div class="profile-overview">
                             <p>FOLLOWING</p>
                             <h4>168</h4>
                          </div>
                       </div>
                    </div>--> --}}
                  </div>
                </div>  
              </div>							                          
              @endforeach
						</div>
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
.profile-card-4 {
    max-width: 300px;
    background-color: #FFF;
    border-radius: 5px;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    margin: 10px auto;
    cursor: pointer;
}

.profile-card-4 img {
    transition: all 0.25s linear;
}

.profile-card-4 .profile-content {
    position: relative;
    padding: 15px;
    background-color: #FFF;
}

.profile-card-4 .profile-name {
    font-weight: bold;
    position: absolute;
    left: 0px;
    right: 0px;
    top: -70px;
    color: #FFF;
    font-size: 17px;
    -webkit-text-stroke: 1px black;
}

.profile-card-4 .profile-name p {
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 1.5px;
}

.profile-card-4 .profile-description {
    color: #777;
    font-size: 12px;
    padding: 10px;
}

.profile-card-4 .profile-overview {
    padding: 15px 0px;
}

.profile-card-4 .profile-overview p {
    font-size: 10px;
    font-weight: 600;
    color: #777;
}

.profile-card-4 .profile-overview h4 {
    color: #273751;
    font-weight: bold;
}

.profile-card-4 .profile-content::before {
    content: "";
    position: absolute;
    height: 20px;
    top: -10px;
    left: 0px;
    right: 0px;
    background-color: #FFF;
    z-index: 0;
    transform: skewY(3deg);
}

.profile-card-4:hover img {
    transform: rotate(5deg) scale(1.1, 1.1);
    filter: brightness(110%);
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
