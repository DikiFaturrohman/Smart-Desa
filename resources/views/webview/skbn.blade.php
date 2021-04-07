@extends('frontend.layout.wv-app')

@section('title') Surat Keterangan Beda Nama @endsection

@section('meta')



@endsection

@section('content')

<div class="container py-3">



    <h2>Pengajuan Surat Keterangan Beda Nama</h2>

    <div class="line"></div>

    <!-- content -->

    <form method="post" id="mainform" enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pengantar RT/RW</label>
            <div class="col-sm-9 pl-2">
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
            <div class="col-sm-9 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_ktp" id="file_ktp">
                    <label class="custom-file-label" for="file_ktp">Unggah File</label>
                    @if($errors->has('file_ktp'))
                    <small class="text-danger">{{$errors->first('file_ktp')}}</small>
                    @endif
                </div>
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_ktp" alt="" width="200px"
                    style="margin-top:7px"><br>
                <small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Kartu Keluarga</label>
            <div class="col-sm-9 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div>
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_kk" alt="" width="200px"
                    style="margin-top:7px"><br>
                <small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pernyataan</label>
            <div class="col-sm-9 pl-2">
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
                <small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Jenis Dokumen 1</label>
            <div class="col-sm-9 pl-2">
                <select id="jenis_dok" name="jenis_dok[]" class="dok_1 auto-save form-control">
                    <option value="">Pilih Dokumen 1</option>

                    <option value="ktp" {{(old('jenis_dok.0')=='ktp')?'selected':''}}>KTP</option>
                    <option value="sim" {{(old('jenis_dok.0')=='sim')?'selected':''}}>SIM</option>
                    <option value="ijazah" {{(old('jenis_dok.0')=='ijazah')?'selected':''}}>Ijazah</option>
                    <option value="kk" {{(old('jenis_dok.0')=='kk')?'selected':''}}>Kartu Keluarga</option>
                    <option value="akta nikah" {{(old('jenis_dok.0')=='akta nikah')?'selected':''}}>Akta Nikah</option>
                </select>
                @if($errors->has('jenis_dok.0'))
                <small class="text-danger">{{$errors->first('jenis_dok.0')}}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nomor Dokumen 1</label>

            <div class="col-sm-9">

                <input type="text" class="form-control" id="nomor_dok" name="nomor_dok[]"
                    placeholder="Masukkan Nomor Dokumen 1" value="{{old('nomor_dok.0')}}">
                @if($errors->has('nomor_dok.0'))
                <small class="text-danger">{{$errors->first('nomor_dok.0')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nama Dokumen 1</label>

            <div class="col-sm-9">

                <input type="text" class="form-control" id="nama_salah" name="nama_dok[]"
                    placeholder="Masukkan Nama dari Jenis Dokumen 1" value="{{old('nama_dok.0')}}">
                @if($errors->has('nama_dok.0'))
                <small class="text-danger">{{$errors->first('nama_dok.0')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Jenis Dokumen 2</label>
            <div class="col-sm-9 pl-2">
                <select id="jenis_dok" name="jenis_dok[]" class="dok_2 auto-save form-control">
                    <option value="">Pilih Dokumen 2</option>
                    <option value="ktp" {{(old('jenis_dok.1')=='ktp')?'selected':''}}>KTP</option>
                    <option value="sim" {{(old('jenis_dok.1')=='sim')?'selected':''}}>SIM</option>
                    <option value="ijazah" {{(old('jenis_dok.1')=='ijazah')?'selected':''}}>Ijazah</option>
                    <option value="kk" {{(old('jenis_dok.1')=='kk')?'selected':''}}>Kartu Keluarga</option>
                    <option value="akta nikah" {{(old('jenis_dok.1')=='akta nikah')?'selected':''}}>Akta Nikah</option>
                </select>
                @if($errors->has('jenis_dok.1'))
                <small class="text-danger">{{$errors->first('jenis_dok.1')}}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nomor Dokumen 2</label>

            <div class="col-sm-9">

                <input type="text" class="form-control" id="nomor_dok" name="nomor_dok[]"
                    placeholder="Masukkan Nomor Dokumen 2" value="{{old('nomor_dok.1')}}">
                @if($errors->has('nomor_dok.1'))
                <small class="text-danger">{{$errors->first('nomor_dok.1')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nama Dokumen 2</label>

            <div class="col-sm-9">

                <input type="text" class="form-control" id="nama_salah" name="nama_dok[]"
                    placeholder="Masukkan Nama dari Jenis Dokumen 2" value="{{old('nama_dok.1')}}">
                @if($errors->has('nama_dok.1'))
                <small class="text-danger">{{$errors->first('nama_dok.1')}}</small>
                @endif
            </div>

        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nama Yang Benar Diambil Dari</label>

            <div class="col-sm-8 pl-2">

                <div class="pt-2">

                    <div class="form-check-inline">

                        <label class="form-check-label">

                            <input type="radio" class="value_dok_1 form-check-input" name="data_dok_benar"
                                value="">Dokumen 1
                        </label>

                    </div>

                    <div class="form-check-inline">

                        <label class="form-check-label">

                            <input type="radio" class="value_dok_2 form-check-input" name="data_dok_benar"
                                value="">Dokumen 2

                        </label>

                    </div>

                </div>


                @if($errors->has('data_dok_benar'))
                <small class="text-danger">{{$errors->first('data_dok_benar')}}</small>
                @endif
            </div>

        </div>
        <button type="submit" class="btn btn-gelap float-right">Submit</button>
        <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button>
    </form>

    <br />

</div>

@endsection



@section('top-resource')

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

    $('.dok_1').change(function () {
        var id = $(this).val();
        $('.value_dok_1').val(id);
    })

    $('.dok_2').change(function () {
        var id = $(this).val();
        $('.value_dok_2').val(id);
    })

</script>
<script>
    // In order to call window.flutter_inappwebview.callHandler(handlerName <String>, ...args) 
    // properly, you need to wait and listen the JavaScript event flutterInAppWebViewPlatformReady. 
    // This event will be dispatched as soon as the platform (Android or iOS) is ready to handle the callHandler method. 
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
