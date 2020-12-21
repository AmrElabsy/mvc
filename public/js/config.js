$(document).ready(function () {
    "use strict";

    // If the page height is smaller than the window height,
    // this statement makes the footer rendered at the end of the window 
    var myFooter = $('#footer'),
        docHeight = $(window).height(),
        footerHeight = myFooter.height(),
        footerTop = myFooter.position().top + footerHeight;

    if (footerTop < docHeight) {
        myFooter.css('margin-top', 10 + (docHeight - footerTop) + 'px');
    }

});
