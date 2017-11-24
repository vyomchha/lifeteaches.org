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

function show_search() {	
	var n = document.getElementById("orgs").value;
	var a = document.getElementById("area").value;
	var s = document.getElementById("serv").value;
	var str = "orgs="+n+"&area="+a+"&serv="+s;
	var xhttp;
	var div = document.getElementById("bg_txt_search_data");
	
	if (str.length == 0) { 
		div.innerHTML = "";
		return;
	}
	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "lt_search.php?"+str, true);
	xhttp.send();
}
