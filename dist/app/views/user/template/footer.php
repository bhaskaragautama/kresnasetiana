<div class="p-2"></div>
<footer class="mt-5 p-4 bg-black text-white text-center">
    Ini Footer
</footer>

<!-- loading -->
<div id="loading-modal" class="position-fixed vh-100 w-100 z-3 bg-dark bg-opacity-50 top-0 start-0" style="display: none;">
    <div class="d-flex h-100 w-100 justify-content-center align-items-center">
        <div class="spinner-grow text-white" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<!-- photo detail -->
<div id="img-preview-modal" class="position-fixed vh-100 w-100 z-3 bg-dark bg-opacity-75 top-0 start-0 px-1 px-md-3 px-lg-5 transition" style="display: none; opacity: 0;">
    <div class="d-flex h-100 w-100 justify-content-between align-items-center">
        <a href="#" class="h-100 img-preview-nav" data-nav="0">
            <div class="d-flex align-items-center h-100">
                <i class="bi bi-chevron-compact-left fs-1 text-white"></i>
            </div>
        </a>
        <div class="flex-grow-1 h-100 p-5">
            <div id="img-preview-container" class="d-flex justify-content-center align-items-center h-100 w-100">
                <img id="img-preview-img" class="object-fit-contain transition" style="display: none;">
                <div id="img-preview-load" class="spinner-grow text-white" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <a href="#" class="h-100 img-preview-nav" data-nav="1">
            <div class="d-flex align-items-center h-100">
                <i class="bi bi-chevron-compact-right fs-1 text-white"></i>
            </div>
        </a>
    </div>
</div>

<script>
    AOS.init();

    function scrollBar() {
        let windowScroll = $(window).scrollTop();
        if (windowScroll > 200) {
            if ($('#navbar-container').css('display') == 'none') {
                $('#navbar-container').fadeIn('fast');
            }
        } else {
            if ($('#navbar-container').css('display') == 'block') {
                $('#navbar-container').fadeOut('fast');
            }
        }
    }

    function showLoad() {
        $('#loading-modal').fadeIn();
        $('body').addClass('overflow-hidden');
    }

    function hideLoad() {
        $('#loading-modal').fadeOut();
        $('body').removeClass('overflow-hidden');
    }

    function showImagePreview(img) {
        let containerHeight = 0;
        let containerWidth = 0;
        $('#img-preview-modal').show(function() {
            containerHeight = $('#img-preview-container').innerHeight();
            containerWidth = $('#img-preview-container').innerWidth();
            $('#img-preview-img').css({
                'height': containerHeight + 'px',
                'width': containerWidth + 'px'
            }).attr('src', '<?= IMGURL ?>' + img).on('load', function() {
                $('#img-preview-load').hide();
                $('#img-preview-img').fadeIn();
            });
            $('#img-preview-modal').css('opacity', 1);
            $('body').addClass('overflow-hidden');
        });
    }

    $(document).ready(function() {
        scrollBar();
        $(window).scroll(function() {
            scrollBar();
        });
        $.each($(".img-thumb"), function(idx, val) {
            $(val).attr("src", $(val).data("src"));
        });
        $(".img-thumb").on("load", function() {
            $(this).css("opacity", 1);
        });
        $('#img-preview-img').click(function() {
            $('#img-preview-img').hide();
            $('#img-preview-load').show();
            $('#img-preview-img').removeAttr('src');
            $('#img-preview-modal').hide().css('opacity: 0');
            $('body').removeClass('overflow-hidden');
        });
        $('.img-preview-nav').click(function(e) {
            e.preventDefault();
            let dataCurrent = $(this).data(current)
            $('#img-preview-img').hide();
            $('#img-preview-load').show();
            $('#img-preview-img').removeAttr('src');
            $('#img-preview-modal').hide().css('opacity: 0');
            if ($(this).data('nav') == 1) {

            } else {

            }
        })
    });
</script>
</body>

</html>