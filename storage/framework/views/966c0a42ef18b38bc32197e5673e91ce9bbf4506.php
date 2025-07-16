<?php $__env->startSection('title'); ?> Agenda <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Agenda</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Informasi</div>
            <div class="breadcrumb-item"> <a href="<?php echo e(route('backend.informasi.agenda')); ?>"> Agenda</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Agenda</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-9">
                            <?php echo e((\Carbon\Carbon::parse($agenda->start_date)->translatedFormat('d F Y H:m'))??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                            <div class="col-sm-9">
                                <?php echo e((\Carbon\Carbon::parse($agenda->end_date)->translatedFormat('d F Y H:m'))??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <?php echo e(($agenda->title)??'-'); ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi Singkat</label>
                            <div class="col-sm-9">
                                <?php echo ($agenda->short_description)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <?php echo ($agenda->description)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat</label>
                            <div class="col-sm-9">
                                <?php echo ($agenda->address)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <img src="<?php echo e(($agenda->img)?asset('public/backend/images/informasi/agenda/'.$agenda->img):asset('public/backend/images/default.jpg')); ?>" alt="" class="img-fluid" width="200px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dibuat</label>
                            <div class="col-sm-9">
                                <?php echo ($agenda->created_by)??'-'; ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <span class="badge badge-<?php echo e(($agenda->status == 'show')?'success':'danger'); ?>">
                                    <?php echo e(($agenda->status == 'show')?'Aktif':'Tidak Aktif'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('backend.informasi.agenda')); ?>" class="btn btn-secondary">Kembali</a>
                        <?php if(Session::get('permission')->update == 1): ?>
                        <a href="<?php echo e(route('backend.informasi.agenda.edit',['id'=> $agenda->encodeHash($agenda->id)])); ?>"
                            class="btn btn-primary">Edit</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/informasi/agenda/detail.blade.php ENDPATH**/ ?>