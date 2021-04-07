@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Usaha @endsection

@section('meta')



@endsection


@section('content')

<div class="container py-3">



    <h2>Pengajuan Surat Keterangan Usaha</h2>

    <div class="line"></div>

    <!-- content -->

    <form id="mainform" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pengantar RT/RW</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="hidden" name="suket_id" value="{{$sku->id}}">
                    <input type="file" class="custom-file-input" name="file_sp_rtrw" id="file_sp_rtrw">
                    <label class="custom-file-label" for="file_sp_rtrw">Unggah File</label>
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($sku->file_sp_rtrw) ? $img . '/dokumen/sku/rtrw/' . $sku->file_sp_rtrw : $img . '/default.jpg') ?>"
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
                <img src="<?php echo (!empty($sku->file_ktp) ? $img . '/dokumen/sku/ktp/' . $sku->file_ktp : $img . '/default.jpg') ?>"
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
                <img src="<?php echo (!empty($sku->file_kk) ? $img . '/dokumen/sku/kk/' . $sku->file_kk : $img . '/default.jpg') ?>"
                    id="preview-file_kk" style="width: 200px;margin-top:7px"><br>
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
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($sku->file_surat_pernyataan) ? $img . '/dokumen/sku/surat_pernyataan/' . $sku->file_surat_pernyataan : $img . '/default.jpg') ?>"
                    id="preview-file_surat_pernyataan" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">

            <label for="nik" class="col-sm-3 col-form-label">NIK</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK"
                    value="{{old('nik',$sku->nik)}}" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"
                    value="{{old('nama',$sku->nama)}}" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder=""
                    value="{{old('tempat_lahir',$sku->tempat_lahir)}}">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>

            <div class="col-sm-8 pl-2">

                <input type="date" class="form-control " name="tgl_lahir"
                    value="{{old('tgl_lahir',$sku->tgl_lahir)}}" readonly/>
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
                                {{(old('jk',$sku->jk)=='laki-laki')?'checked':''}}>Laki-laki
                        </label>

                    </div>

                    <div class="form-check-inline">

                        <label class="form-check-label" for="perempuan">

                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                {{(old('jk',$sku->jk)=='perempuan')?'checked':''}}>Perempuan

                        </label>

                    </div>

                </div>


                @if($errors->has('jk'))
                <small class="text-danger">{{$errors->first('jk')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Pekerjaan</label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id" name="pekerjaan_id" class="auto-save form-control">
                    <option value="">-- Pilih Salah Satu --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id',$sku->pekerjaan_id)==$data->id)?'selected':''}}>
                        {{$data->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id'))
                <small class="text-danger">{{$errors->first('pekerjaan_id')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label"> </label>

            <div class="col-sm-8 pl-2">

                <input class="form-control" id="pekerjaan_lainnya" name="pekerjaan_lainnya"
                    placeholder="Diisi jika pilihan pekerjaan 'Lainnya'" value="{{old('pekerjaan_lainnya')}}">
                @if($errors->has('pekerjaan_lainnya'))
                <small class="text-danger">{{$errors->first('pekerjaan_lainnya')}}</small>
                @endif
            </div>

        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Alamat Lengkap</label>

            <div class="col-sm-8 pl-2">

                <textarea class="form-control" rows="3" id="alamat" name="alamat"
                    placeholder="Masukkan alamat lengkap beserta RT/RW nya" readonly>{{old('alamat',$sku->alamat)}}</textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>

        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nama Usaha</label>

            <div class="col-sm-8 pl-2">

                <input class="form-control" id="" name="jenis_usaha" placeholder=""
                    value="{{old('jenis_usaha',$sku->jenis_usaha)}}">
                @if($errors->has('jenis_usaha'))
                <small class="text-danger">{{$errors->first('jenis_usaha')}}</small>
                @endif
            </div>

        </div>

        <div class="row">

            <div class="col-lg-11">

                <button type="submit" id="tes" class="btn btn-gelap float-right">Submit</button>

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

</script>


<script type="text/javascript">
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
