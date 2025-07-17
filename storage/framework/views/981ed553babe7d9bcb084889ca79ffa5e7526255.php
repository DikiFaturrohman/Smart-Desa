<div class="container py-3">
<center><h3>Pengajuan Surat Keterangan Kematian</h2></center>
    <div class="line"></div>
    <!-- content -->
    <?php echo $__env->make('notification.unggah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($user->unggahDokumen): ?>
    <form id="mainform" method="post" enctype="multipart/form-data" wire:submit.prevent="store">
        <?php echo e(csrf_field()); ?>

        <!-- Step  -->
        <h4>Lampiran Persyaratan</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto KTP Almarhum<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_ktp_alm')?'is-invalid':''); ?>" name="file_ktp_alm" id="file_ktp_alm" wire:model="file_ktp_alm" accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_ktp_alm')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_ktp_alm')); ?></small>
                    <?php endif; ?>
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto KTP Pelapor<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_ktp_pelapor')?'is-invalid':''); ?>" name="file_ktp_pelapor" id="file_ktp_pelapor" wire:model="file_ktp_pelapor" accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_ktp_pelapor')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_ktp_pelapor')); ?></small>
                    <?php endif; ?>
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto KTP Saksi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_ktp_saksi')?'is-invalid':''); ?>" name="file_ktp_saksi" id="file_ktp_saksi" wire:model="file_ktp_saksi" accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_ktp_saksi')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_ktp_saksi')); ?></small>
                    <?php endif; ?>
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Scan/Foto Surat Keterangan Rumah Sakit<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="custom-file">
                    <input type="file" class="form-control <?php echo e($errors->has('file_sk_rs')?'is-invalid':''); ?>" name="file_sk_rs" id="file_sk_rs" wire:model="file_sk_rs" accept="image/png, image/jpeg,image/jpg">
                    <?php if($errors->has('file_sk_rs')): ?>
                    <small class="text-danger"><?php echo e($errors->first('file_sk_rs')); ?></small>
                    <?php endif; ?>
                </div><br>
                <small class="w-100"> *) file type: jpg/jpeg/png | max size: 1 MB</small>
            </div>
        </div>
        <!-- Step  -->
        <div class="line"></div>
        <h4>Data</h4>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Kepala Keluarga<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control <?php echo e($errors->has('nama_kepala_keluarga')?'is-invalid':''); ?>"
                    value="<?php echo e(old('nama_kepala_keluarga')); ?>"
                    placeholder="Silahkan untuk memasukan nama kepala keluarga" wire:model="nama_kepala_keluarga"/>
                <?php if($errors->has('nama_kepala_keluarga')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_kepala_keluarga')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nomor Kartu Keluarga<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="no_kk" name="no_kk" type="text" class="form-control <?php echo e($errors->has('no_kk')?'is-invalid':''); ?>" value="<?php echo e(old('no_kk')); ?>"
                    placeholder="Silahkan untuk memasukan nomor kartu keluarga" wire:model="no_kk">
                <?php if($errors->has('no_kk')): ?>
                <small class="text-danger"><?php echo e($errors->first('no_kk')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Jenazah</h4>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_jenazah" name="nik_jenazah" type="text" class="form-control <?php echo e($errors->has('nik_jenazah')?'is-invalid':''); ?>"
                    value="<?php echo e(old('nik_jenazah')); ?>" placeholder="Silahkan untuk memasukan NIK" wire:model="nik_jenazah">
                <?php if($errors->has('nik_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_jenazah" name="nama_jenazah" type="text" class="form-control <?php echo e($errors->has('nama_jenazah')?'is-invalid':''); ?>"
                    value="<?php echo e(old('nama_jenazah')); ?>" placeholder="Silahkan untuk memasukan Nama Lengkap" wire:model="nama_jenazah">
                <?php if($errors->has('nama_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tgl_lahir_jenazah" name="tgl_lahir_jenazah" type="date" class="form-control <?php echo e($errors->has('tgl_lahir_jenazah')?'is-invalid':''); ?>"
                    value="<?php echo e(old('tgl_lahir_jenazah')); ?>" wire:model="tgl_lahir_jenazah">
                <?php if($errors->has('tgl_lahir_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('tgl_lahir_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tempat Lahir<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control <?php echo e($errors->has('tempat_lahir')?'is-invalid':''); ?>"
                    value="<?php echo e(old('tempat_lahir')); ?>" placeholder="Silahkan untuk memasukan Tempat Lahir" wire:model="tempat_lahir">
                <?php if($errors->has('tempat_lahir')): ?>
                <small class="text-danger"><?php echo e($errors->first('tempat_lahir')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="jk_jenazah" name="jk_jenazah" class="form-control <?php echo e($errors->has('jk_jenazah')?'is-invalid':''); ?>" wire:model="jk_jenazah">
                    <option value="" >Pilih Jenis Kelamin</option>
                    <option value="laki-laki" <?php echo e((old('jk_jenazah')=='laki-laki')?'selected':''); ?>>Laki-laki
                    </option>
                    <option value="perempuan" <?php echo e((old('jk_jenazah')=='perempuan')?'selected':''); ?>>Perempuan
                    </option>
                </select>
                <?php if($errors->has('jk_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('jk_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Agama<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="agama" name="agama" class="form-control <?php echo e($errors->has('agama')?'is-invalid':''); ?>" wire:model="agama">
                    <option value="" >Pilih Agama</option>
                    <option value="islam" <?php echo e((old('agama')=='islam')?'selected':''); ?>>Islam</option>
                    <option value="kristen" <?php echo e((old('agama')=='kristen')?'selected':''); ?>>Kristen</option>
                    <option value="hindu" <?php echo e((old('agama')=='hindu')?'selected':''); ?>>Hindu</option>
                    <option value="budha" <?php echo e((old('agama')=='budha')?'selected':''); ?>>Budha</option>
                    <option value="katolik" <?php echo e((old('agama')=='katolik')?'selected':''); ?>>Katolik</option>
                </select>
                <?php if($errors->has('agama')): ?>
                <small class="text-danger"><?php echo e($errors->first('agama')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_jenazah" name="pekerjaan_id_jenazah" class="form-control <?php echo e($errors->has('pekerjaan_id_jenazah')?'is-invalid':''); ?>" wire:model="pekerjaan_id_jenazah">
                    <option value="">-- Pilih Pekerjaan --</option>
                    <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>" <?php echo e((old('pekerjaan_id_jenazah')==$data->id)?'selected':''); ?>>
                        <?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('pekerjaan_id_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('pekerjaan_id_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_jenazah" name="alamat_jenazah" type="text" class="form-control <?php echo e($errors->has('alamat_jenazah')?'is-invalid':''); ?>"
                    placeholder="Silahkan untuk memasukan alamat lengkap" wire:model="alamat_jenazah"></textarea>
                <?php if($errors->has('alamat_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="provinsi_id_jenazah" name="provinsi_id_jenazah" class="provinsi_jenazah form-control <?php echo e($errors->has('provinsi_id_jenazah')?'is-invalid':''); ?>" wire:model="provinsi_id_jenazah">
                    <option value="">-- Pilih Provinsi --</option>
                    <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('provinsi_id_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('provinsi_id_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kabupaten/Kota<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="kota_jenazah" name="kota_id_jenazah" class="kota_jenazah form-control <?php echo e($errors->has('kota_id_jenazah')?'is-invalid':''); ?>" wire:model="kota_id_jenazah">
                    <option value="">-- Pilih Kota/kabupaten --</option>
                    <?php $__currentLoopData = $kotaJenazah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('kota_id_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('kota_id_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="kecamatan_jenazah" name="kecamatan_id_jenazah" class="kecamatan_jenazah form-control <?php echo e($errors->has('kecamatan_id_jenazah')?'is-invalid':''); ?>" wire:model="kecamatan_id_jenazah">
                    <option value="">-- Pilih Kecamatan --</option>
                    <?php $__currentLoopData = $kecamatanJenazah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('kecamatan_id_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('kecamatan_id_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Desa/Dusun/Kelurahan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="desa_jenazah" name="area_id_jenazah" class="form-control <?php echo e($errors->has('area_id_jenazah')?'is-invalid':''); ?>" wire:model="area_id_jenazah">
                    <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                    <?php $__currentLoopData = $areaJenazah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('area_id_jenazah')): ?>
                <small class="text-danger"><?php echo e($errors->first('area_id_jenazah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kewarganegaraan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <div class="pt-2">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="laki-laki">
                            <input type="radio" class="form-check-input" value="wni" wire:model="kewarganegaraan">WNI
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="perempuan">
                            <input type="radio" class="form-check-input" value="wna" wire:model="kewarganegaraan">WNA
                        </label>
                    </div>
                </div>
                <?php if($errors->has('kewarganegaraan')): ?>
                <small class="text-danger"><?php echo e($errors->first('kewarganegaraan')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Keturunan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="keturunan" name="keturunan" class="form-control <?php echo e($errors->has('keturunan')?'is-invalid':''); ?>" wire:model="keturunan">
                    <option value="" >--Pilih Keturunan--</option>
                    <option value="eropa" <?php echo e((old('keturunan')=='eropa')?'selected':''); ?>>Eropa</option>
                    <option value="cina/timur asing lainnya"
                        <?php echo e((old('keturunan')=='cina/timur asing lainnya')?'selected':''); ?>>Cina/timur asing
                        lainnya</option>
                    <option value="indonesia" <?php echo e((old('keturunan')=='indonesia')?'selected':''); ?>>Indonesia
                    </option>
                    <option value="indonesia nasrani" <?php echo e((old('keturunan')=='indonesia nasrani')?'selected':''); ?>>
                        Indonesia Nasrani</option>
                    <option value="lainnya" <?php echo e((old('keturunan')=='lainnya')?'selected':''); ?>>Lainnya</option>
                </select>
                <?php if($errors->has('keturunan')): ?>
                <small class="text-danger"><?php echo e($errors->first('keturunan')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kebangsaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="" name="kebangsaan" type="text" class="form-control <?php echo e($errors->has('kebangsaan')?'is-invalid':''); ?>" value="<?php echo e(old('kebangsaan')); ?>"
                    placeholder="Silahkan untuk memasukan kebangsaan" wire:model="kebangsaan">
                <?php if($errors->has('kebangsaan')): ?>
                <small class="text-danger"><?php echo e($errors->first('kebangsaan')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Anak Ke<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="" name="anak_ke" type="text" class="form-control <?php echo e($errors->has('anak_ke')?'is-invalid':''); ?>" value="<?php echo e(old('anak_ke')); ?>"
                    placeholder="Silahkan untuk memasukan Anak ke berapa dalam keluarga" wire:model="anak_ke">
                <?php if($errors->has('anak_ke')): ?>
                <small class="text-danger"><?php echo e($errors->first('anak_ke')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Kematian<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="" name="tgl_kematian" type="date" class="form-control <?php echo e($errors->has('tgl_kematian')?'is-invalid':''); ?>" value="<?php echo e(old('tgl_kematian')); ?>" wire:model="tgl_kematian">
                <?php if($errors->has('tgl_kematian')): ?>
                <small class="text-danger"><?php echo e($errors->first('tgl_kematian')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Pukul<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="" name="pukul" type="time" class="form-control <?php echo e($errors->has('pukul')?'is-invalid':''); ?>" value="<?php echo e(old('pukul')); ?>" wire:model="pukul">
                <?php if($errors->has('pukul')): ?>
                <small class="text-danger"><?php echo e($errors->first('pukul')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Sebab Kematian<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="sebab_kematian" name="sebab_kematian" class="form-control <?php echo e($errors->has('sebab_kematian')?'is-invalid':''); ?>" wire:model="sebab_kematian">
                    <option value="">--Pilih Sebab Kematian--
                    </option>
                    <option value="sakit biasa.tua" <?php echo e((old('sebab_kematian')=='sakit biasa.tua')?'selected':''); ?>>
                        Sakit
                        Biasa/tua
                    </option>
                    <option value="wabah penyakit" <?php echo e((old('sebab_kematian')=='wabah penyakit')?'selected':''); ?>>Wabah
                        Penyakit</option>
                    <option value="kecelakaan" <?php echo e((old('sebab_kematian')=='kecelakaan')?'selected':''); ?>>
                        Kecelakaan</option>
                    <option value="kriminalitas" <?php echo e((old('sebab_kematian')=='kriminalitas')?'selected':''); ?>>
                        Kriminalitas</option>
                    <option value="bunuh diri" <?php echo e((old('sebab_kematian')=='bunuh diri')?'selected':''); ?>>Bunuh
                        diri</option>
                    <option value="lainnya" <?php echo e((old('sebab_kematian')=='lainnya')?'selected':''); ?>>Lainnya
                    </option>
                </select>
                <?php if($errors->has('sebab_kematian')): ?>
                <small class="text-danger"><?php echo e($errors->first('sebab_kematian')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tempat Kematian<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="" name="tempat_kematian" type="text" class="form-control <?php echo e($errors->has('tempat_kematian')?'is-invalid':''); ?>" value="<?php echo e(old('tempat_kematian')); ?>"
                    placeholder="Silahkan untuk memasukan tempat kematian" wire:model="tempat_kematian">
                <?php if($errors->has('tempat_kematian')): ?>
                <small class="text-danger"><?php echo e($errors->first('tempat_kematian')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Yang Menerangkan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="yang_menerangkan" name="yang_menerangkan" class="form-control <?php echo e($errors->has('yang_menerangkan')?'is-invalid':''); ?>" wire:model="yang_menerangkan">
                    <option value="">--Pilih Salah Satu--
                    </option>
                    <option value="dokter" <?php echo e((old('yang_menerangkan')=='dokter')?'selected':''); ?>>Dokter
                    </option>
                    <option value="tenaga kesehatan" <?php echo e((old('yang_menerangkan')=='tenaga kesehatan')?'selected':''); ?>>
                        Tenaga Kesehatan
                    </option>
                    <option value="kepolisian" <?php echo e((old('yang_menerangkan')=='kepolisian')?'selected':''); ?>>
                        Kepolisian</option>
                    <option value="lainnya" <?php echo e((old('yang_menerangkan')=='lainnya')?'selected':''); ?>>Lainnya
                    </option>
                </select>
                <?php if($errors->has('yang_menerangkan')): ?>
                <small class="text-danger"><?php echo e($errors->first('yang_menerangkan')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Ayah</h4>
        <div class="form-group row">
            <label for="nik_ayah" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_ayah" name="nik_ayah" type="text" class="form-control <?php echo e($errors->has('nik_ayah')?'is-invalid':''); ?>" value="<?php echo e(old('nik_ayah')); ?>"
                    placeholder="Silahkan untuk memasukan NIK" wire:model="nik_ayah">
                <?php if($errors->has('nik_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_ayah" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_ayah" name="nama_ayah" type="text" class="form-control <?php echo e($errors->has('nama_ayah')?'is-invalid':''); ?>" value="<?php echo e(old('nama_ayah')); ?>"
                    placeholder="Silahkan untuk memasukan Nama lengkap" wire:model="nama_ayah">
                <?php if($errors->has('nama_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="umur_ayah" class="col-sm-4 col-form-label">Umur<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="umur_ayah" name="umur_ayah" type="number" min="1" class="form-control <?php echo e($errors->has('umur_ayah')?'is-invalid':''); ?>"
                    value="<?php echo e(old('umur_ayah')); ?>" placeholder="Silahkan untuk memasukan NIK" wire:model="umur_ayah">
                <?php if($errors->has('umur_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('umur_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="pekerjaan_id_ayah" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="pekerjaan_id_ayah" name="pekerjaan_id_ayah" class="form-control <?php echo e($errors->has('pekerjaan_id_ayah')?'is-invalid':''); ?>" wire:model="pekerjaan_id_ayah">
                    <option value="">-- Pilih Pekerjaan --</option>
                    <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>" <?php echo e((old('pekerjaan_id_ayah')==$data->id)?'selected':''); ?>>
                        <?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('pekerjaan_id_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('pekerjaan_id_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat_ayah" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <textarea id="alamat_ayah" name="alamat_ayah" type="text" class="form-control <?php echo e($errors->has('alamat_ayah')?'is-invalid':''); ?>"
                    placeholder="Silahkan untuk memasukan alamat lengkap" wire:model="alamat_ayah"></textarea>
                <?php if($errors->has('alamat_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="provinsi_id_ayah" name="provinsi_id_ayah" class="provinsi_ayah form-control <?php echo e($errors->has('provinsi_id_ayah')?'is-invalid':''); ?>" wire:model="provinsi_id_ayah">
                    <option value="">-- Pilih Provinsi --</option>
                    <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('provinsi_id_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('provinsi_id_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kabupaten/Kota<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="kota_ayah" name="kota_id_ayah" class="kota_ayah form-control <?php echo e($errors->has('kota_id_ayah')?'is-invalid':''); ?>" wire:model="kota_id_ayah">
                    <option value="">-- Pilih Kota/Kabupaten --</option>
                    <?php $__currentLoopData = $kotaAyah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('kota_id_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('kota_id_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="kecamatan_ayah" name="kecamatan_id_ayah" class="kecamatan_ayah form-control <?php echo e($errors->has('kecamatan_id_ayah')?'is-invalid':''); ?>" wire:model="kecamatan_id_ayah">
                    <option value="">-- Pilih Kecamatan --</option>
                    <?php $__currentLoopData = $kecamatanAyah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('kecamatan_id_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('kecamatan_id_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Desa/Dusun/Kelurahan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <select id="desa_ayah" name="area_id_ayah" class="form-control <?php echo e($errors->has('area_id_ayah')?'is-invalid':''); ?>" wire:model="area_id_ayah">
                    <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                    <?php $__currentLoopData = $areaAyah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('area_id_ayah')): ?>
                <small class="text-danger"><?php echo e($errors->first('area_id_ayah')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Ibu</h4>
        <div class="form-group row">
            <label for="nik_ibu" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nik_ibu" name="nik_ibu" type="text" class="form-control <?php echo e($errors->has('nik_ibu')?'is-invalid':''); ?>" value="<?php echo e(old('nik_ibu')); ?>"
                    placeholder="Silahkan untuk memasukan NIK" wire:model="nik_ibu">
                <?php if($errors->has('nik_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_ibu" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input id="nama_ibu" name="nama_ibu" type="text" class="form-control <?php echo e($errors->has('nama_ibu')?'is-invalid':''); ?>" value="<?php echo e(old('nama_ibu')); ?>"
                    placeholder="Silahkan untuk memasukan Nama Lengkap" wire:model="nama_ibu">
                <?php if($errors->has('nama_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="umur_ibu" class="col-sm-4 col-form-label">Umur<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input id="umur_ibu" name="umur_ibu" type="number" min="1" class="form-control <?php echo e($errors->has('umur_ibu')?'is-invalid':''); ?>"
                    value="<?php echo e(old('umur_ibu')); ?>" placeholder="Silahkan untuk memasukan Umur" wire:model="umur_ibu">
                <?php if($errors->has('umur_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('umur_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="pekerjaan_id_ibu" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <select id="pekerjaan_id_ibu" name="pekerjaan_id_ibu" class="form-control <?php echo e($errors->has('pekerjaan_id_ibu')?'is-invalid':''); ?>" wire:model="pekerjaan_id_ibu">
                    <option value="">-- Pilih Pekerjaan --</option>
                    <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>" <?php echo e((old('pekerjaan_id_ibu')==$data->id)?'selected':''); ?>>
                        <?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('pekerjaan_id_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('pekerjaan_id_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="alamat_ibu" class="col-sm-4 col-form-label">Alamat<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <textarea id="alamat_ibu" name="alamat_ibu" type="text" class="form-control <?php echo e($errors->has('alamat_ibu')?'is-invalid':''); ?>"
                    placeholder="Silahkan untuk memasukan alamat lengkap" wire:model="alamat_ibu"></textarea>
                <?php if($errors->has('alamat_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Provinsi<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <select id="provinsi_id_ibu" name="provinsi_id_ibu" class="provinsi_ibu form-control <?php echo e($errors->has('provinsi_id_ibu')?'is-invalid':''); ?>" wire:model="provinsi_id_ibu">
                    <option value="">-- Pilih Provinsi --</option>
                    <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('provinsi_id_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('provinsi_id_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Kabupaten/Kota<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <select id="kota_ibu" name="kota_id_ibu" class=" kota_ibu form-control <?php echo e($errors->has('kota_id_ibu')?'is-invalid':''); ?>" wire:model="kota_id_ibu">
                    <option value="">-- Pilih Kota/kabupaten --</option>
                    <?php $__currentLoopData = $kotaIbu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('kota_id_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('kota_id_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Kecamatan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <select id="kecamatan_ibu" name="kecamatan_id_ibu" class="kecamatan_ibu form-control <?php echo e($errors->has('kecamatan_id_ibu')?'is-invalid':''); ?>" wire:model="kecamatan_id_ibu">
                    <option value="">-- Pilih Kecamatan --</option>
                    <?php $__currentLoopData = $kecamatanIbu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('kecamatan_id_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('kecamatan_id_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Desa/Dusun/Kelurahan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <select id="desa_ibu" name="area_id_ibu" class="form-control <?php echo e($errors->has('area_id_ibu')?'is-invalid':''); ?>" wire:model="area_id_ibu">
                    <option value="">-- Pilih Desa/Dusun/Kelurahan --</option>
                    <?php $__currentLoopData = $areaIbu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('area_id_ibu')): ?>
                <small class="text-danger"><?php echo e($errors->first('area_id_ibu')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <h4>Data Pelapor</h4>
        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="text" name="nik_pelapor" class="form-control <?php echo e($errors->has('nik_pelapor')?'is-invalid':''); ?>" value="<?php echo e(old('nik_pelapor')); ?>"
                    placeholder="Silahkan untuk memasukan NIK" wire:model="nik_pelapor"/>
                <?php if($errors->has('nik_pelapor')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik_pelapor')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="text" name="nama_pelapor" class="form-control <?php echo e($errors->has('nama_pelapor')?'is-invalid':''); ?>" value="<?php echo e(old('nama_pelapor')); ?>"
                    placeholder="Silahkan untuk memasukan nama lengkap" wire:model="nama_pelapor"/>
                <?php if($errors->has('nama_pelapor')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_pelapor')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Umur<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="number" min="1" name="umur_pelapor" class="form-control <?php echo e($errors->has('umur_pelapor')?'is-invalid':''); ?>" value="<?php echo e(old('umur_pelapor')); ?>"
                    placeholder="Silahkan untuk memasukan umur" wire:model="umur_pelapor"/>
                <?php if($errors->has('umur_pelapor')): ?>
                <small class="text-danger"><?php echo e($errors->first('umur_pelapor')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Hubungan Dengan Almarhum<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="text" name="hubungan" class="form-control <?php echo e($errors->has('hubungan')?'is-invalid':''); ?>" value="<?php echo e(old('hubungan')); ?>"
                    placeholder="Silahkan untuk memasukan hubungan dengan almarhum" wire:model="hubungan"/>
                <?php if($errors->has('hubungan')): ?>
                <small class="text-danger"><?php echo e($errors->first('hubungan')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <select id="pekerjaan_id_pelapor" name="pekerjaan_id_pelapor" class="form-control <?php echo e($errors->has('pekerjaan_id_pelapor')?'is-invalid':''); ?>" wire:model="pekerjaan_id_pelapor">
                    <option value="">-- Pilih Pekerjaan --</option>
                    <?php $__currentLoopData = $pekerjaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>" <?php echo e((old('pekerjaan_id_pelapor')==$data->id)?'selected':''); ?>>
                        <?php echo e($data->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('pekerjaan_id_pelapor')): ?>
                <small class="text-danger"><?php echo e($errors->first('pekerjaan_id_pelapor')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Alamat Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <textarea class="form-control <?php echo e($errors->has('alamat_pelapor')?'is-invalid':''); ?>" rows="3" name="alamat_pelapor" id="alamat_pelapor"
                    placeholder="Silahkan untuk memasukan alamat lengkap" wire:model="alamat_pelapor"></textarea>
                <?php if($errors->has('alamat_pelapor')): ?>
                <small class="text-danger"><?php echo e($errors->first('alamat_pelapor')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="line"></div>
        <h4>Data Saksi 1</h4>
        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="text" name="nik_saksi1" id="nik_saksi1" class="form-control <?php echo e($errors->has('nik_saksi1')?'is-invalid':''); ?>" value="<?php echo e(old('nik_saksi1')); ?>"
                    placeholder="Silahkan untuk memasukan NIK" wire:model="nik_saksi1"/>
                <?php if($errors->has('nik_saksi1')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik_saksi1')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="text" name="nama_saksi1" id="nama_saksi1" class="form-control <?php echo e($errors->has('nama_saksi1')?'is-invalid':''); ?>"
                    value="<?php echo e(old('nama_saksi1')); ?>" placeholder="Silahkan untuk memasukan nama lengkap" wire:model="nama_saksi1"/>
                <?php if($errors->has('nama_saksi1')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_saksi1')); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="line"></div>
        <h4>Data Saksi 2</h4>
        <div class="form-group row">

            <label for="" class="col-sm-4 col-form-label">NIK<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">

                <input type="text" name="nik_saksi2" id="nik_saksi2" class="form-control <?php echo e($errors->has('nik_saksi2')?'is-invalid':''); ?>" value="<?php echo e(old('nik_saksi2')); ?>"
                    placeholder="Silahkan untuk memasukan NIK" wire:model="nik_saksi2"/>
                <?php if($errors->has('nik_saksi2')): ?>
                <small class="text-danger"><?php echo e($errors->first('nik_saksi2')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
            <div class="col-sm-8 pl-2">
                <input type="text" name="nama_saksi2" id="nama_saksi2" class="form-control <?php echo e($errors->has('nama_saksi2')?'is-invalid':''); ?>"
                    value="<?php echo e(old('nama_saksi2')); ?>" placeholder="Silahkan untuk memasukan nama lengkap" wire:model="nama_saksi2"/>
                <?php if($errors->has('nama_saksi2')): ?>
                <small class="text-danger"><?php echo e($errors->first('nama_saksi2')); ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="col-lg-12">
                <small class="w-100"> Keterangan: <span class="text-danger">*</span>) inputan wajib diisi </small>
                <div class="spinner-grow text-dark float-right" role="status" wire:loading wire:target="store">
                </div>
                <button type="submit" id="tes" class="btn btn-gelap float-right"  wire:click="store"
                    wire:loading.attr="disabled">KIRIM</button>
            </div>
            <!-- <button type="reset" class="btn btn-danger" style="margin-left:5px;margin-right:5px;">Reset</button> -->
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
    <div class="line" id="content-mobile"></div>
</div>
<?php /**PATH C:\laragon\www\smartdesa\resources\views/livewire/frontend/skm-create.blade.php ENDPATH**/ ?>