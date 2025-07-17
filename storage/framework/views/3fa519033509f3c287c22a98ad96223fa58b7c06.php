<?php $__env->startSection('title'); ?> Pengaturan Website <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>

<script src="<?php echo e(asset('backend/editor/ckeditor/ckeditor.js')); ?>"></script>
<script>
    CKEDITOR.replace('description');

</script>
<script>
    $('.maintenance').change(function () {
        var status = $(this).val()
        if (status == 'on') {
            window.location.href = '<?php echo e(route('backend.maintenance.on')); ?>'
        } else {
            window.location.href = '<?php echo e(route('backend.maintenance.off')); ?>'
        }
    });

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
<section class="section">
    <div class="section-header">
        <h1>Pengaturan Website</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?php echo e(route('backend.dashboard')); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Pengaturan Webiste</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" id="mainform"
                        action="<?php echo e(route('backend.setting.update')); ?>" class="needs-validation" novalidate="">
                        <?php echo e(csrf_field()); ?>

                        <div class="card-header">
                            <h4>Pengaturan Website</h4>
                        </div>
                        <div class="card-body">
                            <?php if(current_user('admin')->isSuperUser()): ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Maintenance Mode</label>
                                <div class="col-sm-9">
                                    <select name="" id="" class="form-control maintenance">
                                        <option value="off" <?php echo e((Session::get('maintenance')=='off')?'selected':''); ?>>OFF
                                        </option>
                                        <option value="on" <?php echo e((Session::get('maintenance')=='on')?'selected':''); ?>>ON
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('meta_title'))?'is-invalid':''); ?>"
                                        value="<?php echo e(($website->meta_title)??'-'); ?>" name="meta_title">
                                    <?php if($errors->has('meta_title')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('meta_title')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Meta Keyword</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('meta_keyword'))?'is-invalid':''); ?>"
                                        value="<?php echo e(($website->meta_keyword)??'-'); ?>" name="meta_keyword">
                                    <?php if($errors->has('meta_keyword')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('meta_keyword')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Favicon</label>
                                <div class="col-sm-9">
                                    <?php $img = asset('backend/images'); ?>
                                    <img src="<?php echo (!empty($website->favicon) ? $img . '/favicon/' . $website->favicon : $img . '/favicon.png') ?>"
                                        id="preview-favicon" style="width: 200px">
                                    <input type="file"
                                        class="form-control <?php echo e(($errors->has('favicon'))?'is-invalid':''); ?>" id="favicon"
                                        name="favicon" value="<?php echo e(($website->favicon)??''); ?>">
                                    <?php if($errors->has('favicon')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('favicon')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Meta Description</label>
                                <div class="col-sm-9">
                                    <textarea type="text" id="description" name="meta_description"
                                        class="form-control summernote <?php echo e(($errors->has('address'))?'is-invalid':''); ?>"
                                        value=""><?php echo e(($website->meta_description)??'-'); ?></textarea>
                                    <?php if($errors->has('meta_description')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('meta_description')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/pengaturan.blade.php ENDPATH**/ ?>