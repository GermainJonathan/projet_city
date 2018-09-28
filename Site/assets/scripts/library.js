/**
 * resize the height of an element with his data-height attribute defined in percent.
 * @param {*} element element to select
 */
function updateElementSize(element)
{
    var elementHeight = $(window).height() * $(element).data('height') / 100
    element.css('height', elementHeight)
}