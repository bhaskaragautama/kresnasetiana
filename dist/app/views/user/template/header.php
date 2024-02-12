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

<body class="font-lustria">
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

    <!-- navbar start -->
    <div id="navbar-container" class="position-relative z-3" style="display: none;">
        <div id="navbar" class="d-flex flex-row px-3 py-3 px-lg-5 justify-content-between justify-content-md-around fixed-top transition text-white bg-dark">
            <div class="d-block d-md-none align-self-center">
                <a class="p-2 text-decoration-none text-white fw-semibold fs-6" data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" aria-controls="offcanvasNav"><i class="bi bi-list"></i></a>
            </div>
            <div class="d-none d-md-block align-self-center">
                <a href="<?= BASEURL ?>" class="navbar-item p-2 text-decoration-none text-white fw-semibold">Home</a>
            </div>
            <div class="d-none d-md-block align-self-center">
                <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-semibold">Portfolio</a>
            </div>
            <div class="align-self-center">
                <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-semibold">Kresna Setiana</a>
            </div>
            <div class="d-none d-md-block align-self-center">
                <div class="dropdown">
                    <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
                        Store<i class="ms-1 bi bi-chevron-down small"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($data['collection'] as $key => $value) {
                            echo '<li><a class="dropdown-item transition small" href="#">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="d-none d-md-block align-self-center">
                <div class="dropdown">
                    <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
                        Story<i class="ms-1 bi bi-chevron-down small"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($data['series'] as $key => $value) {
                            echo '<li><a class="dropdown-item transition small" href="' . BASEURL . 'home/story/' . $value['id'] . '">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="d-block d-md-none align-self-center">
                <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-semibold fs-6"><i class="bi bi-search"></i></a>
            </div>
        </div>
    </div>
    <!-- navbar end -->

    <!-- home nav start -->
    <div id="navbar-home" class="py-4 px-4 px-md-5 mb-5 d-flex flex-column justify-content-between">
        <div class="d-flex justify-content-between">
            <a class="p-2 text-decoration-none text-black fw-semibold fs-6 p-1 d-block d-md-none align-self-center" data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" aria-controls="offcanvasNav"><i class="bi bi-list"></i></a>
            <a href="<?= BASEURL ?>" class="text-decoration-none z-1 text-black transition fw-semibold p-1 align-self-center d-none d-md-block">Home</a>
            <a href="#" class="text-decoration-none z-1 text-black transition fw-semibold p-1 align-self-center d-none d-md-block">Portfolio</a>
            <a href="#" class="text-decoration-none z-1 text-black transition fw-semibold p-1 align-self-center">Kresna Setiana</a>
            <div class="dropdown align-self-center d-none d-md-block">
                <a href="#" class="text-decoration-none z-1 text-black transition fw-semibold p-1" data-bs-toggle="dropdown" aria-expanded="false">
                    Store<i class="ms-1 bi bi-chevron-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($data['collection'] as $key => $value) {
                        echo '<li><a class="dropdown-item transition small" href="#">' . $value['category'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="dropdown align-self-center d-none d-md-block">
                <a href="#" class="text-decoration-none z-1 text-black transition fw-semibold p-1" data-bs-toggle="dropdown" aria-expanded="false">
                    Story<i class="ms-1 bi bi-chevron-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($data['series'] as $key => $value) {
                        echo '<li><a class="dropdown-item transition small" href="' . BASEURL . 'home/story/' . $value['id'] . '">' . $value['category'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <a href="#" class="navbar-item p-2 text-decoration-none text-black fw-semibold fs-6 p-1 d-block d-md-none align-self-center"><i class="bi bi-search"></i></a>
        </div>
    </div>
    <!-- home nav end -->