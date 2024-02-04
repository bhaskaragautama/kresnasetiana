<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
            <div class="d-md-block d-none col-2 vh-100 position-fixed bg-dark text-white p-0">
                <div class="row justify-content-center pt-3 pb-5">
                    <div class="col-lg-6 col-md-10 fs-5 fw-bold">
                        Cash Flow
                    </div>
                </div>
                <ul class="list-unstyled d-flex flex-column fw-semibold">
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'dashboard'; ?>" class="d-block py-3 px-4"><i class="bi bi-speedometer me-2"></i> <span class="d-lg-inline-block d-none">Dashboard</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'term' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'term'; ?>" class="d-block py-3 px-4"><i class="bi bi-clipboard-data me-2"></i> <span class="d-lg-inline-block d-none">Term</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'flow' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'flow'; ?>" class="d-block py-3 px-4"><i class="bi bi-cash-coin me-2"></i> <span class="d-lg-inline-block d-none">Cash Flow</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'report' ? 'active' : '' ?>">
                        <a href="<?= BASEURL . 'report'; ?>" class="d-block py-3 px-4"><i class="bi bi-file-earmark-bar-graph me-2"></i> <span class="d-lg-inline-block d-none">Report</span></a>
                    </li>
                </ul>
            </div>
            <div class="<?= !isset($_SESSION['flow-menu']) ? 'col-md-10 offset-md-2' : ($_SESSION['flow-menu'] == 1 ? 'col-md-10 offset-md-2' : 'col-md-12') ?> p-0 min-vh-100 bg-white position-relative" id="main-content">
                <nav class="navbar navbar-expand-md bg-body-tertiary">
                    <div class="container-fluid">
                        <button class="btn btn-dark d-md-none d-block" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navOffcanvas">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse mt-md-0 mt-3" id="navbarSupportedContent">
                            <button class="btn btn-sm btn-dark d-md-block d-none" id="toggle-menu"><i class="bi <?= !isset($_SESSION['flow-menu']) ? 'bi-chevron-double-left' : ($_SESSION['flow-menu'] == 1 ? 'bi-chevron-double-left' : 'bi-chevron-double-right') ?>"></i></button>
                            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-lg-start text-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i> <?= $_SESSION['flow-name'] ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end position-absolute">
                                        <li><a class="dropdown-item" href="<?= BASEURL . 'login/logout'; ?>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="offcanvas offcanvas-start" data-bs-theme="dark" tabindex="-1" id="navOffcanvas" aria-labelledby="navOffcanvasLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="navOffcanvasLabel">Cash Flow</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="list-unstyled d-flex flex-column fw-semibold">
                            <li class="admin-nav mb-2 text-lg-start <?= $page == 'dashboard' ? 'active' : '' ?>">
                                <a class="py-3 px-5 d-block" href="<?= BASEURL . 'dashboard'; ?>"><i class="bi bi-speedometer me-2"></i> <span>Dashboard</span></a>
                            </li>
                            <li class="admin-nav mb-2 text-lg-start <?= $page == 'term' ? 'active' : '' ?>">
                                <a class="py-3 px-5 d-block" href="<?= BASEURL . 'term'; ?>"><i class="bi bi-clipboard-data me-2"></i> <span>Term</span></a>
                            </li>
                            <li class="admin-nav mb-2 text-lg-start <?= $page == 'flow' ? 'active' : '' ?>">
                                <a class="py-3 px-5 d-block" href="<?= BASEURL . 'flow'; ?>"><i class="bi bi-cash-coin me-2"></i> <span>Cash Flow</span></a>
                            </li>
                            <li class="admin-nav mb-2 text-lg-start <?= $page == 'report' ? 'active' : '' ?>">
                                <a class="py-3 px-5 d-block" href="<?= BASEURL . 'report'; ?>"><i class="bi bi-file-earmark-bar-graph me-2"></i> <span>Report</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-5 bg-white position-relative">