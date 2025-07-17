<?php $__env->startSection('title'); ?> Profil <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/selectric/public/selectric.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/selectric/public/jquery.selectric.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/page/forms-advanced-forms.js')); ?>"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId = '#preview-' + $(input).attr('id');
                $(imgId).attr('src', e.target.result);
                // $('.uploading1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // CKEDITOR.replace('ckeditor');
    $("form#mainform input[type='file']").change(function () {
        readURL(this);
    });

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/bootstrap-social/bootstrap-social.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Profil</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo e(route('backend.dashboard')); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Profil</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" action="<?php echo e(route('backend.profil.update')); ?>" class="needs-validation" novalidate="" enctype="multipart/form-data" id="mainform">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-header">
                            <h4>Edit Profil</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control <?php echo e(($errors->has('name'))?'is-invalid':''); ?>" value="<?php echo e($profil->name); ?>" name="name">
                                    <?php if($errors->has('name')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('name')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>No. Telpon</label>
                                    <input type="text" class="form-control <?php echo e(($errors->has('phone_number'))?'is-invalid':''); ?>" value="<?php echo e($profil->phone_number); ?>" name="phone_number">
                                    <?php if($errors->has('phone_number')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('phone_number')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Foto</label><br>
                                    <?php $img = asset('backend/images'); ?>
                                    <img src="<?php echo (!empty($profil->img) ? $img . '/manajemen/admin/' . $profil->img : $img . '/avatar/avatar-1.png') ?>"
                                        id="preview-img" style="width: 200px">
                                    <input type="file" class="form-control <?php echo e(($errors->has('img'))?'is-invalid':''); ?>"
                                        id="img" name="img" value="<?php echo e($profil->img); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                    <?php if($errors->has('img')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('img')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Alamat</label>
                                    <textarea type="text" id="description" name="address" class="form-control summernote <?php echo e(($errors->has('address'))?'is-invalid':''); ?>" value=""><?php echo e($profil->address); ?></textarea>
                                    <?php if($errors->has('address')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('address')); ?>

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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/auth/profil.blade.php ENDPATH**/ ?>