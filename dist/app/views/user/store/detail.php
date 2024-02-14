<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="text-center fs-5 text-muted mb-2"><?= $data['item']['category'] ?></div>
            <h1 class="text-center fs-3 mb-2"><?= $data['item']['title'] ?></h1>
            <p class="text-center fst-italic"><?= $data['item']['description'] ?></p>
            <div class="text-center">
                <a href="<?= BASEURL ?>home/store/<?= $data['item']['cat_id'] ?>"><i class="bi bi-arrow-left"></i> All <?= $data['item']['category'] ?></a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row g-5 justify-content-center">
        <?php
        $i = 1;
        foreach ($data['images'] as $key => $value) {
        ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="position-relative show-img-preview img-preview-<?= $i ?>" data-img="<?= $value['picture'] ?>" data-total="<?= sizeof($data['images']) ?>" data-current="<?= $i ?>" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer shadow">
                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . $value['picture'] ?>');"></div>
                        <img data-src="<?= IMGURL . $value['picture'] ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-2 bg-black bg-opacity-75 text-white text-center small" title="<?= $value['title'] ?>">
                        <div class="text-truncate mb-1">
                            <?= $value['title'] ?>
                        </div>
                        <div class="text-truncate">
                            Rp <?= number_format($value['idr'], 0, '.', ',') ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        }
        ?>
    </div>
</div>
<div class="text-center mt-5">
    <a href="<?= BASEURL ?>home/store/<?= $data['item']['cat_id'] ?>"><i class="bi bi-arrow-left"></i> All <?= $data['item']['category'] ?></a>
</div>
<script>
    $(document).ready(function() {
        $('.show-img-preview').click(function() {
            showImagePreview($(this).data('img'), $(this).data('current'), $(this).data('total'));
        });
    });
</script>