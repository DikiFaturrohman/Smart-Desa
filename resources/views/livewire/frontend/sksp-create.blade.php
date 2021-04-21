<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Status Pernikahan</h2></center>
    <div class="line"></div>
    <!-- content -->
    @include('notification.unggah')
    <form method="post" action="" enctype="multipart/form-data" id="mainform" wire:submit.prevent="store">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pernyataan RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sp_rtrw')?'is-invalid':''}}"
                        name="file_sp_rtrw" id="file_sp_rtrw" wire:model="file_sp_rtrw"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Akta Cerai <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_akta_cerai')?'is-invalid':''}}"
                        name="file_akta_cerai" id="file_akta_cerai" wire:model="file_akta_cerai"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_akta_cerai'))
                    <small class="text-danger">{{$errors->first('file_akta_cerai')}}</small><br>
                    @endif
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nik" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nik')?'is-invalid':''}}" id="nik" name="nik"
                    placeholder="NIK" wire:model="nik" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}" id="nama" name="nama"
                    placeholder="Nama Lengkap" wire:model="nama" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('tempat_lahir')?'is-invalid':''}}"
                    id="tempat_lahir" name="tempat_lahir" placeholder="Silahkan masukan kota/kab tempat lahir"
                    value="{{old('tempat_lahir')}}" wire:model="tempat_lahir">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" id="tgl_lahir" name="tgl_lahir"
                    class="form-control {{$errors->has('tgl_lahir')?'is-invalid':''}}" wire:model="tgl_lahir"
                    readonly />
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
                    name="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya" wire:model="alamat"
                    readonly></textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Status Saat Ini <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="status_perkawinan" name="status_perkawinan"
                    class="form-control {{$errors->has('status_perkawinan')?'is-invalid':''}}"
                    wire:model="status_perkawinan">
                    <option value="lajang">Belum Menikah</option>
                    <option value="menikah">Menikah</option>
                    <option value="janda">Janda</option>
                    <option value="duda">Duda</option>
                </select>
                @if($errors->has('status_perkawinan'))
                <small class="text-danger">{{$errors->first('status_perkawinan')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Keperluan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input class="form-control {{$errors->has('keperluan')?'is-invalid':''}}" id="keperluan"
                    name="keperluan" placeholder="Surat Keterangan ini dibuat untuk keperluan ?"
                    value="{{old('keperluan')}}" wire:model="keperluan">
                @if($errors->has('keperluan'))
                <small class="text-danger">{{$errors->first('keperluan')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                @if($user->unggahDokumen)
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="store">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="store"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            @endif
            <!-- <button type="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
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
    <div class="line"></div>
</div>
