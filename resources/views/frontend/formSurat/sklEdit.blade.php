@extends('frontend.layout.app')

@section('title') Surat Keterangan Kelahiran @endsection

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



    <h2>Pengajuan Surat Keterangan Kelahiran</h2>

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
                            <label class="col-sm-3 col-form-label">Scan/Foto KK Orangtua Bayi</label>
							<div class="col-sm-8 pl-2">
                            <div class="custom-file">
                                <input type="hidden" name="suket_id" value="{{$skl->id}}">
                                <input type="file" class="custom-file-input" name="file_kk" id="file_kk">
                                <label class="custom-file-label" for="file_kk">Unggah File</label>
                                @if($errors->has('file_kk'))
                                <small class="text-danger">{{$errors->first('file_kk')}}</small>
                                @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skl->file_kk) ? $img . '/dokumen/skk/kk/' . $skl->file_kk : $img . '/default.jpg') ?>"
                    id="preview-file_kk" style="width: 200px;margin-top:7px"><br>
						<small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Scan/Foto KTP Ibu</label>
							<div class="col-sm-8 pl-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_ibu" id="file_ibu">
                                <label class="custom-file-label" for="file_ibu">Unggah File</label>
                                @if($errors->has('file_ibu'))
                                <small class="text-danger">{{$errors->first('file_ibu')}}</small>
                                @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skl->file_ibu) ? $img . '/dokumen/skk/file_ibu/' . $skl->file_ibu : $img . '/default.jpg') ?>"
                    id="preview-file_ibu" style="width: 200px;margin-top:7px"><br>
						<small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Scan/Foto KTP Ayah</label>
							<div class="col-sm-8 pl-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_ayah" id="file_ayah">
                                <label class="custom-file-label" for="file_ayah">Unggah File</label>
                                @if($errors->has('file_ayah'))
                                <small class="text-danger">{{$errors->first('file_ayah')}}</small>
                                @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skl->file_ayah) ? $img . '/dokumen/skk/file_ayah/' . $skl->file_ayah : $img . '/default.jpg') ?>"
                    id="preview-file_ayah" style="width: 200px;margin-top:7px"><br>
						<small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Scan/Foto Surat/Akta Nikah</label>
							<div class="col-sm-8 pl-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_surat_nikah"
                                    id="file_surat_nikah">
                                <label class="custom-file-label" for="file_surat_nikah">Unggah File</label>
                                @if($errors->has('file_surat_nikah'))
                                <small class="text-danger">{{$errors->first('file_surat_nikah')}}</small>
                                @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skl->file_surat_nikah) ? $img . '/dokumen/skk/surat_nikah/' . $skl->file_surat_nikah : $img . '/default.jpg') ?>"
                    id="preview-file_surat_nikah" style="width: 200px;margin-top:7px"><br>
						<small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Scan/Foto Surat Keterangan Kelahiran dari dokter/bidan/lainnya
                                kelahiran</label>
								<div class="col-sm-8 pl-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_sk_kelahiran"
                                    id="file_sk_kelahiran">
                                <label class="custom-file-label" for="file_sk_kelahiran">Unggah File</label>
                                @if($errors->has('file_sk_kelahiran'))
                                <small class="text-danger">{{$errors->first('file_sk_kelahiran')}}</small>
                                @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skl->file_sk_kelahiran) ? $img . '/dokumen/skk/sk_kelahiran/' . $skl->file_sk_kelahiran : $img . '/default.jpg') ?>"
                    id="preview-file_sk_kelahiran" style="width: 200px;margin-top:7px"><br>
						<small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor KK</label>
							<div class="col-sm-8 pl-2">
                            <input type="text" name="no_kk" id="no_kk" class="form-control" value="{{old('no_kk',$skl->no_kk)}}"/>
                            @if($errors->has('no_kk'))
                            <small class="text-danger">{{$errors->first('no_kk')}}</small>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Kepala Keluarga</label>
							<div class="col-sm-8 pl-2">
                            <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga"
                                class="form-control" value="{{old('nama_kepala_keluarga',$skl->nama_kepala_keluarga)}}"/>
                            @if($errors->has('nama_kepala_keluarga'))
                            <small class="text-danger">{{$errors->first('nama_kepala_keluarga')}}</small>
                            @endif
                        </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Step 2 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Bayi/Anak</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input type="text" name="nama_bayi" id="nama_bayi" class="form-control" value="{{old('nama_bayi',$skl->nama_bayi)}}" />
                            @if($errors->has('nama_bayi'))
                            <small class="text-danger">{{$errors->first('nama_bayi')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Jenis Kelamin</label>

                            <div class="checkbox">
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="laki-laki">
                                        <input type="radio" class="form-check-input" id="laki-laki" name="jk_bayi"
                                            value="laki-laki" {{(old('jk_bayi',$skl->jk_bayi)=='laki-laki')?'checked':''}}>Laki-laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="perempuan">
                                        <input type="radio" class="form-check-input" id="perempuan" name="jk_bayi"
                                            value="perempuan" {{(old('jk_bayi',$skl->jk_bayi)=='perempuan')?'checked':''}}>Perempuan
                                    </label>
                                </div>
                                @if($errors->has('jk_bayi'))
                                <small class="text-danger">{{$errors->first('jk_bayi')}}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="">Tempat Dilahirkan</label>

                            <select id="tempat_dilahirkan" name="tempat_dilahirkan" class="form-control">

                                <option value="rs/rb" {{(old('tempat_dilahirkan',$skl->tempat_dilahirkan)=='rs/rb')?'selected':''}}>Rumah Sakit/Rumah Bersalin</option>

                                <option value="puskesmas" {{(old('tempat_dilahirkan',$skl->tempat_dilahirkan)=='puskesmas')?'selected':''}}>Puskesmas</option>

                                <option value="polindes" {{(old('tempat_dilahirkan',$skl->tempat_dilahirkan)=='polindes')?'selected':''}}>Polindes</option>

                                <option value="rumah" {{(old('tempat_dilahirkan',$skl->tempat_dilahirkan)=='rumah')?'selected':''}}>Rumah</option>

                                <option value="lainnya" {{(old('tempat_dilahirkan',$skl->tempat_dilahirkan)=='lainnya')?'selected':''}}>Lainnya</option>

                            </select>
                            @if($errors->has('tempat_dilahirkan'))
                            <small class="text-danger">{{$errors->first('tempat_dilahirkan')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="tempat_lahir">Tempat Kelahiran</label>

                            <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control" value="{{old('tempat_lahir',$skl->tempat_lahir)}}">
                            @if($errors->has('tempat_lahir'))
                            <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Hari Kelahiran</label>

                            <select id="hari" name="hari" class="form-control">

                                <option value="senin" {{(old('hari',$skl->hari)=='senin')?'selected':''}}>Senin</option>

                                <option value="selasa" {{(old('hari',$skl->hari)=='selasa')?'selected':''}}>Selasa</option>

                                <option value="rabu" {{(old('hari',$skl->hari)=='rabu')?'selected':''}}>Rabu</option>

                                <option value="kamis" {{(old('hari',$skl->hari)=='kamis')?'selected':''}}>Kamis</option>

                                <option value="jumat" {{(old('hari',$skl->hari)=='jumat')?'selected':''}}>Jumat</option>

                                <option value="sabtu" {{(old('hari',$skl->hari)=='sabtu')?'selected':''}}>Sabtu</option>

                                <option value="minggu" {{(old('hari',$skl->hari)=='minggu')?'selected':''}}>Minggu</option>

                            </select>
                            @if($errors->has('hari'))
                            <small class="text-danger">{{$errors->first('hari')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Tanggal Kelahiran</label>

                            <input id="tgl_lahir_bayi" name="tgl_lahir_bayi" type="date" class="form-control" value="{{old('tgl_lahir_bayi',$skl->tgl_lahir_bayi)}}">
                            @if($errors->has('tgl_lahir_bayi'))
                            <small class="text-danger">{{$errors->first('tgl_lahir_bayi')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Waktu Kelahiran</label>

                            <input id="pukul" name="pukul" type="time" class="form-control" value="{{old('pukul',$skl->pukul)}}">
                            @if($errors->has('pukul'))
                            <small class="text-danger">{{$errors->first('pukul')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Jenis Kelahiran</label>

                            <select id="jenis_kelahiran" name="jenis_kelahiran" class="form-control">

                                <option value="tunggal" {{(old('jenis_kelahiran',$skl->jenis_kelahiran)=='tunggal')?'selected':''}}>Tunggal</option>

                                <option value="kembar 2" {{(old('jenis_kelahiran',$skl->jenis_kelahiran)=='kembar 2')?'selected':''}}>Kembar 2</option>

                                <option value="kembar 3" {{(old('jenis_kelahiran',$skl->jenis_kelahiran)=='kembar 3')?'selected':''}}>Kembar 3</option>

                                <option value="kembar 4" {{(old('jenis_kelahiran',$skl->jenis_kelahiran)=='kembar 4')?'selected':''}}>Kembar 4</option>

                                <option value="lainnya" {{(old('jenis_kelahiran',$skl->jenis_kelahiran)=='lainnya')?'selected':''}}>Lainnya</option>

                            </select>
                            @if($errors->has('jenis_kelahiran'))
                            <small class="text-danger">{{$errors->first('jenis_kelahiran')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Kelahiran ke</label>

                            <input id="kelahiran_ke" name="kelahiran_ke" type="text" class="form-control" value="{{old('kelahiran_ke',$skl->kelahiran_ke)}}">
                            @if($errors->has('kelahiran_ke'))
                            <small class="text-danger">{{$errors->first('kelahiran_ke')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Penolong Kelahiran</label>

                            <select id="penolong_kelahiran" name="penolong_kelahiran" class="form-control">
                                <option value="dokter" {{(old('penolong_kelahiran',$skl->penolong_kelahiran)=='dokter')?'selected':''}}>Dokter</option>
                                <option value="bidan/perawat" {{(old('penolong_kelahiran',$skl->penolong_kelahiran)=='bidan/perawat')?'selected':''}}>Bidan/Perawat</option>
                                <option value="dukun" {{(old('penolong_kelahiran',$skl->penolong_kelahiran)=='dukun')?'selected':''}}>Dukun</option>
                                <option value="lainnya" {{(old('penolong_kelahiran',$skl->penolong_kelahiran)=='lainnya')?'selected':''}}>Lainnya</option>
                            </select>
                            @if($errors->has('penolong_kelahiran'))
                            <small class="text-danger">{{$errors->first('penolong_kelahiran')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Berat Bayi</label>

                            <input id="berat_bayi" name="berat_bayi" type="text" class="form-control"
                                placeholder="ukuran dalam skala kg" value="{{old('berat_bayi',$skl->berat_bayi)}}">
                            @if($errors->has('berat_bayi'))
                            <small class="text-danger">{{$errors->first('berat_bayi')}}</small>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="">Panjang Bayi</label>

                            <input id="panjang_bayi" name="panjang_bayi" type="text" class="form-control"
                                placeholder="ukuran dalam skala cm" value="{{old('panjang_bayi',$skl->panjang_bayi)}}">
                            @if($errors->has('panjang_bayi'))
                            <small class="text-danger">{{$errors->first('panjang_bayi')}}</small>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

            <!-- Step 3 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Ibu</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">
                            <label for="">NIK</label>
                            <input id="nik_ibu" name="nik_ibu" type="text" class="form-control" value="{{old('nik_ibu',$skl->nik_ibu)}}">
                            @if($errors->has('nik_ibu'))
                            <small class="text-danger">{{$errors->first('nik_ibu')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input id="nama_ibu" name="nama_ibu" type="text" class="form-control" value="{{old('nama_ibu',$skl->nama_ibu)}}">
                            @if($errors->has('nama_ibu'))
                            <small class="text-danger">{{$errors->first('nama_ibu')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input id="tgl_lahir_ibu" name="tgl_lahir_ibu" type="date" class="form-control" value="{{old('tgl_lahir_ibu',$skl->tgl_lahir_ibu)}}">
                            @if($errors->has('tgl_lahir_ibu'))
                            <small class="text-danger">{{$errors->first('tgl_lahir_ibu')}}</small>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Umur</label>
                            <input id="umur_ibu" name="umur_ibu" type="text" class="form-control" value="{{old('umur_ibu',$skl->umur_ibu)}}">
                            @if($errors->has('umur_ibu'))
                            <small class="text-danger">{{$errors->first('umur_ibu')}}</small>
                            @endif
                        </div> -->
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <select id="pekerjaan_id_ibu" name="pekerjaan_id_ibu" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}" {{(old('pekerjaan_id_ibu',$skl->pekerjaan_id_ibu)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pekerjaan_id_ibu'))
                            <small class="text-danger">{{$errors->first('pekerjaan_id_ibu')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea id="alamat_ibu" name="alamat_ibu" type="text"
                                class="form-control">{{old('alamat_ibu',$skl->alamat_ibu)}}</textarea>
                            @if($errors->has('alamat_ibu'))
                            <small class="text-danger">{{$errors->first('alamat_ibu')}}</small>
                            @endif
                        </div>
                        <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_ibu" name="provinsi_id_ibu" class="provinsi_ibu form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}"{{(old('provinsi_id_ibu',$skl->provinsi_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_ibu'))
                    <small class="text-danger">{{$errors->first('provinsi_id_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kabupaten/Kota</label>

                    <select id="kota_ibu" name="kota_id_ibu" class=" kota_ibu form-control">
                        <option value="">-- Pilih Kota/kabupaten --</option>
                        @foreach($kotaIbu as $data)
                        <option value="{{$data->id}}"{{(old('kota_id_ibu',$skl->kota_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_ibu'))
                    <small class="text-danger">{{$errors->first('kota_id_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kecamatan</label>

                    <select id="kecamatan_ibu" name="kecamatan_id_ibu" class="kecamatan_ibu form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanIbu as $data)
                        <option value="{{$data->id}}"{{(old('kecamatan_id_ibu',$skl->kecamatan_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_ibu'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Desa/Dusun/Kelurahan</label>

                    <select id="desa_ibu" name="area_id_ibu" class="form-control">
                        <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                        @foreach($areaIbu as $data)
                        <option value="{{$data->id}}"{{(old('area_id_ibu',$skl->area_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_ibu'))
                    <small class="text-danger">{{$errors->first('area_id_ibu')}}</small>
                    @endif
                </div>

                        <div class="form-group">
                            <label for="">Kewarganegaraan</label>
                            <div class="checkbox">
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="wni">
                                        <input type="radio" class="form-check-input" id="wni" name="kewarganegaraan_ibu"
                                            value="wni" {{(old('kewarganegaraan_ibu',$skl->kewarganegaraan_ibu)=='wni')?'checked':''}}>WNI
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="wna">
                                        <input type="radio" class="form-check-input" id="wna" name="kewarganegaraan_ibu"
                                            value="wna" {{(old('kewarganegaraan_ibu',$skl->kewarganegaraan_ibu)=='wna')?'checked':''}}>WNA
                                    </label>
                                </div>
                                @if($errors->has('kewarganegaraan_ibu'))
                                <small class="text-danger">{{$errors->first('kewarganegaraan_ibu')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kebangsaan</label>
                            <input id="kebangsaan_ibu" name="kebangsaan_ibu" type="text" class="form-control" value="{{old('kebangsaan_ibu',$skl->kebangsaan_ibu)}}">
                            @if($errors->has('kebangsaan_ibu'))
                            <small class="text-danger">{{$errors->first('kebangsaan_ibu')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tgl_pencatatan_perkawinan">Tanggal Pencatatan Perkawinan *</label>
                            <input id="tgl_pencatatan_perkawinan" name="tgl_pencatatan_perkawinan" type="date"
                                class="form-control" value="{{old('tgl_pencatatan_perkawinan',$skl->tgl_pencatatan_perkawinan)}}">
                            @if($errors->has('tgl_pencatatan_perkawinan'))
                            <small class="text-danger">{{$errors->first('tgl_pencatatan_perkawinan')}}</small>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

            <!-- Step 4 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Ayah</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">
                            <label for="">NIK</label>
                            <input id="nik_ayah" name="nik_ayah" type="text" class="form-control" value="{{old('nik_ayah',$skl->nik_ayah)}}">
                            @if($errors->has('nik_ayah'))
                            <small class="text-danger">{{$errors->first('nik_ayah')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input id="nama_ayah" name="nama_ayah" type="text" class="form-control" value="{{old('nama_ayah',$skl->nama_ayah)}}">
                            @if($errors->has('nama_ayah'))
                            <small class="text-danger">{{$errors->first('nama_ayah')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input id="tgl_lahir_ayah" name="tgl_lahir_ayah" type="date" class="form-control" value="{{old('tgl_lahir_ayah',$skl->tgl_lahir_ayah)}}">
                            @if($errors->has('tgl_lahir_ayah'))
                            <small class="text-danger">{{$errors->first('tgl_lahir_ayah')}}</small>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Umur</label>
                            <input id="umur_ayah" name="umur_ayah" type="text" class="form-control" value="{{old('umur_ayah',$skl->umur_ayah)}}">
                            @if($errors->has('umur_ayah'))
                            <small class="text-danger">{{$errors->first('umur_ayah')}}</small>
                            @endif
                        </div> -->
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <select id="pekerjaan_id_ayah" name="pekerjaan_id_ayah" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}"  {{(old('pekerjaan_id_ayah',$skl->pekerjaan_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pekerjaan_id_ayah'))
                            <small class="text-danger">{{$errors->first('pekerjaan_id_ayah')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea id="alamat_ayah" name="alamat_ayah" type="text"
                                class="form-control">{{old('alamat_ayah',$skl->alamat_ayah)}}</textarea>
                            @if($errors->has('alamat_ayah'))
                            <small class="text-danger">{{$errors->first('alamat_ayah')}}</small>
                            @endif
                        </div>
                        <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_ayah" name="provinsi_id_ayah" class="provinsi_ayah form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}" {{(old('provinsi_id_ayah',$skl->provinsi_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_ayah'))
                    <small class="text-danger">{{$errors->first('provinsi_id_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kabupaten/Kota</label>

                    <select id="kota_ayah" name="kota_id_ayah" class="kota_ayah form-control">
                        <option value="">-- Pilih Kabupaten/Kota --</option>
                        @foreach($kotaAyah as $data)
                        <option value="{{$data->id}}" {{(old('kota_id_ayah',$skl->kota_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_ayah'))
                    <small class="text-danger">{{$errors->first('kota_id_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kecamatan</label>

                    <select id="kecamatan_ayah" name="kecamatan_id_ayah" class="kecamatan_ayah form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanAyah as $data)
                        <option value="{{$data->id}}" {{(old('kecamatan_id_ayah',$skl->kecamatan_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_ayah'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Desa/Dusun/Kelurahan</label>

                    <select id="desa_ayah" name="area_id_ayah" class="form-control">
                        <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                        @foreach($areaAyah as $data)
                        <option value="{{$data->id}}" {{(old('area_id_ayah',$skl->area_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_ayah'))
                    <small class="text-danger">{{$errors->first('area_id_ayah')}}</small>
                    @endif
                </div>
                        <div class="form-group">
                            <label for="">Kewarganegaraan</label>
                            <div class="checkbox">
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="wni">
                                        <input type="radio" class="form-check-input" id="wni"
                                            name="kewarganegaraan_ayah" value="wni" {{(old('kewarganegaraan_ayah',$skl->kewarganegaraan_ayah)=='wni')?'checked':''}}>WNI
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="wna">
                                        <input type="radio" class="form-check-input" id="wna"
                                            name="kewarganegaraan_ayah" value="wna" {{(old('kewarganegaraan_ayah',$skl->kewarganegaraan_ayah)=='wna')?'checked':''}}>WNA
                                    </label>
                                </div>
                                @if($errors->has('kewarganegaraan_ayah'))
                                <small class="text-danger">{{$errors->first('kewarganegaraan_ayah')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kebangsaan</label>
                            <input id="kebangsaan_ayah" name="kebangsaan_ayah" type="text"
                                class="form-control" value="{{old('kebangsaan_ayah',$skl->kebangsaan_ayah)}}">
                            @if($errors->has('kebangsaan_ayah'))
                            <small class="text-danger">{{$errors->first('kebangsaan_ayah')}}</small>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            <!-- Step 5 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Pelapor</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">
                            <label for="">NIK</label>
                            <input id="nik_pelapor" name="nik_pelapor" type="text" class="form-control" value="{{old('nik_pelapor',$skl->nik_pelapor)}}">
                            @if($errors->has('nik_pelapor'))
                            <small class="text-danger">{{$errors->first('nik_pelapor')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input id="nama_pelapor" name="nama_pelapor" type="text" class="form-control" value="{{old('nama_pelapor',$skl->nama_pelapor)}}">
                            @if($errors->has('nama_pelapor'))
                            <small class="text-danger">{{$errors->first('nama_pelapor')}}</small>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input id="tgl_lahir_pelapor" name="tgl_lahir_pelapor" type="date"
                                class="form-control" value="{{old('tgl_lahir_pelapor',$skl->tgl_lahir_pelapor)}}">
                            @if($errors->has('tgl_lahir_pelapor'))
                            <small class="text-danger">{{$errors->first('tgl_lahir_pelapor')}}</small>
                            @endif
                        </div> -->
                        <div class="form-group">
                            <label for="">Umur</label>
                            <input id="umur_pelapor" name="umur_pelapor" type="text" class="form-control" value="{{old('umur_pelapor',$skl->umur_pelapor)}}">
                            @if($errors->has('umur_pelapor'))
                            <small class="text-danger">{{$errors->first('umur_pelapor')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select id="jk_pelapor" name="jk_pelapor"
                                    class="form-control">
                                    <option value="laki-laki"  {{(old('jk_pelapor',$skl->jk_pelapor)=='laki-laki')?'selected':''}}>Laki-laki</option>
                                    <option value="perempuan"  {{(old('jk_pelapor',$skl->jk_pelapor)=='perempuan')?'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <select id="pekerjaan_id_pelapor" name="pekerjaan_id_pelapor"
                                class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}"  {{(old('pekerjaan_id_pelapor',$skl->pekerjaan_id_pelapor)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pekerjaan_id_pelapor'))
                            <small class="text-danger">{{$errors->first('pekerjaan_id_pelapor')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea id="alamat_pelapor" name="alamat_pelapor" type="text"
                                class="form-control">{{old('alamat_pelapor',$skl->alamat_pelapor)}}</textarea>
                            @if($errors->has('alamat_pelapor'))
                            <small class="text-danger">{{$errors->first('alamat_pelapor')}}</small>
                            @endif
                        </div>
                        <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_pelapor" name="provinsi_id_pelapor" class="provinsi_pelapor form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}" {{(old('provinsi_id_pelapor',$skl->provinsi_id_pelapor)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_pelapor'))
                    <small class="text-danger">{{$errors->first('provinsi_id_pelapor')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kabupaten/Kota</label>

                    <select id="kota_pelapor" name="kota_id_pelapor" class="kota_pelapor form-control">
                        <option value="">-- Pilih Kabupaten/Kota --</option>
                        @foreach($kotaPelapor as $data)
                        <option value="{{$data->id}}" {{(old('kota_id_pelapor',$skl->kota_id_pelapor)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_pelapor'))
                    <small class="text-danger">{{$errors->first('kota_id_pelapor')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kecamatan</label>

                    <select id="kecamatan_pelapor" name="kecamatan_id_pelapor" class="kecamatan_pelapor form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanPelapor as $data)
                        <option value="{{$data->id}}" {{(old('kecamatan_id_pelapor',$skl->kecamatan_id_pelapor)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_pelapor'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_pelapor')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Desa/Dusun/Kelurahan</label>

                    <select id="desa_pelapor" name="area_id_pelapor" class="form-control">
                        <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                        @foreach($areaPelapor as $data)
                        <option value="{{$data->id}}" {{(old('area_id_pelapor',$skl->area_id_pelapor)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_pelapor'))
                    <small class="text-danger">{{$errors->first('area_id_pelapor')}}</small>
                    @endif
                </div>
                    </div>

                </div>

            </div>

            <!-- Step 6 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Saksi I</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>


                        <div class="form-group">
                            <label for="nik_saksi1">NIK</label>
                            <input id="nik_saksi1" name="nik_saksi1" type="text" class="form-control" value="{{old('nik_saksi1',$skl->nik_saksi1)}}">
                            @if($errors->has('nik_saksi1'))
                            <small class="text-danger">{{$errors->first('nik_saksi1')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama_saksi1">Nama Lengkap</label>
                            <input id="nama_saksi1" name="nama_saksi1" type="text" class="form-control" value="{{old('nama_saksi1',$skl->nama_saksi1)}}">
                            @if($errors->has('nama_saksi1'))
                            <small class="text-danger">{{$errors->first('nama_saksi1')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="umur_saksi1">Umur</label>
                            <input id="umur_saksi1" name="umur_saksi1" type="text" class="form-control" value="{{old('umur_saksi1',$skl->umur_saksi1)}}">
                            @if($errors->has('umur_saksi1'))
                            <small class="text-danger">{{$errors->first('umur_saksi1')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select id="jk_saksi1" name="jk_saksi1"
                                    class="form-control">
                                    <option value="laki-laki"  {{(old('jk_saksi1',$skl->jk_saksi1)=='laki-laki')?'selected':''}}>Laki-laki</option>
                                    <option value="perempuan"  {{(old('jk_saksi1',$skl->jk_saksi1)=='perempuan')?'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <select id="pekerjaan_id_saksi1" name="pekerjaan_id_saksi1" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}"  {{(old('pekerjaan_id_saksi1',$skl->pekerjaan_id_saksi1)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pekerjaan_id_saksi1'))
                            <small class="text-danger">{{$errors->first('pekerjaan_id_saksi1')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="alamat_saksi1">Alamat</label>
                            <textarea id="alamat_saksi1" name="alamat_saksi1" type="text"
                                class="form-control">{{old('alamat_saksi1',$skl->alamat_saksi1)}}</textarea>
                            @if($errors->has('alamat_saksi1'))
                            <small class="text-danger">{{$errors->first('alamat_saksi1')}}</small>
                            @endif
                        </div>
                        <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_saksi1" name="provinsi_id_saksi1" class="provinsi_saksi1 form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}" {{(old('provinsi_id_saksi1',$skl->provinsi_id_saksi1)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_saksi1'))
                    <small class="text-danger">{{$errors->first('provinsi_id_saksi1')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kabupaten/Kota</label>

                    <select id="kota_saksi1" name="kota_id_saksi1" class="kota_saksi1 form-control">
                        <option value="">-- Pilih Kabupaten/Kota --</option>
                        @foreach($kotaSaksi1 as $data)
                        <option value="{{$data->id}}" {{(old('kota_id_saksi1',$skl->kota_id_saksi1)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_saksi1'))
                    <small class="text-danger">{{$errors->first('kota_id_saksi1')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kecamatan</label>

                    <select id="kecamatan_saksi1" name="kecamatan_id_saksi1" class="kecamatan_saksi1 form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanSaksi1 as $data)
                        <option value="{{$data->id}}" {{(old('kecamatan_id_saksi1',$skl->kecamatan_id_saksi1)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_saksi1'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_saksi1')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Desa/Dusun/Kelurahan</label>

                    <select id="desa_saksi1" name="area_id_saksi1" class="form-control">
                        <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                        @foreach($areaSaksi1 as $data)
                        <option value="{{$data->id}}" {{(old('area_id_saksi1',$skl->area_id_saksi1)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_saksi1'))
                    <small class="text-danger">{{$errors->first('area_id_saksi1')}}</small>
                    @endif
                </div>

                    </div>

                </div>

            </div>

            <!-- Step 7 -->

            <div class="list-group-item py-3" data-acc-step>

                <h5 class="mb-0" data-acc-title>Data Saksi II</h5>

                <div data-acc-content>

                    <div class="my-3">

                        <div class="line"></div>

                        <div class="form-group">
                            <label for="nik_saksi2">NIK</label>
                            <input id="nik_saksi2" name="nik_saksi2" type="text" class="form-control" value="{{old('nik_saksi2',$skl->nik_saksi2)}}">
                            @if($errors->has('nik_saksi2'))
                            <small class="text-danger">{{$errors->first('nik_saksi2')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama_saksi2">Nama Lengkap</label>
                            <input id="nama_saksi2" name="nama_saksi2" type="text" class="form-control" value="{{old('nama_saksi2',$skl->nama_saksi2)}}">
                            @if($errors->has('nama_saksi2'))
                            <small class="text-danger">{{$errors->first('nama_saksi2')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="umur_saksi2">Umur</label>
                            <input id="umur_saksi2" name="umur_saksi2" type="text" class="form-control" value="{{old('umur_saksi2',$skl->umur_saksi2)}}">
                            @if($errors->has('umur_saksi2'))
                            <small class="text-danger">{{$errors->first('umur_saksi2')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select id="jk_saksi2" name="jk_saksi2"
                                    class="form-control">
                                    <option value="laki-laki"  {{(old('jk_saksi2',$skl->jk_saksi2)=='laki-laki')?'selected':''}}>Laki-laki</option>
                                    <option value="perempuan"  {{(old('jk_saksi2',$skl->jk_saksi2)=='perempuan')?'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <select id="pekerjaan_id_saksi2" name="pekerjaan_id_saksi2" class="form-control">
                                <option value="">-- Pilih Salah Satu --</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}"  {{(old('pekerjaan_id_saksi2',$skl->pekerjaan_id_saksi2)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pekerjaan_id_saksi2'))
                            <small class="text-danger">{{$errors->first('pekerjaan_id_saksi2')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="alamat_saksi2">Alamat</label>
                            <textarea id="alamat_saksi2" name="alamat_saksi2" type="text"
                                class="form-control">{{old('alamat_saksi2',$skl->alamat_saksi2)}}</textarea>
                            @if($errors->has('alamat_saksi2'))
                            <small class="text-danger">{{$errors->first('alamat_saksi2')}}</small>
                            @endif
                        </div>
                        <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_saksi2" name="provinsi_id_saksi2" class="provinsi_saksi2 form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}" {{(old('provinsi_id_saksi2',$skl->provinsi_id_saksi2)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_saksi2'))
                    <small class="text-danger">{{$errors->first('provinsi_id_saksi2')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kabupaten/Kota</label>

                    <select id="kota_saksi2" name="kota_id_saksi2" class="kota_saksi2 form-control">
                        <option value="">-- Pilih Kabupaten/Kota --</option>
                        @foreach($kotaSaksi2 as $data)
                        <option value="{{$data->id}}" {{(old('kota_id_saksi2',$skl->kota_id_saksi2)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_saksi2'))
                    <small class="text-danger">{{$errors->first('kota_id_saksi2')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kecamatan</label>

                    <select id="kecamatan_saksi2" name="kecamatan_id_saksi2" class="kecamatan_saksi2 form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanSaksi2 as $data)
                        <option value="{{$data->id}}" {{(old('kecamatan_id_saksi2',$skl->kecamatan_id_saksi2)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_saksi2'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_saksi2')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Desa/Dusun/Kelurahan</label>

                    <select id="desa_saksi2" name="area_id_saksi2" class="form-control">
                        <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                        @foreach($areaSaksi2 as $data)
                        <option value="{{$data->id}}" {{(old('area_id_saksi2',$skl->area_id_saksi2)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_saksi2'))
                    <small class="text-danger">{{$errors->first('area_id_saksi2')}}</small>
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

            }

        });

    });

</script>

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
<!-- <script>
  $(document).ready(function() {
    $("#kota").chained("#provinsi");
    $("#kecamatan").chained("#kota");
		$("#desa").chained("#kecamatan");
  });
</script> -->


<script>
    $('.auto-save').savy('load', function () {

        console.log("All data from savy are loaded");

    });

</script>
<script>
    $('.provinsi_ibu').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            console.log(data)
            var kota_ibu = $('#kota_ibu')
            kota_ibu.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_ibu.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_ibu').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_ibu = $('#kecamatan_ibu')
            kecamatan_ibu.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_ibu.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_ibu').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_ibu = $('#desa_ibu')
            desa_ibu.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_ibu.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_ayah').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_ayah = $('#kota_ayah')
            kota_ayah.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_ayah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_ayah').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_ayah = $('#kecamatan_ayah')
            kecamatan_ayah.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_ayah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_ayah').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_ayah = $('#desa_ayah')
            desa_ayah.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_ayah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_pelapor').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_pelapor = $('#kota_pelapor')
            kota_pelapor.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_pelapor.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_pelapor').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_pelapor = $('#kecamatan_pelapor')
            kecamatan_pelapor.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_pelapor.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_pelapor').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_pelapor = $('#desa_pelapor')
            desa_pelapor.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_pelapor.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_saksi1').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_saksi1 = $('#kota_saksi1')
            kota_saksi1.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_saksi1.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_saksi1').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_saksi1 = $('#kecamatan_saksi1')
            kecamatan_saksi1.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_saksi1.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_saksi1').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_saksi1 = $('#desa_saksi1')
            desa_saksi1.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_saksi1.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.provinsi_saksi2').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.provinsi')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kota_saksi2 = $('#kota_saksi2')
            kota_saksi2.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_saksi2.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_saksi2').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kota')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var kecamatan_saksi2 = $('#kecamatan_saksi2')
            kecamatan_saksi2.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_saksi2.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_saksi2').change(function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: '{{route('backend.ajax.kecamatan')}}',
            data: {
                _token : "{{csrf_token()}}",
                id: id
        },
        success: function (data) {
            // the next thing you want to do 
            var desa_saksi2 = $('#desa_saksi2')
            desa_saksi2.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_saksi2.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
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
