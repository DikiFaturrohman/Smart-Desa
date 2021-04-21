@extends('frontend.layout.app')

@section('title') Login @endsection

@section('meta')@endsection

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

{{--<div class="hero-image" >
  <section class="bg-image">
    @if(Auth::guard('masyarakat')->check())
      <script>
          window.location.href = "{{route('frontend.home')}}";

</script>
@else
<div class="row no-gutters py-5">

    <div class="container">
        <div class="d-flex justify-content-center h-100">

            <div class="card" style="margin-bottom:110px" id="login-desktop">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                        {{csrf_field()}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="NIK" name="nik" value="{{old('nik')}}"
                                autocomplete="false">
                        </div>
                        @if($errors->has('nik'))
                        <small class="text-danger">{{$errors->first('nik')}}</small>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input id="pass_log_id" type="password" class="form-control" placeholder="Password"
                                name="password" autocomplete="new-password" readonly
                                onfocus="this.removeAttribute('readonly');">
                            <div class="input-group-append mata">
                                <span class="input-group-text"><i toggle="#password-field"
                                        class="fa fa-eye-slash toggle-password"></i></span>
                            </div>
                        </div>

                        @if($errors->has('password'))
                        <small class="text-danger">{{$errors->first('password')}}</small>
                        @endif
                        <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
                        <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>

                    </form>
                    <div class="links">
                        Tidak punya akun?<a href="{{route('frontend.register')}}"><strong>Daftar disini</strong></a>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <strong><a class="text-white" href="{{route('frontend.password.forgot')}}">Lupa Kata
                                Sandi?</a></strong>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endif
</section>
</div>--}}

@if(Auth::guard('masyarakat')->check())
<script>
    window.location.href = "{{route('frontend.home')}}";

</script>
@else
<div class="hero-image" id="content-desktop">
    <div class="main-section py-2">
        <div class="container">

            <div id="particles-js" id="content-desktop">
                <div class="layer" id="content-desktop">
                    <div class="container">
                        <div class="d-flex justify-content-center h-100">

                            <div class="card" style="margin-bottom:110px" id="login-desktop">
                                <div class="card-header">
                                    <h3>Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" autocomplete="off">
                                        {{csrf_field()}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="NIK" name="nik"
                                                value="{{old('nik')}}" autocomplete="false">
                                        </div>
                                        @if($errors->has('nik'))
                                        <small class="text-danger">{{$errors->first('nik')}}</small>
                                        @endif
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input id="pass_log_id" type="password" class="form-control"
                                                placeholder="Password" name="password" autocomplete="new-password">
                                            <div class="input-group-append mata">
                                                <span class="input-group-text"><i toggle="#password-field"
                                                        class="fa fa-eye-slash toggle-password"></i></span>
                                            </div>
                                        </div>

                                        @if($errors->has('password'))
                                        <small class="text-danger">{{$errors->first('password')}}</small>
                                        @endif
                                        <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
                                        <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>

                                    </form>
                                    <div class="links">
                                        Tidak punya akun?<a href="{{route('frontend.register')}}"><strong>Daftar
                                                disini</strong></a>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <br><span class="text-white">Didukung oleh :</span><br>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <img id="content-desktop" src="{{asset('public/frontend/img/support.png')}}"
                                                class="img-fluid" style="display:block;height:80px;width:auto;">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="padding:0">
                                    <div class="d-flex justify-content-center">
                                        <strong><a class="text-white" href="{{route('frontend.forgotPassword')}}">Lupa
                                                Kata Sandi?</a></strong>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container py-3 my-2 pb-4 mb-2" id="login-mobile">
    <form action="" method="post" autocomplete="off">
        {{csrf_field()}}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-id-card"></i></span>
            </div>
            <input type="text" min="0" class="form-control" placeholder="Masukan NIK KTP" name="nik"
                value="{{old('nik')}}">
        </div>
        @if($errors->has('nik'))
        <small class="text-danger">{{$errors->first('nik')}}</small>
        @endif
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
            </div>
            <input id="pass_log_id" type="password" class="form-control" placeholder="Password" name="password"
                autocomplete="new-password">
            <div class="input-group-append mata">
                <span class="input-group-text"><i toggle="#password-field"
                        class="fa fa-eye-slash toggle-password"></i></span>
            </div>
        </div>
        @if($errors->has('password'))
        <small class="text-danger">{{$errors->first('password')}}</small>
        @endif
        <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
        <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
    </form>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <img id="content-desktop" src="{{asset('public/backend/images/logo-bsre.png')}}" class="img-fluid"
                style="display:block;height:70px;width:150px;">
        </div>
    </div>
    <div class="">
        Tidak punya akun?<a href="{{route('frontend.register')}}"><strong>Daftar disini</strong></a><br>
        atau <strong><a class="" href="{{route('frontend.forgotPassword')}}">klik disini</a></strong> jika lupa kata
        sandi
    </div>
</div>
@endif
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

    .hero-image {
        max-width: 100%;
        width: 100%;
        margin: auto;
    }

    .hero-image::after {
        display: block;
        position: relative;
        background-image: linear-gradient(to bottom, rgba(255, 178, 0, 0) 0, #fff 100%);
        margin-top: -180px;
        height: 180px;
        width: 100%;
        content: '';
    }

    section.bg-image {
        background-image: url('https://c.pxhere.com/photos/01/6b/photo-34155.jpg!d');
        /*background-image: url('public/frontend/img/background-image.JPG');*/
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
    }

    .card {
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .card-header h3 {
        color: white;
    }

    .social_icon {
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span {
        width: 50px;
        background-color: #263238;
        color: #fff;
        border: 0 !important;
    }

    input:focus {
        outline: 0 0 0 0 !important;
        box-shadow: 0 0 0 0 !important;

    }

    .links {
        color: white;
    }

    .links a {
        margin-left: 4px;
    }

    .mata {
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        color: #495057;
        background-color: #fff;
    }

    canvas {
        display: block;
        align-items: center;
    }

    .main-section {
        background: transparent;
        position: relative;
    }

    .layer {
        display: inline-block;
        z-index: 99;
        position: absolute;
        top: 50%;
        left: 30%;
        margin-top: 20px;
        padding-top: 20px;
        padding-bottom: 4rem;
        transform: translateY(-50%);
    }

    #login-desktop {
        display: block
    }

    #login-mobile {
        display: none
    }

    @media(max-width:1023px) {
        #login-desktop {
            display: none
        }

        canvas {
            display: none
        }

        #login-mobile {
            display: block
        }
    }

    @media(min-width:1024px) {
        .layer {
            display: inline-block;
            z-index: 99;
            position: absolute;
            top: 60%;
            left: 30%;
            margin-top: 20px;
            padding-top: 20px;
            padding-bottom: 4rem;
            transform: translateY(-50%);
        }
    }

    @media(min-width:1280px) {
        .layer {
            display: inline-block;
            z-index: 99;
            position: absolute;
            top: 50%;
            left: 34%;
            margin-top: 20px;
            padding-top: 20px;
            padding-bottom: 4rem;
            transform: translateY(-50%);
        }
    }

    @media(min-width:1920px) {
        .layer {
            display: inline-block;
            z-index: 99;
            position: absolute;
            top: 50%;
            left: 38%;
            margin-top: 20px;
            padding-top: 20px;
            padding-bottom: 4rem;
            transform: translateY(-50%);
        }
    }

</style>

@endsection

@section('bottom-resource')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
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

    $(document).on('click', '.toggle-password', function () {

        $(this).toggleClass("fa-eye-slash fa-eye");

        var input = $("#pass_log_id");
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
    });

</script>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#1e0a0a"
            },
            "shape": {
                "type": "triangle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#000000",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "grab"
                },
                "onclick": {
                    "enable": true,
                    "mode": "repulse"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 179.82017982017982,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });

</script>
@endsection
