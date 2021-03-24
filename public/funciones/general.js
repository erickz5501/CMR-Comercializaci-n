function ir_a(name) {
    $('html, body').animate({
        scrollTop: $(name).offset().top - 110
    }, 2000);
}

(function ($) {
    "use strict";
    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path

    $("#sidenav-collapse-main .navbar-nav a").each(function () {

        if(path.substr(path.length-1) == "#"){
            path = path.substr(0,path.length-1)
        }

        //console.log(path)
        if (this.href === path) {
            $(this).addClass("active active_color_blue");
        }
    });
})(jQuery);
