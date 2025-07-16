<nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>
    <div class="sidebar-header">
        <h3>Smart Desa dan Kelurahan</h3>
    </div>
    <ul class="list-unstyled components">
        <p class="f1-l-1"><u><?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?>

                <?php echo e(ucwords(strtolower($lokasi->nama))); ?></u></p>
        <li class="<?php echo e(Request::routeIs('frontend.profil.*') ? 'active' : ''); ?>">
            <a href="#profil" data-toggle="collapse" aria-expanded="false">Profil
                <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
            <ul class="collapse list-unstyled" id="profil">
                <li>
                    <a href="<?php echo e(route('frontend.profil.sejarah')); ?>">Sejarah
                        <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.profil.visimisi')); ?>">Visi Misi</a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.profil.gambaranumum')); ?>">Gambaran Umum
                        <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.profil.geografis')); ?>">Kondisi Geografis</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.potensi.*') ? 'active' : ''); ?>">
            <a href="#potensi" data-toggle="collapse" aria-expanded="false">Potensi
                <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
            <ul class="collapse list-unstyled" id="potensi">
                <?php $__currentLoopData = $potensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('frontend.potensi.list', $list->slug)); ?>"><?php echo e($list->name); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.program.*') ? 'active' : ''); ?>">
            <a href="#program" data-toggle="collapse" aria-expanded="false">Program
                <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
            <ul class="collapse list-unstyled" id="program">
                <?php $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('frontend.program.list', $list->slug)); ?>"><?php echo e($list->name); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.pemdes.*') ? 'active' : ''); ?>">
            <a href="#pemdes" data-toggle="collapse" aria-expanded="false">Pemerintah
                <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
            <ul class="collapse list-unstyled" id="pemdes">
                <li>
                    <a href="<?php echo e(route('frontend.pemdes.kades')); ?>">Kepala
                        <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.pemdes.perangkat')); ?>">Perangkat
                        <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.pemdes.kantor')); ?>">Kantor
                        <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.pemdes.struktur')); ?>">Struktur Organisasi</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.bumdes.*') ? 'active' : ''); ?>">
            <a href="#bumdes" data-toggle="collapse" aria-expanded="false">BUMDES</a>
            <ul class="collapse list-unstyled" id="bumdes">
                <li>
                    <a href="<?php echo e(route('frontend.bumdes.profil')); ?>">Profil BUMDES</a>
                </li>
                <li>
                    <a href="<?php echo e(route('frontend.bumdes.produk')); ?>">Produk BUMDES</a>
                </li>
            </ul>
        </li>
        <?php if(Auth::guard('masyarakat')->check()): ?>
        <li class="<?php echo e(Request::routeIs('frontend.unggah*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('frontend.unggah')); ?>">Unggah Dokumen</a>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.listprogress*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('frontend.listprogress')); ?>">Progres</a>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.changePassword*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('frontend.changePassword')); ?>">Ubah Password</a>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.logout*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('frontend.logout')); ?>">Logout</a>
        </li>
        <?php else: ?>
        <li class="<?php echo e(Request::routeIs('frontend.login*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('frontend.login')); ?>">Login</a>
        </li>
        <li class="<?php echo e(Request::routeIs('frontend.register*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('frontend.register')); ?>">Register</a>
        </li>
        <?php endif; ?>
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i> Cari</a>
        </li>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\smartdesa\resources\views/frontend/layout/sidemenu.blade.php ENDPATH**/ ?>