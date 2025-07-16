<?php $__env->startSection('title'); ?> Role <?php $__env->stopSection(); ?>

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

    $('.ubah').change(function(){
        var id  = $(this).val()
        if(id != 0){
            $('.crud-'+id).readonly()
        }else{
            $('.crud-'+id).readonly()
        }
    })
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(Session::get('permission')): ?>
<?php if(Session::get('permission')->create == 1): ?>
<section class="section">
    <div class="section-header">
        <h1>Role</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Manajemen</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.manajemen.role')); ?>">Role</a>
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
                            <h4>Form Input Role</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="">
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
                                <label class="col-sm-3 col-form-label">Permission</label>
                                <div class="col-sm-9">
                                    <table class="table table-striped table-1">
                                        <thead>
                                            <tr>
                                                <th>Modul</th>
                                                <th>Menu</th>
                                                <th>Akses</th>
                                                <th>Read</th>
                                                <th>Create</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($menu->modul->name); ?></td>
                                                <td><?php echo e($menu->name); ?></td>
                                                <td>
                                                    <select name="akses[]" id="" class="ubah">
                                                        <option value="<?php echo e($menu->id); ?>">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="read[]" id="read-<?php echo e($menu->id); ?>" class="crud-<?php echo e($menu->id); ?>" readonly>
                                                        <option value="<?php echo e($menu->id); ?>">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="create[]" id="create-<?php echo e($menu->id); ?>" class="crud-<?php echo e($menu->id); ?>" readonly>
                                                        <option value="<?php echo e($menu->id); ?>">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="update[]" id="update-<?php echo e($menu->id); ?>" class="crud-<?php echo e($menu->id); ?>" readonly>
                                                        <option value="<?php echo e($menu->id); ?>">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="delete[]" id="delete-<?php echo e($menu->id); ?>" class="crud-<?php echo e($menu->id); ?>" readonly>
                                                        <option value="<?php echo e($menu->id); ?>">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('backend.manajemen.role')); ?>" class="btn btn-secondary">Batal</a>
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
    window.location.href = "<?php echo e(route('backend.manajemen.role')); ?>"

</script>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/manajemen/role/create.blade.php ENDPATH**/ ?>