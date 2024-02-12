<div class="p-2"></div>
<footer class="mt-5 p-4 bg-black text-white text-center">
    Ini Footer
</footer>

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
    });
</script>
</body>

</html>