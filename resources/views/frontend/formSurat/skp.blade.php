@extends('frontend.layout.app')

@section('title') Surat Keterangan Penghasilan @endsection

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

<div class="container py-3">



    <h2>Pengajuan Surat Keterangan Penghasilan</h2>

    <div class="line"></div>

    <!-- content -->

    <form method="post" action="" enctype="multipart/form-data" id="mainform">

        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Bukti Usaha/Slip Gaji</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_slip_gaji" id="file_slip_gaji">
                    <label class="custom-file-label" for="file_sp_rtrw">Unggah File</label>
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                </div>
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_slip_gaji" alt="" width="200px"
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
            <label for="" class="col-sm-3 col-form-label">Scan/Foto Kartu Keluarga</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div>
                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_kk" alt="" width="200px"
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

                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="{{old('nik',Auth::guard('masyarakat')->user()->nik)}}" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"
                    value="{{old('nama',Auth::guard('masyarakat')->user()->nama_lengkap)}}" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="" name="tempat_lahir" placeholder=""
                    value="{{old('tempat_lahir')}}">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>

            <div class="col-sm-8 pl-2">

                <input type="date" class="form-control" name="tgl_lahir"  value="{{old('tgl_lahir',Auth::guard('masyarakat')->user()->tgl_lahir)}}" readonly/>
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
                                {{(old('jk',Auth::guard('masyarakat')->user()->jenis_kelamin)=='laki-laki')?'checked':''}}>Laki-laki

                        </label>

                    </div>

                    <div class="form-check-inline">

                        <label class="form-check-label" for="perempuan">

                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                {{(old('jk',Auth::guard('masyarakat')->user()->jenis_kelamin)=='perempuan')?'checked':''}}>Perempuan

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

            <label for="" class="col-sm-3 col-form-label"> </label>

            <div class="col-sm-8 pl-2">

                <input class="form-control" id="" name="pekerjaan_lainnya"
                    placeholder="Diisi jika pilihan pekerjaan 'Lainnya'">
                @if($errors->has('pekerjaan_lainnya'))
                <small class="text-danger">{{$errors->first('pekerjaan_lainnya')}}</small>
                @endif
            </div>

        </div>
        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Alamat Lengkap</label>

            <div class="col-sm-8 pl-2">

                <textarea class="form-control" rows="3" id="" name="alamat"
                    placeholder="Masukkan alamat lengkap beserta RT/RW nya" readonly>{{old('alamat',Auth::guard('masyarakat')->user()->alamat)}}</textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>

        </div>


        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Jumlah Tanggungan Keluarga</label>

            <div class="col-sm-8 pl-2">

                <input type="number" min="0" class="form-control" id="" name="jumlah_tanggungan"
                    placeholder="Jumlah orang yang ditanggung dalam keluarga" value="{{old('jumlah_tanggungan')}}">
                @if($errors->has('jumlah_tanggungan'))
                <small class="text-danger">{{$errors->first('jumlah_tanggungan')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Nominal Penghasilan Perbulan</label>

            <div class="col-sm-8 pl-2">

                <input type="number" min="0" class="form-control" id="" name="nominal" placeholder="Nominal angka"
                    value="{{old('nominal')}}">
                @if($errors->has('nominal'))
                <small class="text-danger">{{$errors->first('nominal')}}</small>
                @endif
            </div>

        </div>

        <div class="form-group row">

            <label for="" class="col-sm-3 col-form-label">Terbilang</label>

            <div class="col-sm-8 pl-2">

                <input type="text" class="form-control" id="" name="terbilang"
                    placeholder="Jumlah penghasilan terbilang" value="{{old('terbilang')}}">
                @if($errors->has('terbilang'))
                <small class="text-danger">{{$errors->first('terbilang')}}</small>
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
