<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Usaha</h2></center>
    <div class="line"></div>
    @include('notification.unggah')
    <!-- content -->
    <form wire:submit.prevent="update" method="post" type="multipart" id="mainform">
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sp_rtrw')?'is-invalid':''}}"
                        wire:model="file_sp_rtrw" accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                    @if($file_sp_rtrw)
                    <img src="{{asset('storage/backend/images/dokumen/sku/rtrw/'.$file_sp_rtrw)}}" alt="" width="200px"
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
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                    @if($file_surat_pernyataan)
                    <img src="{{asset('storage/backend/images/dokumen/sku/surat_pernyataan/'.$file_surat_pernyataan)}}"
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
                    placeholder="NIK" wire:model="nik" value="{{old('nik')}}" readonly>
                @if($errors->has('nik'))
                <small class="text-danger">{{$errors->first('nik')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}" id="nama" name="nama"
                    placeholder="Nama Lengkap" wire:model="nama" value="{{old('nama')}}" readonly>
                @if($errors->has('nama'))
                <small class="text-danger">{{$errors->first('nama')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('tempat_lahir')?'is-invalid':''}}"
                    id="tempat_lahir" name="tempat_lahir" placeholder="" wire:model="tempat_lahir"
                    value="{{old('tempat_lahir')}}">
                @if($errors->has('tempat_lahir'))
                <small class="text-danger">{{$errors->first('tempat_lahir')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" class="form-control {{$errors->has('tgl_lahir')?'is-invalid':''}}" id="tgl_lahir"
                    name="tgl_lahir" wire:model="tgl_lahir" value="{{old('tgl_lahir')}}" />
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
                                wire:model="jk" {{(old('jk')=='laki-laki')?'checked':''}}>Laki-laki
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="perempuan">
                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                wire:model="jk" {{(old('jk')=='perempuan')?'checked':''}}>Perempuan
                        </label>
                    </div>
                </div>
                @if($errors->has('jk'))
                <small class="text-danger">{{$errors->first('jk')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id" name="pekerjaan_id"
                    class="form-control {{$errors->has('pekerjaan_id')?'is-invalid':''}}" wire:model="pekerjaan_id">
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
            <label for="" class="col-sm-4 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control {{$errors->has('alamat')?'is-invalid':''}}" rows="3" id="alamat"
                    name="alamat" wire:model="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya"
                    readonly>{{old('alamat')}}</textarea>
                @if($errors->has('alamat'))
                <small class="text-danger">{{$errors->first('alamat')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Usaha <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input class="form-control {{$errors->has('jenis_usaha')?'is-invalid':''}}" id="" name="jenis_usaha"
                    placeholder="" value="{{old('jenis_usaha')}}" wire:model="jenis_usaha">
                @if($errors->has('jenis_usaha'))
                <small class="text-danger">{{$errors->first('jenis_usaha')}}</small>
                @endif
            </div>
        </div>
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
    <div class="line"></div>
</div>
