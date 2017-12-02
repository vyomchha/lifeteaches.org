/****************************
	Author: Lija Jose
	Date  : 11/13/2017 Log: Created

*****************************/

var showLess = false;

$(document).ready(function () {    
    $('#org_show_more_info').hide();    
    $('#org_show_more_info').load("content/brac_show_more.html");
});

function show_more_onclick() {
    showLess = !showLess;
    $('#org_show_more_info').slideToggle();
    if(showLess)
    {
        $('.org_show_more_button').html("Show <br> Less");
    }
    else {
        $('.org_show_more_button').html("Show <br> More");
    }
}