<?php
$landscapeSlide = '';
$landscapeCounter = 0;
$portraitSlide = '';
$portraitCounter = 0;
foreach ($data['slideshow'] as $key => $value) {
    if ($value['type'] == 0) {
        $portraitSlide .= '<div class="position-relative carousel-item h-100 overflow-hidden ' . ($portraitCounter == 0 ? 'active' : '') . '">
            <div class="position-absolute blur-load" style="background-image: url(' . BASEURL . 'img/thumbnail/' . $value['picture'] . ');"></div>
            <img data-src="img/' . $value['picture'] . '" class="h-100 w-100 object-fit-cover transition img-thumb position-relative z-1" style="opacity: 0;" alt="Header ' . $portraitCounter . '" />
        </div>';
        $portraitCounter++;
    } else {
        $landscapeSlide .= '<div class="position-relative carousel-item h-100 overflow-hidden ' . ($landscapeCounter == 0 ? 'active' : '') . '">
            <div class="position-absolute blur-load" style="background-image: url(' . BASEURL . 'img/thumbnail/' . $value['picture'] . ');"></div>
            <img data-src="img/' . $value['picture'] . '" class="h-100 w-100 object-fit-cover transition img-thumb position-relative z-1" style="opacity: 0;" alt="Header ' . $landscapeCounter . '" />
        </div>';
        $landscapeCounter++;
    }
}
?>
<!-- carousel start -->
<div id="carousel-container" class="svh-100 w-100 position-absolute top-0 start-0">
    <div class="container-fluid h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
                <div class="ratio ratio-16x9">
                    <div id="mainCarouselLandscape" class="carousel slide carousel-fade shadow" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            <?= $landscapeSlide ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarouselLandscape" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#mainCarouselLandscape" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-7 col-sm-6 d-block d-md-none">
                <div class="ratio ratio-9x16">
                    <div id="mainCarouselPortrait" class="carousel slide carousel-fade shadow" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            <?= $portraitSlide ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarouselPortrait" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#mainCarouselPortrait" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- carousel end -->

<!-- content start -->
<div class="pt-5 px-3">
    <h2 class="text-center my-5 fs-3">Some of My Best</h2>
    <div class="container d-none d-lg-block">
        <div class="row g-2 justify-content-center">
            <?php
            $i = 1;
            $col1 = '';
            $col1Size = 0;
            $col2 = '';
            $col2Size = 0;
            $col3 = '';
            $col3Size = 0;
            foreach ($data['best'] as $key => $value) {
                $content = '<div class="mb-2 show-img-preview img-preview-' . $i . ' photo-preview ratio overflow-hidden pointer ' . ($value['orientation'] == 1 ? 'ratio-4x3' : 'ratio-4x6') . '" data-img="' . $value['picture'] . '" data-total="' . sizeof($data['best']) . '" data-current="' . $i . '" data-first="1" data-aos="fade-up" data-aos-duration="800" data-aos-offset="' . rand(0, 200) . '">
                    <div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div>
                    <img data-src="' . IMGURL . $value['picture'] . '" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                </div>';
                if ($col1Size <= $col2Size && $col1Size <= $col3Size) {
                    $col1 .= $content;
                    $col1Size += ($value['orientation'] == 1 ? 1 : 2);
                } else if ($col2Size <= $col1Size && $col2Size <= $col3Size) {
                    $col2 .= $content;
                    $col2Size += ($value['orientation'] == 1 ? 1 : 2);
                } else {
                    $col3 .= $content;
                    $col3Size += ($value['orientation'] == 1 ? 1 : 2);
                }
                $i++;
            }
            ?>
            <div class="col-4"><?= $col1 ?></div>
            <div class="col-4"><?= $col2 ?></div>
            <div class="col-4"><?= $col3 ?></div>
        </div>
    </div>
    <div class="container d-none d-md-block d-lg-none">
        <div class="row g-2 justify-content-center">
            <?php
            $first = $i;
            $size = $first + sizeof($data['best']) - 1;
            $col1 = '';
            $col1Size = 0;
            $col2 = '';
            $col2Size = 0;
            foreach ($data['best'] as $key => $value) {
                $content = '<div class="mb-2 show-img-preview img-preview-' . $i . ' photo-preview ratio overflow-hidden pointer ' . ($value['orientation'] == 1 ? 'ratio-4x3' : 'ratio-4x6') . '" data-img="' . $value['picture'] . '" data-total="' . $size . '" data-current="' . $i . '" data-first="' . $first . '" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">
                    <div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div>
                    <img data-src="' . IMGURL . $value['picture'] . '" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                </div>';
                if ($col1Size <= $col2Size) {
                    $col1 .= $content;
                    $col1Size += ($value['orientation'] == 1 ? 1 : 2);
                } else {
                    $col2 .= $content;
                    $col2Size += ($value['orientation'] == 1 ? 1 : 2);
                }
                $i++;
            }
            ?>
            <div class="col-6"><?= $col1 ?></div>
            <div class="col-6"><?= $col2 ?></div>
        </div>
    </div>
    <div class="container d-block d-md-none">
        <div class="row g-2 justify-content-center">
            <?php
            $first = $i;
            $size = $first + sizeof($data['best']) - 1;
            $col1 = '';
            foreach ($data['best'] as $key => $value) {
                $content = '<div class="mb-2 show-img-preview img-preview-' . $i . ' photo-preview ratio overflow-hidden pointer ' . ($value['orientation'] == 1 ? 'ratio-4x3' : 'ratio-4x6') . '" data-img="' . $value['picture'] . '" data-total="' . $size . '" data-current="' . $i . '" data-first="' . $first . '" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">
                    <div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div>
                    <img data-src="' . IMGURL . $value['picture'] . '" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                </div>';
                $col1 .= $content;
                $i++;
            }
            ?>
            <div class="col-12"><?= $col1 ?></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.show-img-preview').click(function() {
            showImagePreview($(this).data('img'), $(this).data('current'), $(this).data('total'), $(this).data('first'));
        });
    });
</script>