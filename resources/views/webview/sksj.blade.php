@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Sapu Jagat @endsection

@section('meta')



@endsection


@section('content')

<div class="container py-3">



    <h2>Pengajuan Surat Keterangan Sapu Jagat</h2>

    <div class="line"></div>

    <!-- content -->

    <form method="post" enctype="multipart/form-data" id="mainform">

        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pengantar RT/RW</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_sp_rtrw" id="file_sp_rtrw">
                    <label class="custom-file-label" for="file_sp_rtrw">Unggah File</label>
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                </div>
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_sp_rtrw" alt="" width="200px"
                    style="margin-top:7px"><br>
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
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_ktp" alt="" width="200px"
                    style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pernyataan</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_surat_pernyataan"
                        id="file_surat_pernyataan">
                    <label class="custom-file-label" for="file_surat_pernyataan">Unggah File</label>
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                </div>
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_surat_pernyataan" alt="" width="200px"
                    style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">

            <label for="nik" class="col-sm-3 col-form-label">NIK</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="{{old('nik',$user->nik)}}" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"
                    value="{{old('nama',$user->nama_lengkap)}}" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Umur</label>

            <div class="col-sm-8 pl-2">

                <input type="number" min="1" class="form-control" name="umur" placeholder="" value="{{old('umur',\Carbon\Carbon::now()->diffInYears($user->tgl_lahir))}}" readonly>
                @if($errors->has('umur'))
                <small class="text-danger">{{$errors->first('umur')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tanggal Mulai Menetap</label>

            <div class="col-sm-8 pl-2">

                <input type="date" class="form-control"
                    name="tgl_menetap"
                    value="{{old('tgl_menetap')}}" />
                @if($errors->has('tgl_menetap'))
                <small class="text-danger">{{$errors->first('tgl_menetap')}}</small>
                @endif
            </div>


        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id" name="pekerjaan_id" class="auto-save form-control">
                    <option value="">-- Pilih Salah Satu --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id')==$data->id)?'selected':''}}>{{$data->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id'))
                <small class="text-danger">{{$errors->first('pekerjaan_id')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Alamat Kantor</label>

            <div class="col-sm-8 pl-2">

                <textarea class="form-control" rows="3" id="alamat" name="alamat"
                    placeholder="Masukkan alamat lengkap beserta RT/RW nya" readonly>{{old('alamat',$user->alamat)}}</textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>

        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Keperluan</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" name="keperluan" placeholder="" value="{{old('keperluan')}}">
                @if($errors->has('keperluan'))
                <small class="text-danger">{{$errors->first('keperluan')}}</small>
                @endif
            </div>

        </div>
        <div class="row">

            <div class="col-lg-11">

                <button type="submit" class="btn btn-gelap float-right">Submit</button>
                <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button>
            </div>

        </div>



    </form>

    <br />

    <div class="line"></div>

</div>

@endsection



@section('top-resource')

<link rel="stylesheet" href="{{asset('frontend/css/tempusdominus-bootstrap-4.min.css')}}">

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

<style media="screen">
    #slideshow .slick div>img {

        width: 100%;

        height: 420px;

        object-fit: cover;

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
