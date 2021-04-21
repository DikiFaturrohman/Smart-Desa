<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Kelahiran</h2></center>
    <div class="line"></div>
    <!-- content -->
    @include('notification.unggah')
    @if($user->unggahDokumen)
    <form id="mainform" method="post" enctype="multipart/form-data" wire:submit.prevent="store">
        {{csrf_field()}}
        <h4>Lampiran Persyaratan</h4>
        <div class="line"></div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Scan/Foto KK Orangtua Bayi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_kk')?'is-invalid':''}}"
                        wire:model="file_kk" name="file_kk" id="file_kk" accept="image/png, image/jpeg,image/jpg"
                        wire:model="file_kk">
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size : 1 MB</small>
            </div>
        </div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Scan/Foto KTP Ibu<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_ibu')?'is-invalid':''}}"
                        wire:model="file_ibu" name="file_ibu" id="file_ibu" accept="image/png, image/jpeg,image/jpg"
                        wire:model="file_ibu">
                    @if($errors->has('file_ibu'))
                    <small class="text-danger">{{$errors->first('file_ibu')}}</small>
                    @endif
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size : 1 MB</small>
            </div>

        </div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Scan/Foto KTP Ayah<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_ayah')?'is-invalid':''}}"
                        wire:model="file_ayah" name="file_ayah" id="file_ayah" accept="image/png, image/jpeg,image/jpg"
                        wire:model="file_ayah">
                    @if($errors->has('file_ayah'))
                    <small class="text-danger">{{$errors->first('file_ayah')}}</small>
                    @endif
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size : 1 MB</small>
            </div>

        </div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Scan/Foto Surat/Akta Nikah<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_nikah')?'is-invalid':''}}"
                        wire:model="file_surat_nikah" name="file_surat_nikah" id="file_surat_nikah"
                        accept="image/png, image/jpeg,image/jpg" wire:model="file_surat_nikah">
                    @if($errors->has('file_surat_nikah'))
                    <small class="text-danger">{{$errors->first('file_surat_nikah')}}</small>
                    @endif
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size : 1 MB</small>
            </div>

        </div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Scan/Foto Surat Keterangan Kelahiran dari
                dokter/bidan/lainnya
                kelahiran<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sk_kelahiran')?'is-invalid':''}}"
                        wire:model="file_sk_kelahiran" name="file_sk_kelahiran" id="file_sk_kelahiran"
                        accept="image/png, image/jpeg,image/jpg" wire:model="file_sk_kelahiran">
                    @if($errors->has('file_sk_kelahiran'))
                    <small class="text-danger">{{$errors->first('file_sk_kelahiran')}}</small>
                    @endif
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size : 1 MB</small>
            </div>
        </div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Nomor KK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="no_kk" id="no_kk"
                    class="form-control {{$errors->has('no_kk')?'is-invalid':''}}" wire:model="no_kk"
                    value="{{old('no_kk')}}" placeholder="Silahkan untuk masukan nomor kk"/>
                @if($errors->has('no_kk'))
                <small class="text-danger">{{$errors->first('no_kk')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row row">
            <label class="col-sm-4 col-form-label">Nama Kepala Keluarga<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga"
                    class="form-control {{$errors->has('nama_kepala_keluarga')?'is-invalid':''}}"
                    wire:model="nama_kepala_keluarga" value="{{old('nama_kepala_keluarga')}}" placeholder="Silahkan untuk masukan nama kepala keluarga"/>
                @if($errors->has('nama_kepala_keluarga'))
                <small class="text-danger">{{$errors->first('nama_kepala_keluarga')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Anak/Bayi</h4>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_bayi" id="nama_bayi"
                    class="form-control {{$errors->has('nama_bayi')?'is-invalid':''}}" wire:model="nama_bayi"
                    value="{{old('nama_bayi')}}" placeholder="Silahkan untuk masukan nama"/>
                @if($errors->has('nama_bayi'))
                <small class="text-danger">{{$errors->first('nama_bayi')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="checkbox">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="laki-laki">
                            <input type="radio" class="form-check-input" id="laki-laki" name="jk_bayi" value="laki-laki"
                                {{(old('jk_bayi')=='laki-laki')?'checked':''}} wire:model="jk_bayi">Laki-laki
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="perempuan">
                            <input type="radio" class="form-check-input" id="perempuan" name="jk_bayi" value="perempuan"
                                {{(old('jk_bayi')=='perempuan')?'checked':''}} wire:model="jk_bayi">Perempuan
                        </label>
                    </div><br>
                    @if($errors->has('jk_bayi'))
                    <small class="text-danger">{{$errors->first('jk_bayi')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Dilahirkan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="tempat_dilahirkan" name="tempat_dilahirkan"
                    class="form-control {{$errors->has('tempat_dilahirkan')?'is-invalid':''}}"
                    wire:model="tempat_dilahirkan">
                    <option value="">Pilih Tempat Dilahirkan</option>
                    <option value="rs/rb" {{(old('tempat_dilahirkan')=='rs/rb')?'selected':''}}>Rumah
                        Sakit/Rumah Bersalin</option>
                    <option value="puskesmas" {{(old('tempat_dilahirkan')=='puskesmas')?'selected':''}}>
                        Puskesmas</option>
                    <option value="polindes" {{(old('tempat_dilahirkan')=='polindes')?'selected':''}}>
                        Polindes</option>
                    <option value="rumah" {{(old('tempat_dilahirkan')=='rumah')?'selected':''}}>Rumah
                    </option>
                    <option value="lainnya" {{(old('tempat_dilahirkan')=='lainnya')?'selected':''}}>Lainnya
                    </option>
                </select>
                @if($errors->has('tempat_dilahirkan'))
                <small class="text-danger">{{$errors->first('tempat_dilahirkan')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Kelahiran<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tempat_lahir" name="tempat_lahir" type="text"
                    class="form-control {{$errors->has('tempat_lahir')?'is-invalid':''}}" wire:model="tempat_lahir"
                    value="{{old('tempat_lahir')}}" placeholder="Silahkan untuk masukan tempat lahir">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Hari Kelahiran<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="hari" name="hari" class="form-control {{$errors->has('hari')?'is-invalid':''}}"
                    wire:model="hari">
                    <option value="">Pilih Hari</option>
                    <option value="senin" {{(old('hari')=='senin')?'selected':''}}>Senin</option>
                    <option value="selasa" {{(old('hari')=='selasa')?'selected':''}}>Selasa</option>
                    <option value="rabu" {{(old('hari')=='rabu')?'selected':''}}>Rabu</option>
                    <option value="kamis" {{(old('hari')=='kamis')?'selected':''}}>Kamis</option>
                    <option value="jumat" {{(old('hari')=='jumat')?'selected':''}}>Jumat</option>
                    <option value="sabtu" {{(old('hari')=='sabtu')?'selected':''}}>Sabtu</option>
                    <option value="minggu" {{(old('hari')=='minggu')?'selected':''}}>Minggu</option>
                </select>
                @if($errors->has('hari'))
                <small class="text-danger">{{$errors->first('hari')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Kelahiran<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tgl_lahir_bayi" name="tgl_lahir_bayi" type="date"
                    class="form-control {{$errors->has('tgl_lahir_bayi')?'is-invalid':''}}" wire:model="tgl_lahir_bayi"
                    value="{{old('tgl_lahir_bayi')}}">
                @if($errors->has('tgl_lahir_bayi'))
                <small class="text-danger">{{$errors->first('tgl_lahir_bayi')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Waktu Kelahiran<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="pukul" name="pukul" type="time"
                    class="form-control {{$errors->has('pukul')?'is-invalid':''}}" wire:model="pukul"
                    value="{{old('pukul')}}">
                @if($errors->has('pukul'))
                <small class="text-danger">{{$errors->first('pukul')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelahiran<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jenis_kelahiran" name="jenis_kelahiran"
                    class="form-control {{$errors->has('jenis_kelahiran')?'is-invalid':''}}"
                    wire:model="jenis_kelahiran">
                    <option value="">Pilih Jenis Kelahiran
                    </option>
                    <option value="tunggal" {{(old('jenis_kelahiran')=='tunggal')?'selected':''}}>Tunggal
                    </option>
                    <option value="kembar 2" {{(old('jenis_kelahiran')=='kembar 2')?'selected':''}}>Kembar 2
                    </option>
                    <option value="kembar 3" {{(old('jenis_kelahiran')=='kembar 3')?'selected':''}}>Kembar 3
                    </option>
                    <option value="kembar 4" {{(old('jenis_kelahiran')=='kembar 4')?'selected':''}}>Kembar 4
                    </option>
                    <option value="lainnya" {{(old('jenis_kelahiran')=='lainnya')?'selected':''}}>Lainnya
                    </option>
                </select>
                @if($errors->has('jenis_kelahiran'))
                <small class="text-danger">{{$errors->first('jenis_kelahiran')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kelahiran ke<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="kelahiran_ke" name="kelahiran_ke" type="text"
                    class="form-control {{$errors->has('kelahiran_ke')?'is-invalid':''}}" wire:model="kelahiran_ke"
                    value="{{old('kelahiran_ke')}}" placeholder="Silahkan untuk masukan kelahiran ke">
                @if($errors->has('kelahiran_ke'))
                <small class="text-danger">{{$errors->first('kelahiran_ke')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Penolong Kelahiran<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="penolong_kelahiran" name="penolong_kelahiran"
                    class="form-control {{$errors->has('penolong_kelahiran')?'is-invalid':''}}"
                    wire:model="penolong_kelahiran">
                    <option value="">-- Pilih Penolong Kelahiran--
                    </option>
                    <option value="dokter" {{(old('penolong_kelahiran')=='dokter')?'selected':''}}>Dokter
                    </option>
                    <option value="bidan/perawat" {{(old('penolong_kelahiran')=='bidan/perawat')?'selected':''}}>
                        Bidan/Perawat
                    </option>
                    <option value="dukun" {{(old('penolong_kelahiran')=='dukun')?'selected':''}}>Dukun
                    </option>
                    <option value="lainnya" {{(old('penolong_kelahiran')=='lainnya')?'selected':''}}>Lainnya
                    </option>
                </select>
                @if($errors->has('penolong_kelahiran'))
                <small class="text-danger">{{$errors->first('penolong_kelahiran')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Berat Bayi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="berat_bayi" name="berat_bayi" type="text"
                    class="form-control {{$errors->has('berat_bayi')?'is-invalid':''}}" wire:model="berat_bayi"
                    placeholder="ukuran dalam skala kg" value="{{old('berat_bayi')}}">
                @if($errors->has('berat_bayi'))
                <small class="text-danger">{{$errors->first('berat_bayi')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Panjang Bayi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="panjang_bayi" name="panjang_bayi" type="text"
                    class="form-control {{$errors->has('panjang_bayi')?'is-invalid':''}}" wire:model="panjang_bayi"
                    placeholder="ukuran dalam skala cm" value="{{old('panjang_bayi')}}">
                @if($errors->has('panjang_bayi'))
                <small class="text-danger">{{$errors->first('panjang_bayi')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Ibu</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_ibu" name="nik_ibu" type="text"
                    class="form-control {{$errors->has('nik_ibu')?'is-invalid':''}}" wire:model="nik_ibu"
                    value="{{old('nik_ibu')}}" placeholder="Silahkan untuk masukan nik">
                @if($errors->has('nik_ibu'))
                <small class="text-danger">{{$errors->first('nik_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_ibu" name="nama_ibu" type="text"
                    class="form-control {{$errors->has('nama_ibu')?'is-invalid':''}}" wire:model="nama_ibu"
                    value="{{old('nama_ibu')}}" placeholder="Silahkan untuk masukan nama">
                @if($errors->has('nama_ibu'))
                <small class="text-danger">{{$errors->first('nama_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tgl_lahir_ibu" name="tgl_lahir_ibu" type="date"
                    class="form-control {{$errors->has('tgl_lahir_ibu')?'is-invalid':''}}" wire:model="tgl_lahir_ibu"
                    value="{{old('tgl_lahir_ibu')}}">
                @if($errors->has('tgl_lahir_ibu'))
                <small class="text-danger">{{$errors->first('tgl_lahir_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_ibu" name="pekerjaan_id_ibu"
                    class="form-control {{$errors->has('pekerjaan_id_ibu')?'is-invalid':''}}"
                    wire:model="pekerjaan_id_ibu">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id_ibu')==$data->id)?'selected':''}}>
                        {{$data->nama}}</option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id_ibu'))
                <small class="text-danger">{{$errors->first('pekerjaan_id_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_ibu" name="alamat_ibu" type="text"
                    class="form-control {{$errors->has('alamat_ibu')?'is-invalid':''}}"
                    wire:model="alamat_ibu" placeholder="Silahkan untuk masukan alamat lengkap">{{old('alamat_ibu')}}</textarea>
                @if($errors->has('alamat_ibu'))
                <small class="text-danger">{{$errors->first('alamat_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="provinsi_id_ibu" name="provinsi_id_ibu"
                        class="form-control {{$errors->has('provinsi_id_ibu')?'is-invalid':''}} provinsi_ibu"
                        wire:model="provinsi_id_ibu">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $prov)
                        <option value="{{$prov->id}}">{{$prov->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_ibu'))
                    <small class="text-danger">{{$errors->first('provinsi_id_ibu')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kota/Kabupaten<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kota_ibu" name="kota_id_ibu"
                        class="form-control {{$errors->has('kota_id_ibu')?'is-invalid':''}} kota_ibu"
                        wire:model="kota_id_ibu">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                        @foreach($kotaIbu as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_ibu'))
                    <small class="text-danger">{{$errors->first('kota_id_ibu')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kecamatan_ibu" name="kecamatan_id_ibu"
                        class="form-control {{$errors->has('kecamatan_id_ibu')?'is-invalid':''}} kecamatan_ibu"
                        wire:model="kecamatan_id_ibu">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanIbu as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_ibu'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_ibu')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Desa/Kelurahan<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="desa_ibu" name="area_id_ibu"
                        class="form-control {{$errors->has('area_id_ibu')?'is-invalid':''}} desa_ibu"
                        wire:model="area_id_ibu">
                        <option value="">-- Pilih Desa/Kelurahan --</option>
                        @foreach($areaIbu as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_ibu'))
                    <small class="text-danger">{{$errors->first('area_id_ibu')}}</small>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kewarganegaraan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="checkbox">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="wni">
                            <input type="radio" class="form-check-input" id="wni" name="kewarganegaraan_ibu" value="wni"
                                {{(old('kewarganegaraan_ibu')=='wni')?'checked':''}} wire:model="kewarganegaraan_ibu">WNI
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="wna">
                            <input type="radio" class="form-check-input" id="wna" name="kewarganegaraan_ibu" value="wna"
                                {{(old('kewarganegaraan_ibu')=='wna')?'checked':''}} wire:model="kewarganegaraan_ibu">WNA
                        </label>
                    </div><br>
                    @if($errors->has('kewarganegaraan_ibu'))
                    <small class="text-danger">{{$errors->first('kewarganegaraan_ibu')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kebangsaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="kebangsaan_ibu" name="kebangsaan_ibu" type="text"
                    class="form-control {{$errors->has('kebangsaan_ibu')?'is-invalid':''}}" wire:model="kebangsaan_ibu"
                    value="{{old('kebangsaan_ibu')}}" placeholder="Silahkan untuk masukan kebangsaan">
                @if($errors->has('kebangsaan_ibu'))
                <small class="text-danger">{{$errors->first('kebangsaan_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_pencatatan_perkawinan">Tanggal Pencatatan Perkawinan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tgl_pencatatan_perkawinan" name="tgl_pencatatan_perkawinan" type="date"
                    class="form-control {{$errors->has('tgl_pencatatan_perkawinan')?'is-invalid':''}}"
                    wire:model="tgl_pencatatan_perkawinan" value="{{old('tgl_pencatatan_perkawinan')}}">
                @if($errors->has('tgl_pencatatan_perkawinan'))
                <small class="text-danger">{{$errors->first('tgl_pencatatan_perkawinan')}}</small>
                @endif
            </div>
        </div>


        <div class="line"></div>
        <h4>Data Ayah</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_ayah" name="nik_ayah" type="text"
                    class="form-control {{$errors->has('nik_ayah')?'is-invalid':''}}" wire:model="nik_ayah"
                    value="{{old('nik_ayah')}}" placeholder="Silahkan untuk masukan nik">
                @if($errors->has('nik_ayah'))
                <small class="text-danger">{{$errors->first('nik_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_ayah" name="nama_ayah" type="text"
                    class="form-control {{$errors->has('nama_ayah')?'is-invalid':''}}" wire:model="nama_ayah"
                    value="{{old('nama_ayah')}}" placeholder="Silahkan untuk masukan nama">
                @if($errors->has('nama_ayah'))
                <small class="text-danger">{{$errors->first('nama_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tgl_lahir_ayah" name="tgl_lahir_ayah" type="date"
                    class="form-control {{$errors->has('tgl_lahir_ayah')?'is-invalid':''}}" wire:model="tgl_lahir_ayah"
                    value="{{old('tgl_lahir_ayah')}}">
                @if($errors->has('tgl_lahir_ayah'))
                <small class="text-danger">{{$errors->first('tgl_lahir_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_ayah" name="pekerjaan_id_ayah"
                    class="form-control {{$errors->has('pekerjaan_id_ayah')?'is-invalid':''}}"
                    wire:model="pekerjaan_id_ayah">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id_ayah')==$data->id)?'selected':''}}>
                        {{$data->nama}}</option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id_ayah'))
                <small class="text-danger">{{$errors->first('pekerjaan_id_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_ayah" name="alamat_ayah" type="text"
                    class="form-control {{$errors->has('alamat_ayah')?'is-invalid':''}}"
                    wire:model="alamat_ayah" placeholder="Silahkan untuk masukan alamat">{{old('alamat_ayah')}}</textarea>
                @if($errors->has('alamat_ayah'))
                <small class="text-danger">{{$errors->first('alamat_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="provinsi_id_ayah" name="provinsi_id_ayah"
                        class="form-control {{$errors->has('provinsi_id_ayah')?'is-invalid':''}} provinsi_ayah"
                        wire:model="provinsi_id_ayah">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $prov)
                        <option value="{{$prov->id}}">{{$prov->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_ayah'))
                    <small class="text-danger">{{$errors->first('provinsi_id_ayah')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kota/Kabupaten<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kota_ayah" name="kota_id_ayah"
                        class="form-control {{$errors->has('kota_id_ayah')?'is-invalid':''}} kota_ayah"
                        wire:model="kota_id_ayah">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                        @foreach($kotaAyah as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_ayah'))
                    <small class="text-danger">{{$errors->first('kota_id_ayah')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kecamatan_ayah" name="kecamatan_id_ayah"
                        class="form-control {{$errors->has('kecamatan_id_ayah')?'is-invalid':''}} kecamatan_ayah"
                        wire:model="kecamatan_id_ayah">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanAyah as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_ayah'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_ayah')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Desa/Kelurahan<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="desa_ayah" name="area_id_ayah"
                        class="form-control {{$errors->has('area_id_ayah')?'is-invalid':''}} desa_ayah"
                        wire:model="area_id_ayah">
                        <option value="">-- Pilih Desa/Kelurahan --</option>
                        @foreach($areaAyah as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_ayah'))
                    <small class="text-danger">{{$errors->first('area_id_ayah')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kewarganegaraan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="checkbox">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="wni">
                            <input type="radio" class="form-check-input" id="wni" name="kewarganegaraan_ayah" wire:model="kewarganegaraan_ayah"
                                value="wni" {{(old('kewarganegaraan_ayah')=='wni')?'checked':''}}>WNI
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="wna">
                            <input type="radio" class="form-check-input" id="wna" name="kewarganegaraan_ayah" wire:model="kewarganegaraan_ayah"
                                value="wna" {{(old('kewarganegaraan_ayah')=='wna')?'checked':''}}>WNA
                        </label>
                    </div><br>
                    @if($errors->has('kewarganegaraan_ayah'))
                    <small class="text-danger">{{$errors->first('kewarganegaraan_ayah')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kebangsaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="kebangsaan_ayah" name="kebangsaan_ayah" type="text"
                    class="form-control {{$errors->has('kebangsaan_ayah')?'is-invalid':''}}"
                    wire:model="kebangsaan_ayah" value="{{old('kebangsaan_ayah')}}" placeholder="Silahkan untuk masukan kebangsaan">
                @if($errors->has('kebangsaan_ayah'))
                <small class="text-danger">{{$errors->first('kebangsaan_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Pelapor</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_pelapor" name="nik_pelapor" type="text"
                    class="form-control {{$errors->has('nik_pelapor')?'is-invalid':''}}" wire:model="nik_pelapor"
                    value="{{old('nik_pelapor')}}" placeholder="Silahkan untuk masukan nik">
                @if($errors->has('nik_pelapor'))
                <small class="text-danger">{{$errors->first('nik_pelapor')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_pelapor" name="nama_pelapor" type="text"
                    class="form-control {{$errors->has('nama_pelapor')?'is-invalid':''}}" wire:model="nama_pelapor"
                    value="{{old('nama_pelapor')}}" placeholder="Silahkan untuk masukan nama">
                @if($errors->has('nama_pelapor'))
                <small class="text-danger">{{$errors->first('nama_pelapor')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Umur<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="umur_pelapor" name="umur_pelapor" type="text"
                    class="form-control {{$errors->has('umur_pelapor')?'is-invalid':''}}" wire:model="umur_pelapor"
                    value="{{old('umur_pelapor')}}" placeholder="Silahkan untuk masukan umur">
                @if($errors->has('umur_pelapor'))
                <small class="text-danger">{{$errors->first('umur_pelapor')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jk_pelapor" name="jk_pelapor"
                    class="form-control {{$errors->has('jk_pelapor')?'is-invalid':''}}" wire:model="jk_pelapor">
                    <option value="">Pilih Jenis Kelamin
                    </option>
                    <option value="laki-laki" {{(old('jk_pelapor')=='laki-laki')?'selected':''}}>Laki-laki
                    </option>
                    <option value="perempuan" {{(old('jk_pelapor')=='perempuan')?'selected':''}}>Perempuan
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_pelapor" name="pekerjaan_id_pelapor"
                    class="form-control {{$errors->has('pekerjaan_id_pelapor')?'is-invalid':''}}"
                    wire:model="pekerjaan_id_pelapor">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id_pelapor')==$data->id)?'selected':''}}>
                        {{$data->nama}}
                    </option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id_pelapor'))
                <small class="text-danger">{{$errors->first('pekerjaan_id_pelapor')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_pelapor" name="alamat_pelapor" type="text"
                    class="form-control {{$errors->has('alamat_pelapor')?'is-invalid':''}}"
                    wire:model="alamat_pelapor" placeholder="Silahkan untuk masukan alamat">{{old('alamat_pelapor')}}</textarea>
                @if($errors->has('alamat_pelapor'))
                <small class="text-danger">{{$errors->first('alamat_pelapor')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="provinsi_id_pelapor" name="provinsi_id_pelapor"
                        class="form-control {{$errors->has('provinsi_id_pelapor')?'is-invalid':''}} provinsi_pelapor"
                        wire:model="provinsi_id_pelapor">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $prov)
                        <option value="{{$prov->id}}">{{$prov->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_pelapor'))
                    <small class="text-danger">{{$errors->first('provinsi_id_pelapor')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kota/Kabupaten<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kota_pelapor" name="kota_id_pelapor"
                        class="form-control {{$errors->has('kota_id_pelapor')?'is-invalid':''}} kota_pelapor"
                        wire:model="kota_id_pelapor">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                        @foreach($kotaPelapor as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_pelapor'))
                    <small class="text-danger">{{$errors->first('kota_id_pelapor')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kecamatan_pelapor" name="kecamatan_id_pelapor"
                        class="form-control {{$errors->has('kecamatan_id_pelapor')?'is-invalid':''}} kecamatan_pelapor"
                        wire:model="kecamatan_id_pelapor">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanPelapor as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_pelapor'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_pelapor')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Desa/Kelurahan<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="desa_pelapor" name="area_id_pelapor"
                        class="form-control {{$errors->has('area_id_pelapor')?'is-invalid':''}} desa_pelapor"
                        wire:model="area_id_pelapor">
                        <option value="">-- Pilih Desa/Kelurahan --</option>
                        @foreach($areaPelapor as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_pelapor'))
                    <small class="text-danger">{{$errors->first('area_id_pelapor')}}</small>
                    @endif
                </div>
            </div>
        </div>

        <div class="line"></div>
        <h4>Data Saksi 1</h4>

        <div class="form-group row">
            <label for="nik_saksi1" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_saksi1" name="nik_saksi1" type="text"
                    class="form-control {{$errors->has('nik_saksi1')?'is-invalid':''}}" wire:model="nik_saksi1"
                    value="{{old('nik_saksi1')}}" placeholder="Silahkan untuk masukan nik">
                @if($errors->has('nik_saksi1'))
                <small class="text-danger">{{$errors->first('nik_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_saksi1" class="col-sm-4 col-form-label">Nama Lengkap<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_saksi1" name="nama_saksi1" type="text"
                    class="form-control {{$errors->has('nama_saksi1')?'is-invalid':''}}" wire:model="nama_saksi1"
                    value="{{old('nama_saksi1')}}" placeholder="Silahkan untuk masukan nama">
                @if($errors->has('nama_saksi1'))
                <small class="text-danger">{{$errors->first('nama_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="umur_saksi1" class="col-sm-4 col-form-label">Umur<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="umur_saksi1" name="umur_saksi1" type="text"
                    class="form-control {{$errors->has('umur_saksi1')?'is-invalid':''}}" wire:model="umur_saksi1"
                    value="{{old('umur_saksi1')}}" placeholder="Silahkan untuk masukan umur">
                @if($errors->has('umur_saksi1'))
                <small class="text-danger">{{$errors->first('umur_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jk_saksi1" name="jk_saksi1"
                    class="form-control {{$errors->has('jk_saksi1')?'is-invalid':''}}" wire:model="jk_saksi1">
                    <option value="">Pilih Jenis Kelamin
                    </option>
                    <option value="laki-laki" {{(old('jk_saksi1')=='laki-laki')?'selected':''}}>Laki-laki
                    </option>
                    <option value="perempuan" {{(old('jk_saksi1')=='perempuan')?'selected':''}}>Perempuan
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_saksi1" name="pekerjaan_id_saksi1"
                    class="form-control {{$errors->has('pekerjaan_id_saksi1')?'is-invalid':''}}"
                    wire:model="pekerjaan_id_saksi1">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id_saksi1')==$data->id)?'selected':''}}>
                        {{$data->nama}}</option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id_saksi1'))
                <small class="text-danger">{{$errors->first('pekerjaan_id_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat_saksi1" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_saksi1" name="alamat_saksi1" type="text"
                    class="form-control {{$errors->has('alamat_saksi1')?'is-invalid':''}}"
                    wire:model="alamat_saksi1" placeholder="Silahkan untuk masukan alamat">{{old('alamat_saksi1')}}</textarea>
                @if($errors->has('alamat_saksi1'))
                <small class="text-danger">{{$errors->first('alamat_saksi1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="provinsi_id_saksi1" name="provinsi_id_saksi1"
                        class="form-control {{$errors->has('provinsi_id_saksi1')?'is-invalid':''}} provinsi_saksi1"
                        wire:model="provinsi_id_saksi1">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $prov)
                        <option value="{{$prov->id}}">{{$prov->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_saksi1'))
                    <small class="text-danger">{{$errors->first('provinsi_id_saksi1')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kota/Kabupaten<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kota_saksi1" name="kota_id_saksi1"
                        class="form-control {{$errors->has('kota_id_saksi1')?'is-invalid':''}} kota_saksi1"
                        wire:model="kota_id_saksi1">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                        @foreach($kotaSaksi1 as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_saksi1'))
                    <small class="text-danger">{{$errors->first('kota_id_saksi1')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kecamatan_saksi1" name="kecamatan_id_saksi1"
                        class="form-control {{$errors->has('kecamatan_id_saksi1')?'is-invalid':''}} kecamatan_saksi1"
                        wire:model="kecamatan_id_saksi1">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanSaksi1 as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_saksi1'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_saksi1')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Desa/Kelurahan<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="desa_saksi1" name="area_id_saksi1"
                        class="form-control {{$errors->has('area_id_saksi1')?'is-invalid':''}} desa_saksi1"
                        wire:model="area_id_saksi1">
                        <option value="">-- Pilih Desa/Kelurahan --</option>
                        @foreach($areaSaksi1 as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_saksi1'))
                    <small class="text-danger">{{$errors->first('area_id_saksi1')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Saksi 2</h4>
        <div class="form-group row">
            <label for="nik_saksi2" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_saksi2" name="nik_saksi2" type="text"
                    class="form-control {{$errors->has('nik_saksi2')?'is-invalid':''}}" wire:model="nik_saksi2"
                    value="{{old('nik_saksi2')}}" placeholder="Silahkan untuk masukan nik">
                @if($errors->has('nik_saksi2'))
                <small class="text-danger">{{$errors->first('nik_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_saksi2" class="col-sm-4 col-form-label">Nama Lengkap<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_saksi2" name="nama_saksi2" type="text"
                    class="form-control {{$errors->has('nama_saksi2')?'is-invalid':''}}" wire:model="nama_saksi2"
                    value="{{old('nama_saksi2')}}" placeholder="Silahkan untuk masukan nama">
                @if($errors->has('nama_saksi2'))
                <small class="text-danger">{{$errors->first('nama_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="umur_saksi2" class="col-sm-4 col-form-label">Umur<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="umur_saksi2" name="umur_saksi2" type="text"
                    class="form-control {{$errors->has('umur_saksi2')?'is-invalid':''}}" wire:model="umur_saksi2"
                    value="{{old('umur_saksi2')}}" placeholder="Silahkan untuk memasukan umur">
                @if($errors->has('umur_saksi2'))
                <small class="text-danger">{{$errors->first('umur_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jk_saksi2" name="jk_saksi2"
                    class="form-control {{$errors->has('jk_saksi2')?'is-invalid':''}}" wire:model="jk_saksi2">
                    <option value="">Pilih Jenis Kelamin
                    </option>
                    <option value="laki-laki" {{(old('jk_saksi2')=='laki-laki')?'selected':''}}>Laki-laki
                    </option>
                    <option value="perempuan" {{(old('jk_saksi2')=='perempuan')?'selected':''}}>Perempuan
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_saksi2" name="pekerjaan_id_saksi2"
                    class="form-control {{$errors->has('pekerjaan_id_saksi2')?'is-invalid':''}}"
                    wire:model="pekerjaan_id_saksi2">
                    <option value="">-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaan as $data)
                    <option value="{{$data->id}}" {{(old('pekerjaan_id_saksi2')==$data->id)?'selected':''}}>
                        {{$data->nama}}</option>
                    @endforeach
                </select>
                @if($errors->has('pekerjaan_id_saksi2'))
                <small class="text-danger">{{$errors->first('pekerjaan_id_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat_saksi2" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_saksi2" name="alamat_saksi2" type="text"
                    class="form-control {{$errors->has('alamat_saksi2')?'is-invalid':''}}"
                    wire:model="alamat_saksi2" placeholder="Silahkan untuk memasukan alamat">{{old('alamat_saksi2')}}</textarea>
                @if($errors->has('alamat_saksi2'))
                <small class="text-danger">{{$errors->first('alamat_saksi2')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="provinsi_saksi2" name="provinsi_id_saksi2"
                        class="form-control {{$errors->has('provinsi_id_saksi2')?'is-invalid':''}} provinsi_saksi2"
                        wire:model="provinsi_id_saksi2">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach($provinsi as $prov)
                        <option value="{{$prov->id}}">{{$prov->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('provinsi_id_saksi2'))
                    <small class="text-danger">{{$errors->first('provinsi_id_saksi2')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kota/Kabupaten<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kota_saksi2" name="kota_id_saksi2"
                        class="form-control {{$errors->has('kota_id_saksi2')?'is-invalid':''}} kota_saksi2"
                        wire:model="kota_id_saksi2">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                        @foreach($kotaSaksi2 as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kota_id_saksi2'))
                    <small class="text-danger">{{$errors->first('kota_id_saksi2')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="kecamatan_saksi2" name="kecamatan_id_saksi2"
                        class="form-control {{$errors->has('kecamatan_id_saksi2')?'is-invalid':''}} kecamatan_saksi2"
                        wire:model="kecamatan_id_saksi2">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatanSaksi2 as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kecamatan_id_saksi2'))
                    <small class="text-danger">{{$errors->first('kecamatan_id_saksi2')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label" class="">Desa/Kelurahan<span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="">
                    <select id="desa_saksi2" name="area_id_saksi2"
                        class="form-control {{$errors->has('area_id_saksi2')?'is-invalid':''}} desa_saksi2"
                        wire:model="area_id_saksi2">
                        <option value="">-- Pilih Desa/Kelurahan --</option>
                        @foreach($areaSaksi2 as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('area_id_saksi2'))
                    <small class="text-danger">{{$errors->first('area_id_saksi2')}}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="store">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="store"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            <!-- <button type="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
        </div>
    </form>
    @endif
    @if($errors->all())
    <br>
    <div class="col-sm-12 alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss='alert'>
                <span>X</span>
            </button>
            Silahkan untuk cek kembali data yang anda masukan
        </div>
    </div>
    @endif
    <div class="line" id="content-mobile"></div>
</div>
