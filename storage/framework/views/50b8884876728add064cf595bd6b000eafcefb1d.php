<?php $__env->startSection('title'); ?> User <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/selectric/public/selectric.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

</script>
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

<?php $__env->startSection('content'); ?>
<?php if(Session::get('permission')): ?>
<?php if(Session::get('permission')->create == 1): ?>
<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Manajemen</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.manajemen.user')); ?>">User</a>
            </div>
            <div class="breadcrumb-item active">Tambah</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" id="mainform">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-header">
                            <h4>Form Input User</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="">
                                    <input type="text" class="form-control <?php echo e(($errors->has('nik'))?'is-invalid':''); ?>"
                                        name="nik" value="<?php echo e(old('nik')); ?>">
                                    <?php if($errors->has('nik')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nik')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('nama_lengkap'))?'is-invalid':''); ?>"
                                        name="nama_lengkap" value="<?php echo e(old('nama_lengkap')); ?>">
                                    <?php if($errors->has('nama_lengkap')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nama_lengkap')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control datepicker <?php echo e(($errors->has('tgl_lahir'))?'is-invalid':''); ?>"
                                        name="tgl_lahir" value="<?php echo e(old('tgl_lahir')); ?>">
                                    <?php if($errors->has('tgl_lahir')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('tgl_lahir')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" id=""
                                        class="form-control <?php echo e(($errors->has('jenis_kelamin'))?'is-invalid':''); ?>">
                                        <option value="">--Pilih--</option>
                                        <option value="laki-laki" <?php echo e((old('jenis_kelamin')=='laki=laki')?'selected':''); ?>>
                                            Laki-laki</option>
                                        <option value="perempuan" <?php echo e((old('jenis_kelamin')=='perempuan')?'selected':''); ?>>
                                            Perempuan</option>
                                    </select>
                                    <?php if($errors->has('jenis_kelamin')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('jenis_kelamin')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('email'))?'is-invalid':''); ?>"
                                        name="email" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('email')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Telpon</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('no_telpon'))?'is-invalid':''); ?>"
                                        name="no_telpon" value="<?php echo e(old('no_telpon')); ?>">
                                    <?php if($errors->has('no_telpon')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('no_telpon')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('alamat'))?'is-invalid':''); ?>"
                                        id="description" name="alamat"><?php echo e(old('alamat')); ?></textarea>
                                    <?php if($errors->has('alamat')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('alamat')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('backend.manajemen.user')); ?>" class="btn btn-secondary">Batal</a>
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
    window.location.href = "<?php echo e(route('backend.manajemen.user')); ?>"

</script>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/manajemen/user/create.blade.php ENDPATH**/ ?>