<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection('top-resource'); ?>
<link rel="stylesheet"
    href="<?php echo e(asset('public/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('public/backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backend/node_modules/chocolat/dist/css/chocolat.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom-resource'); ?>
<script src="<?php echo e(asset('public/backend/node_modules/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/js/page/modules-datatables.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/backend/node_modules/jquery-ui-dist/jquery-ui.min.js')); ?>"></script>
<script>
    $('.ubah').click(function () {
        var id = $(this).data('id');
        $('.id').val(id);
    })

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($admin); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User Verified</h4>
                    </div>
                    <div class="card-body">
                    <?php echo e($userVerified); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User Unverified</h4>
                    </div>
                    <div class="card-body">
                    <?php echo e($userUnverified); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-5 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Pengajuan Surat Belum Terverifikasi</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="link-sktm" data-toggle="tab" href="#sktm" role="tab"
                                aria-controls="home" aria-selected="true">SKTM <span
                                    class="badge badge-danger"><?php echo e((count($sktm) != '0')?count($sktm):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-skbn" data-toggle="tab" href="#skbn" role="tab"
                                aria-controls="profile" aria-selected="false">SKBN <span
                                    class="badge badge-danger"><?php echo e((count($skbn) != '0')?count($skbn):''); ?></span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="link-skn" data-toggle="tab" href="#skn" role="tab"
                                aria-controls="profile" aria-selected="false">SKN <span
                                    class="badge badge-danger"><?php echo e((count($skn) != '0')?count($skn):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-skp" data-toggle="tab" href="#skp" role="tab"
                                aria-controls="profile" aria-selected="false">SKP <span
                                    class="badge badge-danger"><?php echo e((count($skp) != '0')?count($skp):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-sku" data-toggle="tab" href="#sku" role="tab"
                                aria-controls="profile" aria-selected="false">SKU <span
                                    class="badge badge-danger"><?php echo e((count($sku) != '0')?count($sku):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-skk" data-toggle="tab" href="#skk" role="tab"
                                aria-controls="profile" aria-selected="false">SKL <span
                                    class="badge badge-danger"><?php echo e((count($skk) != '0')?count($skk):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-skm" data-toggle="tab" href="#skm" role="tab"
                                aria-controls="profile" aria-selected="false">SKM <span
                                    class="badge badge-danger"><?php echo e((count($skm) != '0')?count($skm):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-skrt" data-toggle="tab" href="#skrt" role="tab"
                                aria-controls="profile" aria-selected="false">SKRT <span
                                    class="badge badge-danger"><?php echo e((count($skrt) != '0')?count($skrt):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-sksj" data-toggle="tab" href="#sksj" role="tab"
                                aria-controls="profile" aria-selected="false">SKSJ <span
                                    class="badge badge-danger"><?php echo e((count($sksj) != '0')?count($sksj):''); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="link-skaw" data-toggle="tab" href="#skaw" role="tab"
                                aria-controls="profile" aria-selected="false">SKAW <span
                                    class="badge badge-danger"><?php echo e((count($skaw) != '0')?count($skaw):''); ?></span></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="sktm" role="tabpanel" aria-labelledby="link-sktm">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $sktm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.sktm.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skbn" role="tabpanel" aria-labelledby="link-skbn">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skbn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skbn.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skn" role="tabpanel" aria-labelledby="link-skn">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skn.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skp" role="tabpanel" aria-labelledby="link-skp">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skp.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sku" role="tabpanel" aria-labelledby="link-sku">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $sku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.sku.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skk" role="tabpanel" aria-labelledby="link-skk">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skk.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skm" role="tabpanel" aria-labelledby="link-skm">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skm.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skrt" role="tabpanel" aria-labelledby="link-skrt">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skrt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skrt.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sksj" role="tabpanel" aria-labelledby="link-sksj">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $sksj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.sksj.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skaw" role="tabpanel" aria-labelledby="link-skaw">
                            <div class="table-responsive">
                                <table class="table table-striped table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengaju</th>
                                            <th>Verifikasi Kasi</th>
                                            <th>Verifikasi Sekdes</th>
                                            <th>Verifikasi Kades</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $skaw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($data->user->nama_lengkap); ?></td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kasi =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kasi == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_sekdes =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_sekdes == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><span
                                                    class="badge badge-<?php echo e(($data->verifikasi_kades =='1')?'success':'warning'); ?>"><?php echo e(($data->verifikasi_kades == '1')?'Selesai':'Belum'); ?></span>
                                            </td>
                                            <td><a href="<?php echo e(route('backend.dokumen.skaw.detail',['id'=>$data->encodeHash($data->id)])); ?>"
                                                    class="btn btn-secondary btn-icon"><i
                                                        class="fas fa-info-circle"></i></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="<?php echo e(route('backend.logout.device')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteConfirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Menghapus Data Login Ini?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo e(route('backend.logout.device.all')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="id" value="" name="id">
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteAll">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Mengahapus Semua Data Login?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                    <button type="submit" class="btn btn-primary">Ya</button>

                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>