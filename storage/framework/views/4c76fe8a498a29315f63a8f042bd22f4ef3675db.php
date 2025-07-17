<?php $__env->startSection('title'); ?> Surat Keterangan Penghasilan <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/chocolat/dist/css/chocolat.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('backend/node_modules/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/page/modules-datatables.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/jquery-ui-dist/jquery-ui.min.js')); ?>"></script>
<script>
    $('.ubah').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

    $('.delete').click(function () {
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
    $('#closeModal').click(function () {
        $('#printConfirmation').modal('hide');
    })
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(!empty(Session::get('permission'))): ?>
<?php if(Session::get('permission')->read == 1 || Session::get('permission')->create == 1 ||
Session::get('permission')->update == 1 || Session::get('permission')->delete == 1): ?>
<section class="section">
    <div class="section-header">
        <h1>Surat Keterangan Penghasilan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Dokumen</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.dokumen.skp')); ?>"> Surat Keterangan Penghasilan</a></div>
            <div class="breadcrumb-item active">List</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Pengajuan Surat Keterangan Penghasilan</h4>
                        <div class="card-header-action">
                            <?php if(Session::get('permission')->create == 1): ?>
                            <!-- <a href="#" data-toggle="modal" data-target="#importConfirmation"
                                class="btn btn-warning btn-icon"><i class="fas fa-plus-circle"></i> Import</a> -->
                            <a href="<?php echo e(route('backend.dokumen.skp.create')); ?>" class="btn btn-success btn-icon"><i
                                    class="fas fa-plus-circle"></i> Tambah</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Pekerjaan</th>
                                        <th>Verifikasi Kasi</th>
                                        <th>Verifikasi Sekdes</th>
                                        <th>Verifikasi Kades</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    <?php $__currentLoopData = $skp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($row->nama); ?></td>
                                        <td><?php echo e($row->nik); ?></td>
                                        <td><?php echo e(($row->pekerjaan->nama)??'-'); ?></td>
                                        <td><span class="badge badge-<?php echo e(($row->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($row->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span></td>
                                        <td><span class="badge badge-<?php echo e(($row->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($row->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span></td>
                                        <td><span class="badge badge-<?php echo e(($row->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($row->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($row->created_at)->translatedFormat('d M Y')); ?></td>
                                        <td>
                                            <?php if(Session::get('permission')->update == 1): ?>
                                            <?php if(!empty($row->no_surat) && Auth::user()->roles()->first()->id == 'operator' && $row->verifikasi_kasi == '1' && $row->verifikasi_sekdes == '1' && $row->verifikasi_kades == '1'): ?>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#printConfirmation"
                                                data-id="<?php echo e($row->encodeHash($row->id)); ?>"
                                                class="ubah btn btn-md btn-warning btn-icon" title="Print Dokumen"><i
                                                    class="fas fa-print"></i></a>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(!empty($row->no_surat) && Auth::user()->roles()->first()->id == 'kasi' && $row->verifikasi_kasi == '0'): ?>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#verifikasiKasi"
                                                data-id="<?php echo e($row->encodeHash($row->id)); ?>"
                                                class="kasi btn btn-md btn-success btn-icon" title="Verifikasi"><i
                                                    class="fas fa-check-circle"></i></a>
                                            <?php endif; ?>
                                            <?php if(!empty($row->no_surat) && Auth::user()->roles()->first()->id == 'sekretaris_desa' && $row->verifikasi_kasi == '1' && $row->verifikasi_sekdes == '0'): ?>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#verifikasiSekdes"
                                                data-id="<?php echo e($row->encodeHash($row->id)); ?>"
                                                class="sekdes btn btn-md btn-success btn-icon" title="Verifikasi"><i
                                                    class="fas fa-check-circle"></i></a>
                                            <?php endif; ?>
                                            <?php if(!empty($row->no_surat) && Auth::user()->roles()->first()->id == 'kepala_desa' && $row->verifikasi_kasi == '1' && $row->verifikasi_sekdes == '1' && $row->verifikasi_kades == '0'): ?>
                                            
                                            <?php endif; ?>
                                            <?php if(Session::get('permission')->delete == 1 && Auth::user()->roles()->first()->id == 'operator' && $row->status == '0'): ?>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#deleteConfirmation"
                                                data-id="<?php echo e($row->encodeHash($row->id)); ?>"
                                                class="delete btn btn-md btn-danger btn-icon" title="Hapus"><i
                                                    class="fas fa-trash"></i></a>
                                            <?php endif; ?>
                                            <?php if(Session::get('permission')->read == 1): ?>
                                            <a href="<?php echo e(route('backend.dokumen.skp.detail',['id' => $row->encodeHash($row->id)])); ?>"
                                                class="btn btn-md btn-secondary btn-icon" title="Detail"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="<?php echo e(route('backend.dokumen.skp.print')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="printConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan mencetak data ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-success" id="closeModal">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.dokumen.skp.kades')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
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
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.dokumen.skp.sekdes')); ?>" method="post">
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
<form action="<?php echo e(route('backend.dokumen.skp.kasi')); ?>" method="post">
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
<form action="<?php echo e(route('backend.dokumen.skp.delete')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin mengahpus data ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<?php else: ?>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/dokumen/skp/list.blade.php ENDPATH**/ ?>