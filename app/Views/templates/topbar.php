<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<div class="sidebar-brand-text mx-3"><h3 style="text-align: center;">TEMMALUSA ART PAPUA</h3></sup></div>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php if (logged_in()): ?>

            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->username; ?></span>
<?php endif; ?>

            <img class="img-profile rounded-circle"
                src="<?= base_url();?>/img/default.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <?php if (logged_in()): ?>
            <a class="dropdown-item" href="<?= base_url('user')?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               My Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('logout')?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
<?php endif; ?>
<?php if (logged_in()==false ): ?>
    <div class="dropdown-divider"></div>
            <a class="dropdown-item" type="button" href="<?= url_to('user') ?>"  >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Login
            </a>
            <?php endif; ?>
        </div>
    </li>
   
</ul>

</nav>
