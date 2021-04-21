@if(!$user->unggahDokumen)
<div class="form-group row">
    <span class="col-sm-12 badge badge-danger" style="padding:15px">Silahkan untuk mengunggah dokumen ktp dan kartu keluarga terlebih dahulu
        sebelum melanjutkan pengajuan surat, 
    @if(Auth::guard('masyarakat')->check())
    <a href="{{route('frontend.unggah')}}">klik disini</a>
    @else
    <a href="{{route('frontend.webview.unggah',['token' => $user->api_token])}}">klik disini</a>
    @endif
    </span>
</div>
@endif
