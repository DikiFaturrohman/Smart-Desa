@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Status Pernikahan @endsection

@section('meta')



@endsection

@section('content')

<div class="container py-3">



    <h2>Pengajuan Surat Keterangan Status Pernikahan</h2>

    <div class="line"></div>

    <!-- content -->

    <form method="post" action="" enctype="multipart/form-data" id="mainform">

        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pernyataan RT/RW</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="hidden" name="suket_id" value="{{$sksp->id}}">
                    <input type="file" class="custom-file-input" name="file_sp_rtrw" id="file_sp_rtrw">
                    <label class="custom-file-label" for="file_sp_rtrw">Unggah File</label>
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($sksp->file_sp_rtrw) ? $img . '/dokumen/skn/rtrw/' . $sksp->file_sp_rtrw : $img . '/default.jpg') ?>"
                    id="preview-file_sp_rtrw" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto KTP</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_ktp" id="file_ktp">
                    <label class="custom-file-label" for="file_ktp">Unggah File</label>
                    @if($errors->has('file_ktp'))
                    <small class="text-danger">{{$errors->first('file_ktp')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($sksp->file_ktp) ? $img . '/dokumen/skn/ktp/' . $sksp->file_ktp : $img . '/default.jpg') ?>"
                    id="preview-file_ktp" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Kartu Keluarga</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($sksp->file_kk) ? $img . '/dokumen/skn/kk/' . $sksp->file_kk : $img . '/default.jpg') ?>"
                    id="preview-file_kk" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Akta Cerai</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_akta_cerai" id="file_akta_cerai">
                    <label class="custom-file-label" for="file_akta_cerai">Unggah File Akta Cerai atau Surat Kematian
                        Pasangan</label>
                    @if($errors->has('file_akta_cerai'))
                    <small class="text-danger">{{$errors->first('file_akta_cerai')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($sksp->file_akta_cerai) ? $img . '/dokumen/skn/akta_cerai/' . $sksp->file_akta_cerai : $img . '/default.jpg') ?>"
                    id="preview-file_akta_cerai" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">

            <label for="nik" class="col-sm-3 col-form-label">NIK</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK"
                    value="{{old('nik',$sksp->nik)}}" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"
                    value="{{old('nama',$sksp->nama)}}" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder=""
                    value="{{old('tempat_lahir',$sksp->tempat_lahir)}}">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>

            <div class="col-sm-8 pl-2">

                <input type="date" name="tgl_lahir" class="form-control"
                    value="{{old('tgl_lahir',$sksp->tgl_lahir)}}" readonly/>
                @if($errors->has('tgl_lahir'))
                <small class="text-danger">{{$errors->first('tgl_lahir')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>

            <div class="col-sm-8 pl-2">

                <div class="pt-2">

                    <div class="form-check-inline">

                        <label class="form-check-label" for="laki-laki">

                            <input type="radio" class="form-check-input" id="laki-laki" name="jk" value="laki-laki"
                                {{(old('jk',$sksp->jk)=='laki-laki')?'checked':''}}>Laki-laki

                        </label>

                    </div>

                    <div class="form-check-inline">

                        <label class="form-check-label" for="perempuan">

                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                {{(old('jk',$sksp->jk)=='perempuan')?'checked':''}}>Perempuan

                        </label>

                    </div>

                </div>


                @if($errors->has('jk'))
                <small class="text-danger">{{$errors->first('jk')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Warga Negara</label>
            <div class="col-sm-8 pl-2">
                <div class="pt-2">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="indonesia">
                            <input type="radio" class="form-check-input" id="indonesia" name="warga_negara"
                                value="indonesia"
                                {{(old('warga_negara',$sksp->warga_negara)=='indonesia')?'checked':''}}>Indonesia
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="wna">
                            <input type="radio" class="form-check-input" id="wna" name="warga_negara" value="wna"
                                {{(old('warga_negara',$sksp->warga_negara)=='wna')?'checked':''}}>WNA
                        </label>
                    </div>
                </div>
                @if($errors->has('warga_negara'))
                <small class="text-danger">{{$errors->first('warga_negara')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-8 pl-2">
                <select id="agama" name="agama" class="auto-save form-control">
                    <option value="islam" {{(old('agama',$sksp->agama)=='islam')?'selected':''}}>Islam</option>
                    <option value="kristen" {{(old('agama',$sksp->agama)=='kristen')?'selected':''}}>Kristen</option>
                    <option value="hindu" {{(old('agama',$sksp->agama)=='hindu')?'selected':''}}>Hindu</option>
                    <option value="budha" {{(old('agama',$sksp->agama)=='budha')?'selected':''}}>Budha</option>
                    <option value="katolik" {{(old('agama',$sksp->agama)=='katolik')?'selected':''}}>Katolik</option>
                </select>
                @if($errors->has('agama'))
                <small class="text-danger">{{$errors->first('agama')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Alamat Lengkap</label>

            <div class="col-sm-8 pl-2">

                <textarea class="form-control" rows="3" id="alamat" name="alamat"
                    placeholder="Masukkan alamat lengkap beserta RT/RW nya" readonly>{{old('alamat',$sksp->alamat)}}</textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Status Saat Ini</label>

            <div class="col-sm-8 pl-2">

                <select id="status_nikah" name="status_nikah" class="auto-save form-control">

                    <option value="lajang" {{(old('status_nikah',$sksp->status_nikah)=='lajang')?'selected':''}}>Belum
                        Menikah</option>

                    <option value="menikah" {{(old('status_nikah',$sksp->status_nikah)=='menikah')?'selected':''}}>
                        Menikah</option>

                    <option value="janda" {{(old('status_nikah',$sksp->status_nikah)=='janda')?'selected':''}}>Janda
                    </option>

                    <option value="duda" {{(old('status_nikah',$sksp->status_nikah)=='duda')?'selected':''}}>Duda
                    </option>

                </select>
                @if($errors->has('status_nikah'))
                <small class="text-danger">{{$errors->first('status_nikah')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Keperluan</label>

            <div class="col-sm-8 pl-2">

                <input class="form-control" id="keperluan" name="keperluan"
                    placeholder="Surat Keterangan ini dibuat untuk keperluan ?"
                    value="{{old('keperluan',$sksp->keperluan)}}">
                @if($errors->has('keperluan'))
                <small class="text-danger">{{$errors->first('keperluan')}}</small>
                @endif
            </div>

        </div>



        <div class="row">

            <div class="col-lg-11">

                <button type="submit" class="btn btn-gelap float-right">Submit</button>

                <button type="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button>
            </div>

        </div>

    </form>

    <br />

    <div class="line"></div>

</div>

@endsection



@section('top-resource')

<link rel="stylesheet" href="{{asset('frontend/css/tempusdominus-bootstrap-4.min.css')}}">

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

<script src="{{asset('frontend/js/moment.min.js')}}" charset="utf-8"></script>

<script src="{{asset('frontend/js/daterangepicker.js')}}" charset="utf-8"></script>

<script src="{{asset('frontend/js/tempusdominus-bootstrap-4.min.js')}}" charset="utf-8"></script>

<script src="{{asset('frontend/js/savy.min.js')}}"></script>

<!-- Slick -->

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

<script language="JavaScript" type="text/JavaScript">
    $('#provinsi_id').on('change', function(e){
      console.log(e);
      var prov_id = e.target.value;
      //ajax
      $.get('/ajax-kota/' + prov_id, function(data){
        $('#kota_id').empty();
        $.each(data, function(index, kotaObj){
          $('#kota_id').append('<option value="'+kotaObj.id+'">'+kotaObj.name+'</option>');
        });
      });
    });
</script>
<script>
    // Add the following code if you want the name of the file appear on select

    $(".custom-file-input").on("change", function () {

        var fileName = $(this).val().split("\\").pop();

        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

    });

</script>

<script>
    $('.auto-save').savy('load', function () {

        console.log("All data from savy are loaded");

    });

    $('#reset').on('click', function () {
        $('.auto-save').savy('destroy');
    });

</script>



<script type="text/javascript">
    $(document).ready(function () {

        setDatePicker()

        setDateRangePicker(".startdate", ".enddate")

        setMonthPicker()

        setYearPicker()

        setYearRangePicker(".startyear", ".endyear")

    })

</script>
<script>
    window.addEventListener("flutterInAppWebViewPlatformReady", function (event) {
        // call flutter handler with name 'mySum' and pass one or more arguments
        window.flutter_inappwebview.callHandler('result', true).then(function (result) {
            // get result from Flutter side. It will be the number 64.
            console.log(result);
        });
    });

</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId = '#preview-' + $(input).attr('id');
                $(imgId).attr('src', e.target.result);
                // $('.uploading1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // CKEDITOR.replace('ckeditor');
    $("form#mainform input[type='file']").change(function () {
        readURL(this);
    });

</script>
@endsection
