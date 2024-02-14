<div class="container mb-4 mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center fs-3">Store - <?= $data['collection']['category'] ?></h1>
        </div>
    </div>
</div>
<div class="container flex-grow-1">
    <div class="row justify-content-center g-3">
        <?php
        if (sizeof($data['item']) == 0) {
            echo '<div class="text-center">This category has no item yet.</div>';
        } else {
            foreach ($data['item'] as $key => $value) {
        ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="position-relative show-detail" data-id="<?= $value['id'] ?>" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                        <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer shadow">
                            <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . (isset($value['thumbnail'][0]['picture']) ? $value['thumbnail'][0]['picture'] : 'no-thumb.jpg') ?>');"></div>
                            <img data-src="<?= IMGURL . (isset($value['thumbnail'][0]['picture']) ? $value['thumbnail'][0]['picture'] : 'no-thumb.jpg') ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-75 text-white text-center p-2 pointer">
                            <div class="small mb-1 text-truncate"><?= $value['category'] ?></div>
                            <div class="text-truncate" title="<?= $value['title'] ?>"><?= $value['title'] ?></div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.show-detail').click(function() {
            window.location.href = '<?= BASEURL ?>home/storedetail/' + $(this).data('id');
        });
    });
</script>