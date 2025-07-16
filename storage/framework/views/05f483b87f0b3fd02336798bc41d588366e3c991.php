<?php $__env->startSection('title'); ?> Struktur Organisasi <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Pemerintah Desa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Pemerintah Desa</div>
            <div class="breadcrumb-item">Struktur Organisasi</div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <form method="post" enctype="multipart/form-data" id="mainform">
                      <?php echo e(csrf_field()); ?>

                      <div class="card-header">
                          <h4>Form Edit Struktur Organisasi</h4>
                      </div>
                      <div class="card-body">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Judul</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control <?php echo e(($errors->has('title'))?'is-invalid':''); ?>"
                                      name="title" value="<?php echo e(old('title',($data)?$data->title:'')); ?>">
                                  <?php if($errors->has('title')): ?>
                                  <div class="invalid-feedback">
                                      <?php echo e($errors->first('title')); ?>

                                  </div>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Deskripsi</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control <?php echo e(($errors->has('description'))?'is-invalid':''); ?>"
                                      name="description" value="<?php echo e(old('description',($data)?$data->description:'')); ?>">
                                  <?php if($errors->has('description')): ?>
                                  <div class="invalid-feedback">
                                      <?php echo e($errors->first('description')); ?>

                                  </div>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="form-group mb-0 row">
                              <label class="col-sm-3 col-form-label">Gambar Struktur Organisasi</label>
                              <div class="col-sm-9">
                                  <img src="<?php echo e(($data)?asset('public/backend/images/struktur-organisasi/'.$data->img):asset('public/backend/images/default.jpg')); ?>" id="preview-img" alt=""
                                      width="200px">
                                  <input type="file" class="form-control" id="img" name="img" value="<?php echo e(old('img')); ?>"
                                      accept="image/jpg,image/jpeg,image/png">
                                  <?php if($errors->has('img')): ?>
                                  <span class="text-danger"><?php echo e($errors->first('img')); ?></span>
                                  <?php endif; ?>
                              </div>
                          </div><br>
                          <hr>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Updated by</label>
                              <div class="col-sm-9">
                                  <?php echo e(($data->updated_by)??'-'); ?>

                              </div>
                          </div>
                          <div class="form-group mb-0 row">
                              <label class="col-sm-3 col-form-label">Gambar Struktur Organisasi</label>
                              <div class="col-sm-9">
                                  <img src="<?php echo e(($data)?asset('public/backend/images/struktur-organisasi/'.$data->img):asset('public/backend/images/default.jpg')); ?>" id="preview-img" alt=""
                                      class="img-fluid">
                              </div>
                          </div><br>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/pemerintah/struktur/index.blade.php ENDPATH**/ ?>