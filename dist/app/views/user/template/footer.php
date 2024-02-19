<div class="p-2"></div>
<div class="bottom-0 end-0 mt-5 position-sticky d-flex justify-content-end p-3">
    <a href="#" id="to-top" class="btn btn-dark rounded-3" style="display: none;"><i class="bi bi-caret-up-fill fw-bold"></i></a>
</div>
<footer class="mt-2 py-4 px-1 overflow-x-hidden bg-dark">
    <div class="d-flex gap-3 gap-md-5 flex-column flex-md-row justify-content-center">
        <div class="text-white order-0 order-md-1">
            <div class="d-flex flex-row justify-content-center justify-content-md-end mb-4">
                <a href="#" class="link-light p-2"><i class="bi bi-whatsapp fs-3"></i></a>
                <a href="#" class="link-light p-2"><i class="bi bi-instagram fs-3"></i></a>
                <a href="#" class="link-light p-2"><i class="bi bi-telegram fs-3"></i></a>
            </div>
        </div>
        <div class="text-white order-1 order-md-0 d-flex flex-row justify-content-center">
            <div class="py-2">
                <div class="text-center text-md-start fw-medium fs-5 mb-4">Contact</div>
                <div class="text-center text-md-start mb-1">Jalan Raya Besar, Nomor 88</div>
                <div class="text-center text-md-start mb-4">Kelurahan, Kota, Bali, Indonesia, 88888</div>
                <div class="text-center text-md-start mb-1">Mail <i class="bi bi-arrow-right"></i> <a href="mailto:mail@mail.com" class="link-light text-decoration-underline">mail@mail.com</a></div>
                <div class="text-center text-md-start">Phone <i class="bi bi-arrow-right"></i> +62 801-2345-6789</div>
            </div>
        </div>
    </div>
</footer>

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
        let isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints;
        let animationObj = [];
        $('body').animate({
            opacity: 1
        }, 700);
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
        if (isTouchDevice) {
            $('.custom-dropdown').on('touchstart', function() {
                let that = this;
                let target = $(this).data('target');
                if ($(this).hasClass('store-dropdown')) {
                    $('#story-dropdown').find('li').css('display', 'none');
                } else {
                    $('#store-dropdown').find('li').css('display', 'none');
                }
                if (!$(target).find('li').is(':visible')) {
                    let navList = $(target).find('li').toArray();
                    if ($(that).hasClass('dropdown-reverse')) {
                        let multiplier = 1;
                        for (let i = navList.length - 1; i >= 0; i--) {
                            animationObj[multiplier] = setTimeout(function() {
                                $(navList[i]).fadeIn();
                            }, 150 * multiplier);
                            multiplier++;
                        }
                    } else {
                        let multiplier = 1;
                        for (let i = 0; i < navList.length; i++) {
                            animationObj[multiplier] = setTimeout(function() {
                                $(navList[i]).fadeIn();
                            }, 150 * multiplier);
                            multiplier++;
                        }
                    }
                } else {
                    clearTimeout(animationObj);
                    $(target).find('li').css('display', 'none');
                }
            });
        } else {
            $('.custom-dropdown').mouseenter(function() {
                console.log('masuk');
                clearTimeout(animationObj);
                let that = this;
                let target = $(this).data('target');
                let navList = $(target).find('li').toArray();
                if ($(that).hasClass('dropdown-reverse')) {
                    let multiplier = 1;
                    for (let i = navList.length - 1; i >= 0; i--) {
                        animationObj[multiplier] = setTimeout(function() {
                            $(navList[i]).fadeIn();
                        }, 150 * multiplier);
                        multiplier++;
                    }
                } else {
                    let multiplier = 1;
                    for (let i = 0; i < navList.length; i++) {
                        animationObj[multiplier] = setTimeout(function() {
                            $(navList[i]).fadeIn();
                        }, 150 * multiplier);
                        multiplier++;
                    }
                }
            });
            $('.dropdown-area').mouseleave(function() {
                console.log('pergi');
                $.each(animationObj, function(indexInArray, valueOfElement) {
                    clearTimeout(valueOfElement);
                });
                $(this).find('li').hide();
            });
        }
    });
</script>
</body>

</html>