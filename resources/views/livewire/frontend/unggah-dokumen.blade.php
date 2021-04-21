<div class="container py-3">
    <h2>Halaman Unggah Dokumen Pengajuan Surat</h2>
    <div class="line"></div>
    <!-- content -->
    <form action="" method="post" enctype="multipart/form-data" id="mainform" wire:submit.prevent="upload">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto KTP</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">

                    <input type="file" class="form-control {{$errors->has('file_ktp')?'is-invalid':''}}" name="file_ktp" id="file_ktp" wire:model="file_ktp" accept="image/png, image/jpeg,image/jpg">
                    @if($errors->has('file_ktp'))
                    <small class="text-danger">{{$errors->first('file_ktp')}}</small>
                    @endif
                </div>
                <img src="{{($unggah)?asset('storage/backend/images/uploads/'.$unggah->file_ktp):asset('backend/images/default.jpg')}}"
                    id="preview-file_ktp" alt="" width="200px" style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Kartu Keluarga</label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_kk" id="file_kk" wire:model="file_kk" accept="image/png, image/jpeg,image/jpg">
                    <label class="custom-file-label" for="file_kk">Unggah File</label>
                    @if($errors->has('file_kk'))
                    <small class="text-danger">{{$errors->first('file_kk')}}</small>
                    @endif
                </div>
                <img src="{{($unggah)?asset('storage/backend/images/uploads/'.$unggah->file_kk):asset('backend/images/default.jpg')}}"
                    id="preview-file_kk" alt="" width="200px" style="margin-top:7px"><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <button type="submit" id="tes" class="btn btn-gelap float-right">{{($unggah)?'Ubah':'Simpan'}}</button>
            </div>
        </div>
    </form>
    <br />
    <div class="line"></div>
</div>
