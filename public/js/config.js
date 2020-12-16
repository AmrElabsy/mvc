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

    // @TODO: This statement is used to change the dafault behaviour of the redirectrion
    // This **MUST** be removed when the project is Deployed on a server
    $("a").click(function(event) {
        event.preventDefault();
        var href =  "mvc/" + $(this).attr("href");
        window.location =href;
    });
    
    $("form").action = "mvc/" + $("form").action;    
});
