@extends('frontend.layout.app')

@section('title') Surat Keterangan Kematian @endsection

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



    <h2>Pengajuan Surat Keterangan Kematian</h2>

    <div class="line"></div>

    <!-- content -->

    <form id="mainform" method="post" enctype="multipart/form-data">

{{csrf_field()}}

<div class="list-group">

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

        <h5 class="mb-0" data-acc-title>Lampiran Persyaratan</h5>

        <div data-acc-content>

            <div class="my-3">

                <div class="line"></div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Scan/Foto KTP Almarhum</label>
                    <div class="col-sm-8 pl-2">
                        <div class="custom-file">
                        <input type="hidden" name="suket_id" value="{{$skm->id}}">
                            <input type="file" class="custom-file-input" name="file_ktp_alm"
                                id="file_ktp_alm">
                            <label class="custom-file-label" for="file_ktp_alm">Unggah File</label>
                            @if($errors->has('file_ktp_alm'))
                            <small class="text-danger">{{$errors->first('file_ktp_alm')}}</small>
                            @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skm->file_ktp_alm) ? $img . '/dokumen/skm/ktp_alm/' . $skm->file_ktp_alm : $img . '/default.jpg') ?>"
                    id="preview-file_ktp_alm" style="width: 200px;margin-top:7px"><br>
                        <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Scan/Foto KTP Pelapor</label>
                    <div class="col-sm-8 pl-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_ktp_pelapor"
                                id="file_ktp_pelapor">
                            <label class="custom-file-label" for="file_ktp_pelapor">Unggah File</label>
                            @if($errors->has('file_ktp_pelapor'))
                            <small class="text-danger">{{$errors->first('file_ktp_pelapor')}}</small>
                            @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skm->file_ktp_pelapor) ? $img . '/dokumen/skm/ktp_pelapor/' . $skm->file_ktp_pelapor : $img . '/default.jpg') ?>"
                    id="preview-file_ktp_pelapor" style="width: 200px;margin-top:7px"><br>
                        <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Scan/Foto KTP Saksi</label>
                    <div class="col-sm-8 pl-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_ktp_saksi" id="file_ktp_saksi">
                            <label class="custom-file-label" for="file_ktp_saksi">Unggah File</label>
                            @if($errors->has('file_ktp_saksi'))
                            <small class="text-danger">{{$errors->first('file_ktp_saksi')}}</small>
                            @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skm->file_ktp_saksi) ? $img . '/dokumen/skm/ktp_saksi/' . $skm->file_ktp_saksi : $img . '/default.jpg') ?>"
                    id="preview-file_ktp_saksi" style="width: 200px;margin-top:7px"><br>
                        <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Scan/Foto Surat Keterangan Rumah Sakit</label>
                    <div class="col-sm-8 pl-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_sk_rs" id="file_sk_rs">
                            <label class="custom-file-label" for="file_sk_rs">Unggah File</label>
                            @if($errors->has('file_sk_rs'))
                            <small class="text-danger">{{$errors->first('file_sk_rs')}}</small>
                            @endif
                        </div>
                        <?php $img = asset('backend/images'); ?>
                <img src="<?php echo (!empty($skm->file_sk_rs) ? $img . '/dokumen/skm/sk_rs/' . $skm->file_sk_rs : $img . '/default.jpg') ?>"
                    id="preview-file_sk_rs" style="width: 200px;margin-top:7px"><br>
                        <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

        <h5 class="mb-0" data-acc-title>Data</h5>

        <div data-acc-content>

            <div class="my-3">

                <div class="line"></div>



                <div class="form-group">

                    <label>Nama Kepala Keluarga</label>

                    <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga"
                        class="form-control" value="{{old('nama_kepala_keluarga',$skm->nama_kepala_keluarga)}}" />
                    @if($errors->has('nama_kepala_keluarga'))
                    <small class="text-danger">{{$errors->first('nama_kepala_keluarga')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Nomor Kartu Keluarga</label>

                    <input id="no_kk" name="no_kk" type="text" class="form-control"
                        value="{{old('no_kk',$skm->no_kk)}}">
                    @if($errors->has('no_kk'))
                    <small class="text-danger">{{$errors->first('no_kk')}}</small>
                    @endif
                </div>



            </div>

        </div>

    </div>

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

        <h5 class="mb-0" data-acc-title>Data Jenazah</h5>

        <div data-acc-content>

            <div class="my-3">

                <div class="line"></div>

                <div class="form-group">

                    <label for="nik_jenazah">NIK</label>

                    <input id="nik_jenazah" name="nik_jenazah" type="text" class="form-control"
                        value="{{old('nik_jenazah',$skm->nik_jenazah)}}">
                    @if($errors->has('nik_jenazah'))
                    <small class="text-danger">{{$errors->first('nik_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="nama_jenazah">Nama Lengkap</label>

                    <input id="nama_jenazah" name="nama_jenazah" type="text" class="form-control"
                        value="{{old('nama_jenazah',$skm->nama_jenazah)}}">
                    @if($errors->has('nama_jenazah'))
                    <small class="text-danger">{{$errors->first('nama_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="tgl_lahir_jenazah">Tanggal Lahir</label>

                    <input id="tgl_lahir_jenazah" name="tgl_lahir_jenazah" type="date"
                        class="form-control" value="{{old('tgl_lahir_jenazah',$skm->tgl_lahir_jenazah)}}">
                    @if($errors->has('tgl_lahir_jenazah'))
                    <small class="text-danger">{{$errors->first('tgl_lahir_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="tempat_lahir">Tempat Lahir</label>

                    <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control"
                        value="{{old('tempat_lahir',$skm->tempat_lahir)}}">
                    @if($errors->has('tempat_lahir'))
                    <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                    @endif
                </div>
                <div class="form-group">

                    <label for="">Jenis Kelamin</label>

                    <select id="jk_jenazah" name="jk_jenazah" class="form-control">
                        <option value="laki-laki" {{(old('jk_jenazah',$skm->jk_jenazah)=='laki-laki')?'selected':''}}>Laki-laki</option>
                        <option value="perempuan" {{(old('jk_jenazah',$skm->jk_jenazah)=='perempuan')?'selected':''}}>Perempuan</option>
                    </select>
                    @if($errors->has('jk_jenazah'))
                    <small class="text-danger">{{$errors->first('jk_jenazah')}}</small>
                    @endif
                </div>
                <div class="form-group">

                    <label for="agama">Agama</label>

                    <select id="agama" name="agama" class="form-control">
                        <option value="islam" {{(old('agama',$skm->agama)=='islam')?'selected':''}}>Islam</option>
                        <option value="kristen" {{(old('agama',$skm->agama)=='kristen')?'selected':''}}>Kristen</option>
                        <option value="hindu" {{(old('agama',$skm->agama)=='hindu')?'selected':''}}>Hindu</option>
                        <option value="budha" {{(old('agama',$skm->agama)=='budha')?'selected':''}}>Budha</option>
                        <option value="katolik" {{(old('agama',$skm->agama)=='katolik')?'selected':''}}>Katolik</option>
                    </select>
                    @if($errors->has('agama'))
                    <small class="text-danger">{{$errors->first('agama')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="pekerjaan_id_jenazah">Pekerjaan</label>

                    <select id="pekerjaan_id_jenazah" name="pekerjaan_id_jenazah"
                        class="form-control">
                        <option value="">-- Pilih Pekerjaan --</option>
                        @foreach($pekerjaan as $data)
                        <option value="{{$data->id}}" {{(old('pekerjaan_id_jenazah',$skm->pekerjaan_id_jenazah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('pekerjaan_id_jenazah'))
                    <small class="text-danger">{{$errors->first('pekerjaan_id_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="alamat_jenazah">Alamat</label>

                    <textarea id="alamat_jenazah" name="alamat_jenazah" type="text"
                        class="form-control">{{old('alamat_jenazah',$skm->alamat_jenazah)}}</textarea>
                    @if($errors->has('alamat_jenazah'))
                    <small class="text-danger">{{$errors->first('alamat_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_jenazah" name="provinsi_id_jenazah" class="provinsi_jenazah form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}" {{(old('provinsi_id_jenazah',$skm->provinsi_id_jenazah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_jenazah'))
                    <small class="text-danger">{{$errors->first('provinsi_id_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kabupaten/Kota</label>

                    <select id="kota_jenazah" name="kota_id_jenazah" class="kota_jenazah form-control">
                        <option value="">-- Pilih Kota/kabupaten --</option>
                        @foreach($kotaJenazah as $data)
                        <option value="{{$data->id}}" {{(old('kota_id_jenazah',$skm->kota_id_jenazah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_jenazah'))
                    <small class="text-danger">{{$errors->first('kota_id_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kecamatan</label>

                    <select id="kecamatan_jenazah" name="kecamatan_id_jenazah" class="kecamatan_jenazah form-control">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanJenazah as $data)
                        <option value="{{$data->id}}" {{(old('kecamatan_id_jenazah',$skm->kecamatan_id_jenazah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_jenazah'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Desa/Dusun/Kelurahan</label>

                    <select id="desa_jenazah" name="area_id_jenazah" class="form-control">
                        <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                        @foreach($areaJenazah as $data)
                        <option value="{{$data->id}}" {{(old('area_id_jenazah',$skm->area_id_jenazah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_jenazah'))
                    <small class="text-danger">{{$errors->first('area_id_jenazah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kewarganegaraan</label>

                    <div class="checkbox">

                        <div class="form-check">

                            <input class="form-check-input " type="radio" id="gridRadios1" name="kewarganegaraan"
                                value="wni" {{(old('kewarganegaraan',$skm->kewarganegaraan)=='wni')?'checked':''}}>

                            <label class="form-check-label" for="gridRadios1">

                                WNI

                            </label>

                        </div>

                        <div class="form-check">

                            <input class="form-check-input" type="radio" id="gridRadios2" name="kewarganegaraan"
                                value="wna" {{(old('kewarganegaraan',$skm->kewarganegaraan)=='wna')?'checked':''}}>

                            <label class="form-check-label" for="gridRadios2">

                                WNA

                            </label>

                        </div>
                        @if($errors->has('kewarganegaraan'))
                        <small class="text-danger">{{$errors->first('kewarganegaraan')}}</small>
                        @endif
                    </div>

                </div>



                <div class="form-group">

                    <label for="">Keturunan</label>

                    <select id="keturunan" name="keturunan" class="form-control">
                        <option value="eropa" {{(old('keturunan',$skm->keturunan)=='eropa')?'selected':''}}>Eropa</option>
                        <option value="cina/timur asing lainnya" {{(old('keturunan',$skm->keturunan)=='cina/timur asing lainnya')?'selected':''}}>Cina/timur asing lainnya</option>
                        <option value="indonesia" {{(old('keturunan',$skm->keturunan)=='indonesia')?'selected':''}}>Indonesia</option>
                        <option value="indonesia nasrani" {{(old('keturunan',$skm->keturunan)=='indonesia nasrani')?'selected':''}}>Indonesia Nasrani</option>
                        <option value="lainnya" {{(old('keturunan',$skm->keturunan)=='lainnya')?'selected':''}}>Lainnya</option>
                    </select>
                    @if($errors->has('keturunan'))
                    <small class="text-danger">{{$errors->first('keturunan')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Kebangsaan</label>

                    <input id="" name="kebangsaan" type="text" class="form-control"  value="{{old('kebangsaan',$skm->kebangsaan)}}">
                    @if($errors->has('kebangsaan'))
                    <small class="text-danger">{{$errors->first('kebangsaan')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Anak Ke</label>

                    <input id="" name="anak_ke" type="text" class="form-control" value="{{old('anak_ke',$skm->anak_ke)}}">
                    @if($errors->has('anak_ke'))
                    <small class="text-danger">{{$errors->first('anak_ke')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Tanggal Kematian</label>

                    <input id="" name="tgl_kematian" type="date" class="form-control" value="{{old('tgl_kematian',$skm->tgl_kematian)}}">
                    @if($errors->has('tgl_kematian'))
                    <small class="text-danger">{{$errors->first('tgl_kematian')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Pukul</label>

                    <input id="" name="pukul" type="time" class="form-control" value="{{old('pukul',$skm->pukul)}}">
                    @if($errors->has('pukul'))
                    <small class="text-danger">{{$errors->first('pukul')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Sebab Kematian</label>

                    <select id="sebab_kematian" name="sebab_kematian" class="form-control">
                        <option value="sakit biasa.tua" {{(old('sebab_kematian',$skm->sebab_kematian)=='sakit biasa.tua')?'selected':''}}>Sakit Biasa/tua</option>
                        <option value="wabah penyakit" {{(old('sebab_kematian',$skm->sebab_kematian)=='wabah penyakit')?'selected':''}}>Wabah Penyakit</option>
                        <option value="kecelakaan" {{(old('sebab_kematian',$skm->sebab_kematian)=='kecelakaan')?'selected':''}}>Kecelakaan</option>
                        <option value="kriminalitas" {{(old('sebab_kematian',$skm->sebab_kematian)=='kriminalitas')?'selected':''}}>Kriminalitas</option>
                        <option value="bunuh diri" {{(old('sebab_kematian',$skm->sebab_kematian)=='bunuh diri')?'selected':''}}>Bunuh diri</option>
                        <option value="lainnya" {{(old('sebab_kematian',$skm->sebab_kematian)=='lainnya')?'selected':''}}>Lainnya</option>
                    </select>
                    @if($errors->has('sebab_kematian'))
                    <small class="text-danger">{{$errors->first('sebab_kematian')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Tempat Kematian</label>

                    <input id="" name="tempat_kematian" type="text" class="form-control" value="{{old('tempat_kematian',$skm->tempat_kematian)}}">
                    @if($errors->has('tempat_kematian'))
                    <small class="text-danger">{{$errors->first('tempat_kematian')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Yang Menerangkan</label>

                    <select id="yang_menerangkan" name="yang_menerangkan" class="form-control">
                        <option value="dokter" {{(old('yang_menerangkan',$skm->yang_menerangkan)=='dokter')?'selected':''}}>Dokter</option>
                        <option value="tenaga kesehatan" {{(old('yang_menerangkan',$skm->yang_menerangkan)=='tenaga kesehatan')?'selected':''}}>Tenaga Kesehatan</option>
                        <option value="kepolisian" {{(old('yang_menerangkan',$skm->yang_menerangkan)=='kepolisian')?'selected':''}}>Kepolisian</option>
                        <option value="lainnya" {{(old('yang_menerangkan',$skm->yang_menerangkan)=='lainnya')?'selected':''}}>Lainnya</option>
                    </select>
                    @if($errors->has('yang_menerangkan'))
                    <small class="text-danger">{{$errors->first('yang_menerangkan')}}</small>
                    @endif
                </div>

            </div>

        </div>

    </div>

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

        <h5 class="mb-0" data-acc-title>Data Ayah</h5>

        <div data-acc-content>

            <div class="my-3">

                <div class="line"></div>

                <div class="form-group">

                    <label for="nik_ayah">NIK</label>

                    <input id="nik_ayah" name="nik_ayah" type="text" class="form-control" value="{{old('nik_ayah',$skm->nik_ayah)}}">
                    @if($errors->has('nik_ayah'))
                    <small class="text-danger">{{$errors->first('nik_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="nama_ayah">Nama Lengkap</label>

                    <input id="nama_ayah" name="nama_ayah" type="text" class="form-control"value="{{old('nama_ayah',$skm->nama_ayah)}}" >
                    @if($errors->has('nama_ayah'))
                    <small class="text-danger">{{$errors->first('nama_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="umur_ayah">Umur</label>

                    <input id="umur_ayah" name="umur_ayah" type="text" class="form-control" value="{{old('umur_ayah',$skm->umur_ayah)}}">
                    @if($errors->has('umur_ayah'))
                    <small class="text-danger">{{$errors->first('umur_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="pekerjaan_id_ayah">Pekerjaan</label>

                    <select id="pekerjaan_id_ayah" name="pekerjaan_id_ayah" class="form-control">
                        <option value="">-- Pilih Pekerjaan --</option>
                        @foreach($pekerjaan as $data)
                        <option value="{{$data->id}}" {{(old('pekerjaan_id_ayah',$skm->pekerjaan_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('pekerjaan_id_ayah'))
                    <small class="text-danger">{{$errors->first('pekerjaan_id_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="alamat_ayah">Alamat</label>

                    <textarea id="alamat_ayah" name="alamat_ayah" type="text"
                        class="form-control">{{old('alamat_ayah',$skm->alamat_ayah)}}</textarea>
                    @if($errors->has('alamat_ayah'))
                    <small class="text-danger">{{$errors->first('alamat_ayah')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_ayah" name="provinsi_id_ayah" class="provinsi_ayah form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}" {{(old('provinsi_id_ayah',$skm->provinsi_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
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
                        <option value="{{$data->id}}" {{(old('kota_id_ayah',$skm->kota_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
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
                        <option value="{{$data->id}}" {{(old('kecamatan_id_ayah',$skm->kecamatan_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
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
                        <option value="{{$data->id}}" {{(old('area_id_ayah',$skm->area_id_ayah)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_ayah'))
                    <small class="text-danger">{{$errors->first('area_id_ayah')}}</small>
                    @endif
                </div>

            </div>

        </div>

    </div>

    <!-- Step  -->

    <div class="list-group-item py-3" data-acc-step>

        <h5 class="mb-0" data-acc-title>Data Ibu</h5>

        <div data-acc-content>

            <div class="my-3">

                <div class="line"></div>

                <div class="form-group">

                    <label for="nik_ibu">NIK</label>

                    <input id="nik_ibu" name="nik_ibu" type="text" class="form-control" value="{{old('nik_ibu',$skm->nik_ibu)}}">
                    @if($errors->has('nik_ibu'))
                    <small class="text-danger">{{$errors->first('nik_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="nama_ibu">Nama Lengkap</label>

                    <input id="nama_ibu" name="nama_ibu" type="text" class="form-control" value="{{old('nama_ibu',$skm->nama_ibu)}}">
                    @if($errors->has('nama_ibu'))
                    <small class="text-danger">{{$errors->first('nama_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="umur_ibu">Umur</label>

                    <input id="umur_ibu" name="umur_ibu" type="text" class="form-control" value="{{old('umur_ibu',$skm->umur_ibu)}}">
                    @if($errors->has('umur_ibu'))
                    <small class="text-danger">{{$errors->first('umur_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="pekerjaan_id_ibu">Pekerjaan</label>

                    <select id="pekerjaan_id_ibu" name="pekerjaan_id_ibu" class="form-control">
                        <option value="">-- Pilih Pekerjaan --</option>
                        @foreach($pekerjaan as $data)
                        <option value="{{$data->id}}" {{(old('pekerjaan_id_ibu',$skm->pekerjaan_id_ibu)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('pekerjaan_id_ibu'))
                    <small class="text-danger">{{$errors->first('pekerjaan_id_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="alamat_ibu">Alamat</label>

                    <textarea id="alamat_ibu" name="alamat_ibu" type="text"
                        class="form-control">{{old('alamat_ibu',$skm->alamat_ibu)}}</textarea>
                    @if($errors->has('alamat_ibu'))
                    <small class="text-danger">{{$errors->first('alamat_ibu')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label for="">Provinsi</label>

                    <select id="provinsi_id_ibu" name="provinsi_id_ibu" class="provinsi_ibu form-control">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}"{{(old('provinsi_id_ibu',$skm->provinsi_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
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
                        <option value="{{$data->id}}"{{(old('kota_id_ibu',$skm->kota_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
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
                        <option value="{{$data->id}}"{{(old('kecamatan_id_ibu',$skm->kecamatan_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
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
                        <option value="{{$data->id}}"{{(old('area_id_ibu',$skm->area_id_ibu)==$data->id)?'selected':''}} >{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_ibu'))
                    <small class="text-danger">{{$errors->first('area_id_ibu')}}</small>
                    @endif
                </div>

            </div>

        </div>

    </div>

    <!-- Step -->

    <div class="list-group-item py-3" data-acc-step>

        <h5 class="mb-0" data-acc-title>Data Pelapor</h5>

        <div data-acc-content>

            <div class="my-3">

                <div class="line"></div>

                <div class="form-group">

                    <label>NIK</label>

                    <input type="text" name="nik_pelapor" class="form-control" value="{{old('nik_pelapor',$skm->nik_pelapor)}}"/>
                    @if($errors->has('nik_pelapor'))
                    <small class="text-danger">{{$errors->first('nik_pelapor')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label>Nama Lengkap</label>

                    <input type="text" name="nama_pelapor" class="form-control" value="{{old('nama_pelapor',$skm->nama_pelapor)}}"/>
                    @if($errors->has('nama_pelapor'))
                    <small class="text-danger">{{$errors->first('nama_pelapor')}}</small>
                    @endif
                </div>

                <div class="form-group">

                    <label>Umur</label>

                    <input type="text" name="umur_pelapor" class="form-control" value="{{old('umur_pelapor',$skm->umur_pelapor)}}"/>
                    @if($errors->has('umur_pelapor'))
                    <small class="text-danger">{{$errors->first('umur_pelapor')}}</small>
                    @endif
                </div>
                <div class="form-group">

                <label>Hubungan Dengan Almarhum</label>

                <input type="text" name="hubungan" class="form-control" value="{{old('hubungan',$skm->hubungan)}}"/>
                @if($errors->has('hubungan'))
                <small class="text-danger">{{$errors->first('hubungan')}}</small>
                @endif
                </div>

            </div>

            <div class="form-group">

                <label>Pekerjaan</label>

                <select id="pekerjaan_id_pelapor" name="pekerjaan_id_pelapor" class="form-control">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id_pelapor',$skm->pekerjaan_id_pelapor)==$data->id)?'selected':''}}>{{$data->nama}}</option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id_pelapor'))
                <small class="text-danger">{{$errors->first('pekerjaan_id_pelapor')}}</small>
                @endif
            </div>

            <div class="form-group">

                <label>Alamat Lengkap</label>

                <textarea class="form-control" rows="3" name="alamat_pelapor" id="alamat_pelapor">{{old('alamat_pelapor',$skm->alamat_pelapor)}}</textarea>
                @if($errors->has('alamat_pelapor'))
                <small class="text-danger">{{$errors->first('alamat_pelapor')}}</small>
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

                <input type="text" name="nik_saksi1" id="nik_saksi1" class="form-control" value="{{old('nik_saksi1',$skm->nik_saksi1)}}"/>
                @if($errors->has('nik_saksi1'))
                <small class="text-danger">{{$errors->first('nik_saksi1')}}</small>
                @endif
            </div>

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input type="text" name="nama_saksi1" id="nama_saksi1" class="form-control" value="{{old('nama_saksi1',$skm->nama_saksi1)}}"/>
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

                <input type="text" name="nik_saksi2" id="nik_saksi2" class="form-control" value="{{old('nik_saksi2',$skm->nik_saksi2)}}"/>
                @if($errors->has('nik_saksi2'))
                <small class="text-danger">{{$errors->first('nik_saksi2')}}</small>
                @endif
            </div>

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input type="text" name="nama_saksi2" id="nama_saksi2" class="form-control" value="{{old('nama_saksi2',$skm->nama_saksi2)}}"/>
                @if($errors->has('nama_saksi2'))
                <small class="text-danger">{{$errors->first('nama_saksi2')}}</small>
                @endif
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

$('.provinsi_jenazah').change(function(){
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
            var kota_jenazah = $('#kota_jenazah')
            kota_jenazah.html('<option value="">Pilih Kota</option');
            $.each(data, function(i, value){
                kota_jenazah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kota_jenazah').change(function(){
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
            var kecamatan_jenazah = $('#kecamatan_jenazah')
            kecamatan_jenazah.html('<option value="">Pilih Kecamatan</option');
            $.each(data, function(i, value){
                kecamatan_jenazah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

    $('.kecamatan_jenazah').change(function(){
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
            var desa_jenazah = $('#desa_jenazah')
            desa_jenazah.html('<option value="">Pilih Desa/Kelurahan</option');
            $.each(data, function(i, value){
                desa_jenazah.append('<option value=' + value.id + '>' + value.nama + '</option>');
            });
        }
        })
    })

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

</script>

<script>
    // Add the following code if you want the name of the file appear on select

    $(".custom-file-input").on("change", function () {

        var fileName = $(this).val().split("\\").pop();

        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

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
