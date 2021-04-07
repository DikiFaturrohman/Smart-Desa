@extends('frontend.layout.app')
@section('title') Progress Pemohon @endsection
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
<section class="py-3">
    <div class="">
    </div>
    <div class="container">
        <h2 class="subjudul-home"><span class="span-judul">Progres Pemohon</span></h2>
        <table id="table" class="display">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Tanggal</td>
                    <td>Surat</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>           
                @php $i=1; @endphp     
                @foreach($suket as $data)                
                <tr>
                    <td>{{$i}}</td>
                    <td>{{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}}</td>
                    <td>{{$data->category}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{route('frontend.lihatprogress',['id' => base64_encode($data->id){{--$data->encodeHash($data->id)--}}, 'jenis_suket' => $data->jenis_suket])}}" title="lihat progress"><i class="fas fa-search"></i></a>
                    </td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
        <div class="line"></div>
        {{-- @if(count($progress) > 0)
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
        @endif --}}
    </div>
</section>
@endsection

@section('top-resource')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
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
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
@endsection

