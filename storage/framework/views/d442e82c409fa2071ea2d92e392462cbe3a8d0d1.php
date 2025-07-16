<?php $__env->startSection('title'); ?> Pengaturan Akun <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-social/bootstrap-social.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Pengaturan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo e(route('backend.dashboard')); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Pengaturan</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" action="<?php echo e(route('backend.account.update')); ?>" class="needs-validation"
                        novalidate="">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-header">
                            <h4>Pengaturan Akun</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control <?php echo e(($errors->has('email'))?'is-invalid':''); ?>"
                                        value="<?php echo e(old('email',$profil->email)); ?>" name="email">
                                    <?php if($errors->has('email')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('email')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control <?php echo e(($errors->has('username'))?'is-invalid':''); ?>"
                                        value="<?php echo e(old('username',$profil->username)); ?>" name="username">
                                    <?php if($errors->has('username')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('username')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>Kata Sandi Lama</label>
                                    <input type="password"
                                        class="form-control <?php echo e(($errors->has('old_password'))?'is-invalid':''); ?>"
                                        value="<?php echo e(old('old_password')); ?>" name="old_password">
                                    <?php if($errors->has('old_password')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('old_password')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Kata Sandi Baru</label>
                                    <input type="password"
                                        class="form-control <?php echo e(($errors->has('new_password'))?'is-invalid':''); ?>"
                                        value="<?php echo e(old('new_password')); ?>" name="new_password">
                                    <?php if($errors->has('new_password')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('new_password')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Ulangi Kata Sandi Baru</label>
                                    <input type="password"
                                        class="form-control <?php echo e(($errors->has('repeat_new_password'))?'is-invalid':''); ?>"
                                        value="<?php echo e(old('repeat_new_password')); ?>" name="repeat_new_password">
                                    <?php if($errors->has('repeat_new_password')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('repeat_new_password')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/auth/akun.blade.php ENDPATH**/ ?>