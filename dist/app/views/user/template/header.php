<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kresna Setiana</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASEURL ?>assets/bootstrap/css/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
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

    <!-- spacer start -->
    <div class="p-2 p-sm-3 transition position-relative z-2" id="top-spacer"></div>
    <!-- spacer end -->

    <!-- navbar start -->
    <div id="navbar" class="d-flex flex-row px-3 px-lg-5 justify-content-between justify-content-md-around small sticky-top transition text-white">
        <div class="d-block d-md-none align-self-center">
            <a class="p-2 text-decoration-none text-white fw-medium fs-6" data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" aria-controls="offcanvasNav"><i class="bi bi-list"></i></a>
        </div>
        <div class="d-none d-md-block align-self-center">
            <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium">HOME</a>
        </div>
        <div class="d-none d-md-block align-self-center">
            <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium">STORY</a>
        </div>
        <div class="align-self-center fs-2 fw-medium handwriting">
            Kresna Setiana
        </div>
        <div class="d-none d-md-block align-self-center">
            <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium">PORTFOLIO</a>
        </div>
        <div class="d-none d-md-block align-self-center">
            <a href="<?= BASEURL ?>" class="navbar-item p-2 text-decoration-none text-white fw-medium">STORE</a>
        </div>
        <div class="d-block d-md-none align-self-center">
            <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium fs-6"><i class="bi bi-search"></i></a>
        </div>
    </div>
    <!-- navbar end -->