jQuery(document).ready(function () {

    setResize($('#mapid'));
    
    $(window).resize(function () {
        setResize($('#mapid'));
    })

    function setResize(element){
        var imageHeight = $(window).height() * element.data('height') / 100
        element.css('height', imageHeight)
    }
});
