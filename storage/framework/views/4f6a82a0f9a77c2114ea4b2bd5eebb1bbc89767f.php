<aside id="sidebar-wrapper">

    <div class="sidebar-brand">

        <a href="<?php echo e(route('backend.dashboard')); ?>"><?php echo e((Auth::user()->desa->nama)??'Super User'); ?></a>

    </div>

    <div class="sidebar-brand sidebar-brand-sm">

        <a href="<?php echo e(route('backend.dashboard')); ?>"><?php echo e((Auth::user()->desa->nama)??'SU'); ?></a>

    </div>

    <ul class="sidebar-menu">

        <li class="nav-item dropdown <?php echo e(Request::routeIs('backend.dashboard') ? 'active' : ''); ?>">

            <a href="<?php echo e(route('backend.dashboard')); ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i>

                <span>Dashboard</span></a>

        </li>

        <?php if(Auth::check()): ?>

        <?php

        $permissions = \App\Models\Permission::where('role_id',Auth::user()->roles->first()->id)->get();

        $moduls = \App\Models\Permission::where('role_id',Auth::user()->roles->first()->id)->groupBy('modul_id')->get();

        ?>

        <?php endif; ?>

        <?php if(!empty($permissions)): ?>

        <?php if(count($moduls) > 0): ?>

        <?php $__currentLoopData = $moduls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li class="nav-item dropdown">

            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="<?php echo e($modul->modul->icon); ?>"></i>

                <span><?php echo e($modul->modul->name); ?></span></a>

            <ul class="dropdown-menu">

                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($modul->modul_id == $permission->modul_id): ?>

                <!-- <form method="post" action="<?php echo e(route($permission->menu->route)); ?>">

                    <?php echo e(csrf_field()); ?>


                    <li class="<?php echo e(Request::routeIs($permission->menu->route.'*') ? 'active' : ''); ?>">

                        <input type="hidden" name="menu_id" value="<?php echo e($permission->menu_id); ?>">

                        <a class="nav-link" href="javascript:void(0)"

                            onclick="this.parentNode.parentNode.submit();"><?php echo e($permission->menu->name); ?></a>

                    </li>

                </form> -->

                <li class="<?php echo e(Request::routeIs($permission->menu->route.'*') ? 'active' : ''); ?>">

                    <a class="nav-link" href="<?php echo e(route($permission->menu->route)); ?>"><?php echo e($permission->menu->name); ?></a>

                </li>

                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>

        <?php endif; ?>

  </ul>

</aside>

<?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/shared/sidemenu.blade.php ENDPATH**/ ?>