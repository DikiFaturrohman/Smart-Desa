@extends('frontend.layout.app')

@section('title') Surat Keterangan Sapu Jagad @endsection

@section('meta')



@endsection

@section('header')

<header id="content-asset('
	<section id="slideshow">
	  <div class="slick">
			@if(count($slider) > 0)
			@foreach($slider as $list)
	    <div>asset('
        <img src="{{asset('public/backend/images/slider/'.$list->img)}}" class="" alt="">
      </div>
			@endforeachasset('
			@else
			<div>
        <img src="{{asset('frontend/img/background-header.png')}}" class="" alt="">
      </div>
			<div>
        <img src="{{asset('public/frontend/img/background-header2.png')}}" class="" alt="">
      </div>
			<div>
        <img src="{{asset('public/frontend/img/background-header3.png')}}" class="" alt="">
      </div>asset('
			@endif
	  </div>
	</section>

	<div class="logo-holder">
		<img src="{{asset('public/frontend/img/logoweb.png')}}" alt="">
		<h2 class="pl-5 ml-2 f1-l-1">{{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower($lokasi->nama))}} Kecamatan
            {{ucwords(strtolower($lokasi->kecamatan->nama))}}</h2>
  </div>
</header>
@endsection

@section('content')

<div class="container py-3">



<h2>Pengajuan Surat Keterangan </h2>

<div class="line"></div>

<!-- content -->

<form method="post" enctype="multipart/form-data">

	{{csrf_field()}}
	<div class="form-group row">
		<label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pengantar RT/RW</label>
		<div class="col-sm-8 pl-2">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file_sp_rtrw" id="file_sp_rtrw">
				<label class="custom-file-label" for="file_sp_rtrw">Unggah File</label>
			</div>
			<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-sm-3 col-form-label">Scan/Foto KTP</label>
		<div class="col-sm-8 pl-2">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file_ktp" id="file_ktp">
				<label class="custom-file-label" for="file_ktp">Unggah File</label>
			</div>
			<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-sm-3 col-form-label">Scan/Foto Kartu Keluarga</label>
		<div class="col-sm-8 pl-2">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file_kk" id="file_kk">
				<label class="custom-file-label" for="file_kk">Unggah File</label>
			</div>
			<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pernyataan</label>
		<div class="col-sm-8 pl-2">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="file_surat_pernyataan" id="file_surat_pernyataan">
				<label class="custom-file-label" for="file_surat_pernyataan">Unggah File</label>
			</div>
			<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
		</div>
	</div>
	<div class="form-group row">

		<label for="nik" class="col-sm-3 col-form-label">NIK</label>

		<div class="col-sm-8 pl-2">

			<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">

		</div>

	</div>

	<div class="form-group row">

		<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>

		<div class="col-sm-8 pl-2">

			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">

		</div>

	</div>

	<div class="form-group row">
		<label for="umur" class="col-sm-3 col-form-label">Umur</label>
		<div class="col-sm-8 pl-2">
			<input type="text" class="form-control" id="umur" name="umur" placeholder="Umur">
		</div>
	</div>
	<div class="form-group row">

		<label for="" class="col-sm-3 col-form-label">Tanggal Mulai Menetap</label>

		<div class="col-sm-8 pl-2">

			<input type="text" class="form-control datepicker datetimepicker-input" id="tgl_menetap" name="tgl_menetap" data-toggle="datetimepicker" data-target=".datepicker" />

		</div>

	</div>

	<div class="form-group row">

		<label for="" class="col-sm-3 col-form-label">Alamat Kantor</label>

		<div class="col-sm-8 pl-2">
asset('
			<textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya"></textarea>

		</div>

	</div>

	<div class="form-group row">
		<label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
		<div class="col-sm-8 pl-2">
			<select id="pekerjaan_id_ibu" name="pekerjaan_id_ibu" class="auto-save form-control">
				<option value="">-- Pilih Salah Satu --</option>
				@foreach($pekerjaan as $data)
				<option value="{{$data->id}}">{{$data->nama}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="keperluan" class="col-sm-3 col-form-label">Keperluan</label>
		<div class="col-sm-8 pl-2">
			<input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan">
		</div>
	</div>

	<div class="row">

		<div class="col-lg-11">
asset('
			<button typeasset('s="btn btn-gelap float-right">Submit</button>
asset('
		</div>asset('

	</div>



</form>

<br/>

<div class="line"></div>

</div>

@endsection



@section('top-resource')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">


<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<style media="screen">

#slideshow .slick div > img {

	width: 100%;

	height: 420px;

	object-fit: cover;

  position: relative;

}

.logo-holder{

  width: auto;

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

<script src="{{asset('public/frontend/js/moment.min.js')}}" charset="utf-8"></script>

<script src="{{asset('public/frontend/js/daterangepicker.js')}}" charset="utf-8"></script>

<script src="{{asset('public/frontend/js/tempusdominus-bootstrap-4.min.js')}}" charset="utf-8"></script>

<script src="{{asset('public/frontend/js/savy.min.js')}}"></script>

<!-- Slick -->

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

<script>

// Add the following code if you want the name of the file appear on select

$(".custom-file-input").on("change", function() {

  var fileName = $(this).val().split("\\").pop();

  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

});

</script>

<script>

  $('.auto-save').savy('load',function(){

    console.log("All data from savy are loaded");

  });

</script>



<script type="text/javascript">

$(document).ready(function(){

        setDatePicker()

        setDateRangePicker(".startdate", ".enddate")

        setMonthPicker()

        setYearPicker()

        setYearRangePicker(".startyear", ".endyear")

})

</script>

@endsection

