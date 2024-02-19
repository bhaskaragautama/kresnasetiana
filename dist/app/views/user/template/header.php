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

<body class="font-lustria d-flex flex-column min-svh-100 overflow-x-hidden" style="opacity: 0;">
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
                <a href="<?= BASEURL ?>" class="px-2 py-3 mb-2 text-decoration-none text-white fw-medium">Home</a>
                <a href="<?= BASEURL ?>home/portfolio" class="px-2 py-3 mb-2 text-decoration-none text-white fw-medium">Portfolio</a>
                <a href="#" class="px-2 py-3 mb-2 text-decoration-none text-white fw-medium" data-bs-toggle="collapse" data-bs-target="#story-collapse" aria-expanded="false" aria-controls="story-collapse">Story <i class="bi bi-chevron-down"></i></a>
                <div class="collapse bg-transparent text-white" id="story-collapse">
                    <ul class="list-unstyled px-4">
                        <?php
                        foreach ($data['series'] as $key => $value) {
                            echo '<li><a href="' . BASEURL . 'home/story/' . $value['id'] . '" class="small d-block px-1 py-2 mb-1 text-decoration-none text-white fw-medium">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <a href="#" class="px-2 py-3 mb-2 text-decoration-none text-white fw-medium" data-bs-toggle="collapse" data-bs-target="#store-collapse" aria-expanded="false" aria-controls="store-collapse">Store <i class="bi bi-chevron-down"></i></a>
                <div class="collapse bg-transparent text-white" id="store-collapse">
                    <ul class="list-unstyled px-4">
                        <?php
                        foreach ($data['collection'] as $key => $value) {
                            echo '<li><a href="' . BASEURL . 'home/store/' . $value['id'] . '" class="small d-block px-1 py-2 mb-1 text-decoration-none text-white fw-medium">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <a href="<?= BASEURL ?>home/about" class="px-2 py-3 mb-2 text-decoration-none text-white fw-medium">About</a>
            </div>
        </div>
    </div>
    <!-- offcanvas end -->

    <!-- offcanvas contact start -->
    <div class="offcanvas offcanvas-top bg-black text-white" tabindex="-1" id="offcanvasContact" aria-labelledby="offcanvasContactLabel" data-bs-animation="fade">
        <div class="offcanvas-header">
            <div class="offcanvas-title fs-2 fw-medium handwriting" id="offcanvasContactLabel">
                Kresna Setiana
            </div>
            <button type="button" class="bg-transparent border-0 p-2" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x-lg text-white"></i>
            </button>
        </div>
        <div class="offcanvas-body ps-5">
            <div class="mb-5">
                <div class="mb-3 fw-semibold">Address</div>
                <div class="mb-1">Jalan Raya Besar, Nomor 88</div>
                <div class="mb-1">Kelurahan, Kota, Bali, Indonesia, 88888</div>
            </div>
            <div class="mb-5">
                <div class="mb-3 fw-semibold">Contact</div>
                <div class="d-flex flex-column">
                    <div class="hstack">
                        <a href="#" class="link-light mb-2">
                            <i class="bi bi-whatsapp"></i>
                            WhatsApp
                        </a>
                    </div>
                    <div class="hstack">
                        <a href="#" class="link-light mb-2">
                            <i class="bi bi-instagram"></i>
                            Instagram
                        </a>
                    </div>
                    <div class="hstack">
                        <a href="#" class="link-light mb-2">
                            <i class="bi bi-telegram"></i>
                            Telegram
                        </a>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="mb-3 fw-semibold">Email</div>
                <div class="mb-1"><a href="mailto:mail@mail.com" class="link-light">mail@mail.com</a></div>
            </div>
            <div class="mb-5">
                <div class="mb-3 fw-semibold">Phone</div>
                <div class="mb-1">+62 801-2345-6789</div>
            </div>
        </div>
    </div>
    <!-- offcanvas contact end -->

    <!-- nav start -->
    <nav id="navbar-home" class="<?= $page == 'about' ? 'navbar-light-colored' : 'navbar-dark-colored' ?> py-4 px-4 px-md-5 mb-5 d-flex flex-column justify-content-between <?= $page == 'home' ? 'svh-100' : '' ?>">
        <div class="d-flex justify-content-between">
            <a class="p-2 text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> fw-semibold z-1 p-1 align-self-center order-0 <?= $page == 'home' ? 'd-none' : 'd-block d-md-none' ?>" data-bs-toggle="offcanvas" href="#offcanvasNav" role="button" aria-controls="offcanvasNav"><i class="bi bi-list"></i></a>
            <a href="<?= BASEURL ?>" class="text-decoration-none z-1 <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold p-1 align-self-center order-0 <?= $page == 'home' ? 'd-block' : 'd-none d-md-block' ?>"><span class="d-block d-md-none">Home</span><span class="d-none d-md-block">Home</span></a>
            <a href="<?= BASEURL ?>home/about" class="text-decoration-none z-1 <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold p-1 align-self-center <?= $page == 'home' ? 'order-1' : 'order-2' ?>"><span class="d-block d-md-none">Kresna Setiana</span><span class="d-none d-md-block">Kresna Setiana</span></a>
            <div class="dropdown-area position-relative align-self-center z-1 <?= $page == 'home' ? 'order-2 d-block' : 'order-4 d-none d-md-block' ?>">
                <a href="#" class="custom-dropdown story-dropdown text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold p-1 align-self-center" data-target="#story-dropdown"><span class="d-inline-block d-md-none">Story<i class="ms-1 bi bi-chevron-down small"></i></span><span class="d-none d-md-inline-block">Story<i class="ms-1 bi bi-chevron-down small"></i></span></a>
                <div id="story-dropdown" class="custom-dropdown-list position-absolute end-0 pt-3">
                    <ul class="list-unstyled text-end overflow-visible text-nowrap">
                        <?php
                        foreach ($data['series'] as $key => $value) {
                            echo '<li style="display: none;"><a href="' . BASEURL . 'home/story/' . $value['id'] . '" class="px-1 py-2 d-block ' . ($page == 'about' ? 'text-white' : 'text-dark') . ' fw-semibold transition">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?= $page == 'home' ? '</div><div class="d-flex justify-content-between">' : '' ?>
            <a href="<?= BASEURL ?>home/portfolio" class="text-decoration-none z-1 <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold p-1 align-self-center <?= $page == 'home' ? 'order-3 d-block' : 'order-1 d-none d-md-block' ?>"><span class="d-block d-md-none">Portfolio</span><span class="d-none d-md-block">Portfolio</span></a>
            <div class="dropdown-area position-relative align-self-center z-1 <?= $page == 'home' ? 'order-4 d-block' : 'order-3 d-none d-md-block' ?>">
                <a href="#" class="custom-dropdown store-dropdown <?= $page == 'home' ? 'dropdown-reverse' : '' ?> text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> transition fw-semibold p-1 align-self-center" data-target="#store-dropdown"><span class="d-inline-block d-md-none">Store<i class="ms-1 bi <?= $page == 'home' ? 'bi-chevron-up' : 'bi-chevron-down' ?> small"></i></span><span class="d-none d-md-inline-block">Store<i class="ms-1 bi <?= $page == 'home' ? 'bi-chevron-up' : 'bi-chevron-down' ?> small"></i></span></a>
                <div id="store-dropdown" class="custom-dropdown-list position-absolute <?= $page == 'home' ? 'bottom-0 end-0 mb-4' : 'start-0 pt-3' ?>">
                    <ul class="list-unstyled <?= $page == 'home' ? 'text-end' : 'text-start' ?> overflow-visible text-nowrap">
                        <?php
                        foreach ($data['collection'] as $key => $value) {
                            echo '<li style="display: none;"><a href="' . BASEURL . 'home/store/' . $value['id'] . '" class="px-1 py-2 d-block ' . ($page == 'about' ? 'text-white' : 'text-dark') . ' fw-semibold transition">' . $value['category'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <a class="navbar-item p-2 text-decoration-none <?= $page == 'about' ? 'text-white' : 'text-dark' ?> fw-semibold z-1 p-1 align-self-center order-4 <?= $page == 'home' ? 'd-none' : 'd-block d-md-none' ?>" data-bs-toggle="offcanvas" href="#offcanvasContact" role="button" aria-controls="offcanvasContact"><i class="bi bi-person-vcard"></i></a>
        </div>
    </nav>
    <!-- nav end -->