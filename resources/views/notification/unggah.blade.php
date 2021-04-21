@if(!$user->unggahDokumen)
<div class="form-group row">
    <span class="col-sm-12 badge badge-danger" style="padding:15px">Silahkan untuk mengunggah dokumen ktp dan kartu keluarga terlebih dahulu
        sebelum melanjutkan pengajuan surat, <a href="{{route('frontend.unggah')}}">klik disini</a></span>
</div>
@endif
