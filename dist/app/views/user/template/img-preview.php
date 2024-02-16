<!-- photo detail -->
<div id="img-preview-modal" class="position-fixed vh-100 w-100 z-2 bg-black bg-opacity-75 top-0 start-0 px-1 px-md-3 px-lg-5 transition" style="display: none; opacity: 0;">
    <div class="d-flex h-100 w-100 justify-content-between align-items-center">
        <a href="#" id="img-preview-prev" class="h-100 px-1 px-md-3 px-lg-5 img-preview-nav">
            <div class="d-flex align-items-center h-100">
                <i class="bi bi-chevron-compact-left display-6 text-secondary transition"></i>
            </div>
        </a>
        <div class="flex-grow-1 h-100 p-5">
            <div id="img-preview-container" class="d-flex justify-content-center align-items-center h-100 w-100">
                <img id="img-preview-img" class="object-fit-contain transition">
                <div id="img-preview-load" class="spinner-grow text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <a href="#" id="img-preview-next" class="h-100 px-1 px-md-3 px-lg-5 img-preview-nav">
            <div class="d-flex align-items-center h-100">
                <i class="bi bi-chevron-compact-right display-6 text-secondary transition"></i>
            </div>
        </a>
    </div>
    <div class="position-absolute top-0 end-0 p-3">
        <a href="#" class="display-6 text-secondary" id="btn-close-preview"><i class="bi bi-x-lg transition"></i></a>
    </div>
</div>

<script>
    function showImagePreview(img, idx, total, first = 1) {
        let containerHeight = 0;
        let containerWidth = 0;
        let navPrev;
        let navNext
        $('#img-preview-modal').show(function() {
            $('body').addClass('overflow-hidden');
            containerHeight = $('#img-preview-container').innerHeight();
            containerWidth = $('#img-preview-container').innerWidth();
            $('#img-preview-img').css({
                'height': containerHeight + 'px',
                'width': containerWidth + 'px'
            }).attr('src', '<?= IMGURL ?>' + img).on('load', function() {
                $('#img-preview-load').hide();
                $('#img-preview-img').show();
            });
            $('#img-preview-modal').css('opacity', 1);
            navPrev = (idx - 1 < 1 ? total : idx - 1);
            navNext = (idx + 1 > total ? first : idx + 1);
            $('#img-preview-prev').data('imgidx', navPrev);
            $('#img-preview-next').data('imgidx', navNext);
            $('.img-preview-nav').data('total', total);
        });
    }

    function closePreview() {
        $('body').removeClass('overflow-hidden');
        $('#img-preview-img').hide();
        $('#img-preview-load').show();
        $('#img-preview-img').removeAttr('src');
        $('#img-preview-modal').hide().css('opacity: 0');
    }


    $(document).ready(function() {
        $('#img-preview-img').click(function() {
            closePreview();
        });
        $('#btn-close-preview').click(function(e) {
            e.preventDefault();
            closePreview();
        });
        $(document).keydown(function(event) {
            if (event.which === 27) {
                if ($('#img-preview-img').is(':visible')) {
                    closePreview();
                }
            }
        });
        $('.img-preview-nav').click(function(e) {
            e.preventDefault();
            let currentIdx = $(this).data('imgidx');
            let navPrev = (currentIdx - 1 < 1 ? $(this).data('total') : currentIdx - 1);
            let navNext = (currentIdx + 1 > $(this).data('total') ? 1 : currentIdx + 1);
            $('#img-preview-img').hide();
            $('#img-preview-load').show();
            $('#img-preview-img').removeAttr('src');
            $('#img-preview-prev').data('imgidx', navPrev);
            $('#img-preview-next').data('imgidx', navNext);
            $('#img-preview-img').attr('src', '<?= IMGURL ?>' + $('.img-preview-' + currentIdx).data('img')).on('load', function() {
                $('#img-preview-load').hide();
                $('#img-preview-img').fadeIn();
            });
        });
    });
</script>