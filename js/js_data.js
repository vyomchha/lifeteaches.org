/****************************
	Author: Vyom Chhabra
	Date  : 11/24/2017 Log: Created
	Date  : 12/01/2017 Log: Udated by Lija Jose - Form validation for Safari

*****************************/

var base = 0;
var a=0;
var b=0;
var btn_menu;
var w = document.documentElement.clientWidth;
var h = document.documentElement.clientHeight;

window.onresize = resize;
function resize()
{
	w = document.body.clientWidth;
	h = document.body.clientHeight;
	document.getElementById("bg_btn_menu_back").style.top = 0;
	document.getElementById("bg_btn_menu_back").style.left = 0;
	change_btn_menu(base);
}

function startup (b) {
	base = b;
	btn_menu = document.getElementsByClassName("bg_btn_menu");
	change_btn_menu(b);
}

function reset_btn_menu() {
	change_btn_menu(base);
}

function change_btn_menu(n) {
	if(window.innerHeight > window.innerWidth) {
		var p = (10*n);
		var s = p.toString()+"vh";
		switch (n) {
			case 0:	document.getElementById("bg_btn_menu_back").style.top = s;break;
			case 1:	document.getElementById("bg_btn_menu_back").style.top = s;break;
			case 2:	document.getElementById("bg_btn_menu_back").style.top = s;break;
			case 3:	document.getElementById("bg_btn_menu_back").style.top = s;break;
			case 4:	document.getElementById("bg_btn_menu_back").style.top = s;break;
			case 5:	document.getElementById("bg_btn_menu_back").style.top = s;break;
			case 6:	document.getElementById("bg_btn_menu_back").style.top = s;break;
		}
	}
	else {
		var p = (14*n);
		var s = p.toString()+"vw";
		switch (n) {
			case 0:	document.getElementById("bg_btn_menu_back").style.left = s;break;
			case 1:	document.getElementById("bg_btn_menu_back").style.left = s;break;
			case 2:	document.getElementById("bg_btn_menu_back").style.left = s;break;
			case 3:	document.getElementById("bg_btn_menu_back").style.left = s;break;
			case 4:	document.getElementById("bg_btn_menu_back").style.left = s;break;
			case 5:	document.getElementById("bg_btn_menu_back").style.left = s;break;
			case 6:	document.getElementById("bg_btn_menu_back").style.left = s;break;
		}
	}
	for (var x=0;x<btn_menu.length;x++) {
		btn_menu[x].style.color = "rgba(46,41,37,1)";
	}
	btn_menu[n].style.color = "rgba(243,147,47,1)";
}

function set_btn() {
	btn_menu[a].className = btn_menu[a].className.replace(" bg_btn_menu_hov", "");
	btn_menu[b].className += " bg_btn_menu_hov";
}
function show_loader1() {
	var myVar = setTimeout(show_data1, 3000);
	//show_data1();
}

function show_data1() {
	document.getElementById("load01").style.display = "none";
	document.getElementById("data01").style.display = "block";
}	

function show_loader2() {
	var myVar = setTimeout(show_data2, 3000);
	//show_data2();
}

function show_data2() {
	document.getElementById("load02").style.display = "none";
	document.getElementById("data02").style.display = "block";
}

$(document).ready(function () {
    $("form").submit(function (e) {
        var form = $(this);
        var reqField = form.find("[required]");
        $(reqField).each(function () {
            if ($(this).val() == '') {
                if ($(this).next(".validation").length == 0) {
                    $(this).after("<div class='validation' style='color:red;font-size:12px;'>Please enter " + $(this).attr('name').toUpperCase() + ".</div>");
                }
                $(this).focus();
                e.preventDefault();
                return false;
            }
            else {
                if ($(this).next(".validation").length != 0) {
                    $(this).next(".validation").remove();
                }
            }
        }); return true;
    });
});