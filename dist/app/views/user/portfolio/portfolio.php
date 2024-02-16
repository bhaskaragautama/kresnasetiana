<div class="container mb-4 mt-5">
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
                    <label class="btn bg-secondary-subtle btn-sm small btn-tag transition" id="btn-label-' . $value['id'] . '" for="btn-check-' . $value['id'] . '">' . $value['tag'] . '</label>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container py-4 my-md-4 flex-grow-1">
    <div id="portfolio-container" class="row g-3 justify-content-center transition">
        <?php
        $i = 1;
        foreach ($data['images'] as $key => $value) {
        ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="position-relative show-img-preview img-preview-<?= $i ?>" data-img="<?= $value['picture'] ?>" data-total="<?= sizeof($data['images']) ?>" data-current="<?= $i ?>" data-aos="fade-up" data-aos-duration="800" data-aos-offset="<?= rand(0, 200) ?>">
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

<script>
    $(document).ready(function() {
        $('#portfolio-container').on('click', '.show-img-preview', function() {
            showImagePreview($(this).data('img'), $(this).data('current'), $(this).data('total'));
        });
        $('.btn-check').change(function() {
            let ids = [];
            showLoad();
            $('#portfolio-container').css('opacity', 0);
            $('#btn-label-' + $(this).val()).toggleClass('bg-secondary-subtle btn-dark');
            $('.btn-check:checked').each(function(index, element) {
                ids.push($(element).val());
            });
            $.ajax({
                type: "post",
                url: "<?= BASEURL ?>home/portfoliotag",
                data: {
                    ids: ids
                },
                dataType: "json",
                success: function(response) {
                    if (response.length == 0) {
                        $('#portfolio-container').html('No image matches those tags');
                        $('#portfolio-container').css('opacity', 1);
                        hideLoad();
                    } else {
                        let content = '';
                        let i = 1;
                        $.each(response, function(idx, val) {
                            content += `<div class="col-6 col-md-4 col-lg-3">
                                <div class="position-relative show-img-preview img-preview-${i}" data-img="${val.picture}" data-total="${response.length}" data-current="${i}" data-aos="fade-up" data-aos-duration="800" data-aos-offset="${Math.floor(Math.random() * (200 - 0 + 1)) + 0}">
                                    <div class="photo-preview ratio ratio-1x1 overflow-hidden pointer shadow">
                                        <div class="position-absolute blur-load" style="background-image: url('<?= THUMBURL ?>${val.picture}');"></div>
                                        <img data-src="<?= IMGURL ?>${val.picture}" class="img-thumb w-100 h-100 object-fit-cover transition" style="opacity: 0;" loading="lazy" />
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 w-100 p-2 bg-black bg-opacity-75 text-white text-center small text-truncate" title="${val.title}">
                                        ${val.title}
                                    </div>
                                </div>
                            </div>`;
                            i++;
                        });
                        console.log(content);
                        $('#portfolio-container').html(content);
                        $('#portfolio-container').css('opacity', 1);
                        hideLoad();
                        loadImage();
                        AOS.init();
                    }
                }
            });
        });
    });
</script>