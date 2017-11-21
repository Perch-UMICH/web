//import Typed from './typed.js';

// Initialize collapse button
$(".button-collapse").sideNav({
    edge: 'right',
    draggable: true
});
// Initialize collapsible (uncomment the line below if you use the dropdown variation)
//$('.collapsible').collapsible();
$(document).ready(function(){
    $('.parallax').parallax();
});

// import Typed from 'typed.js';

var options = {
    strings: ["Research", "Finding a lab", "Finding lab assistants", "Learning lab skills", "Making an impact"],
    typeSpeed: 40
};

var typed = new Typed(".element", options);
var typed = new Typed(".element-mobile", options);

$("#student-btn").each(function ()
{
    $(this).click(function () {

        $('#user-prompt').delay(3000).addClass("hide");
        $('#student-section').delay(3000).removeClass("hide");
    });
});

$("#prof-btn").each(function ()
{
    $(this).click(function () {

        $('#user-prompt').addClass("hide");
        $('#student-section').removeClass("hide");
    });
});