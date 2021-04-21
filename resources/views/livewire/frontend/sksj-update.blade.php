<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Sapu Jagat</h2></center>
    <div class="line"></div>
    <!-- content -->
    @include('notification.unggah')
    @if($user->unggahDokumen)
    <form method="post" enctype="multipart/form-data" id="mainform" wire:submit.prevent="update">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control {{$errors->has('file_sp_rtrw')?'is-invalid':''}}"
                        name="file_sp_rtrw" id="file_sp_rtrw" wire:model="file_sp_rtrw"
                        accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_sp_rtrw'))
                    <small class="text-danger">{{$errors->first('file_sp_rtrw')}}</small>
                    @endif
                    @if($file_sp_rtrw)
                    <img src="{{asset('storage/backend/images/dokumen/sksj/rtrw/'.$file_sp_rtrw)}}" alt="" width="200px"
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
                    <img src="{{asset('storage/backend/images/dokumen/sksj/surat_pernyataan/'.$file_surat_pernyataan)}}"
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
            <label for="" class="col-sm-4 col-form-label">Umur <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="number" min="1" class="form-control {{$errors->has('umur')?'is-invalid':''}}" name="umur"
                    placeholder="" wire:model="umur" readonly>
                @if($errors->has('umur'))
                <small class="text-danger">{{$errors->first('umur')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Mulai Menetap <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" class="form-control {{$errors->has('tgl_menetap')?'is-invalid':''}}"
                    name="tgl_menetap" value="{{old('tgl_menetap')}}" wire:model="tgl_menetap" />
                @if($errors->has('tgl_menetap'))
                <small class="text-danger">{{$errors->first('tgl_menetap')}}</small>
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
            <label for="" class="col-sm-4 col-form-label">Alamat Kantor <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control {{$errors->has('alamat_kantor')?'is-invalid':''}}" rows="3" id="alamat"
                    name="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya"
                    wire:model="alamat_kantor"></textarea>
                @if($errors->has('alamat_kantor'))
                <small class="text-danger">{{$errors->first('alamat_kantor')}}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Keperluan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control {{$errors->has('keperluan')?'is-invalid':''}}" name="keperluan"
                    placeholder="Surat ini dibuat untuk keperluan?" value="{{old('keperluan')}}" wire:model="keperluan">
                @if($errors->has('keperluan'))
                <small class="text-danger">{{$errors->first('keperluan')}}</small>
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
