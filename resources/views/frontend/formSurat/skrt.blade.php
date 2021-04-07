@extends('frontend.layout.app')

@section('title') Surat Keterangan Riwayat Tanah @endsection

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



    <h2>Pengajuan Surat Keterangan Riwayat Tanah</h2>

    <div class="line"></div>

    <!-- content -->

    <form id="mainform" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="list-group">

            <!-- Step 1 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Lampiran Persyaratan</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Tanah</label>
                            <div class="col-sm-8 pl-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file_surat_tanah"
                                        id="file_surat_tanah">
                                    <label class="custom-file-label" for="file_surat_tanah">Unggah File</label>
                                    @if($errors->has('file_surat_tanah'))
                                    <small class="text-danger">{{$errors->first('file_surat_tanah')}}</small>
                                    @endif
                                </div>
                                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_surat_tanah" alt="" width="200px"
                    style="margin-top:7px"><br>
                                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Pajak Tanah</label>
                            <div class="col-sm-8 pl-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file_surat_pajak_tanah"
                                        id="file_surat_pajak_tanah">
                                    <label class="custom-file-label" for="file_surat_pajak_tanah">Unggah File</label>
                                    @if($errors->has('file_surat_pajak_tanah'))
                                    <small class="text-danger">{{$errors->first('file_surat_pajak_tanah')}}</small>
                                    @endif
                                </div>
                                <img src="{{asset('backend/images/default.jpg')}}" id="preview-file_surat_pajak_tanah" alt="" width="200px"
                    style="margin-top:7px"><br>
                                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                        </div>
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
                    </div>
                </div>

            </div>

            <!-- Step 2 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Pemilik</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>
                        <div class="form-group">

                            <label>NIK</label>

                            <input type="text" name="nik_pemilik" id="nik" class="auto-save form-control"
                                value="{{old('nik_pemilik')}}" />
                            @if($errors->has('nik_pemilik'))
                            <small class="text-danger">{{$errors->first('nik_pemilik')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input type="text" name="nama_pemilik" id="nama" class="auto-save form-control"
                                value="{{old('nama_pemilik')}}" />
                            @if($errors->has('nama_pemilik'))
                            <small class="text-danger">{{$errors->first('nama_pemilik')}}</small>
                            @endif
                        </div>



                    </div>

                </div>

            </div>

            <!-- Step 3 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Riwayat Tanah</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <h6>Riwayat 1</h6>

                        <div class="form-group">

                            <label>Tanggal</label>

                            <input type="date" name="tgl_riwayat1" id="date" class="auto-save form-control"
                                value="{{old('tgl_riwayat1')}}" />
                            @if($errors->has('tgl_riwayat1'))
                            <small class="text-danger">{{$errors->first('tgl_riwayat1')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Tercatat Atas Nama</label>

                            <input type="text" name="atas_nama1" id="nama" class="auto-save form-control"
                                value="{{old('atas_nama1')}}" />
                            @if($errors->has('atas_nama1'))
                            <small class="text-danger">{{$errors->first('atas_nama1')}}</small>
                            @endif
                        </div>

                        <h6>Riwayat 2</h6>

                        <div class="form-group">

                            <label>Tanggal</label>

                            <input type="date" name="tgl_riwayat2" id="date" class="auto-save form-control"
                                value="{{old('tgl_riwayat2')}}" />
                            @if($errors->has('tgl_riwayat2'))
                            <small class="text-danger">{{$errors->first('tgl_riwayat2')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Balik Nama Kepada</label>

                            <input type="text" name="atas_nama2" id="nama" class="auto-save form-control"
                                value="{{old('atas_nama2')}}" />
                            @if($errors->has('atas_nama2'))
                            <small class="text-danger">{{$errors->first('atas_nama2')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Berdasarkan</label>

                            <select id="" name="berdasarkan2" class="auto-save form-control">

                                <option value="jual beli" {{(old('berdasarkan2')=='jual beli')?'selected':''}}>Jual Beli
                                </option>

                                <option value="hibah" {{(old('berdasarkan2')=='hibah')?'selected':''}}>Hibah</option>

                                <option value="waris" {{(old('berdasarkan2')=='waris')?'selected':''}}>Waris</option>

                            </select>
                            @if($errors->has('berdasarkan2'))
                            <small class="text-danger">{{$errors->first('berdasarkan2')}}</small>
                            @endif
                        </div>

                        <h6>Riwayat 3</h6>

                        <div class="form-group">

                            <label>Tanggal</label>

                            <input type="date" name="tgl_riwayat3" id="date" class="auto-save form-control"
                                value="{{old('tgl_riwayat3')}}" />
                            @if($errors->has('tgl_riwayat3'))
                            <small class="text-danger">{{$errors->first('tgl_riwayat3')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Balik Nama Kepada</label>

                            <input type="text" name="atas_nama3" id="nama" class="auto-save form-control"
                                value="{{old('atas_nama3')}}" />
                            @if($errors->has('atas_nama3'))
                            <small class="text-danger">{{$errors->first('atas_nama3')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Berdasarkan</label>

                            <select id="" name="berdasarkan3" class="auto-save form-control">

                                <option value="jual beli" {{(old('berdasarkan3')=='jual beli')?'selected':''}}>Jual Beli
                                </option>

                                <option value="hibah" {{(old('berdasarkan3')=='jual beli')?'selected':''}}>Hibah
                                </option>

                                <option value="waris" {{(old('berdasarkan3')=='jual beli')?'selected':''}}>Waris
                                </option>

                            </select>
                            @if($errors->has('berdasarkan3'))
                            <small class="text-danger">{{$errors->first('berdasarkan3')}}</small>
                            @endif
                        </div>

                        <h6>Riwayat 4</h6>

                        <div class="form-group">

                            <label>Tanggal</label>

                            <input type="date" name="tgl_riwayat4" id="date" class="auto-save form-control"
                                value="{{old('tgl_riwayat4')}}" />
                            @if($errors->has('tgl_riwayat4'))
                            <small class="text-danger">{{$errors->first('tgl_riwayat4')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Balik Nama Kepada</label>

                            <input type="text" name="atas_nama4" id="nama" class="auto-save form-control"
                                value="{{old('atas_nama4')}}" />
                            @if($errors->has('atas_nama4'))
                            <small class="text-danger">{{$errors->first('atas_nama4')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Berdasarkan</label>

                            <select id="" name="berdasarkan4" class="auto-save form-control">

                                <option value="jual beli" {{(old('berdasarkan4')=='jual beli')?'selected':''}}>Jual Beli
                                </option>

                                <option value="hibah" {{(old('berdasarkan4')=='hibah')?'selected':''}}>Hibah</option>

                                <option value="waris" {{(old('berdasarkan4')=='waris')?'selected':''}}>Waris</option>

                            </select>
                            @if($errors->has('berdasarkan4'))
                            <small class="text-danger">{{$errors->first('berdasarkan4')}}</small>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

            <!-- Step  -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Tanah</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">

                            <label>Nomor Sertifikat</label>

                            <input type="text" name="no_sertifikat" id="sppt" class="auto-save form-control"
                                value="{{old('no_sertifikat')}}" />
                            @if($errors->has('no_sertifikat'))
                            <small class="text-danger">{{$errors->first('no_sertifikat')}}</small>
                            @endif
                        </div>
                        <div class="form-group">

                            <label>Nomor SPPT</label>

                            <input type="text" name="no_sppt" id="sppt" class="auto-save form-control"
                                value="{{old('no_sppt')}}" />
                            @if($errors->has('no_sppt'))
                            <small class="text-danger">{{$errors->first('no_sppt')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Blok</label>

                            <input type="text" name="blok" id="blok" class="auto-save form-control"
                                value="{{old('blok')}}" />
                            @if($errors->has('blok'))
                            <small class="text-danger">{{$errors->first('blok')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Persil</label>

                            <input type="text" name="persil" id="persil" class="auto-save form-control"
                                value="{{old('persil')}}" />
                            @if($errors->has('persil'))
                            <small class="text-danger">{{$errors->first('persil')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>No. Kohir/Kikitir/Girik</label>

                            <input type="text" name="no_kihir" id="kokigi" class="auto-save form-control"
                                value="{{old('no_kihir')}}" />
                            @if($errors->has('no_kihir'))
                            <small class="text-danger">{{$errors->first('no_kihir')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Luas</label>

                            <input type="text" name="luas" id="sppt" class="auto-save form-control"
                                placeholder="ukuran dalam skala m&sup2;" value="{{old('luas')}}" />
                            @if($errors->has('luas'))
                            <small class="text-danger">{{$errors->first('luas')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Alamat</label>

                            <textarea name="alamat" class="form-control">{{old('alamat')}}</textarea>
                            @if($errors->has('alamat'))
                            <small class="text-danger">{{$errors->first('alamat')}}</small>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

            <!-- Step  -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Batas Tanah</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">

                            <label>Sebelah Utara</label>

                            <input type="text" name="sebelah_utara" id="batasutara" class="auto-save form-control"
                                value="{{old('sebelah_utara')}}" />
                            @if($errors->has('sebelah_utara'))
                            <small class="text-danger">{{$errors->first('sebelah_utara')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Sebelah Timur</label>

                            <input type="text" name="sebelah_timur" id="batastimur" class="auto-save form-control"
                                value="{{old('sebelah_timur')}}" />
                            @if($errors->has('sebelah_timur'))
                            <small class="text-danger">{{$errors->first('sebelah_timur')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Sebelah Selatan</label>

                            <input type="text" name="sebelah_selatan" id="batasselatan" class="auto-save form-control"
                                value="{{old('sebelah_selatan')}}" />
                            @if($errors->has('sebelah_selatan'))
                            <small class="text-danger">{{$errors->first('sebelah_selatan')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Sebelah Barat</label>

                            <input type="text" name="sebelah_barat" id="batasbarat" class="auto-save form-control"
                                value="{{old('sebelah_barat')}}" />
                            @if($errors->has('sebelah_barat'))
                            <small class="text-danger">{{$errors->first('sebelah_barat')}}</small>
                            @endif
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

                            <input type="text" name="nik_saksi1" id="nik_saksi1" class="auto-save form-control"
                                value="{{old('nik_saksi1')}}" />
                            @if($errors->has('nik_saksi1'))
                            <small class="text-danger">{{$errors->first('nik_saksi1')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input type="text" name="nama_saksi1" id="nama_saksi1" class="auto-save form-control"
                                value="{{old('nama_saksi1')}}" />
                            @if($errors->has('nama_saksi1'))
                            <small class="text-danger">{{$errors->first('nama_saksi1')}}</small>
                            @endif
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

                            <input type="text" name="nik_saksi2" id="nik_saksi2" class="auto-save form-control"
                                value="{{old('nik_saksi2')}}" />
                            @if($errors->has('nik_saksi2'))
                            <small class="text-danger">{{$errors->first('nik_saksi2')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input type="text" name="nama_saksi2" id="nama_saksi2" class="auto-save form-control"
                                value="{{old('nama_saksi2')}}" />
                            @if($errors->has('nama_saksi2'))
                            <small class="text-danger">{{$errors->first('nama_saksi2')}}</small>
                            @endif
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

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}" />

<!-- Add the slick-theme.css if you want default styling -->

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}" />

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

<style>
    div[data-acc-content] {
        display: none;
    }

    div[data-acc-step]:not(.open) {
        background: #6c757d;
    }

    div[data-acc-step]:not(.open) h5 {
        color: #fff;
    }

    div[data-acc-step]:not(.open) .badge-primary {
        background: #263238;
    }

</style>

@endsection

@section('bottom-resource')

<script src="{{asset('frontend/js/savy.min.js')}}"></script>

<script src="{{asset('frontend/js/jquery.accordion-wizard.min.js')}}"></script>

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



<script type="text/javascript">
    $(function () {

        $("#mainform").accWizard({

            start: 1, // start step

            mode: "wizard", // or 'edit'

            enableScrolling: true, // auto scroll the page to the current step

            scrollPadding: 5, // padding in pixels

            autoButtons: true, // auto add next/back buttons

            autoButtonsNextClass: 'btn btn-gelap float-right', // CSS classes for next/back buttons

            autoButtonsPrevClass: 'btn btn-secondary', // CSS classes for next/back buttons

            autoButtonsShowSubmit: true, // auto show submit button

            autoButtonsSubmitText: 'Submit', // submit text

            autoButtonsEditSubmitText: 'Save', // save text

            stepNumbers: true, // show step number

            stepNumberClass: 'badge badge-pill badge-gelap mr-1', // CSS class for step number



            beforeNextStep: function (currentStep) {

                return true;

            },

            onSubmit: function (element) {

                $('#mainform').submit();

                $('.auto-save').savy('destroy');

            }

        });

    });

</script>



<script>
    $('.auto-save').savy('load', function () {

        console.log("All data from savy are loaded");

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
