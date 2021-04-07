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
                    <input type="file" class="custom-file-input" name="file_surat_permohonan" id="file_surat_permohonan"
                        value="{{old('file_surat_permohonan')}}" accept="image/jpg,image/jpeg,image/png">
                    <label class="custom-file-label" for="file_surat_permohonan">Unggah File</label>
                    @if($errors->has('file_surat_permohonan'))
                    <small class="text-danger">{{$errors->first('file_surat_permohonan')}}</small>
                    @endif
                </div>
				<img src="{{asset('backend/images/default.jpg')}}" id="preview-file_surat_permohonan" alt="" width="200px"
                    style="margin-top:7px"><br>
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
				<img src="{{asset('backend/images/default.jpg')}}" id="preview-file_kk" alt="" width="200px"
                    style="margin-top:7px"><br>
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
				<img src="{{asset('backend/images/default.jpg')}}" id="preview-file_buku_nikah" alt="" width="200px"
                    style="margin-top:7px"><br>
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
				<small class="w-100"> *) file type: pdf | max size: 1 MB</small>
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
				<img src="{{asset('backend/images/default.jpg')}}" id="preview-file_sk_kematian" alt="" width="200px"
                    style="margin-top:7px"><br>
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
				<img src="{{asset('backend/images/default.jpg')}}" id="preview-file_silsilah" alt="" width="200px"
                    style="margin-top:7px"><br>
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
				<img src="{{asset('backend/images/default.jpg')}}" id="preview-file_surat_pernyataan" alt="" width="200px"
                    style="margin-top:7px"><br>
				<small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div><br>
        <hr>
        <h5>Data Almarhum</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nama_alm'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Almarhum" name="nama_alm" value="{{old('nama_alm')}}">
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
                    placeholder="Masukan Tanggal Kematian" name="tgl_kematian" value="{{old('tgl_kematian')}}">
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
                    <option value="laki-laki" {{ ( old('jk_alm') == 'laki-laki') ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="perempuan" {{ ( old('jk_alm') == 'perempuan') ? 'selected' : '' }}>
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
                    class="form-control {{($errors->has('alamat'))?'is-invalid':''}}">{{old('alamat')}}</textarea>
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
                    <tr>
                        <td>
                            <input type="hidden" name="pasangan_id[]" value="">
                            <input type="text" name="nama_pasangan[]" class="form-control"
                                value="{!!old('nama_pasangan.0')!!}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control"
                                value="{!!old('tempat_lahir_pasangan.0')!!}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_pasangan.0')!!}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control">
                                <option value="laki-laki" {{(old('jk_pasangan.0')=='laki-laki')}}>Laki-laki</option>
                                <option value="perempuan" {{(old('jk_pasangan.0')=='perempuan')}}>Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control select2">
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}" {{(old('pekerjaan_id.0')==$data->id)}}>{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <!-- <td>
													<div onClick="deleteRow1(this)">
															<i class="fas fa-trash"></i>
													</div>
											</td> -->
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="pasangan_id[]" value="">
                            <input type="text" name="nama_pasangan[]" class="form-control"
                                value="{!!old('nama_pasangan.1')!!}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control"
                                value="{!!old('tempat_lahir_pasangan.1')!!}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_pasangan.1')!!}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control">
                                <option value="laki-laki" {{(old('jk_pasangan.1')=='laki-laki')}}>Laki-laki</option>
                                <option value="perempuan" {{(old('jk_pasangan.1')=='perempuan')}}>Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control select2">
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}" {{(old('pekerjaan_id.1')==$data->id)}}>{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <!-- <td>
													<div onClick="deleteRow1(this)">
															<i class="fas fa-trash"></i>
													</div>
											</td> -->
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="pasangan_id[]" value="">
                            <input type="text" name="nama_pasangan[]" class="form-control"
                                value="{!!old('nama_pasangan.2')!!}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control"
                                value="{!!old('tempat_lahir_pasangan.2')!!}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_pasangan.2')!!}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control">
                                <option value="laki-laki" {{(old('jk_pasangan.2')=='laki-laki')}}>Laki-laki</option>
                                <option value="laki-laki" {{(old('jk_pasangan.2')=='perempuan')}}>Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control select2">
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}" {{(old('pekerjaan_id.2')==$data->id)}}>{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <!-- <td>
													<div onClick="deleteRow1(this)">
															<i class="fas fa-trash"></i>
													</div>
											</td> -->
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="pasangan_id[]" value="">
                            <input type="text" name="nama_pasangan[]" class="form-control"
                                value="{!!old('nama_pasangan.3')!!}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control"
                                value="{!!old('tempat_lahir_pasangan.3')!!}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_pasangan.3')!!}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control">
                                <option value="laki-laki" {{(old('jk_pasangan.3')=='laki-laki')}}>Laki-laki</option>
                                <option value="perempuan" {{(old('jk_pasangan.3')=='perempuan')}}>Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control select2">
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}" {{(old('pekerjaan_id.3')==$data->id)}}>{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <!-- <td>
													<div onClick="deleteRow1(this)">
															<i class="fas fa-trash"></i>
													</div>
											</td> -->
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="pasangan_id[]" value="">
                            <input type="text" name="nama_pasangan[]" class="form-control"
                                value="{!!old('nama_pasangan.4')!!}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control"
                                value="{!!old('tempat_lahir_pasangan.4')!!}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_pasangan.4')!!}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control">
                                <option value="laki-laki" {{(old('jk_pasangan.4')=='laki-laki')}}>Laki-laki</option>
                                <option value="perempuan" {{(old('jk_pasangan.4')=='perempuan')}}>Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control select2">
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}" {{(old('pekerjaan_id.4')==$data->id)}}>{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <!-- <td>
													<div onClick="deleteRow1(this)">
															<i class="fas fa-trash"></i>
													</div>
											</td> -->
                    </tr>
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
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.0')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.0')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.0')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.0')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.0')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.0')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.1')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.1')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.1')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.1')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.1')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.1')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.2')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.2')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.2')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.2')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.2')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.2')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.3')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.3')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.3')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.3')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.3')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.3')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.4')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.4')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.4')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.4')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.4')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.4')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.5')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.5')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.5')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.5')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.5')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.5')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.6')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.6')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.6')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.6')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.6')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.6')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.7')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.7')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.7')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.7')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.7')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.7')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.8')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.8')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.8')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.8')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.8')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.8')!!}"></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="anak_id[]" value=""><input type="text" name="nama_anak[]"
                                class="form-control" value="{!!old('nama_anak.9')!!}"></td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control"
                                value="{!!old('tempat_lahir_anak.9')!!}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control datepicker"
                                value="{!!old('tgl_lahir_anak.9')!!}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control">
                                <option value="indonesia" {{(old('kewarganegaraan.9')=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.9')=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control"
                                value="{!!old('alamat_anak.9')!!}"></td>

                    </tr>
                </tbody>
            </table>
        </div><br>
        <hr>
        <h5>Data Saksi 1</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control {{($errors->has('nama_saksi1'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Saksi 1" name="nama_saksi1" value="{{old('nama_saksi1')}}">
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
                    placeholder="Masukan NIK saksi 1" name="nik_saksi1" value="{{old('nik_saksi1')}}">
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
                    placeholder="Masukan Nama Saksi 2" name="nama_saksi2" value="{{old('nama_saksi2')}}">
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
                    placeholder="Masukan NIK Saksi 2" name="nik_saksi2" value="{{old('nik_saksi2')}}">
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
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet"
    href="{{asset('backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/selectric/public/selectric.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
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
<script src="{{asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backend/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('backend/node_modules/selectric/public/jquery.selectric.min.js')}}"></script>
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

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>


<script>
    $('.').savy('load', function () {
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
