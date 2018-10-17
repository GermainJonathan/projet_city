$(function () {
    $(".spinner").fadeOut(function() {
        $("#basePage:hidden:first" ).fadeIn("slow", function() {
            if(typeof mymap !== 'undefined')
                mymap.invalidateSize();
            if(window.scrollY == 0) {
                $("ul.nav.navbar-nav").children(":first").children(":first").addClass("active");
            }
        });
    });

    //INIT
    setResize($('#mapid'));

    //active selected nav-item
    $('.nav-item').each(function () {
        $(this).find('a[href*=' + $_GET('page') + ']').parent()
            .toggleClass("nav-item").toggleClass("nav-item-active");
    });

    $(window).resize(function () {
        updateElementSize($('#mapid'));
    })

    function setResize(element) {
        var imageHeight = $(window).height() * element.data('height') / 100
        element.css('height', imageHeight)
    }

    /**
     * return get php param
     * @param {string} param 
     */
    function $_GET(param) {
        var vars = {};
        window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function (m, key, value) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if (param) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }
});
