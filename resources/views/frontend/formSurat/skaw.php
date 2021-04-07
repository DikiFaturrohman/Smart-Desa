@extends('frontend.layout.app')
@section('title') Surat Keterangan Ahli Waris @endsection
@section('meta')
@endsection
@section('header')
<header id="content-desktop">
	<section id="slideshow">
	  <div class="slick">
			@if(count($slider) > 0)
			@foreach($slider as $list)
	    <div>
        <img src="{{asset('backend/images/slider/'.$list->img)}}" class="" alt="">
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
<div class="container py-3">

<h2>Pengajuan Surat Keterangan Ahli Waris</h2>
<div class="line"></div>
<!-- content -->

<form id="kelahiran" method="post" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="list-group">
    <!-- Step 1 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Lampiran Persyaratan</h5>
      <div data-acc-content>
        <div class="my-3">
          <div class="line"></div>
					<div class="form-group row">
            <label>Scan/Foto KK Orangtua Bayi</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_kk" id="file_kk">
							<label class="custom-file-label" for="file_kk">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto KTP Ibu</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_ibu" id="file_ibu">
							<label class="custom-file-label" for="file_ibu">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto KTP Ayah</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_ayah" id="file_ayah">
							<label class="custom-file-label" for="file_ayah">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto Surat/Akta Nikah</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_surat_nikah" id="file_surat_nikah">
							<label class="custom-file-label" for="file_surat_nikah">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto Surat Keterangan Kelahiran dari dokter/bidan/nahkoda/pilot penolong kelahiran</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_sk_kelahiran" id="file_sk_kelahiran">
							<label class="custom-file-label" for="file_sk_kelahiran">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>

					<div class="form-group row">
            <label>Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="auto-save form-control" />
          </div>
        </div>
      </div>
    </div>
    <!-- Step 2 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Data Almarhum/Almarhumah</h5>
      <div data-acc-content>
        <div class="my-3">
          <div class="line"></div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_alm" id="nama_alm" class="auto-save form-control" />
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
						<div class="checkbox">
							<div class="form-check-inline">
				         <label class="form-check-label" for="laki-laki">
				           <input type="radio" class="form-check-input" id="laki-laki" name="jk_alm" value="laki-laki" checked>Laki-laki
				         </label>
				       </div>
				       <div class="form-check-inline">
				         <label class="form-check-label" for="perempuan">
				           <input type="radio" class="form-check-input" id="perempuan" name="jk_alm" value="perempuan">Perempuan
				         </label>
				       </div>
	          </div>
          </div>
          <div class="form-group">
            <label for="">Tanggal Kematian</label>
            <input id="tgl_kematian" name="tgl_kematian" type="date" class="auto-save form-control">
          </div>
        </div>
      </div>
    </div>
    <!-- Step 3 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Data Pasangan</h5>
      <div data-acc-content>
        <div class="my-3">
          <div class="line"></div>

					<div class="form-group">
						<label for="">Nama Lengkap</label>
	          <input id="nama_pasangan" name="nama_pasangan" type="text" class="auto-save form-control">
          </div>
					<div class="form-group">
            <label for="">Jenis Kelamin</label>
						<div class="checkbox">
							<div class="form-check-inline">
				         <label class="form-check-label" for="laki-laki">
				           <input type="radio" class="form-check-input" id="laki-laki" name="jk_alm" value="laki-laki" checked>Laki-laki
				         </label>
				       </div>
				       <div class="form-check-inline">
				         <label class="form-check-label" for="perempuan">
				           <input type="radio" class="form-check-input" id="perempuan" name="jk_alm" value="perempuan">Perempuan
				         </label>
				       </div>
	          </div>
          </div>
					<div class="form-group">
						<label for="">Tempat Lahir</label>
	          <input id="tempat_lahir_pasangan" name="tempat_lahir_pasangan" type="text" class="auto-save form-control">
          </div>
					<div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input id="tgl_lahir" name="tgl_lahir" type="date" class="auto-save form-control">
          </div>
					<div class="form-group">
						<label for="">Pekerjaan</label>
						<select id="pekerjaan_id_pasangan" name="pekerjaan_id_pasangan" class="auto-save form-control">
							<option value="">-- Pilih Salah Satu --</option>
							@foreach($pekerjaan as $data)
							<option value="{{$data->id}}">{{$data->nama}}</option>
							@endforeach
            </select>
					</div>
					<div class="form-group">
            <label for="">Kewarganegaraan</label>
						<div class="checkbox">
							<div class="form-check-inline">
				         <label class="form-check-label" for="wni">
				           <input type="radio" class="form-check-input" id="wni" name="kewarganegaraan_pasangan" value="wni" checked>WNI
				         </label>
				       </div>
				       <div class="form-check-inline">
				         <label class="form-check-label" for="wna">
				           <input type="radio" class="form-check-input" id="wna" name="kewarganegaraan_pasangan" value="wna">WNA
				         </label>
				       </div>
	          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Step 4 -->
    <div class="list-group-item py-3" data-acc-step>
      <h5 class="mb-0" data-acc-title>Data Ahli Waris</h5>
      <div data-acc-content>
        <div class="my-3">
          <div class="line"></div>

					<div class="form-group">
            <label for="">NIK</label>
						<input id="nik" name="nik" type="text" class="auto-save form-control">
          </div>
					<div class="form-group">
						<label for="">Nama Lengkap</label>
	          <input id="nama" name="nama" type="text" class="auto-save form-control">
          </div>
					<div class="form-group">
						<label for="">Tempat Lahir</label>
	          <input id="tempat_lahir" name="tempat_lahir" type="text" class="auto-save form-control">
          </div>
					<div class="form-group">
						<label for="">Tanggal Lahir</label>
	          <input id="tgl_lahir" name="tgl_lahir" type="text" class="auto-save form-control">
          </div>
					<div class="form-group">
						<label for="">Alamat</label>
	          <textarea id="alamat" name="alamat" type="text" class="auto-save form-control"></textarea>
					</div>
					<div class="form-group">
            <label for="">Kewarganegaraan</label>
						<div class="checkbox">
							<div class="form-check-inline">
				         <label class="form-check-label" for="wni">
				           <input type="radio" class="form-check-input" id="wni" name="kewarganegaraan" value="wni">WNI
				         </label>
				       </div>
				       <div class="form-check-inline">
				         <label class="form-check-label" for="wna">
				           <input type="radio" class="form-check-input" id="wna" name="kewarganegaraan" value="wna">WNA
				         </label>
				       </div>
	          </div>
          </div>
        </div>
      </div>
    </div>
	</div>

	<!-- Step  -->

	<div class="list-group-item py-3" data-acc-step>

		<h5 class="mb-0" data-acc-title>Data Saksi I</h5>

		<div data-acc-content>

			<div class="my-3">

				<div class="line"></div>



				<div class="form-group">

					<label>NIK</label>

					<input type="text" name="nik_saksi1" id="nik_saksi1" class="auto-save form-control" />

				</div>

				<div class="form-group">

					<label>Nama Lengkap</label>

					<input type="text" name="nama_saksi1" id="nama_saksi1" class="auto-save form-control" />

				</div>



			</div>

		</div>

	</div>

	<!-- Step  -->

	<div class="list-group-item py-3" data-acc-step>

		<h5 class="mb-0" data-acc-title>Data Saksi II</h5>

		<div data-acc-content>

			<div class="my-3">

				<div class="line"></div>



				<div class="form-group">

					<label>NIK</label>

					<input type="text" name="nik_saksi2" id="nik_saksi2" class="auto-save form-control" />

				</div>

				<div class="form-group">

					<label>Nama Lengkap</label>

					<input type="text" name="nama_saksi2" id="nama_saksi2" class="auto-save form-control" />

				</div>



			</div>

		</div>

	</div>



  </div>

