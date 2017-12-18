particlesJS();

$(document).ready(function(){
    console.log('DOM loaded'); 
    $(".rotate").textrotator({
        animation: "dissolve", 
        separator: ",", 
        speed: 2000 
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

//SIDENAV SCRIPT 
var clicks = 0;
var icon = document.getElementById("js-nav-icon");
function clickCounter() {
    clicks += 1;
    console.log(clicks);
    if (clicks == 1)   {
        document.getElementById("js-mySidenav").style.width = "200px";
        document.getElementById("js-main").style.marginRight = "200px";
        icon.classList.remove("fa-navicon");
        icon.classList.add("fa-times");
        document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
    } else {
        document.getElementById("js-mySidenav").style.width = "0";
        document.getElementById("js-main").style.marginRight= "0";
        icon.classList.remove("fa-times");
        icon.classList.add("fa-navicon");
        document.body.style.backgroundColor = "rgba(255,255,255,0)";
        clicks = 0;
    }
}




