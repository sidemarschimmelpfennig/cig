<header class="top-bar d-flex justify-content-between align-items-center">
    <div class="d-flex">
        <div class="btn-main-menu me-3 " onclick="toggleSidebar()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <img src="<?= base_url("assets/images/logo.png") ?>" alt="" class="img-fluid" srcset="" width="48px">
    </div>
    <nav class="d-flex">
        <i class="fa-solid fa-user me-2"></i> <?= $user->name ?>
        <i class="fa fa-ellipsis-v mx-3" aria-hidden="true"></i>
        <a href="<?= site_url("auth/logout") ?>" class="me-2"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
    </nav>
</header>