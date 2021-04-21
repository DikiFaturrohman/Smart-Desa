<div class="container py-3">

    <center><h3>Pengajuan Surat Keterangan Ahli Waris</h3></center>
    <div class="line"></div>
    <!-- content -->
    @include('notification.unggah')
    @if($user->unggahDokumen)
    <form id="mainform" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <h5>Lampiran Persyaratan</h5><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Surat Permohonan<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_permohonan')?'is-invalid':''}}" name="file_surat_permohonan" id="file_surat_permohonan"
                        value="{{old('file_surat_permohonan')}}" accept="image/jpg,image/jpeg,image/png" wire:model="file_surat_permohonan">
                    @if($errors->has('file_surat_permohonan'))
                    <small class="text-danger">{{$errors->first('file_surat_permohonan')}}</small>
                    @endif
                    @if($file_surat_permohonan)
                    <img src="{{asset('storage/backend/images/dokumen/skaw/surat_permohonan/'.$file_surat_permohonan)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File KTP Ahli Waris (.pdf)<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_ktp')?'is-invalid':''}}" name="file_ktp" id="file_ktp" value="{{old('file_ktp')}}"
                        accept="application/pdf" wire:model="file_ktp">
                    @if($errors->has('file_ktp'))
                    <small class="text-danger">{{$errors->first('file_ktp')}}</small>
                    @endif
                </div>
                <small class="w-100"> *) file type: pdf | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Kartu Keluarga almarhum<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_kk')?'is-invalid':''}}" name="file_kk" id="file_kk" value="{{old('file_kk')}}"
                        accept="image/jpg,image/jpeg,image/png" wire:model="file_kk">
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                    @if($file_kk)
                    <img src="{{asset('storage/backend/images/dokumen/skaw/kk/'.$file_kk)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Surat Buku Nikah<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_buku_nikah')?'is-invalid':''}}" name="file_buku_nikah" id="file_buku_nikah"
                        value="{{old('file_buku_nikah')}}" accept="image/jpg,image/jpeg,image/png" wire:model="file_buku_nikah">
                    @if($errors->has('file_buku_nikah'))
                    <small class="text-danger">{{$errors->first('file_buku_nikah')}}</small>
                    @endif
                    @if($file_buku_nikah)
                    <img src="{{asset('storage/backend/images/dokumen/skaw/buku_nikah/'.$file_buku_nikah)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Akta Lahir Seluruh Ahli Waris (.pdf)<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_akta_lahir')?'is-invalid':''}}" name="file_akta_lahir" id="file_akta_lahir"
                        value="{{old('file_akta_lahir')}}" accept="application/pdf" wire:model="file_akta_lahir">
                    @if($errors->has('file_akta_lahir'))
                    <small class="text-danger">{{$errors->first('file_akta_lahir')}}</small>
                    @endif
                </div><br>
                <small class="w-100"> *) file type: pdf | max size: 1 MB</small>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Surat Keterangan Kematian<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sk_kematian')?'is-invalid':''}}" name="file_sk_kematian" id="file_sk_kematian"
                        value="{{old('file_sk_kematian')}}" accept="image/jpg,image/jpeg,image/png" wire:model="file_sk_kematian">
                    @if($errors->has('file_sk_kematian'))
                    <small class="text-danger">{{$errors->first('file_sk_kematian')}}</small>
                    @endif
                    @if($file_sk_kematian)
                    <img src="{{asset('storage/backend/images/dokumen/skaw/sk_kematian/'.$file_sk_kematian)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Keterangan Silsilah Dari Kelurahan<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_silsilah')?'is-invalid':''}}" name="file_silsilah" id="file_silsilah"
                        value="{{old('file_silsilah')}}" accept="image/jpg,image/jpeg,image/png" wire:model="file_silsilah">
                    @if($errors->has('file_silsilah'))
                    <small class="text-danger">{{$errors->first('file_silsilah')}}</small>
                    @endif
                    @if($file_silsilah)
                    <img src="{{asset('storage/backend/images/dokumen/skaw/silsilah/'.$file_silsilah)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div><br>
        <div class="form-group mb-0 row">
            <label class="col-sm-4 col-form-label">File Surat Pernyataan<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_pernyataan')?'is-invalid':''}}" name="file_surat_pernyataan" id="file_surat_pernyataan"
                        value="{{old('file_surat_pernyataan')}}" accept="image/jpg,image/jpeg,image/png" wire:model="file_surat_pernyataan">
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                    @if($file_surat_pernyataan)
                    <img src="{{asset('storage/backend/images/dokumen/skaw/surat_pernyataan/'.$file_surat_pernyataan)}}" alt=""
                        width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div><br>
        <hr>
        <h5>Data Almarhum</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control {{($errors->has('nama_alm'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Almarhum" name="nama_alm" value="{{old('nama_alm')}}" wire:model="nama_alm">
                @if($errors->has('nama_alm'))
                <div class="invalid-feedback">
                    {{$errors->first('nama_alm')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Meninggal<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="date" class="form-control {{($errors->has('tgl_kematian'))?'is-invalid':''}}"
                    placeholder="Masukan Tanggal Kematian" name="tgl_kematian" value="{{old('tgl_kematian')}}" wire:model="tgl_kematian">
                @if($errors->has('tgl_kematian'))
                <div class="invalid-feedback">
                    {{$errors->first('tgl_kematian')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <select class="form-control {{($errors->has('jk_alm'))?'is-invalid':''}}" name="jk_alm" wire:model="jk_alm">
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
            <label for="" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <textarea name="alamat" id="" cols="30" rows="10"
                    class="form-control {{($errors->has('alamat'))?'is-invalid':''}}" wire:model="alamat">{{old('alamat')}}</textarea>
                @if($errors->has('alamat'))
                <div class="invalid-feedback">
                    {{$errors->first('alamat')}}
                </div>
                @endif
            </div>
        </div>
        <hr>
        <h5>Data Pasangan</h5>
        <div class="col-sm-12 table-responsive">
            <table id="tableData1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surat->pasangan as $key =>$value)
                    <tr>
                        <td>
                            <input type="text" name="nama_pasangan[]" class="form-control {{$errors->has('nama_pasangan.'.$key)?'is-invalid':''}}" wire:model="nama_pasangan.{{$key}}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control {{$errors->has('tempat_lahir_pasangan.'.$key)?'is-invalid':''}}"
                                wire:model="tempat_lahir_pasangan.{{$key}}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control {{$errors->has('tgl_lahir_pasangan.'.$key)?'is-invalid':''}}"
                                wire:model="tgl_lahir_pasangan.{{$key}}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control {{$errors->has('jk_pasangan.'.$key)?'is-invalid':''}}" wire:model="jk_pasangan.{{$key}}">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control {{$errors->has('pekerjaan_id.'.$key)?'is-invalid':''}}" wire:model="pekerjaan_id.{{$key}}">
                                <option value="">Pilih Pekerjaan</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}">{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        @if($key == 0)
                        <td>
                            <button class="btn btn-success" wire:click.prevent="addPasangan({{$pasangan_id}})"><i
                                    class="fas fa-plus"></i></button>
                        </td>
                        @else
                        <td>
                            <button class="btn btn-danger" wire:click.prevent="removeExistingPasangan({{$key}})"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @foreach($inputsPasangan as $key => $value)
                    <tr>
                        <td>
                            <input type="text" name="nama_pasangan[]" class="form-control {{$errors->has('nama_pasangan.'.$value)?'is-invalid':''}}"
                                wire:model="nama_pasangan.{{$value}}">
                        </td>
                        <td><input type="text" name="tempat_lahir_pasangan[]" class="form-control {{$errors->has('tempat_lahir_pasangan.'.$value)?'is-invalid':''}}"
                                wire:model="tempat_lahir_pasangan.{{$value}}"></td>
                        <td><input type="date" name="tgl_lahir_pasangan[]" class="form-control {{$errors->has('tgl_lahir_pasangan.'.$value)?'is-invalid':''}}"
                                wire:model="tgl_lahir_pasangan.{{$value}}"></td>
                        <td><select name="jk_pasangan[]" id="" class="form-control {{$errors->has('jk_pasangan.'.$value)?'is-invalid':''}}" wire:model="jk_pasangan.{{$value}}">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </td>
                        <td>
                            <select name="pekerjaan_id[]" id="" class="form-control {{$errors->has('pekerjaan_id.'.$value)?'is-invalid':''}}"
                                wire:model="pekerjaan_id.{{$value}}">
                                <option value="">Pilih Pekerjaan</option>
                                @foreach($pekerjaan as $data)
                                <option value="{{$data->id}}">{{$data->nama}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-danger" wire:click.prevent="removePasangan({{$key}})"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><br>
        <hr>
        <h5>Data Anak</h5><br>
        <div class="col-sm-12 table-responsive">
            <table id="tableData" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kewarganegaraan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surat->anak as $key => $value)
                    <tr>
                        <td><input type="text" name="nama_anak[]" class="form-control {{$errors->has('nama_anak.'.$key)?'is-invalid':''}}" wire:model="nama_anak.{{$key}}">
                        </td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control {{$errors->has('tempat_lahir_anak.'.$key)?'is-invalid':''}}" wire:model="tempat_lahir_anak.{{$key}}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control {{$errors->has('tgl_lahir_anak.'.$key)?'is-invalid':''}}" wire:model="tgl_lahir_anak.{{$key}}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control {{$errors->has('kewarganegaraan.'.$key)?'is-invalid':''}}" wire:model="kewarganegaraan.{{$key}}">
                                <option value="">Pilih Kewarganegaraan</option>
                                <option value="indonesia" {{(old('kewarganegaraan.'.$key)=='indonesia')}}>Indonesia</option>
                                <option value="wna" {{(old('kewarganegaraan.'.$key)=='wna')}}>WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control {{$errors->has('alamat_anak.'.$key)?'is-invalid':''}}" wire:model="alamat_anak.{{$key}}"></td>
                        @if($key == 0)
                        <td>
                            <button class="btn btn-success" wire:click.prevent="addAnak({{$anak_id}})"><i
                                    class="fas fa-plus"></i></button>
                        </td>
                        @else
                        <td>
                            <button class="btn btn-danger" wire:click.prevent="removeExistingAnak({{$key}})"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @foreach($inputsAnak as $key => $value)
                    <tr>
                        <td><input type="text" name="nama_anak[]" class="form-control {{$errors->has('nama_anak.'.$value)?'is-invalid':''}}" wire:model="nama_anak.{{$value}}">
                        </td>
                        <td><input type="text" name="tempat_lahir_anak[]" class="form-control {{$errors->has('tempat_lahir_anak.'.$value)?'is-invalid':''}}" wire:model="tempat_lahir_anak.{{$value}}"></td>
                        <td><input type="date" name="tgl_lahir_anak[]" class="form-control {{$errors->has('tgl_lahir_anak.'.$value)?'is-invalid':''}}" wire:model="tgl_lahir_anak.{{$value}}"></td>
                        <td><select name="kewarganegaraan[]" id="" class="form-control {{$errors->has('kewarganegaraan.'.$value)?'is-invalid':''}}" wire:model="kewarganegaraan.{{$value}}">
                                <option value="">Pilih Kewarganegaraan</option>
                                <option value="indonesia">Indonesia</option>
                                <option value="wna">WNA</option>
                            </select>
                        </td>
                        <td><input type="text" name="alamat_anak[]" class="form-control {{$errors->has('alamat_anak.'.$value)?'is-invalid':''}}" wire:model="alamat_anak.{{$value}}"></td>
                        <td>
                            <button class="btn btn-danger" wire:click.prevent="removeAnak({{$key}})"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><br>
        <hr>
        <h5>Data Saksi 1</h5><br>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control {{($errors->has('nama_saksi1'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Saksi 1" name="nama_saksi1" value="{{old('nama_saksi1')}}" wire:model="nama_saksi1">
                @if($errors->has('nama_saksi1'))
                <div class="invalid-feedback">
                    {{$errors->first('nama_saksi1')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control {{($errors->has('nik_saksi1'))?'is-invalid':''}}"
                    placeholder="Masukan NIK saksi 1" name="nik_saksi1" value="{{old('nik_saksi1')}}" wire:model="nik_saksi1">
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
            <label for="" class="col-sm-4 col-form-label">Nama<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control {{($errors->has('nama_saksi2'))?'is-invalid':''}}"
                    placeholder="Masukan Nama Saksi 2" name="nama_saksi2" value="{{old('nama_saksi2')}}" wire:model="nama_saksi2">
                @if($errors->has('nama_saksi2'))
                <div class="invalid-feedback">
                    {{$errors->first('nama_saksi2')}}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control {{($errors->has('nik_saksi2'))?'is-invalid':''}}"
                    placeholder="Masukan NIK Saksi 2" name="nik_saksi2" value="{{old('nik_saksi2')}}" wire:model="nik_saksi2">
                @if($errors->has('nik_saksi2'))
                <div class="invalid-feedback">
                    {{$errors->first('nik_saksi2')}}
                </div>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="update">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click.prevent="update"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            <!-- <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
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
