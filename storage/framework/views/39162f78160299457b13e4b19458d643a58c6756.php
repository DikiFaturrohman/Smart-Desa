<?php $__env->startSection('title'); ?> Surat Keterangan Usaha <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script>

    $('.operator').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

    $('.kades').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

    $('.sekdes').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

    $('.kasi').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })
</script>
<?php if($errors->has('no_surat') || $errors->has('kasi_id')): ?>
    <script>
        $(window).on('load',function(){
            $('#acceptedOperator').modal('show')
        })
        </script>
<?php endif; ?>
<?php if($errors->has('pesan')): ?>
    <script>
        $(window).on('load',function(){
            $('#rejectedOperator').modal('show')
        })
        </script>
<?php endif; ?>
<?php if($errors->has('passphrase')): ?>
    <script>
        $(window).on('load',function(){
            $('#verifikasiKades').modal('show')
        })
        </script>
<?php elseif(Session::has('error')): ?>
    <script>
        $(window).on('load',function(){
            $('#verifikasiKades').modal('show')
        })
        </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Surat Keterangan Usaha</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Dokumen</div>
            <div class="breadcrumb-item"> <a href="<?php echo e(route('backend.dokumen.sku')); ?>"> Surat Keterangan Usaha</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <?php if(empty($sku->no_surat) && Auth::user()->roles()->first()->id != 'operator'): ?>
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            Data Belum di verifikasi oleh <code>Operator</code>
        </div>
    </div>
    <?php elseif($sku->verifikasi_kasi == '0' &&$sku->verifikasi_sekdes == '0' &&  !empty($sku->no_surat) && Auth::user()->roles()->first()->id != 'kasi'): ?>
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            Data Belum di verifikasi oleh <code>Kasi</code>
        </div>
    </div>
    <?php elseif($sku->verifikasi_sekdes == '0' && $sku->verifikasi_kasi == '1' && Auth::user()->roles()->first()->id != 'sekretaris_desa'): ?>
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            Data Belum di verifikasi oleh <code>Sekretaris Desa</code>
        </div>
    </div>
    <?php elseif($sku->verifikasi_sekdes == '1' && $sku->verifikasi_kades == '0' && Auth::user()->roles()->first()->id == 'operator'): ?>
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            Data Belum di verifikasi oleh <code>Kepala Desa</code>
        </div>
    </div>
    <?php endif; ?>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Surat Keterangan Usaha</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <?php echo e(($sku->no_surat)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <?php echo e(($sku->nama)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <?php echo e(($sku->nik)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <?php echo e(($sku->tempat_lahir)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <?php echo e(\Carbon\Carbon::parse($sku->tgl_lahir)->translatedFormat('d M Y')??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <?php echo e(ucfirst($sku->jk)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <?php echo e(($sku->pekerjaan->nama)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <?php echo ($sku->alamat)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                <?php echo ucwords(strtolower($sku->kota->nama))??'-'; ?>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                <?php echo ucwords(strtolower($sku->kecamatan->nama))??'-'; ?>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-9">
                                <?php echo ucwords(strtolower($sku->area->nama))??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pengantar RTRW</label>
                            <div class="col-sm-9">
                                <a href="<?php echo e(asset('storage/backend/images/dokumen/sku/rtrw/'.$sku->file_sp_rtrw)); ?>" target="_blank" >
                                <img src="<?php echo e(asset('storage/backend/images/dokumen/sku/rtrw/'.$sku->file_sp_rtrw)); ?>" width="200px"></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP</label>
                            <div class="col-sm-9">
                                <a href="<?php echo e(asset('storage/backend/images/uploads/'.$sku->file_ktp)); ?>" target="_blank"><img src="<?php echo e(asset('storage/backend/images/uploads/'.$sku->file_ktp)); ?>" width="200px"></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Kartu Keluarga</label>
                            <div class="col-sm-9">
                                <a href="<?php echo e(asset('storage/backend/images/uploads/'.$sku->file_kk)); ?>" target="_blank" width="200px"><img src="<?php echo e(asset('storage/backend/images/uploads/'.$sku->file_kk)); ?>" width="200px"></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
                            <div class="col-sm-9">
                                <a href="<?php echo e(asset('storage/backend/images/dokumen/sku/surat_pernyataan/'.$sku->file_surat_pernyataan)); ?>" target="_blank" width="200px"><img src="<?php echo e(asset('storage/backend/images/dokumen/sku/surat_pernyataan/'.$sku->file_surat_pernyataan)); ?>" width="200px"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('backend.dokumen.sku')); ?>" class="btn btn-secondary">Kembali</a>
                        <?php if(Session::get('permission')->update == 1 && $sku->status == '1' && empty($sku->no_surat) &&
                        Auth::user()->roles()->first()->id == 'operator'): ?>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#rejectedOperator"
                            data-id="<?php echo e($sku->encodeHash($sku->id)); ?>" class="operator btn btn-md btn-danger btn-icon"
                            title="Tolak">Tolak</a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#acceptedOperator"
                            data-id="<?php echo e($sku->encodeHash($sku->id)); ?>" class="operator btn btn-md btn-success btn-icon"
                            title="Terima">Terima</a>
                        <?php elseif(!empty($sku->no_surat) && Auth::user()->roles()->first()->id == 'kasi' && $sku->kasi_id == Auth::guard('admin')->user()->id): ?>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#verifikasiKasi"
                            data-id="<?php echo e($sku->encodeHash($sku->id)); ?>" class="kasi btn btn-md btn-success btn-icon"
                            title="Verifikasi">Verifikasi</a>
                        <?php elseif(!empty($sku->no_surat) && Auth::user()->roles()->first()->id == 'sekretaris_desa' &&
                        $sku->verifikasi_kasi == '1'&&
                        $sku->verifikasi_sekdes == '0'): ?>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#verifikasiSekdes"
                            data-id="<?php echo e($sku->encodeHash($sku->id)); ?>" class="sekdes btn btn-md btn-success btn-icon"
                            title="Verifikasi">Verifikasi</a>
                        <?php elseif(!empty($sku->no_surat) && Auth::user()->roles()->first()->id == 'kepala_desa' &&
                        $sku->verifikasi_kasi
                        == '1' && $sku->verifikasi_sekdes == '1' && $sku->verifikasi_kades == '0'): ?> 
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#verifikasiKades"
                            data-id="<?php echo e($sku->encodeHash($sku->id)); ?>" class="kades btn btn-md btn-success btn-icon"
                            title="Verifikasi">Verifikasi</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="<?php echo e(route('backend.dokumen.sku.reject')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="<?php echo e(old('id')); ?>" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="rejectedOperator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan menolak data ini?</p>
                    <input type="text" class="form-control <?php echo e(($errors->has('pesan'))?'is-invalid':''); ?>" name="pesan" placeholder="masukan pesan penolakan">
                    <?php if($errors->has('pesan')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('pesan')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.dokumen.sku.accept')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="<?php echo e(old('id')); ?>" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="acceptedOperator">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan menerima dan verifikasi data ini?</p>
                    <label for="">Masukan No Surat</label>
                    <input type="text" class="form-control <?php echo e(($errors->has('no_surat'))?'is-invalid':''); ?>" name="no_surat" placeholder="masukan no surat">
                    <?php if($errors->has('no_surat')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('no_surat')); ?>

                        </div>
                    <?php endif; ?>
                    <br>
                    <label for="">Kasi</label>
                    <select name="kasi_id" id="" class="select2 form-control">
                        <?php $__currentLoopData = $kasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->admin_id); ?>"><?php echo e($data->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('kasi_id')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('kasi_id')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.dokumen.sku.kades')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="<?php echo e(old('id',$sku->encodeHash($sku->id))); ?>" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="verifikasiKades">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan verifikasi data ini?</p>
                    <label for="">Masukan Passphrase</label>
                    <input type="password" class="form-control <?php echo e(($errors->has('passphrase') || Session::get('error'))?'is-invalid':''); ?>" name="passphrase" placeholder="Masukan Passphrase">
                    <?php if($errors->has('passphrase')): ?>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('passphrase')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('error')): ?>
                    <div class="invalid-feedback">
                            <?php echo e(Session::get('error')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.dokumen.sku.sekdes')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="verifikasiSekdes">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan verifikasi data ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.dokumen.sku.kasi')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="verifikasiKasi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan verifikasi data ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/dokumen/sku/detail.blade.php ENDPATH**/ ?>