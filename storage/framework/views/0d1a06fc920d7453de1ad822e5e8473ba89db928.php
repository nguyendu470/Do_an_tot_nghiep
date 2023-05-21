<button type="button" class="sidebar-close">
    <i class="fa fa-times"></i>
</button>

<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">   
        
        
        
        
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e($authUser->getAvatar()); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo e($authUser->full_name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                 <a href="/" class="dropdown-item has-icon">
                    <i class="fas fa-globe"></i> <?php echo e(trans('admin/main.show_website')); ?>

                </a>

                <a href="/admin/users/<?php echo e($authUser->id); ?>/edit" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> <?php echo e(trans('admin/main.change_password')); ?>

                </a>

                <div class="dropdown-divider"></div>
                <a href="/admin/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> <?php echo e(trans('admin/main.logout')); ?>

                </a>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/admin/includes/navbar.blade.php ENDPATH**/ ?>