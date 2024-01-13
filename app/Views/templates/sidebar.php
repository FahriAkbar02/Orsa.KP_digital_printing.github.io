<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion no-print" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://www.instagram.com/temmalusa_art_papua/">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="img-responsive" src="<?= base_url() ?>/img/logo/T-Art Papua.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Digital Printing </sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('note'); ?>">
            <i class="fas fa-solid fa-plus"></i>
            <span>Tambah Pesanan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data') ?>">
            <i class="fas fa-sticky-note"></i>
            <span>data</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan') ?>">
            <i class="fas fa-book"></i>
            <span>Laporan</span></a>
    </li>



    <!-- Nav Item - Dashboard -->
    <?php if (in_groups('admin')) : ?>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            User Management
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="fas fa-users"></i>
                <span>User List</span></a>
        </li>
    <?php endif; ?>
    <!-- batas custumor - admin -->
    <!-- Customers -->
    <hr class="sidebar-divider my-0">
    <hr class="sidebar-divider">



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>