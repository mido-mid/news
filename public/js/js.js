$('.owl-carousel').owlCarousel({
    ltr:true,
    margin: 20,
    nav: true,
    loop:true,
    navText:["<div class='nav-btn prev-slide'>&#62;</div>","<div class='nav-btn next-slide'>&#60;</div>"],
    responsive: {
        0: {
            items: 1
        },

        800: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});

$(document).ready(function(){
    $(".mydiv").animate({

        marginTop: '0px',
        opacity: 1

    },2000);
});
/*
$(document).ready(function(){
    $("#button").click(function(){
        $(".slid").hide(2000);
        $(".timeline").show(3000);
    })
},);

*/
$(document).ready(function(){
    $(".timeline").show(3000);
},);

$(document).ready(function(){
    $(".button").click(function (){
        $(".info2").show(2000),
        $(".rules").hide(2000),
            $(".order").hide(2000);
    });

},);

$(document).ready(function(){
    $(".button2").click(function (){
        $(".info2").hide(2000),
            $(".rules").show(2000),
            $(".order").hide(2000);
    });

},);

$(document).ready(function(){
    $(".button3").click(function (){
        $(".info2").hide(2000),
            $(".rules").hide(2000),
            $(".order").show(2000);
    });

},);


function changecolor(){
    document.getElementById("#button").style.backgroundColor = "rgb(26, 196, 26)";
    document.getElementById("#button2").style.backgroundColor = "#FFFFFF";
    document.getElementById("#button3").style.backgroundColor = "#FFFFFF";
}
function changecolor2(){
    document.getElementById("#button").style.backgroundColor = "#FFFFFF";
    document.getElementById("#button2").style.backgroundColor = "rgb(26, 196, 26)";
    document.getElementById("#button3").style.backgroundColor = "#FFFFFF";
}
function changecolor3(){
    document.getElementById("#button").style.backgroundColor = "#FFFFFF";
    document.getElementById("#button2").style.backgroundColor = "#FFFFFF";
    document.getElementById("#button3").style.backgroundColor = "rgb(26, 196, 26)";
}