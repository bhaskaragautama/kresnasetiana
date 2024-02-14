<div class="p-2"></div>
<footer class="mt-5 p-4 bg-dark text-white text-center">
    Ini Footer
</footer>

<div class="position-fixed bottom-0 end-0 m-3">
    <a href="#" id="to-top" class="btn btn-dark rounded-0" style="display: none;"><i class="bi bi-arrow-up"></i></a>
</div>

<script>
    AOS.init();

    function scrollBar() {
        let windowScroll = $(window).scrollTop();
        if (windowScroll > 200) {
            if (!$('#to-top').is(':visible')) {
                $('#to-top').fadeIn('fast');
            }
        } else {
            if ($('#to-top').is(':visible')) {
                $('#to-top').fadeOut('fast');
            }
        }
    }

    function loadImage() {
        $.each($(".img-thumb"), function(idx, val) {
            $(val).attr("src", $(val).data("src"));
        });
        $(".img-thumb").on("load", function() {
            $(this).css("opacity", 1);
        });
    }

    $(document).ready(function() {
        scrollBar();
        loadImage();
        $(window).scroll(function() {
            scrollBar();
        });
        $('#to-top').click(function(e) {
            e.preventDefault();
            $(window).scrollTop(0);
        });
        $('.custom-dropdown').click(function(e) {
            e.preventDefault();
        });
        $('.custom-dropdown').hover(function() {
            $($(this).data('target')).fadeIn(150);
        });
        $('.dropdown-area').mouseleave(function() {
            $('.custom-dropdown-list').fadeOut(150);
        });
    });
</script>
</body>

</html>