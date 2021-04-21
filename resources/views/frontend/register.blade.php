@extends('frontend.layout.app')

@section('title') Registrasi @endsection

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

<section class="text-center">

    <div class="row no-gutters" >

        <div class="col-lg-12 col-sm-12 px-5 py-4 bg-white wow ">

            <h1 class="text-center">Registrasi</h1><br>

            <form action="" method="post" autocomplete="off">

                {{csrf_field()}}

                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control {{$errors->has('nik')?'is-invalid':''}}" placeholder="NIK" name="nik" value="{{old('nik')}}">

                </div>

                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}" placeholder="Nama Lengkap" name="nama"
                        value="{{old('nama')}}">

                </div>

                @if($errors->has('email'))
                <small class="text-danger">{{$errors->first('email')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="Email Anda" name="email"
                        value="{{old('email')}}">

                </div>

                @if($errors->has('password'))
                <small class="text-danger">{{$errors->first('password')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Password" name="password">

                </div>

                @if($errors->has('confirmation_password'))
                <small class="text-danger">{{$errors->first('confirmation_password')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control {{$errors->has('confirmation_password')?'is-invalid':''}}" placeholder="Konfirmasi Password"
                        name="confirmation_password">

                </div>

                @if($errors->has('no_telpon'))
                <small class="text-danger">{{$errors->first('no_telpon')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control {{$errors->has('no_telpon')?'is-invalid':''}}" placeholder="Nomor Telepon" name="no_telpon"
                        value="{{old('no_telpon')}}">

                </div>

                @if($errors->has('tgl_lahir'))
                <small class="text-danger">{{$errors->first('tgl_lahir')}}</small>
                @endif
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control {{$errors->has('tgl_lahir')?'is-invalid':''}}" placeholder="Tanggal Lahir" name="tgl_lahir"
                        value="{{old('tgl_lahir')}}">

                </div>

                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
                <div class="input-group mb-3">
                    <textarea class="form-control {{$errors->has('alamat')?'is-invalid':''}}" rows="6" name="alamat"
                        placeholder="Masukan Alamat Lengkap">{{old('alamat')}}</textarea>
                </div>

                <span>Sudah punya akun? <a href="{{route('frontend.login')}}">Login Disini</a></span>
                <button type="submit" class="btn btn-secondary ml-2 float-right">Submit</button>
                <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
            </form>



        </div>

    </div>

</section>

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
@endsection
