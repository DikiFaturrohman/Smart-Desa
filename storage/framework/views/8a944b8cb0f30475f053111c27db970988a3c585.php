<?php $__env->startSection('title'); ?> Info Grafis <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Info Grafis</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Informasi</div>
            <div class="breadcrumb-item"> <a href="<?php echo e(route('backend.informasi.infoGrafis')); ?>"> Info Grafis</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Info Grafis</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <?php echo e(($infoGrafis->title)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <?php echo ($infoGrafis->description)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <img src="<?php echo e(($infoGrafis->img)?asset('public/backend/images/informasi/infoGrafis/'.$infoGrafis->img):asset('public/backend/images/default.jpg')); ?>" alt="" class="img-fluid" width="200px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dibuat</label>
                            <div class="col-sm-9">
                                <?php echo ($infoGrafis->created_by)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <span class="badge badge-<?php echo e(($infoGrafis->status == 'show')?'success':'danger'); ?>">
                                    <?php echo e(($infoGrafis->status == 'show')?'Aktif':'Tidak Aktif'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('backend.informasi.infoGrafis')); ?>" class="btn btn-secondary">Kembali</a>
                        <?php if(Session::get('permission')->update == 1): ?>
                        <a href="<?php echo e(route('backend.informasi.infoGrafis.edit',['id'=> $infoGrafis->encodeHash($infoGrafis->id)])); ?>"
                            class="btn btn-primary">Edit</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/informasi/infoGrafis/detail.blade.php ENDPATH**/ ?>