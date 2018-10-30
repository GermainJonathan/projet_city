/**
 * Manage all parallax effect.
 * To use the parallax effect, set the class of the div to parallax, the data-height attribute to the height of the parallax in percent
 * and the data-image-src attribute to the picture to use.
 */
$(function () {

    setParallax();

    /**
     * Resize all parallax element on resize.
     */
    $(window).resize(function () {
        updateElementSize($('.parallax'));
    })

    /**
     * Function that initialize all parallax element in current page.
     */
    function setParallax(){
        $('.parallax').each(function (index) {
            updateElementSize($(this));
            var imageSrc = $(this).data('image-src');
            $(this).css('background-image', 'url(' + imageSrc + ')');
        })
    }

    /**
     * Sync the movement of the picture with the scroll.
     */
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

    /**
     * return true if the element is in ViewPort, else return false.
     * @param {*} node element to select 
     */
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

