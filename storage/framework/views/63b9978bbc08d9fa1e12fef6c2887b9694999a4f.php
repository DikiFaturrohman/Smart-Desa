<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Sapu Jagat</h2></center>
    <div class="line"></div>
    <!-- content -->
    <?php echo $__env->make('notification.unggah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($user->unggahDokumen): ?>
    <form method="post" enctype="multipart/form-data" id="mainform" wire:submit.prevent="store">
        <?php echo e(csrf_field()); ?>

        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pengantar RT/RW <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_sp_rtrw')?'is-invalid':''); ?>"
                        name="file_sp_rtrw" id="file_sp_rtrw" wire:model="file_sp_rtrw"
                        accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_sp_rtrw')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_sp_rtrw')); ?></small>
                    <?php endif; ?>
                </div>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Pernyataan <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_surat_pernyataan')?'is-invalid':''); ?>"
                        name="file_surat_pernyataan" id="file_surat_pernyataan" wire:model="file_surat_pernyataan"
                        accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_surat_pernyataan')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_surat_pernyataan')); ?></small>
                    <?php endif; ?>
                </div>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="nik" class="col-sm-4 col-form-label">NIK <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control <?php echo e($errors->has('nik')?'is-invalid':''); ?>" id="nik" name="nik"
                    placeholder="NIK" wire:model="nik" readonly>
                <?php if($errors->has('nik')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control <?php echo e($errors->has('nama')?'is-invalid':''); ?>" id="nama" name="nama"
                    placeholder="Nama Lengkap" wire:model="nama" readonly>
                <?php if($errors->has('nama')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Umur <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="number" min="1" class="form-control <?php echo e($errors->has('umur')?'is-invalid':''); ?>" name="umur"
                    placeholder="" wire:model="umur" readonly>
                <?php if($errors->has('umur')): ?>
                <small class="text-danger"><?php echo e($errors->first('umur')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Mulai Menetap <span
                    class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="date" class="form-control <?php echo e($errors->has('tgl_menetap')?'is-invalid':''); ?>"
                    name="tgl_menetap" value="<?php echo e(old('tgl_menetap')); ?>" wire:model="tgl_menetap" />
                <?php if($errors->has('tgl_menetap')): ?>
                <small class="text-danger"><?php echo e($errors->first('tgl_menetap')); ?></small>
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
            <label for="" class="col-sm-4 col-form-label">Alamat Kantor <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea class="form-control <?php echo e($errors->has('alamat_kantor')?'is-invalid':''); ?>" rows="3" id="alamat"
                    name="alamat" placeholder="Masukkan alamat lengkap beserta RT/RW nya"
                    wire:model="alamat_kantor"></textarea>
                <?php if($errors->has('alamat_kantor')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat_kantor')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Keperluan <span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" class="form-control <?php echo e($errors->has('keperluan')?'is-invalid':''); ?>" name="keperluan"
                    placeholder="Surat ini dibuat untuk keperluan?" value="<?php echo e(old('keperluan')); ?>" wire:model="keperluan">
                <?php if($errors->has('keperluan')): ?>
                <small class="text-danger"><?php echo e($errors->first('keperluan')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="store">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right" wire:target="click"
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
<?php /**PATH C:\xampp\htdocs\app\resources\views/livewire/frontend/sksj-create.blade.php ENDPATH**/ ?>