<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme no-print">
    <div class="app-brand demo">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://www.instagram.com/temmalusa_art_papua/">
            <div class="sidebar-brand-icon ">
                <img class="img-responsive" src="<?= base_url() ?>/img/logo/T-Art Papua.png" alt="">
            </div>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">T-ART PAPUA</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item ">
            <a href="<?= base_url('note'); ?>" class="menu-link">
                <i class="menu-icon fas fa-solid fa-plus"></i>
                <div data-i18n="Analytics">Pesan</div>
            </a>
        </li>

        <li class="menu-item ">
            <a href="<?= base_url('laporan'); ?>" class="menu-link">
                <i class="menu-icon fas fa-solid fa-sticky-note"></i>
                <div data-i18n="Analytics">Data</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Admin Site</span>
        </li>
        <?php if (in_groups('admin')) : ?>
            <li class="menu-item ">
                <a href="<?= base_url('admin') ?>" class="menu-link">
                    <i class="menu-icon  fas fa-solid fa-users"></i>
                    <div data-i18n="Analytics">User Manage</div>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</aside>