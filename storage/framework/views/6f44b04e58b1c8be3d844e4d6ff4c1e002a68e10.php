<?php $__env->startSection('title'); ?> Download <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Download</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Informasi</div>
            <div class="breadcrumb-item"> <a href="<?php echo e(route('backend.dokumen.download')); ?>"> Download</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Download</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <?php echo e(($download->title)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <?php echo ($download->description)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File</label>
                            <div class="col-sm-9">
                            <?php if($download->file): ?>
                                <a href="<?php echo e(asset('backend/files/informasi/download/'.$download->file)); ?>" target="_blank"><span class="badge badge-warning"><?php echo e($download->file); ?></span></a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dibuat</label>
                            <div class="col-sm-9">
                                <?php echo ($download->created_by)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <span class="badge badge-<?php echo e(($download->status == 'show')?'success':'danger'); ?>">
                                    <?php echo e(($download->status == 'show')?'Aktif':'Tidak Aktif'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('backend.dokumen.download')); ?>" class="btn btn-secondary">Kembali</a>
                        <?php if(Session::get('permission')->update == 1): ?>
                        <a href="<?php echo e(route('backend.dokumen.download.edit',['id'=> $download->encodeHash($download->id)])); ?>"
                            class="btn btn-primary">Edit</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/dokumen/download/detail.blade.php ENDPATH**/ ?>