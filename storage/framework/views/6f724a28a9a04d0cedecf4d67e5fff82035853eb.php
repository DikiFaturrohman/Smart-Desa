<?php $__env->startSection('title'); ?> Potensi <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/chocolat/dist/css/chocolat.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('public/backend/node_modules/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/page/modules-datatables.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/jquery-ui-dist/jquery-ui.min.js')); ?>"></script>
<script>
    $('.ubah').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(!empty(Session::get('permission'))): ?>
<?php if(Session::get('permission')->read == 1 || Session::get('permission')->create == 1 ||
Session::get('permission')->update == 1 || Session::get('permission')->delete == 1): ?>
<section class="section">
    <div class="section-header">
      <h1>Potensi</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Potensi</div>
          <div class="breadcrumb-item active">List</div>
      </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Potensi Desa</h4>
                        <div class="card-header-action">
                            <?php if(Session::get('permission')->create == 1): ?>
                            <a href="<?php echo e(route('backend.potensi.list.create')); ?>" class="btn btn-success btn-icon"><i class="fas fa-plus-circle"></i> Tambah</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Potensi</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $i = 1;
                                  ?>
                                  <?php $__currentLoopData = $potensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td><?php echo e($i++); ?></td>
                                      <td><?php echo e($row->name); ?></td>
                                      <td><?php echo e($row->kategori->name); ?></td>
                                      <td><?php echo e($row->status); ?></td>
                                      <td>
                                        <?php if(Session::get('permission')->update == 1): ?>
                                        <a href="<?php echo e(route('backend.potensi.list.edit',['id' => $row->encodeHash($row->id)])); ?>"
                                            class="btn btn-md btn-primary btn-icon" title="Edit"><i
                                                class="far fa-edit"></i></a>
                                        <?php if($row->status == 'show'): ?>
                                        <a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#inactiveConfirmation"
                                            data-id="<?php echo e($row->encodeHash($row->id)); ?>"
                                            class="ubah btn btn-md btn-danger btn-icon" title="Non Aktifkan"><i
                                                class="fas fa-power-off"></i></a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#activeConfirmation"
                                            data-id="<?php echo e($row->encodeHash($row->id)); ?>"
                                            class="ubah btn btn-md btn-success btn-icon" title="Aktifkan"><i
                                                class="fas fa-power-off"></i></a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(Session::get('permission')->read == 1): ?>
                                        <a href="<?php echo e(route('backend.potensi.list.detail',['id' => $row->encodeHash($row->id)])); ?>"
                                            class="btn btn-md btn-secondary btn-icon" title="Detail"><i
                                                class="fas fa-info-circle"></i></a>
                                        <?php endif; ?>
                                      </td>
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
    </div>
</section>
<form action="<?php echo e(route('backend.potensi.list.active')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="activeConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Mengaktifkan Data Ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.potensi.list.inactive')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="inactiveConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Menonaktifkan Data Ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<!-- <form action="<?php echo e(route('backend.informasi.pengumuman')); ?>" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="modal fade" tabindex="-1" role="dialog" id="importConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" id="" value="" name="pegawai">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form> -->
<?php else: ?>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/potensi/list/list.blade.php ENDPATH**/ ?>