</form>



<div class="line" id="content-mobile"></div>

</div>

@endsection



@section('top-resource')

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

<style>

  div[data-acc-content] { display: none;  }

  div[data-acc-step]:not(.open) { background: #6c757d;  }

  div[data-acc-step]:not(.open) h5 { color: #fff;  }

  div[data-acc-step]:not(.open) .badge-primary { background: #263238;  }

</style>

@endsection

@section('bottom-resource')

<!-- <script src="{{asset('frontend/js/jquery.chained.min.js')}}"></script> -->
<script src="{{asset('frontend/js/savy.min.js')}}"></script>

<script src="{{asset('frontend/js/jquery.accordion-wizard.min.js')}}"></script>

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



<script type="text/javascript">

$(function(){

  $("#kelahiran").accWizard({

    start: 1, // start step

    mode: "wizard", // or 'edit'

    enableScrolling: true,  // auto scroll the page to the current step

    scrollPadding: 5, // padding in pixels

    autoButtons: true,  // auto add next/back buttons

    autoButtonsNextClass: 'btn btn-gelap float-right', // CSS classes for next/back buttons

    autoButtonsPrevClass: 'btn btn-secondary', // CSS classes for next/back buttons

    autoButtonsShowSubmit: true,  // auto show submit button

    autoButtonsSubmitText: 'Submit',  // submit text

    autoButtonsEditSubmitText: 'Save',  // save text

    stepNumbers: true,  // show step number

    stepNumberClass: 'badge badge-pill badge-gelap mr-1', // CSS class for step number



    beforeNextStep: function( currentStep ) {

      return true;

    },

    onSubmit: function( element ) {

      $('#kelahiran').submit();

    }

  });

});

</script>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<!-- <script>
  $(document).ready(function() {
    $("#kota").chained("#provinsi");
    $("#kecamatan").chained("#kota");
		$("#desa").chained("#kecamatan");
  });
</script> -->


<script>

  $('.auto-save').savy('load',function(){

    console.log("All data from savy are loaded");

  });

</script>

@endsection
