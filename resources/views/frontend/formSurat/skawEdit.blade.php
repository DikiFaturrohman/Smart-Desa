@extends('frontend.layout.app')

@section('title') Surat Keterangan Beda Nama @endsection

@section('meta')



@endsection

@section('header')

<header id="content-desktop">

    <section id="slideshow">

        <div class="slick">

            @if(count($slider) > 0)
            @foreach($slider as $list)
            <div>
                <img src="{{($list->img)?asset('backend/images/slider/'.$list->img):asset('backend/images/default.jpg')}}"
                    class="" alt="">
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

    <form id="mainform" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <h5>Dokumen Penunjang</h5><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Surat Permohonan</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="hidden" name="suket_id" value="{{$skaw->id}}">
                    <input type="file" class="custom-file-input" name="file_surat_permohonan" id="file_surat_permohonan"
                        value="{{old('file_surat_permohonan')}}" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_surat_permohonan">Unggah File</label>
                    @if($errors->has('file_surat_permohonan'))
                    <small class="text-danger">{{$errors->first('file_surat_permohonan')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skaw->file_surat_permohonan) ? $img . '/dokumen/skaw/surat_permohonan/' . $skaw->file_surat_permohonan : $img . '/default.jpg') ?>"
                    id="preview-file_surat_permohonan" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File KTP Ahli Waris (.pdf)</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_ktp" id="file_ktp"
                        value="{{old('file_ktp')}}" accept="">
                    <label class="custom-file-label" for="file_ktp">Unggah File</label>
                    @if($errors->has('file_ktp'))
                    <small class="text-danger">{{$errors->first('file_ktp')}}</small>
                    @endif
                </div>
                <small class="w-100"> *) file type: pdf | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Kartu Keluarga almarhum</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk" value="{{old('file_kk')}}"
                        accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skaw->file_kk) ? $img . '/dokumen/skaw/kk/' . $skaw->file_kk : $img . '/default.jpg') ?>"
                    id="preview-file_kk" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Surat Buku Nikah</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_buku_nikah" id="file_buku_nikah"
                        value="{{old('file_buku_nikah')}}" accept="">
                    <label class="custom-file-label" for="file_buku_nikah">Unggah File</label>
                    @if($errors->has('file_buku_nikah'))
                    <small class="text-danger">{{$errors->first('file_buku_nikah')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skaw->file_buku_nikah) ? $img . '/dokumen/skaw/buku_nikah/' . $skaw->file_buku_nikah : $img . '/default.jpg') ?>"
                    id="preview-file_buku_nikah" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Akta Lahir Seluruh Ahli Waris (.pdf)</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_akta_lahir" id="file_akta_lahir"
                        value="{{old('file_akta_lahir')}}" accept="">
                    <label class="custom-file-label" for="file_akta_lahir">Unggah File</label>
                    @if($errors->has('file_akta_lahir'))
                    <small class="text-danger">{{$errors->first('file_akta_lahir')}}</small>
                    @endif
                </div>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Surat Keterangan Kematian</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_sk_kematian" id="file_sk_kematian"
                        value="{{old('file_sk_kematian')}}" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_sk_kematian">Unggah File</label>
                    @if($errors->has('file_sk_kematian'))
                    <small class="text-danger">{{$errors->first('file_sk_kematian')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skaw->file_sk_kematian) ? $img . '/dokumen/skaw/sk_kematian/' . $skaw->file_sk_kematian : $img . '/default.jpg') ?>"
                    id="preview-file_sk_kematian" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Keterangan Silsilah Dari Kelurahan</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_silsilah" id="file_silsilah"
                        value="{{old('file_silsilah')}}" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_silsilah">Unggah File</label>
                    @if($errors->has('file_silsilah'))
                    <small class="text-danger">{{$errors->first('file_silsilah')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skaw->file_silsilah) ? $img . '/dokumen/skaw/silsilah/' . $skaw->file_silsilah : $img . '/default.jpg') ?>"
                    id="preview-file_silsilah" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_surat_pernyataan" id="file_surat_pernyataan"
                        value="{{old('file_surat_pernyataan')}}" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_surat_pernyataan">Unggah File</label>
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                </div>
                <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skaw->file_surat_pernyataan) ? $img . '/dokumen/skaw/surat_pernyataan/' . $skaw->file_surat_pernyataan : $img . '/default.jpg') ?>"
                    id="preview-file_surat_pernyataan" style="width: 200px;margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <hr>
        <h5>Data Almarhum</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nama_alm'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Almarhum" name="nama_alm" value="{{old('nama_alm',$skaw->nama_alm)}}">
                @if($errors->has('nama_alm'))
                <div class="invalid-feedback">
                    {{$errors->first('nama_alm')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Tanggal Meninggal</label>
            <div class="col-sm-9">
                <input type="date" class="form-control datepicker {{($errors->has('tgl_kematian'))?'is-invalid':''}}"
                    placeholder="Masukan Tanggal Kematian" name="tgl_kematian"
                    value="{{old('tgl_kematian',$skaw->tgl_kematian)}}">
                @if($errors->has('tgl_kematian'))
                <div class="invalid-feedback">
                    {{$errors->first('tgl_kematian')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
                <select class="form-control select2 {{($errors->has('jk_alm'))?'is-invalid':''}}" name="jk_alm">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="laki-laki" {{ ( old('jk_alm',$skaw->jk_alm) == 'laki-laki') ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="perempuan" {{ ( old('jk_alm',$skaw->jk_alm) == 'perempuan') ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
                @if($errors->has('jk_alm'))
                <div class="invalid-feedback">
                    {{$errors->first('jk_alm')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <textarea name="alamat" id="" cols="30" rows="10"
                    class="form-control {{($errors->has('alamat'))?'is-invalid':''}}">{{old('alamat',$skaw->alamat)}}</textarea>
                @if($errors->has('alamat'))
                <div class="invalid-feedback">
                    {{$errors->first('alamat')}}
                </div>
                @endif
            </div>
        </div>
        <hr>
        <h5>Data Pasangan</h5><br>
        <div class="table-responsive">
            <table id="tableData1" class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @if(count($skaw->pasangan) > 0)
                    @foreach($skaw->pasangan as $pasangan)
                    <tr>
                        <td>
                            <input type="hidden" name="pasangan_id[]"
                                value="{{$pasangan->id}}">
                            <input type="text" name="nama_pasangan[]" class="form-control"
                                value="{!!old('nama',$pasangan->nama)!!}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control"
                                value="{!!old('tempat_lahir',$pasangan->tempat_lahir)!!}">
                        </td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir',$pasangan->tgl_lahir)!!}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control">
                                <option value="laki-laki"
                                    {{(old('jk_pasangan',$pasangan->jk)=='laki-laki')}}>Laki-laki
                                </option>
                                <option value="perempuan"
                                    {{(old('jk_pasangan',$pasangan->jk)=='perempuan')}}>Perempuan
                                </option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control select2">
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}"
                                    {{(old('pekerjaan_id',$pasangan->pekerjaan_id)==$data->id)}}>
                                    {{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <!-- <button onClick="addRow1()" type="button" class="btn btn-success" data-toggle="modal"
							data-target="#functionInfoModal">
							Tambah
					</button> -->
        </div><br>
        <hr>
        <h5>Data Anak</h5><br>
        <div class="table-responsive">
            <table id="tableData" class="table ">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kewarganegaraan</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @if(count($skaw->anak) > 0)
                    @foreach($skaw->anak as $anak)
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value="{{$anak->id}}">
                            <input type="text" name="nama_anak[]" class="form-control"
                                value="{!!old('nama',$anak->nama)!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir',$anak->tempat_lahir)!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir',$anak->tgl_lahir)!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia"
                                    {{(old('kewarganegaraan',$anak->kewarganegaraan)=='indonesia')?'selected':''}}>
                                    Indonesia</option>
                                <option value="wna"
                                    {{(old('kewarganegaraan',$anak->kewarganegaraan)=='wna')?'selected':''}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak',$anak->alamat)!!}"></td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div><br>
        <hr>
        <h5>Data Saksi 1</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nama_saksi1'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Saksi 1" name="nama_saksi1"
                    value="{{old('nama_saksi1',$skaw->nama_saksi1)}}">
                @if($errors->has('nama_saksi1'))
                <div class="invalid-feedback">
                    {{$errors->first('nama_saksi1')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nik_saksi1'))?'is-invalid':''}}"
                    placeholder="Masukan NIK saksi 1" name="nik_saksi1" value="{{old('nik_saksi1',$skaw->nik_saksi1)}}">
                @if($errors->has('nik_saksi1'))
                <div class="invalid-feedback">
                    {{$errors->first('nik_saksi1')}}
                </div>
                @endif
            </div>
        </div>
        <hr>
        <h5>Data Saksi 2</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nama_saksi2'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Saksi 2" name="nama_saksi2"
                    value="{{old('nama_saksi2',$skaw->nama_saksi2)}}">
                @if($errors->has('nama_saksi2'))
                <div class="invalid-feedback">
                    {{$errors->first('nama_saksi2')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nik_saksi2'))?'is-invalid':''}}"
                    placeholder="Masukan NIK Saksi 2" name="nik_saksi2"
                    value="{{old('nik_saksi2',$skaw->nik_saksi2)}}">
                @if($errors->has('nik_saksi2'))
                <div class="invalid-feedback">
                    {{$errors->first('nik_saksi2')}}
                </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="text-right">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button id="verifikasiBtn" class="btn btn-gelap">Submit</button>
        </div>
    </form>



    <div class="line" id="content-mobile"></div>

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
