<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="user_admin/index.html" class="brand-link text-center">
        <img src="<?= $assets_url ?>media/logo_dd.png" alt="AdminLTE Logo" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assets_url ?>media/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block clr-white">Admin Dompet Dhuafa</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php $uri = current_url(true); ?>
                <li class="nav-item">
                    <a href="<?= $admin_url ?>/donasi" class="nav-link <?= ($uri->getSegment(3) == 'donasi' || $uri->getSegment(3) == '') ? "active" : "" ?>">
                        <i class="nav-icon fas fa-coins"></i>
                        <p></p>
                        Donasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $admin_url ?>/donatur" class="nav-link <?= ($uri->getSegment(3) == 'donatur') ? "active" : "" ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Donatur
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $admin_url ?>/konfirmasi-donasi" class="nav-link <?= ($uri->getSegment(3) == 'konfirmasi-donasi') ? "active" : "" ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Konfirmasi Donasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $admin_url ?>/midtrans" class="nav-link <?= ($uri->getSegment(3) == 'midtrans') ? "active" : "" ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Midtrans
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>