<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Usaha</h2></center>
    <div class="line"></div>
    <!-- content -->
    <?php echo $__env->make('notification.unggah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($user->unggahDokumen): ?>
    <form wire:submit.prevent="store" enctype="multipart/form-data" id="mainform">
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_sp_rtrw')?'is-invalid':''); ?>"
                        wire:model="file_sp_rtrw" accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_sp_rtrw')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_sp_rtrw')); ?></small><br>
                    <?php endif; ?>
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pernyataan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_surat_pernyataan')?'is-invalid':''); ?>"
                        wire:model="file_surat_pernyataan" accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_surat_pernyataan')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_surat_pernyataan')); ?></small><br>
                    <?php endif; ?>
                    <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nik" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control <?php echo e($errors->has('nik')?'is-invalid':''); ?>" id="nik" name="nik"
                    placeholder="NIK" wire:model="nik" value="<?php echo e(old('nik')); ?>" readonly>
                <?php if($errors->has('nik')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control <?php echo e($errors->has('nama')?'is-invalid':''); ?>" id="nama" name="nama"
                    placeholder="Nama Lengkap" wire:model="nama" value="<?php echo e(old('nama')); ?>" readonly>
                <?php if($errors->has('nama')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control <?php echo e($errors->has('tempat_lahir')?'is-invalid':''); ?>"
                    id="tempat_lahir" name="tempat_lahir" placeholder="" wire:model="tempat_lahir"
                    value="<?php echo e(old('tempat_lahir')); ?>">
                <?php if($errors->has('tempat_lahir')): ?>
                <small class="text-danger"><?php echo e($errors->first('tempat_lahir')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" class="form-control <?php echo e($errors->has('tgl_lahir')?'is-invalid':''); ?>" id="tgl_lahir"
                    name="tgl_lahir" wire:model="tgl_lahir" value="<?php echo e(old('tgl_lahir')); ?>" />
                <?php if($errors->has('tgl_lahir')): ?>
                <small class="text-danger"><?php echo e($errors->first('tgl_lahir')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="pt-2">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="laki-laki">
                            <input type="radio" class="form-check-input" id="laki-laki" name="jk" value="laki-laki"
                                wire:model="jk" <?php echo e((old('jk')=='laki-laki')?'checked':''); ?>>Laki-laki
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="perempuan">
                            <input type="radio" class="form-check-input" id="perempuan" name="jk" value="perempuan"
                                wire:model="jk" <?php echo e((old('jk')=='perempuan')?'checked':''); ?>>Perempuan

                        </label>
                    </div>
                </div>
                <?php if($errors->has('jk')): ?>
                <small class="text-danger"><?php echo e($errors->first('jk')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pekerjaan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id" name="pekerjaan_id"
                    class="form-control <?php echo e($errors->has('pekerjaan_id')?'is-invalid':''); ?>" wire:model="pekerjaan_id">
                    <option value="">-- Pilih Salah Satu --</option>
                    <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>" <?php echo e((old('pekerjaan_id')==$data->id)?'selected':''); ?>><?php echo e($data->nama); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('pekerjaan_id')): ?>
                <small class="text-danger"><?php echo e($errors->first('pekerjaan_id')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control <?php echo e($errors->has('alamat')?'is-invalid':''); ?>" rows="3" id="alamat"
                    name="alamat" wire:model="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya"
                    readonly><?php echo e(old('alamat')); ?></textarea>
                <?php if($errors->has('alamat')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Usaha <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input class="form-control <?php echo e($errors->has('jenis_usaha')?'is-invalid':''); ?>" id="" name="jenis_usaha"
                    placeholder="" value="<?php echo e(old('jenis_usaha')); ?>" wire:model="jenis_usaha">
                <?php if($errors->has('jenis_usaha')): ?>
                <small class="text-danger"><?php echo e($errors->first('jenis_usaha')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="store">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:click="store"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            
            <!-- <button id="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
        </div>
    </form>
    <?php endif; ?>
    <?php if($errors->all()): ?>
    <br>
    <div class="col-sm-12 alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss='alert'>
                <span>X</span>
            </button>
            Silahkan untuk cek kembali data yang anda masukan
        </div>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\app\resources\views/livewire/frontend/sku-create.blade.php ENDPATH**/ ?>