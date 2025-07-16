<?php $__env->startSection('title'); ?> Admin <?php $__env->stopSection(); ?>

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
        <h1>Admin</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Manajemen</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.manajemen.admin')); ?>">Admin</a>
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
                            <h4>Form Input Admin</h4>
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
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('username'))?'is-invalid':''); ?>"
                                        name="username" value="<?php echo e(old('username')); ?>">
                                    <?php if($errors->has('username')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('username')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?php echo e(($errors->has('password'))?'is-invalid':''); ?>"
                                        name="password" value="<?php echo e(old('password')); ?>">
                                    <?php if($errors->has('password')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('password')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?php echo e(($errors->has('confirmation_password'))?'is-invalid':''); ?>"
                                        name="confirmation_password" value="<?php echo e(old('confirmation_password')); ?>">
                                    <?php if($errors->has('confirmation_password')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('confirmation_password')); ?>

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
                                    <input type="text" class="form-control <?php echo e(($errors->has('phone_number'))?'is-invalid':''); ?>"
                                        name="phone_number" value="<?php echo e(old('phone_number')); ?>">
                                    <?php if($errors->has('phone_number')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('phone_number')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if(empty(Auth::user()->desa_id)): ?>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Desa/Kelurahan</label>
                                <div class="col-sm-9">
                                    <select name="desa_id" class="form-control select2 <?php echo e(($errors->has('desa_id'))?'is-invalid':''); ?>" >
                                        <option value="">Pilih Desa/Kelurahan</option>
                                        <?php $__currentLoopData = $desa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>" <?php echo e((old('desa_id') == $data->id)?'selected':''); ?>>
                                            <?php echo e($data->nama); ?> - <?php echo e($data->kecamatan->nama); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('desa_id')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('desa_id')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <?php endif; ?>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('address'))?'is-invalid':''); ?>"
                                        id="description" name="address"><?php echo e(old('address')); ?></textarea>
                                </div>
                                <?php if($errors->has('address')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('address')); ?>

                                </div>
                                <?php endif; ?>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo e(asset('backend/images/avatar/avatar-1.png')); ?>" id="preview-img" alt=""
                                        width="200px">
                                    <input type="file" class="form-control" id="img" name="img" value="<?php echo e(old('img')); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                    <?php if($errors->has('img')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('img')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-control select2 <?php echo e(($errors->has('role'))?'is-invalid':''); ?>" >
                                        <option value="">Pilih Role</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>" <?php echo e((old('role') == $role->id)?'selected':''); ?>>
                                            <?php if(Session::get('kecamatan_id') == '2018110602402'): ?>
                                                <?php if($role->id == 'operator'): ?>
                                                    Operator Kelurahan
                                                <?php elseif($role->id == 'kasi'): ?>
                                                    Kasi Kelurahan
                                                <?php elseif($role->id == 'sekretaris_desa'): ?>
                                                    Sekretaris Lurah
                                                <?php elseif($role->id == 'kepala_desa'): ?>
                                                    Lurah
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo e($role->name); ?>

                                            <?php endif; ?>
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('role')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('role')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control select2">
                                        <option value="1" <?php echo e((old('status') == 1)?'selected':''); ?>>Aktif
                                        </option>
                                        <option value="0" <?php echo e((old('status') == 0)?'selected':''); ?>>Tidak
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
                            <a href="<?php echo e(route('backend.manajemen.admin')); ?>" class="btn btn-secondary">Batal</a>
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
    window.location.href = "<?php echo e(route('backend.manajemen.admin')); ?>"
</script>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/manajemen/admin/create.blade.php ENDPATH**/ ?>