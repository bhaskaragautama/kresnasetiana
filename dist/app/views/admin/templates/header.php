<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kresna Setiana</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASEURL . "assets/bootstrap/css/style.css" ?>">
    <link rel="stylesheet" href="<?= BASEURL . "assets/datatables/datatables.min.css" ?>">
    <script src="<?= BASEURL . "assets/js/jquery.min.js" ?>"></script>
    <script src="<?= BASEURL . "assets/bootstrap/js/bootstrap.bundle.min.js" ?>"></script>
    <script src="<?= BASEURL . "assets/datatables/datatables.min.js" ?>"></script>
    <script src="<?= BASEURL . "assets/js/flasher.js" ?>"></script>
</head>

<body>
    <div class="flasher">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="d-md-block d-none col-2 svh-100 position-fixed bg-dark text-white p-0 overflow-y-auto">
                <div class="container-fluid">
                    <div class="row justify-content-center pt-3 pb-5">
                        <div class="col-lg-6 col-md-10 fs-5 fw-bold">
                            Admin
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'dashboard'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-speedometer me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Dashboard</span></a>
                    </li>
                </ul>
                <div class="py-2 px-3 text-secondary small text-center text-lg-start">STORIES</div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'series' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'series'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-card-list me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Series</span></a>
                    </li>
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'story' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'story'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-journal me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Story</span></a>
                    </li>
                </ul>
                <div class="py-2 px-3 text-secondary small text-center text-lg-start">PORTFOLIO</div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'tag' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'tag'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-tags me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Tags</span></a>
                    </li>
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'photo' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'photo'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-images me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Photo</span></a>
                    </li>
                </ul>
                <div class="py-2 px-3 text-secondary small text-center text-lg-start">STORE</div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'collection' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'collection'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-cart me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Collection</span></a>
                    </li>
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'item' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'item'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-bag-check me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Item</span></a>
                    </li>
                </ul>
                <div class="py-2 px-3 text-secondary small text-center text-lg-start">MANAGE</div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'best' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'best'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-hand-thumbs-up me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Best Photo</span></a>
                    </li>
                </ul>
                <div class="py-2 px-3 text-secondary small text-center text-lg-start">SLIDESHOW</div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'lslideshow' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'slideshow/index/1'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-card-image me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Landscape</span></a>
                    </li>
                    <li class="admin-nav transition mb-2 text-lg-start text-center <?= $page == 'pslideshow' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'slideshow/index/0'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-file-image me-0 me-lg-2"></i> <span class="d-lg-inline-block d-none">Portrait</span></a>
                    </li>
                </ul>
            </div>
            <div class="<?= !isset($_SESSION['flow-menu']) ? 'col-md-10 offset-md-2' : ($_SESSION['flow-menu'] == 1 ? 'col-md-10 offset-md-2' : 'col-md-12') ?> p-0 min-svh-100 bg-white position-relative" id="main-content">
                <nav class="navbar navbar-expand-md bg-body-tertiary">
                    <div class="container-fluid">
                        <button class="btn btn-dark d-md-none d-block rounded-3" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navOffcanvas">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse mt-md-0 mt-3" id="navbarSupportedContent">
                            <button class="btn btn-sm btn-dark d-md-block d-none rounded-3" id="toggle-menu"><i class="bi <?= !isset($_SESSION['flow-menu']) ? 'bi-chevron-double-left' : ($_SESSION['flow-menu'] == 1 ? 'bi-chevron-double-left' : 'bi-chevron-double-right') ?>"></i></button>
                            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-lg-start text-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i>
                                        <?= $_SESSION['kkName'] ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end position-absolute">
                                        <li><a class="dropdown-item transition" href="<?= BASEURL . 'profile'; ?>">Profile</a></li>
                                        <li><a class="dropdown-item transition" href="<?= BASEURL . 'login/logout'; ?>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="offcanvas offcanvas-start" data-bs-theme="dark" tabindex="-1" id="navOffcanvas" aria-labelledby="navOffcanvasLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="navOffcanvasLabel">Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="list-unstyled d-flex flex-column fw-semibold">
                            <li class="admin-nav transition mb-2 <?= $page == 'dashboard' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'dashboard'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-speedometer me-0 me-lg-2"></i> Dashboard</a>
                            </li>
                        </ul>
                        <div class="py-2 px-3 text-secondary small">STORIES</div>
                        <ul class="list-unstyled d-flex flex-column fw-semibold">
                            <li class="admin-nav transition mb-2 <?= $page == 'series' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'series'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-card-list me-0 me-lg-2"></i> Series</a>
                            </li>
                            <li class="admin-nav transition mb-2 <?= $page == 'story' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'story'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-journal me-0 me-lg-2"></i> Story</a>
                            </li>
                        </ul>
                        <div class="py-2 px-3 text-secondary small">PORTFOLIO</div>
                        <ul class="list-unstyled d-flex flex-column fw-semibold">
                            <li class="admin-nav transition mb-2 <?= $page == 'tag' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'tag'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-tags me-0 me-lg-2"></i> Tags</a>
                            </li>
                            <li class="admin-nav transition mb-2 <?= $page == 'photo' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'photo'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-images me-0 me-lg-2"></i> Photo</a>
                            </li>
                        </ul>
                        <div class="py-2 px-3 text-secondary small">STORE</div>
                        <ul class="list-unstyled d-flex flex-column fw-semibold">
                            <li class="admin-nav transition mb-2 <?= $page == 'collection' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'collection'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-cart me-0 me-lg-2"></i> Collection</a>
                            </li>
                            <li class="admin-nav transition mb-2 <?= $page == 'item' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'item'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-bag-check me-0 me-lg-2"></i> Item</a>
                            </li>
                        </ul>
                        <div class="py-2 px-3 text-secondary small">MANAGE</div>
                        <ul class="list-unstyled d-flex flex-column fw-semibold">
                            <li class="admin-nav transition mb-2 <?= $page == 'best' ? 'active' : '' ?>">
                                <a href="<?= BASEURL . 'best'; ?>" class="transition d-block py-2 px-3"><i class="bi bi-hand-thumbs-up me-0 me-lg-2"></i> Best Photo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="px-5 py-4 bg-white position-relative">