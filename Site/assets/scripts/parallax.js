jQuery(document).ready(function () {

    setParallax();

    $(window).resize(function () {
        setParallax();
        var imageHeight = $(window).height() * $('#mapid').data('height') / 100
        $('#mapid').css('height', imageHeight)
    })

    function setParallax(){
        $('.parallax').each(function (index) {
            var imageSrc = $(this).data('image-src')
            var imageHeight = $(window).height() * $(this).data('height') / 100
            $(this).css('background-image', 'url(' + imageSrc + ')')
            $(this).css('height', imageHeight)
        })
    }

    $(window).scroll(function () {
        var scrolled = $(window).scrollTop()
        $('.parallax').each(function (index, element) {
            var initY = $(this).offset().top
            var height = $(this).height()
            var endY = initY + $(this).height()

            // Check if the element is in the viewport.
            var visible = isInViewport(this)
            if (visible) {
                var diff = scrolled - initY
                var ratio = Math.round((diff / height) * 100)
                $(this).css('background-position', 'center ' + parseInt(-(ratio * 2)) + 'px')
            }
        })
    })

    function isInViewport(node) {
        var rect = node.getBoundingClientRect()
        return (
            (rect.height > 0 || rect.width > 0) &&
            rect.bottom >= 0 &&
            rect.right >= 0 &&
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.left <= (window.innerWidth || document.documentElement.clientWidth)
        )
    }

});

