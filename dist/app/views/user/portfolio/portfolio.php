<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center fs-3">Portfolio</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center flex-wrap gap-1">
                <?php
                foreach ($data['tag'] as $key => $value) {
                    echo '<input type="checkbox" class="btn-check" id="btn-check-' . $value['id'] . '" name="tag[]" value="' . $value['id'] . '" autocomplete="off">
                    <label class="btn bg-secondary-subtle btn-sm" id="btn-label-' . $value['id'] . '" for="btn-check-' . $value['id'] . '">' . $value['tag'] . '</label>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container py-4 my-md-4">
    <div class="row g-3 justify-content-center">
        <?php
        $i = 1;
        foreach ($data['images'] as $key => $value) {
        ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="position-relative show-detail detail-<?= $i ?>" data-img="<?= $value['picture'] ?>" data-total="<?= sizeof($data['images']) ?>" data-current="<?= $i ?>" data-aos="fade-up" data-aos-offset="<?= rand(0, 200) ?>">
                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer shadow">
                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL . $value['picture'] ?>');"></div>
                        <img data-src="<?= IMGURL . $value['picture'] ?>" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-2 bg-black bg-opacity-75 text-white text-center small text-truncate" title="<?= $value['title'] ?>">
                        <?= $value['title'] ?>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        }
        ?>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" onclick="toggleLoad()">
    Launch demo modal
</button>

<pre>
    <?php
    print_r($data);
    ?>
</pre>

<script>
    $(document).ready(function() {
        $('.show-detail').click(function() {
            showImagePreview($(this).data('img'));
        });
    });
</script>