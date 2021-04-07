@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Kematian @endsection

@section('meta')



@endsection


@section('content')

<div class="container py-3">



<h2>Pengajuan Surat Keterangan Kematian</h2>

<div class="line"></div>

<!-- content -->

<form id="maot" method="post">

{{csrf_field()}}

  <div class="list-group">

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

      <h5 class="mb-0" data-acc-title>Lampiran Persyaratan</h5>

      <div data-acc-content>

        <div class="my-3">

          <div class="line"></div>

					<div class="form-group row">
            <label>Scan/Foto KTP Almarhum</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_ktp_alm" id="file_ktp_alm">
							<label class="custom-file-label" for="file_ktp_alm">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto KTP Pelapor</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_ktp_pelapor" id="file_ktp_pelapor">
							<label class="custom-file-label" for="file_ktp_pelapor">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto KTP Saksi</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_saksi" id="file_saksi">
							<label class="custom-file-label" for="file_saksi">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Scan/Foto Surat Keterangan Rumah Sakit</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file_sk_rs" id="file_sk_rs">
							<label class="custom-file-label" for="file_sk_rs">Unggah File</label>
						</div>
						<small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
          </div>
					<div class="form-group row">
            <label>Nomor Kartu Keluarga</label>
            <input type="text" name="no_kk" id="no_kk" class="auto-save form-control" />
          </div>
					<div class="form-group row">
            <label>Nama Kepala Keluarga</label>
            <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="auto-save form-control" />
          </div>
					<div class="form-group row">
            <label>Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="auto-save form-control" />
          </div>


        </div>

      </div>

    </div>

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

      <h5 class="mb-0" data-acc-title>Data</h5>

      <div data-acc-content>

        <div class="my-3">

          <div class="line"></div>



					<div class="form-group">

            <label>Nama Kepala Keluarga</label>

            <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="auto-save form-control" />

          </div>

          <div class="form-group">

            <label for="">Nomor Kartu Keluarga</label>

            <input id="no_kk" name="no_kk" type="text" class="auto-save form-control">

          </div>



        </div>

      </div>

    </div>

    <!-- Step  -->

		<div class="list-group-item py-3" data-acc-step>

      <h5 class="mb-0" data-acc-title>Data Jenazah</h5>

      <div data-acc-content>

        <div class="my-3">

          <div class="line"></div>

					<div class="form-group">

            <label for="nik_jenazah">NIK</label>

          	<input id="nik_jenazah" name="nik_jenazah" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="nama_jenazah">Nama Lengkap</label>

          	<input id="nama_jenazah" name="nama_jenazah" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="tgl_lahir_jenazah">Tanggal Lahir</label>

          	<input id="tgl_lahir_jenazah" name="tgl_lahir_jenazah" type="date" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="tempat_lahir">Tempat Lahir</label>

          	<input id="tempat_lahir" name="tempat_lahir" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="agama">Agama</label>

          	<input id="agama" name="agama" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="pekerjaan_id_jenazah">Pekerjaan</label>

          	<input id="pekerjaan_id_jenazah" name="pekerjaan_id_jenazah" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="alamat_jenazah">Alamat</label>

            <textarea id="alamat_jenazah" name="alamat_jenazah" type="text" class="auto-save form-control"></textarea>

          </div>

          <div class="form-group">

            <label for="">Provinsi</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kabupaten/Kota</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kecamatan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Desa/Dusun/Kelurahan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kewarganegaraan</label>

          	<div class="checkbox">

              <div class="form-check">

                <input class="form-check-input " type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>

                <label class="form-check-label" for="gridRadios1">

                  WNI

                </label>

              </div>

              <div class="form-check">

                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">

                <label class="form-check-label" for="gridRadios2">

                  WNA

                </label>

              </div>

            </div>

          </div>



          <div class="form-group">

            <label for="">Keturunan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="">Kebangsaan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

            <label for="">Anak Ke</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

          	<label for="">Tanggal Kematian</label>

          	<input id="" name="" type="date" class="auto-save form-control">

          </div>

          <div class="form-group">

       		<label for="">Pukul</label>

          	<input id="" name="" type="time" class="auto-save form-control">

          </div>

          <div class="form-group">

       		<label for="">Sebab Kematian</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

       		<label for="">Tempat Kematian</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

       		<label for="">Yang Menerangkan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

        </div>

      </div>

    </div>

		<!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

      <h5 class="mb-0" data-acc-title>Data Ayah</h5>

      <div data-acc-content>

        <div class="my-3">

          <div class="line"></div>

					<div class="form-group">

       		<label for="nik_ayah">NIK</label>

            <input id="nik_ayah" name="nik_ayah" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

       		<label for="nama_ayah">Nama Lengkap</label>

            <input id="nama_ayah" name="nama_ayah" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

       		<label for="umur_ayah">Umur</label>

            <input id="umur_ayah" name="umur_ayah" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

       		<label for="pekerjaan_id_ayah">Pekerjaan</label>

            <input id="pekerjaan_id_ayah" name="pekerjaan_id_ayah" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

       		<label for="alamat_ayah">Alamat</label>

            <textarea id="alamat_ayah" name="alamat_ayah" type="text" class="auto-save form-control"></textarea>

          </div>

          <div class="form-group">

            <label for="">Provinsi</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kabupaten/Kota</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kecamatan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Desa/Dusun/Kelurahan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

        </div>

      </div>

    </div>

		<!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

      <h5 class="mb-0" data-acc-title>Data Ibu</h5>

      <div data-acc-content>

        <div class="my-3">

          <div class="line"></div>

					<div class="form-group">

       			<label for="nik_ibu">NIK</label>

            <input id="nik_ibu" name="nik_ibu" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

       			<label for="nama_ibu">Nama Lengkap</label>

            <input id="nama_ibu" name="nama_ibu" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

       			<label for="umur_ibu">Umur</label>

            <input id="umur_ibu" name="umur_ibu" type="text" class="auto-save form-control">

          </div>

          <div class="form-group">

       			<label for="pekerjaan_id_ibu">Pekerjaan</label>

						<select id="pekerjaan_id_ibu" name="pekerjaan_id_ibu" class="auto-save form-control">
							<option value="">-- Pilih Salah Satu --</option>
							@foreach($pekerjaan as $data)
							<option value="{{$data->id}}">{{$data->nama}}</option>
							@endforeach
            </select>
          </div>

          <div class="form-group">

       		<label for="alamat_ibu">Alamat</label>

            <textarea id="alamat_ibu" name="alamat_ibu" type="text" class="auto-save form-control"></textarea>

          </div>

          <div class="form-group">

            <label for="">Provinsi</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kabupaten/Kota</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Kecamatan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

		  		<div class="form-group">

            <label for="">Desa/Dusun/Kelurahan</label>

          	<input id="" name="" type="text" class="auto-save form-control">

          </div>

        </div>

      </div>

    </div>

		<!-- Step -->

    <div class="list-group-item py-3" data-acc-step>

      <h5 class="mb-0" data-acc-title>Data Pelapor</h5>

      <div data-acc-content>

        <div class="my-3">

          <div class="line"></div>

          <div class="form-group">

            <label>NIK</label>

            <input type="text" name="nik_pelapor" class="form-control" />

          </div>

          <div class="form-group">

            <label>Nama Lengkap</label>

            <input type="text" name="nama_pelapor" class="form-control" />

          </div>

		  		<div class="form-group">

            <label>Umur</label>

            <input type="text" name="umur_pelapor" class="form-control" />

          </div>

          </div>

          <div class="form-group">

              <label>Pekerjaan</label>

							<select id="pekerjaan_id_pelapor" name="pekerjaan_id_pelapor" class="auto-save form-control">
								<option value="">-- Pilih Salah Satu --</option>
								@foreach($pekerjaan as $data)
								<option value="{{$data->id}}">{{$data->nama}}</option>
								@endforeach
	            </select>
          </div>

          <div class="form-group">

						<label>Alamat Lengkap</label>

						<textarea class="form-control" rows="3" name="alamat_pelapor" id="alamat_pelapor"></textarea>

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

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/slick.css')}}"/>

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/slick-theme.css')}}"/>

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

<script src="{{asset('public/frontend/js/savy.min.js')}}"></script>

<script src="{{asset('public/frontend/js/jquery.accordion-wizard.min.js')}}"></script>

<!-- Slick -->

<script type="text/javascript" src="{{asset('public/frontend/js/slick.min.js')}}"></script>

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

  $("#maot").accWizard({

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

      $('#maot').submit();

			$('.auto-save').savy('destroy');

    }

  });

});

</script>



<script>

  $('.auto-save').savy('load',function(){

    console.log("All data from savy are loaded");

  });

</script>

@endsection

