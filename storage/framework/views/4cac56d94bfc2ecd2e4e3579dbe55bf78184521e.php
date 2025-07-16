<?php $__env->startSection('title'); ?> Perangkat Desa <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('public/backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/selectric/public/selectric.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('public/backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<script src="<?php echo e(asset('public/backend/editor/ckeditor/ckeditor.js')); ?>"></script>
<script>
    CKEDITOR.replace('description');

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('public/backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>">
</script>
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
<?php if(Session::get('permission')->create == 1): ?>
<section class="section">
    <div class="section-header">
      <h1>Pemerintah Desa</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Pemerintah Desa</div>
          <div class="breadcrumb-item">Perangkat Desa</div>
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
                            <h4>Form Input Perangkat Desa</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('name'))?'is-invalid':''); ?>"
                                        name="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('name')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('nip'))?'is-invalid':''); ?>"
                                        name="nip" value="<?php echo e(old('nip')); ?>">
                                    <?php if($errors->has('nip')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nip')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('birth_place'))?'is-invalid':''); ?>"
                                        name="birth_place" value="<?php echo e(old('birth_place')); ?>">
                                    <?php if($errors->has('birth_place')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('birth_place')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date"
                                        class="form-control <?php echo e(($errors->has('birth_date'))?'is-invalid':''); ?>"
                                        name="birth_date" value="<?php echo e(old('birth_date')); ?>">
                                    <?php if($errors->has('birth_date')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('birth_date')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('position'))?'is-invalid':''); ?>"
                                        name="position" value="<?php echo e(old('position')); ?>">
                                    <?php if($errors->has('position')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('position')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Golongan</label>
                                <div class="col-sm-9">
                                    <select name="golongan" class="form-control select2">
                                        <option value="Non ASN" <?php echo e(old('golongan')?'selected':''); ?>>Non ASN</option>
                                        <option value="IIa" <?php echo e(old('golongan')?'selected':''); ?>>IIa</option>
                                        <option value="IIb" <?php echo e(old('golongan')?'selected':''); ?>>IIb</option>
                                        <option value="IIc" <?php echo e(old('golongan')?'selected':''); ?>>IIc</option>
                                        <option value="IId" <?php echo e(old('golongan')?'selected':''); ?>>IId</option>
                                        <option value="IIIa" <?php echo e(old('golongan')?'selected':''); ?>>IIIa</option>
                                        <option value="IIIb" <?php echo e(old('golongan')?'selected':''); ?>>IIIb</option>
                                        <option value="IIIc" <?php echo e(old('golongan')?'selected':''); ?>>IIIc</option>
                                        <option value="IIId" <?php echo e(old('golongan')?'selected':''); ?>>IIId</option>
                                        <option value="IVa" <?php echo e(old('golongan')?'selected':''); ?>>IVa</option>
                                        <option value="IVb" <?php echo e(old('golongan')?'selected':''); ?>>IVb</option>
                                        <option value="IVc" <?php echo e(old('golongan')?'selected':''); ?>>IVc</option>
                                        <option value="IVd" <?php echo e(old('golongan')?'selected':''); ?>>IVd</option>
                                    </select>
                                    <?php if($errors->has('golongan')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('golongan')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('phone'))?'is-invalid':''); ?>"
                                        name="phone" value="<?php echo e(old('phone')); ?>">
                                    <?php if($errors->has('phone')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('phone')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('address'))?'is-invalid':''); ?>"
                                        id="address" name="address"><?php echo e(old('address')); ?></textarea>
                                    <?php if($errors->has('address')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('address')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo e(asset('public/backend/images/default.jpg')); ?>" id="preview-img" alt=""
                                        width="200px">
                                    <input type="file" class="form-control" id="img" name="img" value="<?php echo e(old('img')); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                    <?php if($errors->has('img')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('img')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control select2">
                                        <option value="1" <?php echo e((old('status') == 'show')?'selected':''); ?>>Aktif
                                        </option>
                                        <option value="0" <?php echo e((old('status') == 'hide')?'selected':''); ?>>Tidak
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
                            <a href="<?php echo e(route('backend.program.kegiatan')); ?>" class="btn btn-secondary">Batal</a>
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
    window.location.href = "<?php echo e(route('backend.program.kegiatan')); ?>"

</script>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/pemerintah/perangkat/create.blade.php ENDPATH**/ ?>