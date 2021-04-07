@extends('frontend.layout.app')

@section('title') Progres Pemohon @endsection

@section('meta')



@endsection



@section('header')

<header id="content-desktop">

    <section id="slideshow">
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

    </section>

    <div class="logo-holder">

        <img src="{{asset('frontend/img/logoweb.png')}}" alt="">

        <h2 class="pl-5 ml-2 f1-l-1">Desa Subang Kecamatan Subang</h2>

    </div>

</header>

@endsection



@section('content')

<section class="py-3">

    <div class="">



    </div>

    <div class="container">

        <h2 class="subjudul-home"><span class="span-judul">Progres Pemohon</span></h2>

        <form class="py-2 my-1" action="{{route('frontend.progress.proses')}}" method="post">
            @csrf
            <div class="row">

                <div class="col-lg-6 col-md-7 col-xs-7" style="margin:5px">

                    <input type="number" min="0" class="form-control" name="suket_id" placeholder="Masukkan No/ID Surat"
                        value="{{old('suket_id',$suket_id)}}">
                    @if($errors->has('suket_id'))
                    <small class="text-danger">{{$errors->first('suket_id')}}</small>
                    @endif
                </div>

                <div class="col-lg-4 col-md-4 col-xs-4" style="margin:5px">

                    <select id="" name="jenis_suket" class="auto-save form-control">

                        <option value="">Pilih Kategori Surat</option>
                        <option value="skk" {{(old('suket_id',$jenis_suket)=='skk')?'selected':''}}>Surat Keterangan
                            Kelahiran</option>
                        <option value="skm" {{(old('suket_id',$jenis_suket)=='skm')?'selected':''}}>Surat Keterangan
                            Kematian</option>
                        <option value="skbn" {{(old('suket_id',$jenis_suket)=='skbn')?'selected':''}}>Surat Keterangan
                            Beda Nama</option>
                        <option value="sktm" {{(old('suket_id',$jenis_suket)=='sktm')?'selected':''}}>Surat Keterangan
                            Tidak Mampu</option>
                        <option value="skrt" {{(old('suket_id',$jenis_suket)=='skrt')?'selected':''}}>Surat Keterangan
                            Riwayat Tanah</option>
                        <option value="skaw" {{(old('suket_id',$jenis_suket)=='skaw')?'selected':''}}>Surat Keterangan
                            Ahli Waris</option>
                        <option value="skp" {{(old('suket_id',$jenis_suket)=='skp')?'selected':''}}>Surat Keterangan
                            Penghasilan</option>
                        <option value="skn" {{(old('suket_id',$jenis_suket)=='skn')?'selected':''}}>Surat Keterangan
                            Status Pernikahan</option>
                        <option value="sku" {{(old('suket_id',$jenis_suket)=='sku')?'selected':''}}>Surat Keterangan
                            Usaha</option>
                        <option value="sksj" {{(old('suket_id',$jenis_suket)=='sksj')?'selected':''}}>Dan lain-lain
                        </option>
                    </select>
                    @if($errors->has('jenis_suket'))
                    <small class="text-danger">{{$errors->first('jenis_suket')}}</small>
                    @endif
                </div>

                <div class="col-lg-1 col-md-1 col-xs-1" style="margin:5px">

                    <button type="submit" name="lihat" class="btn btn-gelap float-right">Lihat</button>

                </div>

            </div>

        </form>

        <div class="line"></div>
        @if(count($progress) > 0)
        <div class="row">

            <div class="col-md-12 col-lg-12">

                <div id="tracking-pre"></div>

                <div id="tracking">

                    <div class="text-center tracking-status-proses">

                        <p class="tracking-status text-tight">Diproses Oleh Operator</p>

                    </div>
                    <div class="tracking-list">
                        @if(!empty($user))
                        <div class="tracking-item">

                            <div class="tracking-icon status-selesai">

                                <i class="fas fa-check-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">USER

                                <span>{{$user->pesan}}</span>

                            </div>

                        </div>
                        @endif
                        @if(!empty($operator))
                            @if($operator->status == 'tolak')
                            <div class="tracking-item">

                                <div class="tracking-icon status-gagal">

                                    <i class="fas fa-times-circle"></i>
                                </div>

                                <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                                <div class="tracking-content">OPERATOR DESA
                                    @if($jenis_suket == 'sku')
                                        @php $suket = 'usaha'; @endphp
                                    @elseif($jenis_suket == 'sktm')
                                        @php $suket = 'tidakMampu'; @endphp
                                    @elseif($jenis_suket == 'skm')
                                        @php $suket = 'kematian'; @endphp
                                    @elseif($jenis_suket == 'skk')
                                        @php $suket = 'skl'; @endphp
                                    @elseif($jenis_suket == 'skp')
                                        @php $suket = 'penghasilan'; @endphp
                                    @elseif($jenis_suket == 'skn')
                                        @php $suket = 'status'; @endphp
                                    @elseif($jenis_suket == 'skbn')
                                        @php $suket = 'bedanama'; @endphp
                                    @elseif($jenis_suket == 'skrt')
                                        @php $suket = 'tanah'; @endphp
                                    @elseif($jenis_suket == 'skaw')
                                        @php $suket = 'ahliwaris'; @endphp
                                    @else
                                        @php $suket = 'sapujagad'; @endphp
                                    @endif
                                    <span>{{$operator->pesan}}</span>
                                    <span class="text-danger"><a href="{{route('frontend.suket.'.$suket.'.edit',['id' => $suket_id])}}"
                                    >Perbaiki</a></span>
                                    
                                </div>

                            </div>
                            @else
                            <div class="tracking-item">

                                <div class="tracking-icon status-selesai">

                                    <i class="fas fa-check-circle"></i>

                                </div>

                                <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                                <div class="tracking-content">OPERATOR DESA

                                    <span>{{$operator->pesan}}</span>

                                </div>

                            </div>
                            @endif
                        @else
                        <div class="tracking-item">

                            <div class="tracking-icon status-proses">

                                <i class="fas fa-clock"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">OPERATOR DESA

                                <span>Dalam Proses Verifikasi Operator Desa</span>

                            </div>

                        </div>
                        @endif
                        @if(!empty($kasi))
                        <div class="tracking-item">

                            <div class="tracking-icon status-selesai">

                                <i class="fas fa-check-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 20, 2020<span>08:58 AM</span></div> -->

                            <div class="tracking-content">KASI DESA

                                <span>{{$kasi->pesan}}</span>

                            </div>

                        </div>
                        @elseif(empty($operator) || $operator->status == 'tolak')
                        <div class="tracking-item">

                            <div class="tracking-icon status-intransit">

                                <i class="fas fa-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">KASI DESA

                                <span>Menunggu Data</span>

                            </div>

                        </div>
                        @else
                        <div class="tracking-item">

                            <div class="tracking-icon status-proses">

                                <i class="fas fa-clock"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">KASI DESA

                                <span>Dalam Verifikasi Kasi Desa</span>

                            </div>

                        </div>
                        @endif
                        @if(!empty($sekdes))
                        <div class="tracking-item">

                            <div class="tracking-icon status-selesai">

                                <i class="fas fa-check-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 29, 2020<span>10:09 AM</span></div> -->

                            <div class="tracking-content">SEKRETARIS DESA

                                <span>{{$sekdes->pesan}}</span>

                            </div>

                        </div>
                        @elseif(empty($kasi))
                        <div class="tracking-item">

                            <div class="tracking-icon status-intransit">

                                <i class="fas fa-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">SEKRETARIS DESA

                                <span>Menunggu Data</span>

                            </div>

                        </div>
                        @else
                        <div class="tracking-item">

                            <div class="tracking-icon status-proses">

                                <i class="fas fa-clock"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">SEKRETARIS DESA

                                <span>Dalam Proses Verifikasi Sekretaris Desa</span>

                            </div>

                        </div>
                        @endif
                        @if(!empty($kades))
                        <div class="tracking-item">

                            <div class="tracking-icon status-selesai">

                                <i class="fas fa-check-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 30, 2020<span>02:02 PM</span></div> -->

                            <div class="tracking-content">KEPALA DESA

                                <span>{{$kades->pesan}}</span>

                            </div>

                        </div>
                        @elseif(empty($sekdes))
                        <div class="tracking-item">

                            <div class="tracking-icon status-intransit">

                                <i class="fas fa-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">KEPALA DESA

                                <span>Menunggu Data</span>

                            </div>

                        </div>
                        @else
                        <div class="tracking-item">

                            <div class="tracking-icon status-proses">

                                <i class="fas fa-clock"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">KEPALA DESA

                                <span>Dalam Proses Verifikasi Kepala Desa</span>

                            </div>

                        </div>

                        @endif
                        @if(!empty($kades))
                        <div class="tracking-item">

                            <div class="tracking-icon status-selesai">

                                <i class="fas fa-check-circle"></i>

                            </div>

                            <!-- <div class="tracking-date">Jul 10, 2020<span>05:01 PM</span></div> -->

                            <div class="tracking-content">SELESAI
                                <span class="text-success"><a href="{{ route('frontend.suket.print',['suket_id' => $suket_id,'jenis_suket' => $jenis_suket ])}}">Download</a></span>
                            </div>

                        </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
        @else
        <center>Data Tidak Ditemukan</center>
        @endif
    </div>

</section>





@endsection



@section('top-resource')

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

<style media="screen">
    #slideshow .slick div>img {

        width: 100%;

        height: 380px;

        object-fit: cover;

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

        fade: true,

        infinite: true,

        adaptiveHeight: true,

        swipe: true

    });

</script>

@endsection
