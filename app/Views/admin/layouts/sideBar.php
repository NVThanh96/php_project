<?php
include "Public/config/config.php"
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/JobDnict/php_project/app/admin" class="brand-link">
        <img src="<?php echo ($_SERVER['REQUEST_URI'] !== '/project_php/app/admin') ? '/project_php/app/Public/dist/img/AdminLTELogo.png' : 'Public/dist/img/AdminLTELogo.png'; ?>"
             alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TDEV</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo ($_SERVER['REQUEST_URI'] !== '/project_php/app/admin') ? '/project_php/app/Public/dist/img/mypic.png' : 'Public/dist/img/mypic.png'; ?>"
                     class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                <a href="#" class="d-block">Hello <?php echo ucfirst($_SESSION['email']) ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if (isset($readFileJson)):?>
                <?php foreach ($readFileJson as $child) : ?>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link ">
                            <i class="<?php echo $child['icon']; ?>"></i>
                            <p><?php echo $child['moTa']; ?></p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($child['children'] as $child1) : ?>
                                <li class="nav-item">
                                    <a href="<?php echo $child1['component']; ?>" class="nav-link">
                                        <i class="<?php echo $child1['icon']; ?>"></i>
                                        <p><?php echo $child1['moTa']; ?></p>
                                    </a>
                                    <?php if (isset($child1['children'])&& !empty($child1['children'])) : ?>
                                        <ul class="nav nav-treeview">
                                            <?php foreach ($child1['children'] as $child2) : ?>
                                                <li class="nav-item">

                                                    <a href="<?php echo  $Default . $child2['component']??''; ?>" class="nav-link">
                                                        <i class="<?php echo   $child2['icon']; ?>"></i>
                                                        <p><?php echo $child2['moTa']; ?></p>
                                                    </a>
                                                    <?php if (isset($child2['children']) && !empty($child2['children'])) : ?>
                                                        <ul class="nav nav-treeview">
                                                            <?php foreach ($child2['children'] as $child3) : ?>
                                                                <li class="nav-item">
                                                                    <a href="<?php echo $Default .  $child3['component']??''; ?>" class="nav-link">
                                                                        <i class="<?php  echo  $child3['icon']; ?>"></i>
                                                                        <p><?php echo $child3['moTa']; ?></p>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            <?php endif;?>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
