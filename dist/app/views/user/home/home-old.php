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
            <div class="dropdown">
                <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium" data-bs-toggle="dropdown" aria-expanded="false">
                    STORY<i class="ms-1 bi bi-chevron-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($data['series'] as $key => $value) {
                        echo '<li><a class="dropdown-item transition small" href="#">' . $value['category'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="align-self-center fs-2 fw-medium handwriting">
            Kresna Setiana
        </div>
        <div class="d-none d-md-block align-self-center">
            <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium">PORTFOLIO</a>
        </div>
        <div class="d-none d-md-block align-self-center">
            <div class="dropdown">
                <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium" data-bs-toggle="dropdown" aria-expanded="false">
                    STORE<i class="ms-1 bi bi-chevron-down small"></i>
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
        <div class="d-block d-md-none align-self-center">
            <a href="#" class="navbar-item p-2 text-decoration-none text-white fw-medium fs-6"><i class="bi bi-search"></i></a>
        </div>
    </div>
    <!-- navbar end -->

    <!-- carousel start -->
    <div id="mainCarousel" class="carousel slide carousel-fade svh-100 w-100 position-absolute top-0 z-0" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <div class="position-relative carousel-item h-100 overflow-hidden active">
                <div class="position-absolute h-100-w-100 blur-load" style="background-image: url(<?= BASEURL ?>img/thumbnail/header-bg-1.jpg);"></div>
                <img data-src="img/header-bg-1.jpg" class="h-100 w-100 object-fit-cover transition img-thumb position-relative z-1" style="opacity: 0;" alt="Header 1" />
            </div>
            <div class="position-relative carousel-item h-100 overflow-hidden">
                <div class="position-absolute h-100-w-100 blur-load" style="background-image: url(<?= BASEURL ?>img/thumbnail/header-bg-2.jpg);"></div>
                <img data-src="img/header-bg-2.jpg" class="h-100 w-100 object-fit-cover transition img-thumb position-relative z-1" style="opacity: 0;" alt="Header 2" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel end -->
    <div class="svh-100 w-100"></div>

    <div class="px-3">
        <div class="container-fluid">
            <div class="row g-4 justify-content-center">
                <?php
                foreach ($data['best'] as $key => $value) {
                    echo '<div class="col-sm-6 col-lg-4">
                            <div class="photo-preview ratio ratio-16x9 overflow-hidden pointer" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">
                                <div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div>
                                <img data-src="' . IMGURL . $value['picture'] . '" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="p-2"></div>
    <footer class="mt-5 p-4 bg-black text-white text-center">
        Ini Footer
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?= BASEURL ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function scrollBar() {
            let windowScroll = $(window).scrollTop();
            let navbarOffset = $("#navbar").offset().top;
            if (windowScroll != navbarOffset || windowScroll == 0) {
                if (
                    $("#navbar").hasClass("bg-black") &&
                    $("#top-spacer").hasClass("bg-black")
                ) {
                    $("#navbar").removeClass("bg-black");
                    $("#top-spacer").removeClass("bg-black");
                }
            } else {
                if (
                    !$("#navbar").hasClass("bg-black") &&
                    !$("#top-spacer").hasClass("bg-black")
                ) {
                    $("#navbar").addClass("bg-black");
                    $("#top-spacer").addClass("bg-black");
                }
            }
        }
        $(document).ready(function() {
            scrollBar();
            $(window).scroll(function() {
                scrollBar();
            });
            $.each($(".img-thumb"), function(idx, val) {
                $(val).attr("src", $(val).data("src"));
            });
            $(".img-thumb").on("load", function() {
                $(this).css("opacity", 1);
            });
        });
    </script>
</body>

</html>