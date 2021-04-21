<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Beda Nama</h2></center>
    <div class="line"></div>
    @include('notification.unggah')
    @if($user->unggahDokumen)
    <!-- content -->
    <form method="post" id="mainform" enctype="multipart/form-data" wire:submit.prevent="update">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sp_rt_rw')?'is-invalid':''}}"
                        name="file_sp_rtrw" id="file_sp_rtrw" wire:model="file_sp_rtrw"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                    @if($file_sp_rtrw)
                    <img src="{{asset('storage/backend/images/dokumen/skbn/rtrw/'.$file_sp_rtrw)}}" alt="" width="200px"
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
                        name="file_surat_pernyataan" id="file_surat_pernyataan" wire:model="file_surat_pernyataan"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_surat_pernyataan'))
                    <small class="text-danger">{{$errors->first('file_surat_pernyataan')}}</small>
                    @endif
                    @if($file_surat_pernyataan)
                    <img src="{{asset('storage/backend/images/dokumen/skbn/surat_pernyataan/'.$file_surat_pernyataan)}}"
                        alt="" width="200px" height="200px" style="margin-top:7px"><br>
                    @endif
                    <small class="w-100"> *) file type: pdf/jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Dokumen 1 <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jenis_dok" name="jenis_dok[]"
                    class="form-control {{$errors->has('jenis_dok.0')?'is-invalid':''}}" wire:model="jenis_dok.0">
                    <option value="">Pilih Dokumen 1</option>
                    <option value="ktp">KTP</option>
                    <option value="sim">SIM</option>
                    <option value="ijazah">Ijazah</option>
                    <option value="kk">Kartu Keluarga</option>
                    <option value="akta nikah">Akta Nikah</option>
                </select>
                @if($errors->has('jenis_dok.0'))
                <small class="text-danger">{{$errors->first('jenis_dok.0')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nomor Dokumen 1 <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nomor__dok.0')?'is-invalid':''}}" id="nomor_dok"
                    name="nomor_dok[]" placeholder="Masukkan Nomor Dokumen 1" value="{{old('nomor_dok.0')}}"
                    wire:model="nomor_dok.0">
                @if($errors->has('nomor_dok.0'))
                <small class="text-danger">{{$errors->first('nomor_dok.0')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Dokumen 1 <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama_dok.0')?'is-invalid':''}}" id="nama_salah"
                    name="nama_dok[]" placeholder="Masukkan Nama dari Jenis Dokumen 1" value="{{old('nama_dok.0')}}"
                    wire:model="nama_dok.0">
                @if($errors->has('nama_dok.0'))
                <small class="text-danger">{{$errors->first('nama_dok.0')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Dokumen 2 <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jenis_dok" name="jenis_dok[]"
                    class="form-control {{$errors->has('jenis_dok.1')?'is-invalid':''}}" wire:model="jenis_dok.1">
                    <option value="">Pilih Dokumen 2</option>
                    <option value="ktp">KTP</option>
                    <option value="sim">SIM</option>
                    <option value="ijazah">Ijazah</option>
                    <option value="kk">Kartu Keluarga</option>
                    <option value="akta nikah">Akta Nikah</option>
                </select>
                @if($errors->has('jenis_dok.1'))
                <small class="text-danger">{{$errors->first('jenis_dok.1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nomor Dokumen 2 <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nomor_dok.1')?'is-invalid':''}}" id="nomor_dok"
                    name="nomor_dok[]" placeholder="Masukkan Nomor Dokumen 2" value="{{old('nomor_dok.1')}}"
                    wire:model="nomor_dok.1">
                @if($errors->has('nomor_dok.1'))
                <small class="text-danger">{{$errors->first('nomor_dok.1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Dokumen 2 <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('nama_dok.1')?'is-invalid':''}}" id="nama_salah"
                    name="nama_dok[]" placeholder="Masukkan Nama dari Jenis Dokumen 2" value="{{old('nama_dok.1')}}"
                    wire:model="nama_dok.1">
                @if($errors->has('nama_dok.1'))
                <small class="text-danger">{{$errors->first('nama_dok.1')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Yang Benar Diambil Dari <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select name="jenis_dok[]" class="form-control {{$errors->has('data_dok_benar')?'is-invalid':''}}"
                    wire:model="data_dok_benar">
                    <option value="">Pilih Dokumen yang benar</option>
                    <option value="1">Dokumen 1</option>
                    <option value="2">Dokumen 2</option>
                </select>
                @if($errors->has('data_dok_benar'))
                <small class="text-danger">{{$errors->first('data_dok_benar')}}</small>
                @endif
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="update">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="update"
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
</div>
