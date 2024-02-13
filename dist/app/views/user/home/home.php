<!-- carousel start -->
<div id="carousel-container" class="vh-100 w-100 position-absolute top-0 start-0">
    <div class="container-fluid h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-sm-8 col-md-7 col-lg-5">
                <div id="mainCarousel" class="carousel slide carousel-fade shadow" data-bs-ride="carousel">
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
            </div>
        </div>
    </div>
</div>

<!-- content start -->
<div class="pt-5 px-3">
    <h2 class="text-center my-5 fs-3">Some of My Best</h2>
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