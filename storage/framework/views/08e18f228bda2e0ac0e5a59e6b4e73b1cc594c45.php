<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">

        <ul class="navbar-nav mr-3">

            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i

                        class="fas fa-search"></i></a></li>

        </ul>

    </form>

    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"

                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                <img alt="image" src="<?php echo e((Auth::guard('admin')->user()->img)?asset('backend/images/manajemen/admin/'.Auth::guard('admin')->user()->img):asset('backend/images/avatar/avatar-1.png')); ?>" class="rounded-circle mr-1">

                <div class="d-sm-none d-lg-inline-block">

                <?php echo e(Auth::guard('admin')->user()->name); ?>


                <!-- <?php echo e(Auth::guard('admin')->user()->name); ?> -->

                </div>

            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <a href="<?php echo e(route('backend.profil')); ?>" class="dropdown-item has-icon">

                    <i class="far fa-user"></i> Profil User

                </a>

                <a href="<?php echo e(route('backend.profilDesa')); ?>" class="dropdown-item has-icon">

                    <i class="far fa-building"></i> Profil <?php echo e((Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'); ?>


                </a>

                <a href="<?php echo e(route('backend.account')); ?>" class="dropdown-item has-icon">

                    <i class="fas fa-user-lock"></i> Akun

                </a>

                <a href="<?php echo e(route('backend.setting')); ?>" class="dropdown-item has-icon">

                    <i class="fas fa-cog"></i> Website

                </a>

                <div class="dropdown-divider"></div>

                <a data-toggle="modal" data-target="#logout" href="" class="dropdown-item has-icon text-danger">

                    <i class="fas fa-sign-out-alt"></i> Keluar

                </a>

            </div>

        </li>

    </ul>

</nav>

<div class="modal fade" tabindex="-1" role="dialog" id="logout">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Konfirmasi</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <p>Apakah Anda Yakin?</p>

            </div>

            <div class="modal-footer bg-whitesmoke br">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                <form action="<?php echo e(route('backend.auth.logout')); ?>" method="post">

                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="role" value="<?php echo e(Session::get('guard')); ?>">

                    <button type="submit" class="btn btn-primary">Ya</button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php /**PATH C:\xampp\htdocs\app\resources\views/backend/shared/header.blade.php ENDPATH**/ ?>