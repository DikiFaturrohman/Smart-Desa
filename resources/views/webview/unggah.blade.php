@extends('frontend.layout.wv-app')

@section('title') Halaman Unggah Dokumen @endsection

@section('meta')
@endsection

@section('content')
<div class="container py-3">
    <center>
    <h3>Halaman Unggah Dokumen</h3>
    </center>
    
    <div class="line"></div>
    <!-- content -->
    <form action="{{route('frontend.unggah.proses',['token' =>$user->api_token])}}" method="post" enctype="multipart/form-data" id="mainform">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto KTP</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="file_ktp" id="file_ktp"  accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_ktp">Unggah File</label>
                    @if($errors->has('file_ktp'))
                    <small class="text-danger">{{$errors->first('file_ktp')}}</small>
                    @endif
                </div>
                <img src="{{($unggah)?asset('storage/backend/images/uploads/'.$unggah->file_ktp):asset('backend/images/default.jpg')}}"
                    id="preview-file_ktp" alt="" width="200px" style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Kartu Keluarga</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div>
                <img src="{{($unggah)?asset('storage/backend/images/uploads/'.$unggah->file_kk):asset('backend/images/default.jpg')}}"
                    id="preview-file_kk" alt="" width="200px" style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" id="tes" class="btn btn-gelap float-right">{{($unggah)?'Ubah':'Simpan'}}</button>
            </div>
        </div>
    </form>
    <br />
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
