<?php $__env->startSection('title'); ?> SKTM <?php $__env->stopSection(); ?>

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
    $('.ubah').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

    $("button").click(function(){
        $('#verifikasiBtn').html('<button class="btn btn-success btn-progress disabled"></button>')    
    });

</script>
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

<?php if(!empty(Session::get('permission'))): ?>
<?php if(Session::get('permission')->create == 1): ?>
<section class="section">
    <div class="section-header">
        <h1>SKTM</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Dokumen</div>
            <div class="breadcrumb-item"><a href="<?php echo e(route('backend.dokumen.sktm')); ?>"> SKTM</a></div>
            <div class="breadcrumb-item active">Tambah</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Pengajuan SKTM</h4>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="post" enctype="multipart/form-data" id="mainform">
                            <?php echo e(csrf_field()); ?>

                            <h5>Data Pribadi</h5><br>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nomor Surat</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="">
                                    <input type="text" class="form-control <?php echo e(($errors->has('no_surat'))?'is-invalid':''); ?>"
                                        placeholder="Masukan Nomor Surat" name="no_surat" value="<?php echo e(old('no_surat')); ?>">
                                    <?php if($errors->has('no_surat')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('no_surat')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Kirim Ke</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 <?php echo e(($errors->has('kasi_id'))?'is-invalid':''); ?>"
                                        name="kasi_id">
                                        <option value="">-- Pilih Kasi --</option>
                                        <?php $__currentLoopData = $kasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->admin_id); ?>" <?php echo e(( old('kasi_id') == $data->admin_id) ? 'selected' : ''); ?>><?php echo e($data->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('kasi_id')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('kasi_id')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nama Pengaju</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 <?php echo e(($errors->has('user_id'))?'is-invalid':''); ?>"
                                        name="user_id">
                                        <option value="">-- Pilih Nama Pengaju --</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($data->unggahDokumen): ?>
                                        <option value="<?php echo e($data->id); ?>" <?php echo e(( old('user_id') == $data->id) ? 'selected' : ''); ?>><?php echo e($data->nama_lengkap); ?>

                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('user_id')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('user_id')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('nama'))?'is-invalid':''); ?>"
                                        placeholder="Masukan Nama Anda" name="nama" value="<?php echo e(old('nama')); ?>">
                                    <?php if($errors->has('nama')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nama')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="number" min="0"
                                        class="form-control <?php echo e(($errors->has('nik'))?'is-invalid':''); ?>"
                                        placeholder="Masukan NIK Anda" name="nik" value="<?php echo e(old('nik')); ?>">
                                    <?php if($errors->has('nik')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nik')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control <?php echo e(($errors->has('tempat_lahir'))?'is-invalid':''); ?>"
                                        placeholder="Masukan Tempat Lahir Anda" name="tempat_lahir"
                                        value="<?php echo e(old('tempat_lahir')); ?>">
                                    <?php if($errors->has('tempat_lahir')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('tempat_lahir')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control datepicker <?php echo e(($errors->has('tgl_lahir'))?'is-invalid':''); ?>"
                                        placeholder="Masukan Tanggal Lahir Anda" name="tgl_lahir"
                                        value="<?php echo e(old('tgl_lahir')); ?>">
                                    <?php if($errors->has('tgl_lahir')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('tgl_lahir')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 <?php echo e(($errors->has('jk'))?'is-invalid':''); ?>"
                                        name="jk">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="laki-laki" <?php echo e(( old('jk') == 'laki-laki') ? 'selected' : ''); ?>>
                                            Laki-laki
                                        </option>
                                        <option value="perempuan" <?php echo e(( old('jk') == 'perempuan') ? 'selected' : ''); ?>>
                                            Perempuan
                                        </option>
                                    </select>
                                    <?php if($errors->has('jk')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('jk')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Warga Negara</label>
                                <div class="col-sm-9">
                                    <select
                                        class="form-control select2 <?php echo e(($errors->has('warga_negara'))?'is-invalid':''); ?>"
                                        name="warga_negara">
                                        <option value="">-- Pilih Warga Negara --</option>
                                        <option value="indonesia"
                                            <?php echo e(( old('warga_negara') == 'indonesia') ? 'selected' : ''); ?>>Indonesia
                                        </option>
                                        <option value="wna" <?php echo e(( old('warga_negara') == 'wna') ? 'selected' : ''); ?>>WNA
                                        </option>
                                    </select>
                                    <?php if($errors->has('warga_negara')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('warga_negara')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 <?php echo e(($errors->has('agama'))?'is-invalid':''); ?>"
                                        name="agama">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="islam" <?php echo e(( old('agama') == 'islam') ? 'selected' : ''); ?>>Islam
                                        </option>
                                        <option value="kristen" <?php echo e(( old('agama') == 'kristen') ? 'selected' : ''); ?>>
                                            Kristen
                                        </option>
                                        <option value="hindu" <?php echo e(( old('agama') == 'hindu') ? 'selected' : ''); ?>>Hindu
                                        </option>
                                        <option value="budha" <?php echo e(( old('agama') == 'budha') ? 'selected' : ''); ?>>Budha
                                        </option>
                                        <option value="katolik" <?php echo e(( old('agama') == 'katolik') ? 'selected' : ''); ?>>
                                            Katolik
                                        </option>
                                    </select>
                                    <?php if($errors->has('agama')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('agama')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" id="" cols="30" rows="10"
                                        class="form-control <?php echo e(($errors->has('alamat'))?'is-invalid':''); ?>"><?php echo e(old('alamat')); ?></textarea>
                                    <?php if($errors->has('alamat')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('alamat')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h5>Data Orangtua</h5><br>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nama Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('nama_ayah'))?'is-invalid':''); ?>"
                                        placeholder="Masukan Nama Ayah Anda" name="nama_ayah" value="<?php echo e(old('nama_ayah')); ?>">
                                    <?php if($errors->has('nama_ayah')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nama_ayah')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nama Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e(($errors->has('nama_ibu'))?'is-invalid':''); ?>"
                                        placeholder="Masukan Nama Ibu Anda" name="nama_ibu" value="<?php echo e(old('nama_ibu')); ?>">
                                    <?php if($errors->has('nama_ibu')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('nama_ibu')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat_orangtua" id="" rows="3"
                                        class="form-control <?php echo e(($errors->has('alamat_orangtua'))?'is-invalid':''); ?>"><?php echo e(old('alamat_orangtua')); ?></textarea>
                                    <?php if($errors->has('alamat_orangtua')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('alamat_orangtua')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h5>Dokumen Penunjang</h5><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">File Surat Pengantar RTRW</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo e(asset('backend/images/default.jpg')); ?>" id="preview-rtrw" alt=""
                                        width="200px">
                                    <input type="file" class="form-control <?php echo e(($errors->has('rtrw'))?'is-invalid':''); ?>" id="rtrw" name="rtrw" value="<?php echo e(old('rtrw')); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                        <?php if($errors->has('rtrw')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('rtrw')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
                                <div class="col-sm-9">
                                    <img src="<?php echo e(asset('backend/images/default.jpg')); ?>" id="preview-surat_pernyataan" alt=""
                                        width="200px">
                                    <input type="file" class="form-control <?php echo e(($errors->has('surat_pernyataan'))?'is-invalid':''); ?>" id="surat_pernyataan" name="surat_pernyataan" value="<?php echo e(old('surat_pernyataan')); ?>"
                                        accept="image/jpg,image/jpeg,image/png">
                                        <?php if($errors->has('surat_pernyataan')): ?>
                                    <div class="invalid-feedback"> 
                                        <?php echo e($errors->first('surat_pernyataan')); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div><br>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('backend.dokumen.sktm')); ?>" class="btn btn-secondary">Batal</a>
                                <button class="btn btn-primary">Buat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dokumen.sktm')); ?>"

</script>
<?php endif; ?>
<?php else: ?>
<script>
    window.location.href = "<?php echo e(route('backend.dashboard')); ?>"

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/backend/dokumen/sktm/create.blade.php ENDPATH**/ ?>