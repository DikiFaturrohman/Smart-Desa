<?php if(!$user->unggahDokumen): ?>
<div class="form-group row">
    <span class="col-sm-12 badge badge-danger" style="padding:15px">Silahkan untuk mengunggah dokumen ktp dan kartu keluarga terlebih dahulu
        sebelum melanjutkan pengajuan surat, 
    <?php if(Auth::guard('masyarakat')->check()): ?>
    <a href="<?php echo e(route('frontend.unggah')); ?>">klik disini</a>
    <?php else: ?>
    <a href="<?php echo e(route('frontend.webview.unggah',['token' => $user->api_token])); ?>">klik disini</a>
    <?php endif; ?>
    </span>
</div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\smartdesa\resources\views/notification/unggah.blade.php ENDPATH**/ ?>