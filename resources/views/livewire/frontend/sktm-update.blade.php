<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Tidak Mampu</h2></center>
    <div class="line"></div>
    <!-- content -->
    @include('notification.unggah')
    <form method="post" enctype="multipart/form-data" id="mainform" wire:submit.prevent="update">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sp_rtrw')?'is-invalid':''}}"
                        wire:model="file_sp_rtrw" accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small><br>
                    @endif
                    @if($file_sp_rtrw)
                    <img src="{{asset('storage/backend/images/dokumen/sktm/rtrw/'.$file_sp_rtrw)}}" alt="" width="200px"
                        height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pernyataan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_surat_pernyataan')?'is-invalid':''}}"
                        wire:model="file_surat_pernyataan" accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small><br>
                    @endif
                    @if($file_surat_pernyataan)
                    <img src="{{asset('storage/backend/images/dokumen/sktm/surat_pernyataan/'.$file_surat_pernyataan)}}"
                        alt="" width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nik" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nik')?'is-invalid':''}}" id="nik" name="nik"
                    placeholder="NIK" value="" wire:model="nik">
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}" id="nama" name="nama"
                    placeholder="Silahkan masukan Nama Lengkap" wire:model="nama">
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('tempat_lahir')?'is-invalid':''}}"
                    id="tempat_lahir" name="tempat_lahir" placeholder=" Silahkan masukan tempat lahir kota/kab"
                    value="{{old('tempat_lahir')}}" wire:model="tempat_lahir">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" class="form-control {{$errors->has('tgl_lahir')?'is-invalid':''}}" name="tgl_lahir"
                    value="{{old('tgl_lahir')}}" wire:model="tgl_lahir" />
                @if($errors->has('tgl_lahir'))
                <small class="text-danger">{{$errors->first('tgl_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="pt-2">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="laki-laki">
                            <input type="radio" class="form-check-input" id="laki-laki" name="jk" value="laki-laki"
                                wire:model="jk">Laki-laki
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="perempuan">
                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                wire:model="jk">Perempuan

                        </label>
                    </div>
                </div>
                @if($errors->has('jk'))
                <small class="text-danger">{{$errors->first('jk')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Warga Negara <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="pt-2">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="indonesia">
                            <input type="radio" class="form-check-input" id="indonesia" name="warga_negara"
                                value="indonesia" wire:model="warga_negara">Indonesia
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="wna">
                            <input type="radio" class="form-check-input" id="wna" name="warga_negara" value="wna"
                                wire:model="warga_negara">WNA
                        </label>
                    </div>
                </div>
                @if($errors->has('warga_negara'))
                <small class="text-danger">{{$errors->first('warga_negara')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Agama <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="agama" name="agama" class="form-control {{$errors->has('agama')?'is-invalid':''}}"
                    wire:model="agama">
                    <option value="">Pilih Agama</option>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="katolik">Katolik</option>
                </select>
                @if($errors->has('agama'))
                <small class="text-danger">{{$errors->first('agama')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control {{$errors->has('alamat')?'is-invalid':''}}" rows="3" id="alamat"
                    name="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya"
                    wire:model="alamat"></textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Ayah Kandung <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama_ayah')?'is-invalid':''}}" id="nama_ayah"
                    name="nama_ayah" placeholder="Silahkan masukan nama ayah" value="{{old('nama_ayah')}}"
                    wire:model="nama_ayah">
                @if($errors->has('nama_ayah'))
                <small class="text-danger">{{$errors->first('nama_ayah')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Ibu Kandung <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama_ibu')?'is-invalid':''}}" id="nama_ibu"
                    name="nama_ibu" placeholder="Silahkan masukan nama ibu" value="{{old('nama_ibu')}}"
                    wire:model="nama_ibu">
                @if($errors->has('nama_ibu'))
                <small class="text-danger">{{$errors->first('nama_ibu')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat Lengkap Orang Tua <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control {{$errors->has('alamat_orangtua')?'is-invalid':''}}" rows="3"
                    id="alamat_orangtua" name="alamat_orangtua" placeholder="Masukkan alamat lengkap beserta RT/RW nya"
                    wire:model="alamat_orangtua"></textarea>
                @if($errors->has('alamat_orangtua'))
                <small class="text-danger">{{$errors->first('alamat_orangtua')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                @if($user->unggahDokumen)
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="update">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="update"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            @endif
            <!-- <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
        </div>
    </form>
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
</div>
