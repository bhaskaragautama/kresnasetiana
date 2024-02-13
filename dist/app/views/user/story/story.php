<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center fs-3">Story - <?= $data['series']['category'] ?></h1>
        </div>
    </div>
</div>
<div class="container">
    <?php
    $i = 1;
    foreach ($data['stories'] as $key => $value) {
    ?>
        <div class="row justify-content-center py-4 my-md-4">
            <div class="col-3 align-self-center <?= $i % 2 == 1 ? 'order-1' : 'order-3' ?>">
                <div class="position-relative show-detail" data-id="<?= $value['id'] ?>" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer shadow">
                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . (isset($value['thumbnail'][0]['picture']) ? $value['thumbnail'][0]['picture'] : 'no-thumb.jpg') ?>');"></div>
                        <img data-src="<?= IMGURL . (isset($value['thumbnail'][0]['picture']) ? $value['thumbnail'][0]['picture'] : 'no-thumb.jpg') ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                    </div>
                </div>
            </div>
            <div class="col-1 order-2"></div>
            <div class="col-5 <?= $i % 2 == 1 ? 'order-3' : 'order-1' ?>">
                <div class="position-relative show-detail" data-id="<?= $value['id'] ?>" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer shadow">
                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . (isset($value['thumbnail'][1]['picture']) ? $value['thumbnail'][1]['picture'] : 'no-thumb.jpg') ?>');"></div>
                        <img data-src="<?= IMGURL . (isset($value['thumbnail'][1]['picture']) ? $value['thumbnail'][1]['picture'] : 'no-thumb.jpg') ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-75 text-white text-center p-2 pointer">
                        <div class="small mb-1 text-truncate"><?= $value['category'] ?></div>
                        <div class="text-truncate" title="<?= $value['title'] ?>"><?= $value['title'] ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?= $i < sizeof($data['stories']) ? '<div class="row justify-content-center"><div class="col-1"><div class="ratio ratio-1x1"></div></div></div>' : '' ?>
    <?php
        $i++;
    }
    ?>
</div>

<script>
    $(document).ready(function() {
        $('.show-detail').click(function() {
            window.location.href = '<?= BASEURL ?>home/storydetail/' + $(this).data('id');
        });
    });
</script>