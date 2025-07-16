<?php $__env->startSection('title'); ?> Info Grafis <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('public/backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/selectric/public/selectric.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<script src="<?php echo e(asset('public/backend/editor/ckeditor/ckeditor.js')); ?>"></script>
<script>
    CKEDITOR.replace('description');

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('public/backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/selectric/public/jquery.selectric.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/page/forms-advanced-forms.js')); ?>"></script>
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

<?php $__env->startSection('content'); ?>
<?php if(Session::get('permission')): ?>
<?php if(Session::get('permission')->update == 1): ?>
<section class="section">
    <div class="section-header">
        <h1>Info Grafis</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Informasi</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.informasi.infoGrafis')); ?>">Info Grafis</a>
            </div>
            <div class="breadcrumb-item active">Edit</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" id="mainform">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-header">
                            <h4>Form Edit Info Grafis</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="">
                                    <input type="text" class="form-control <?php echo e(($errors->has('title'))?'is-invalid':''); ?>"
                                        name="title" value="<?php echo e(old('title',$infoGrafis->title)); ?>">
                                    <?php if($errors->has('title')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('title')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('description'))?'is-invalid':''); ?>"
                                        id="description" name="description"><?php echo e(old('description',$infoGrafis->description)); ?></textarea>
                                </div>
                                <?php if($errors->has('description')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('description')); ?>

                                </div>
                                <?php endif; ?>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <?php $img = asset('public/backend/images'); ?>
                                    <img src="<?php echo (!empty($infoGrafis->img) ? $img . '/informasi/infoGrafis/' . $infoGrafis->img : $img . '/default.jpg') ?>"
                                        id="preview-img" style="width: 200px">
                                    <input type="file" class="form-control <?php echo e(($errors->has('img'))?'is-invalid':''); ?>"
                                        id="img" name="img" value="<?php echo e($infoGrafis->img); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                    <?php if($errors->has('img')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('img')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control select2">
                                        <option value="show" <?php echo e((old('status',$infoGrafis->status) == 'show')?'selected':''); ?>>Aktif
                                        </option>
                                        <option value="hide" <?php echo e((old('status',$infoGrafis->status) == 'hide')?'selected':''); ?>>Tidak
                                            Aktif
                                        </option>
                                    </select>
                                    <?php if($errors->has('status')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('status')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('backend.informasi.infoGrafis')); ?>" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.informasi.infoGrafis')); ?>"

</script>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/informasi/infoGrafis/edit.blade.php ENDPATH**/ ?>