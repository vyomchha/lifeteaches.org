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
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script src="js/js_data.js">	</script>

	</head>

	<body onload="startup(2);show_loader1();show_loader2();">

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
			--><a href="lt_search.php"><span class="bg_btn_menu bg_btn_menu_cur" onmouseover="change_btn_menu(2)" onmouseout="reset_btn_menu()"> HERE FOR YOU </span></a><!--
			--><a href="lt_donate.php"><span class="bg_btn_menu" onmouseover="change_btn_menu(3)" onmouseout="reset_btn_menu()"> DONATE </span></a><!--
			--><a href="lt_volunteer.html"><span class="bg_btn_menu" onmouseover="change_btn_menu(4)" onmouseout="reset_btn_menu()"> VOLUNTEER </span></a><!--
			--><a href="lt_clients.php"><span class="bg_btn_menu" onmouseover="change_btn_menu(5)" onmouseout="reset_btn_menu()"> CLIENTS </span></a><!--
			--><a href="lt_contact.html"><span class="bg_btn_menu" onmouseover="change_btn_menu(6)" onmouseout="reset_btn_menu()"> CONTACT </span></a>
		</div></div>
	
		<div class="bg_main">		
			
			<div class="bg_main_para">
				<div id='load01' style='width:100%;margin:auto;text-align:center;'><div class='loader'  style='margin:auto;text-align:center;'></div></div>
				<div id="data01" style="display:none;">
					<span class="bg_hd_para"> Search our database for an organization you would like to<br>support, help or ask for help. </span> <br>			 
					<form action="lt_search.php" method="post" name="search_para" enctype="multipart/form-data">
					<table  class="bg_form">
					<tr> <th> NAME: </th> <td> <input type="text" name="orgs" id="org_name"> </td> </tr>
					<!--<tr> <th> AREAS: </th> <td> <input type="text" name="area"> </td> </tr>-->
					<tr> <th> SERVICES: </th> 
					<td> <select name="serv" id="serv_name">
						<option value='%%'>All</option>
					<?php
						require ("etc/config.php");
						
						// Create connection
						$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
						
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql="SELECT DISTINCT Services FROM Main";

						$result = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_array($result)) {
							if (strlen($row['Services'])>0) {echo "<option value='" . $row['Services'] . "'>" . $row['Services'] . "</option>";}
						}
					?>
					</select> </td> </tr>
					<tr> <td colspan="2"> <input type="submit" value="SEARCH"> </td> </tr> 
					</table>
					</form>
				</div>
			</div>
				
				<?php
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				
				//$orgs = $area = $serv = NULL;
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					echo "<div class='bg_main_para' id='bg_txt_search_data'>";					
					echo "<div id='load02' style='width:100%;margin:auto;text-align:center;'><div class='loader'  style='margin:auto;text-align:center;'></div></div>";
					echo "<div id='data02' style='display:none;'>";
					$orgs = test_input($_POST["orgs"]);
					$area = test_input($_POST["area"]);
					$serv = test_input($_POST["serv"]);
					
					echo "<script>document.getElementById('org_name').value = '$orgs';document.getElementById('serv_name').value = '$serv';</script>";

					$sql="SELECT * FROM Main AND Services = '".$serv."'";
					if (strlen($orgs)>0) {
						if (strlen($area)>0) {
							echo "Search results for:<br>".$orgs." in ".$area."<br><hr>";
							//$sql="SELECT * FROM Main WHERE Name LIKE '%".$orgs."%' OR Address LIKE '%".$area."'%";
							$sql="SELECT * FROM Main WHERE Name LIKE '%".$orgs."%' AND Services LIKE '".$serv."'";
						}
						else {
							echo "Search results for:<br>".$orgs."<br><hr>";
							$sql="SELECT * FROM Main WHERE Name LIKE '%".$orgs."%' AND Services LIKE '".$serv."'";
						}
					}
					else {
						if (strlen($area)>0) {
							echo "Search Results In:<br>".$area."<br><hr>";
							//$sql="SELECT * FROM Main WHERE Address LIKE '%".$area."'%";
						}
						elseif ($serv=="%%") {
							echo "Search results for:<br>Everything<br><hr>";
							$sql="SELECT * FROM Main";
						}
						else {
							echo "Search results for:<br>".$serv."<br><hr>";
							$sql="SELECT * FROM Main WHERE Services LIKE '".$serv."'";
						}
					}
					//mysql_select_db("lifeteaches"); 

					$result = mysqli_query($conn,$sql);

					while($row = mysqli_fetch_array($result)) {
						echo "<div style='border-bottom:1px solid black;width:50vw;margin:2vh auto;position: relative;'>";
						echo "<h4>" . $row['Name'] . "</h4>";
						echo "<div style='display:inline-block;width:10vw;text-align:right'>";
						if (is_null($row['Address'])==0) {echo "Address:<br>";}
						if (is_null($row['Phone'])==0) {echo "Phone:<br>";}
						if (is_null($row['Website'])==0) {echo "Website:<br>";}
						if (is_null($row['Services'])==0) {echo "Services:<br>";}
						echo "</div><div style='display:inline-block;width:40vw;text-align:left;'>";
						if (is_null($row['Address'])==0) {echo "<span>" . $row['Address'] . "</span><br>";}
						if (is_null($row['Phone'])==0) {echo "<span>" . $row['Phone'] . "</span><br>";}
						if (is_null($row['Website'])==0) {echo "<span>" . $row['Website'] . "</span><br>";}
						if (is_null($row['Services'])==0) {echo "<span>" . $row['Services'] . "</span><br>";}
						echo "</div></div>";
					}
					mysqli_close($conn);
					echo "</div></div>";
				}
				?>
		</div>
		
		<div class="bg_footer">
			<span class="bg_hd_fb"> Follow us: <a href="https://www.facebook.com/LifeTeachesFoundation" target="_blank" class="fa fa-facebook org_footer_icons"></a> <a href="https://www.twitter.com/LifeTeachesFndn" target="_blank" class="fa fa-twitter org_footer_icons"></a></span>
			<span class="bg_hd_cpy"> &copy; 2016 Life Teaches </span>
		</div>

	</body>

</html>