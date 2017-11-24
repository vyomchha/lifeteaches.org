<!doctype html>
<html>

	<head>
	
		<title> Life Teaches Foundation </title>

        <meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        
		<!--Link StyleSheets-->
        <link rel="stylesheet" type="text/css" href="css/css_data.css">
		<!--Social media stylesheet from font-awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="js/js_data.js">	</script>

	</head>

	<body onload="startup(3)">

		<div class="bg_header">
			<a href="home.html"><div class="bg_header_banner"></div></a>

			<div class="bg_header_tag">
			People Helping People
			</div>
			
			<div class="bg_header_links">
				<div class="bg_header_link1"><span> Help us and</span></div>
				<div class="bg_header_link2"><a href="lt_donate.php"> Donate </a></div>
				<div class="bg_header_link1"><span> Help others and</span></div>
				<div class="bg_header_link2"><a href="lt_volunteer.html"> Volunteer </a></div>
				<div class="bg_header_link1"><span> Find Help </span></div>
				<div class="bg_header_link2"><a href="lt_search.php"> We are here for you </a></div>
			</div>
		</div>
			
		<div class="bg_main_menu"><div class="bg_main_menu_btns">
			<div id="bg_btn_menu_back"></div><!--
			--><a href="home.html"><span class="bg_btn_menu" onmouseover="change_btn_menu(0)" onmouseout="reset_btn_menu()"> HOME </span></a><!--
			--><a href="lt_about.html"><span class="bg_btn_menu" onmouseover="change_btn_menu(1)" onmouseout="reset_btn_menu()"> ABOUT </span></a><!--
			--><a href="lt_search.php"><span class="bg_btn_menu" onmouseover="change_btn_menu(2)" onmouseout="reset_btn_menu()"> HERE FOR YOU </span></a><!--
			--><a href="lt_donate.php"><span class="bg_btn_menu bg_btn_menu_cur" onmouseover="change_btn_menu(3)" onmouseout="reset_btn_menu()"> DONATE </span></a><!--
			--><a href="lt_volunteer.html"><span class="bg_btn_menu" onmouseover="change_btn_menu(4)" onmouseout="reset_btn_menu()"> VOLUNTEER </span></a><!--
			--><a href="lt_clients.php"><span class="bg_btn_menu" onmouseover="change_btn_menu(5)" onmouseout="reset_btn_menu()"> CLIENTS </span></a><!--
			--><a href="lt_contact.html"><span class="bg_btn_menu" onmouseover="change_btn_menu(6)" onmouseout="reset_btn_menu()"> CONTACT </span></a>
		</div></div>		

		<div class="bg_main">		
			
			<div class="bg_main_para">
				<span class="bg_hd_para"> Where would you like to donate? </span> <br>
				<form action="lt_email.php" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="LUQ3M5XCZA7RS">
				<table class="bg_form">
				<tr> <th> NAME: </th> <td> <input type="text" name="name" required placeholder="Please enter your name"> </td> </tr>
				<tr> <th> EMAIL: </th> <td> <input type="email" name="email" required placeholder="Please enter a valid email address"> </td> </tr>
				<tr> <th> PHONE: </th> <td> <input type="tel" name="tel" placeholder="Optional: telephone number"> </td> </tr>
				<tr> <th> ORGANIZATION: </th> <td> <select name="orgs">
				<?php
					require ("etc/config.php");

					// Create connection
					$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
					
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$sql="SELECT Name,ID FROM Main";

					$result = mysqli_query($conn,$sql);

					while($row = mysqli_fetch_array($result)) {
						echo "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
					}
					mysqli_close($conn);
					echo "</div>";
				?>
				</select> </td> </tr>
				<tr> <th> COMMENTS: </th> <td> <textarea name="inquiry" required> </textarea> </td> </tr>
				<tr> <td colspan="2"> <input type="submit" name="send" value="DONATE USING PAYPAL"> </td> </tr>
				</table>
				</form>
			</div>
		</div>
		
		<div class="bg_footer">
			<span class="bg_hd_fb"> Follow us: <a href="https://www.facebook.com/LifeTeachesFoundation" target="_blank" class="fa fa-facebook org_footer_icons"></a> <a href="https://www.twitter.com/LifeTeachesFndn" target="_blank" class="fa fa-twitter org_footer_icons"></a></span>
			<span class="bg_hd_cpy"> &copy; 2016 Life Teaches </span>
		</div>
	</body>

</html>