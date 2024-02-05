<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kresna Setiana</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Ephesis&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="<?= BASEURL ?>assets/bootstrap/css/style.css" />
        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
    </head>
    <body>
        <!-- offcanvas start -->
        <div
            class="offcanvas offcanvas-top bg-black text-white"
            tabindex="-1"
            id="offcanvasNav"
            aria-labelledby="offcanvasNavLabel"
            data-bs-animation="fade"
        >
            <div class="offcanvas-header">
                <div
                    class="offcanvas-title fs-2 fw-medium handwriting"
                    id="offcanvasNavLabel"
                >
                    Kresna Setiana
                </div>
                <button
                    type="button"
                    class="bg-transparent border-0 p-2"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                >
                    <i class="bi bi-x-lg text-white"></i>
                </button>
            </div>
            <div class="offcanvas-body ps-5">
                <div class="d-flex flex-column">
                    <a
                        href="#"
                        class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"
                        ><i class="bi bi-house me-2"></i> HOME</a
                    >

                    <a
                        href="#"
                        class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"
                        ><i class="bi bi-building me-2"></i> OFFICE</a
                    >

                    <a
                        href="#"
                        class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"
                        ><i class="bi bi-hospital me-2"></i> HOSPITAL</a
                    >

                    <a
                        href="<?= BASEURL ?>"
                        class="px-2 py-3 mb-2 small text-decoration-none text-white fw-medium"
                        ><i class="bi bi-person me-2"></i>
                        LOGIN</a
                    >
                </div>
            </div>
        </div>
        <!-- offcanvas end -->

        <!-- spacer start -->
        <div
            class="p-2 p-sm-3 transition position-relative z-2"
            id="top-spacer"
        ></div>
        <!-- spacer end -->

        <!-- navbar start -->
        <div
            id="navbar"
            class="d-flex flex-row px-3 px-lg-5 justify-content-between justify-content-md-around small sticky-top transition text-white"
        >
            <div class="d-block d-md-none align-self-center">
                <a
                    class="p-2 text-decoration-none text-white fw-medium fs-6"
                    data-bs-toggle="offcanvas"
                    href="#offcanvasNav"
                    role="button"
                    aria-controls="offcanvasNav"
                    ><i class="bi bi-list"></i
                ></a>
            </div>
            <div class="d-none d-md-block align-self-center">
                <a
                    href="#"
                    class="navbar-item p-2 text-decoration-none text-white fw-medium"
                    >HOME</a
                >
            </div>
            <div class="d-none d-md-block align-self-center">
                <a
                    href="#"
                    class="navbar-item p-2 text-decoration-none text-white fw-medium"
                    >OFFICE</a
                >
            </div>
            <div class="align-self-center fs-2 fw-medium handwriting">
                Kresna Setiana
            </div>
            <div class="d-none d-md-block align-self-center">
                <a
                    href="#"
                    class="navbar-item p-2 text-decoration-none text-white fw-medium"
                    >HOSPITAL</a
                >
            </div>
            <div class="d-none d-md-block align-self-center">
                <a
                    href="<?= BASEURL ?>login"
                    class="navbar-item p-2 text-decoration-none text-white fw-medium"
                    >LOGIN</a
                >
            </div>
            <div class="d-block d-md-none align-self-center">
                <a
                    href="#"
                    class="navbar-item p-2 text-decoration-none text-white fw-medium fs-6"
                    ><i class="bi bi-search"></i
                ></a>
            </div>
        </div>
        <!-- navbar end -->

        <!-- carousel start -->
        <div
            id="mainCarousel"
            class="carousel slide carousel-fade vh-100 w-100 position-absolute top-0 z-0"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner h-100">
                <div class="carousel-item h-100 active">
                    <img
                        src="img/header-bg-1.jpg"
                        class="h-100 w-100 object-fit-cover"
                        alt="Header 1"
                    />
                </div>
                <div class="carousel-item h-100">
                    <img
                        src="img/header-bg-2.jpg"
                        class="h-100 w-100 object-fit-cover"
                        alt="Header 2"
                    />
                </div>
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#mainCarousel"
                data-bs-slide="prev"
            >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#mainCarousel"
                data-bs-slide="next"
            >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- carousel end -->
        <div class="vh-100 w-100"></div>

        <div class="px-5">
            <div class="container-fluid">
                <div class="row g-5">
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="300"
                        >
                            <img
                                src="img/1.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="0"
                        >
                            <img
                                src="img/2.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="100"
                        >
                            <img
                                src="img/3.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="0"
                        >
                            <img
                                src="img/4.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="300"
                        >
                            <img
                                src="img/5.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="150"
                        >
                            <img
                                src="img/6.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="86"
                        >
                            <img
                                src="img/7.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="30"
                        >
                            <img
                                src="img/8.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="180"
                        >
                            <img
                                src="img/9.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="15"
                        >
                            <img
                                src="img/10.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="260"
                        >
                            <img
                                src="img/11.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="photo-preview ratio ratio-16x9 overflow-hidden pointer"
                            data-aos="fade-up"
                            data-aos-delay="10"
                        >
                            <img
                                src="img/12.jpg"
                                class="w-100 h-100 object-fit-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-2"></div>
        <footer class="mt-5 p-4 bg-black text-white text-center">
            Ini Footer
        </footer>

        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"
        ></script>
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
            $(document).ready(function () {
                scrollBar();
                $(window).scroll(function () {
                    scrollBar();
                });
            });
        </script>
    </body>
</html>
