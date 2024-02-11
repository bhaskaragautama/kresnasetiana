<div class="p-2"></div>
<footer class="mt-5 p-4 bg-black text-white text-center">
    Ini Footer
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?= BASEURL ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    function scrollBar() {
        let windowScroll = $(window).scrollTop();
        let navbarOffset = $("#navbar").offset().top;
        if (windowScroll != navbarOffset || windowScroll == 0) {
            if (
                $("#navbar").hasClass("bg-black") &&
                $("#top-spacer").hasClass("bg-black")
            ) {
                $("#navbar").removeClass("bg-black");
                $("#top-spacer").removeClass("bg-black");
            }
        } else {
            if (
                !$("#navbar").hasClass("bg-black") &&
                !$("#top-spacer").hasClass("bg-black")
            ) {
                $("#navbar").addClass("bg-black");
                $("#top-spacer").addClass("bg-black");
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