<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kresna Setiana</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lustria&family=Ephesis&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASEURL ?>assets/bootstrap/css/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?= BASEURL ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="font-lustria d-flex flex-column min-vh-100">
    <!-- offcanvas start -->
    <div class="offcanvas offcanvas-top bg-black text-white" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel" data-bs-animation="fade">
        <div class="offcanvas-header">
            <div class="offcanvas-title fs-2 fw-medium handwriting" id="offcanvasNavLabel">
                Kresna Setiana
            </div>
            <button type="button" class="bg-transparent border-0 p-2" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x-lg text-white"></i>
            </button>
        </div>
        <div class="offcanvas-body ps-5">
            <div class="d-flex flex-column">
                <a href="#" class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"><i class="bi bi-house me-2"></i> HOME</a>

                <a href="#" class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"><i class="bi bi-building me-2"></i> STORY</a>

                <a href="#" class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"><i class="bi bi-hospital me-2"></i> PORTFOLIO</a>

                <a href="<?= BASEURL ?>" class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"><i class="bi bi-person me-2"></i>
                    STORE</a>
            </div>
        </div>
    </div>
    <!-- offcanvas end -->

    <!-- home nav start -->
    <!-- <div id="navbar-home" class="py-4 px-4 px-md-5 mb-5 d-flex flex-column justify-content-between <?= $page == 'home' ? 'vh-100' : '' ?>">
        <div class="d-flex justify-content-between">
            <a class="p-2 text-decoration-none text-dark fw-semibold fs-5 fs-6 p-1 align-self-center order-0 <?= $page == 'home' ? 'd-none' : 'd-block d-md-none' ?>" data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" aria-controls="offcanvasNav"><i class="bi bi-list"></i></a>
            <a href="<?= BASEURL ?>" class="text-decoration-none z-1 text-dark transition fw-semibold fs-5 p-1 align-self-center order-0 <?= $page == 'home' ? 'd-block' : 'd-none d-md-block' ?>">Home</a>
            <a href="#" class="text-decoration-none z-1 text-dark transition fw-semibold fs-5 p-1 align-self-center <?= $page == 'home' ? 'order-1' : 'order-2' ?>">Kresna Setiana</a>
            <div class="dropdown align-self-center z-1 <?= $page == 'home' ? 'order-2 d-block' : 'order-4 d-none d-md-block' ?>">
                <a href="#" class="text-decoration-none text-dark transition fw-semibold fs-5 p-1" data-bs-toggle="dropdown" aria-expanded="false">
                    Story<i class="ms-1 bi bi-chevron-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    // foreach ($data['series'] as $key => $value) {
                    //     echo '<li><a class="dropdown-item transition small" href="' . BASEURL . 'home/story/' . $value['id'] . '">' . $value['category'] . '</a></li>';
                    // }
                    ?>
                </ul>
            </div>
            <?= $page == 'home' ? '</div><div class="d-flex justify-content-between">' : '' ?>
            <a href="<?= BASEURL ?>home/portfolio" class="text-decoration-none z-1 text-dark transition fw-semibold fs-5 p-1 align-self-center <?= $page == 'home' ? 'order-3 d-block' : 'order-1 d-none d-md-block' ?>">Portfolio</a>
            <div class="dropdown align-self-center z-1 <?= $page == 'home' ? 'order-4 d-block' : 'order-3 d-none d-md-block' ?>">
                <a href="#" class="text-decoration-none text-dark transition fw-semibold fs-5 p-1" data-bs-toggle="dropdown" aria-expanded="false">
                    Store<i class="ms-1 bi bi-chevron-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    // foreach ($data['collection'] as $key => $value) {
                    //     echo '<li><a class="dropdown-item transition small" href="#">' . $value['category'] . '</a></li>';
                    // }
                    ?>
                </ul>
            </div>
            <a href="#" class="navbar-item p-2 text-decoration-none text-dark fw-semibold fs-5 fs-6 p-1 align-self-center order-4 <?= $page == 'home' ? 'd-none' : 'd-block d-md-none' ?>"><i class="bi bi-search"></i></a>
        </div>
    </div> -->
    <!-- home nav end -->

    <nav id="navbar-home" class="py-4 px-4 px-md-5 mb-5 d-flex flex-column justify-content-between <?= $page == 'home' ? 'vh-100' : '' ?>">
        <div class="d-flex justify-content-between">
            <a class="p-2 text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> fw-semibold z-1 fs-5 fs-6 p-1 align-self-center order-0 <?= $page == 'home' ? 'd-none' : 'd-block d-md-none' ?>" data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" aria-controls="offcanvasNav"><i class="bi bi-list"></i></a>
            <a href="<?= BASEURL ?>" class="text-decoration-none z-1 <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold fs-5 p-1 align-self-center order-0 <?= $page == 'home' ? 'd-block' : 'd-none d-md-block' ?>">Home</a>
            <a href="<?= BASEURL ?>home/about" class="text-decoration-none z-1 <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold fs-5 p-1 align-self-center <?= $page == 'home' ? 'order-1' : 'order-2' ?>">Kresna Setiana</a>
            <div class="dropdown-area position-relative align-self-center z-1 <?= $page == 'home' ? 'order-2 d-block' : 'order-4 d-none d-md-block' ?>">
                <a href="#" class="custom-dropdown text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold fs-5 p-1 align-self-center" data-target="#story-dropdown">Story<i class="ms-1 bi bi-chevron-down small"></i></a>
                <div id="story-dropdown" class="custom-dropdown-list position-absolute end-0 pt-3">
                    <ul class="list-unstyled text-end overflow-visible text-nowrap">
                        <?php
                        foreach ($data['series'] as $key => $value) {
                            echo '<li><a href="' . BASEURL . 'home/story/' . $value['id'] . '" class="px-1 py-2 d-block fs-6 ' . ($page == 'about' ? 'text-white' : 'text-dark') . ' fw-semibold transition">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?= $page == 'home' ? '</div><div class="d-flex justify-content-between">' : '' ?>
            <a href="<?= BASEURL ?>home/portfolio" class="text-decoration-none z-1 <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold fs-5 p-1 align-self-center <?= $page == 'home' ? 'order-3 d-block' : 'order-1 d-none d-md-block' ?>">Portfolio</a>
            <div class="dropdown-area position-relative align-self-center z-1 <?= $page == 'home' ? 'order-4 d-block' : 'order-3 d-none d-md-block' ?>">
                <a href="#" class="custom-dropdown text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold fs-5 p-1 align-self-center" data-target="#store-dropdown">Store<i class="ms-1 bi <?= $page == 'home' ? 'bi-chevron-up' : 'bi-chevron-down' ?> small"></i></a>
                <div id="store-dropdown" class="custom-dropdown-list position-absolute <?= $page == 'home' ? 'bottom-0 end-0 pb-4' : 'start-0 pt-3' ?>">
                    <ul class="list-unstyled <?= $page == 'home' ? 'text-end' : 'text-start' ?> overflow-visible text-nowrap">
                        <?php
                        foreach ($data['collection'] as $key => $value) {
                            echo '<li><a href="' . BASEURL . 'home/store/' . $value['id'] . '" class="px-1 py-2 d-block fs-6 ' . ($page == 'about' ? 'text-white' : 'text-dark') . ' fw-semibold transition">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <a href="#" class="navbar-item p-2 text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> fw-semibold z-1 fs-5 fs-6 p-1 align-self-center order-4 <?= $page == 'home' ? 'd-none' : 'd-block d-md-none' ?>"><i class="bi bi-search"></i></a>
        </div>
    </nav>