<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pembelian Tiket DELUSI - ITB STIKOM Bali</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/data-tables/datatables.min.css">
    <link rel="shortcut icon" href="<?= BASEURL; ?>assets/img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&display=swap" rel="stylesheet">
    <script src="<?= BASEURL; ?>assets/js/jquery.js"></script>
    <script src="<?= BASEURL; ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASEURL; ?>assets/data-tables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js" integrity="sha512-MoP2OErV7Mtk4VL893VYBFq8yJHWQtqJxTyIAsCVKzILrvHyKQpAwJf9noILczN6psvXUxTr19T5h+ndywCoVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= BASEURL; ?>assets/js/flasher.js"></script>
</head>

<body>
    <div class="flasher">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="d-md-block d-none col-2 vh-100 position-fixed bg-dark text-white p-0">
                <div class="row justify-content-center pt-3 pb-5">
                    <div class="col-lg-6 col-md-10">
                        <img src="<?= BASEURL ?>img/delusi.png" class="w-100">
                    </div>
                </div>
                <ul class="list-unstyled flex flex-column fw-semibold">
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <a href="<?= BASEURL.'dashboard'; ?>" class="d-block py-3 px-4"><i class="fa fa-fw fa-dashboard me-2"></i> <span class="d-lg-inline-block d-none">Dashboard</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'sold' ? 'active' : '' ?>">
                        <a href="<?= BASEURL.'sold'; ?>" class="d-block py-3 px-4"><i class="fa fa-fw fa-ticket me-2"></i> <span class="d-lg-inline-block d-none">Penjualan</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'setting' ? 'active' : '' ?>">
                        <a href="<?= BASEURL.'setting'; ?>" class="d-block py-3 px-4"><i class="fa fa-fw fa-cog me-2"></i> <span class="d-lg-inline-block d-none">Pengaturan</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'user' ? 'active' : '' ?>">
                        <a href="<?= BASEURL.'user'; ?>" class="d-block py-3 px-4"><i class="fa fa-fw fa-users me-2"></i> <span class="d-lg-inline-block d-none">Pengguna</span></a>
                    </li>
                    <li class="admin-nav mb-2 text-lg-start text-center <?= $page == 'log' ? 'active' : '' ?>">
                        <a href="<?= BASEURL.'log'; ?>" class="d-block py-3 px-4"><i class="fa fa-fw fa-book me-2"></i> <span class="d-lg-inline-block d-none">Log Sistem</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 offset-md-2 p-0 min-vh-100">
                <nav class="navbar navbar-expand-md bg-body-tertiary">
                    <div class="container-fluid">
                        <button class="btn btn-dark d-md-none d-block" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navOffcanvas">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse mt-md-0 mt-3" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-lg-start text-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user-circle-o"></i> Username
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end position-absolute">
                                        <li><a class="dropdown-item" href="<?= BASEURL ?>profile">Ubah Password</a></li>
                                        <li><a class="dropdown-item" href="<?= BASEURL.'login/logout'; ?>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="p-5">
                    <h2 class="fw-semibold mb-5">Dashboard</h2>
                    <div class="row mb-3">
                        <div class="col-lg-2 col-md-4">
                            <div class="card bg-danger text-white">
                                <div class="card-header small">
                                    Pembelian baru
                                </div>
                                <div class="card-body">
                                    <h1><?= $data['pembelian_baru'] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="card bg-danger text-white">
                                <div class="card-header small">
                                    Kuitansi belum dikirim
                                </div>
                                <div class="card-body">
                                    <h1><?= $data['belum_dikirim'] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-header small">
                                    Jumlah pengguna
                                </div>
                                <div class="card-body">
                                    <h1><?= $data['jumlah_pengguna'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-header small">
                                    Tiket Terjual
                                </div>
                                <div class="card-body">
                                    <h1><?= $data['tiket_terjual'] == '' ? 0 : $data['tiket_terjual'] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card bg-primary text-white">
                                <div class="card-header small">
                                    Total Penjualan
                                </div>
                                <div class="card-body">
                                    <h1>Rp <?= number_format($data['total_penjualan'], 0, ',', '.') ?>,-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-start" data-bs-theme="dark" tabindex="-1" id="navOffcanvas" aria-labelledby="navOffcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="navOffcanvasLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="text-center mb-5">
                        <img src="<?= BASEURL ?>img/delusi.png" class="w-25">
                    </div>
                    <ul class="list-unstyled flex flex-column fw-semibold">
                        <li class="py-3 px-4 admin-nav mb-2 text-lg-start text-center active">
                            <a href="<?= BASEURL.'dashboard'; ?>"><i class="fa fa-fw fa-dashboard me-2"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="py-3 px-4 admin-nav mb-2 text-lg-start text-center">
                            <a href="<?= BASEURL.'sold'; ?>"><i class="fa fa-fw fa-ticket me-2"></i> <span>Penjualan</span></a>
                        </li>
                        <li class="py-3 px-4 admin-nav mb-2 text-lg-start text-center">
                            <a href="<?= BASEURL.'setting'; ?>"><i class="fa fa-fw fa-cog me-2"></i> <span>Pengaturan</span></a>
                        </li>
                        <li class="py-3 px-4 admin-nav mb-2 text-lg-start text-center">
                            <a href="<?= BASEURL.'user'; ?>"><i class="fa fa-fw fa-users me-2"></i> <span>Pengguna</span></a>
                        </li>
                        <li class="py-3 px-4 admin-nav mb-2 text-lg-start text-center">
                            <a href="<?= BASEURL.'log'; ?>"><i class="fa fa-fw fa-book me-2"></i> <span>Log Sistem</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal loading-->
    <div class="modal fade" id="load-modal" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="load-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center text-white">
                    <i class="fa fa-spinner fa-pulse fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</body>

</html>