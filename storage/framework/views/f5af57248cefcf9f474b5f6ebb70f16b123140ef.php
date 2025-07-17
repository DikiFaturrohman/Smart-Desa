<?php $__env->startSection('title'); ?> Profil Desa <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/select2/dist/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/selectric/public/selectric.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<script src="<?php echo e(asset('backend/editor/ckeditor/ckeditor.js')); ?>"></script>
<script>
    CKEDITOR.replace('description');
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>">
</script>
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
<section class="section">
    <div class="section-header">
        <h1>Profil Desa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Profil</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.profilDesa')); ?>">Profil Desa</a>
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
                            <h4>Form Tambah/Ubah Profil Desa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('nama'))?'is-invalid':''); ?>"
                                        name="nama" value="<?php echo e(old('nama',($profil)?$profil->nama:'')); ?>">
                                    <?php if($errors->has('nama')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nama')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></label>
                                <div class="col-sm-9">
                                    <img src="<?php echo e(($profil)?asset('backend/images/profil/desa/'.$profil->foto_desa):asset('backend/images/default.jpg')); ?>" id="preview-foto_desa" alt=""
                                        width="200px">
                                    <input type="file" class="form-control" id="foto_desa" name="foto_desa" value="<?php echo e(old('foto_desa')); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                    <?php if($errors->has('foto_desa')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('foto_desa')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Lurah':'Kepala Desa'); ?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('kades'))?'is-invalid':''); ?>"
                                        name="kades" value="<?php echo e(old('kades',($profil)?$profil->kades:'')); ?>">
                                    <?php if($errors->has('kades')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('kades')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Lurah':'Kepala Desa'); ?></label>
                                <div class="col-sm-9">
                                    <img src="<?php echo e(($profil)?asset('backend/images/profil/kades/'.$profil->foto_kades):asset('backend/images/default.jpg')); ?>" id="preview-foto_kades" alt=""
                                        width="200px">
                                    <input type="file" class="form-control" id="foto_kades" name="foto_kades" value="<?php echo e(old('foto_kades')); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                    <?php if($errors->has('foto_kades')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('foto_kades')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Sambutan <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Lurah':'Kepala Desa'); ?></label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('sambutan'))?'is-invalid':''); ?>"
                                        id="sambutan" name="sambutan"><?php echo e(old('sambutan',($profil)?$profil->sambutan:'')); ?></textarea>
                                    <?php if($errors->has('sambutan')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('sambutan')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Visi</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('visi'))?'is-invalid':''); ?>"
                                        id="visi" name="visi"><?php echo e(old('visi',($profil)?$profil->visi:'')); ?></textarea>
                                    <?php if($errors->has('visi')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('visi')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Misi</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('misi'))?'is-invalid':''); ?>"
                                        id="misi" name="misi"><?php echo e(old('misi',($profil)?$profil->misi:'')); ?></textarea>
                                    <?php if($errors->has('misi')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('misi')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Sejarah</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('sejarah'))?'is-invalid':''); ?>"
                                        id="sejarah" name="sejarah"><?php echo e(old('sejarah',($profil)?$profil->sejarah:'')); ?></textarea>
                                    <?php if($errors->has('sejarah')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('sejarah')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Gambaran Umum</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('gambaran_umum'))?'is-invalid':''); ?>"
                                        id="gambaran_umum" name="gambaran_umum"><?php echo e(old('gambaran_umum',($profil)?$profil->gambaran_umum:'')); ?></textarea>
                                    <?php if($errors->has('gambaran_umum')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('gambaran_umum')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Kondisi Geografis</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('kondisi_geografis'))?'is-invalid':''); ?>"
                                        id="kondisi_geografis" name="kondisi_geografis"><?php echo e(old('kondisi_geografis',($profil)?$profil->kondisi_geografis:'')); ?></textarea>
                                    <?php if($errors->has('kondisi_geografis')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('kondisi_geografis')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Telpon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('no_telpon'))?'is-invalid':''); ?>"
                                        name="no_telpon" value="<?php echo e(old('no_telpon',($profil)?$profil->no_telpon:'')); ?>">
                                    <?php if($errors->has('no_telpon')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('no_telpon')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('email'))?'is-invalid':''); ?>"
                                        name="email" value="<?php echo e(old('email',($profil)?$profil->email:'')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('email')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Website</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('website'))?'is-invalid':''); ?>"
                                        name="website" value="<?php echo e(old('website',($profil)?$profil->website:'')); ?>">
                                    <?php if($errors->has('website')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('website')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote <?php echo e(($errors->has('alamat'))?'is-invalid':''); ?>"
                                        id="alamat" name="alamat"><?php echo e(old('alamat',($profil)?$profil->alamat:'')); ?></textarea>
                                    <?php if($errors->has('alamat')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('alamat')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('facebook'))?'is-invalid':''); ?>"
                                        name="facebook" value="<?php echo e(old('facebook',($profil)?$profil->facebook:'')); ?>">
                                    <?php if($errors->has('facebook')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('facebook')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('instagram'))?'is-invalid':''); ?>"
                                        name="instagram" value="<?php echo e(old('instagram',($profil)?$profil->instagram:'')); ?>">
                                    <?php if($errors->has('instagram')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('instagram')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Twitter</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('twitter'))?'is-invalid':''); ?>"
                                        name="twitter" value="<?php echo e(old('twitter',($profil)?$profil->twitter:'')); ?>">
                                    <?php if($errors->has('twitter')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('twitter')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('latitude'))?'is-invalid':''); ?>"
                                        name="latitude" value="<?php echo e(old('latitude',($profil)?$profil->latitude:'')); ?>">
                                    <?php if($errors->has('latitude')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('latitude')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('longitude'))?'is-invalid':''); ?>"
                                        name="longitude" value="<?php echo e(old('longitude',($profil)?$profil->longitude:'')); ?>">
                                    <?php if($errors->has('longitude')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('longitude')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('backend.profilDesa')); ?>" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/profilDesa.blade.php ENDPATH**/ ?>