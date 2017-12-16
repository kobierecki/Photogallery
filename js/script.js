particlesJS();

$(document).ready(function(){
    console.log('DOM loaded');
    $(".rotate").textrotator({
        animation: "dissolve", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
        separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
        speed: 2000 // How many milliseconds until the next word show.
    });

    $(window).scroll(function(){
        var top = $(window).scrollTop();
        if(top>=70) {
            $("header").addClass('scrolled-nav');
        } else {
            if($("header").hasClass('scrolled-nav')) {
                $("header").removeClass('scrolled-nav');
            }
        }
    });
});
