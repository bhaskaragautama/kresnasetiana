<div class="container">
    <?php
    $i = 1;
    foreach ($data as $key => $value) {
    ?>
        <div class="row justify-content-center py-5 my-5">
            <div class="col-3 align-self-center <?= $i % 2 == 1 ? 'order-1' : 'order-3' ?>">
                <div class="position-relative shadow">
                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . $value['thumbnail'][0]['picture'] ?>');"></div>
                        <img data-src="<?= IMGURL . $value['thumbnail'][0]['picture'] ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                    </div>
                </div>
            </div>
            <div class="col-1 order-2"></div>
            <div class="col-5 <?= $i % 2 == 1 ? 'order-3' : 'order-1' ?>">
                <div class="position-relative shadow">
                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . $value['thumbnail'][1]['picture'] ?>');"></div>
                        <img data-src="<?= IMGURL . $value['thumbnail'][1]['picture'] ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    <?php
        $i++;
    }
    ?>
</div>
<pre>
    <?php
    print_r($data);
    ?>
</pre>