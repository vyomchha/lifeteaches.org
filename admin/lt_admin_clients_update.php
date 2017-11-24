<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//$orgs = $area = $serv = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$name = test_input($_POST["name"]);
	$comments = test_input($_POST["comments"]);
	$address = test_input($_POST["address"]);
	$phone = test_input($_POST["phone"]);
	$email = test_input($_POST["email"]);
	$location = test_input($_POST["location"]);
	$photo = test_input($_POST["photo"]);

	//FILE CHECK
	if(isset($_FILES['photo'])){
		$error = 0;
		$file_name = $_FILES['photo']['name'];
		$file_size = $_FILES['photo']['size'];
		$file_tmp = $_FILES['photo']['tmp_name'];
		$file_type = $_FILES['photo']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));

		$expensions= array("jpeg","jpg","png");
		echo "<br>FILE MANAGER: IMAGE DATA<br>NAME: $file_name<br>SIZE: $file_size<br>TYPE: $file_type<br>EXT: $file_ext";

		if(in_array($file_ext,$expensions)=== false){
			$error=1;
			echo "<br>FILE MANAGER: extension not allowed, please choose a JPG, JPEG or PNG file.";
		}

		if($file_size > 2097152) {
			$error=1;
			echo "<br>FILE MANAGER: File size must be less than 2 MB";
		}

		if($error==0) {
			move_uploaded_file($file_tmp,"../img/clients/".$file_name);
			$photo = $_FILES['photo']['name'];
			echo "<br>FILE MANAGER: Upload Success";
		}else{
			echo "<br>FILE MANAGER: Upload Error";
		}
	}
	
	require ("../etc/config.php");

	// Create connection
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "<br>CONNECTED TO DATABASE: DONE";

	$sql = "";
	if ($_POST["action"] == "update") {$sql="UPDATE Clients SET Name='$name', Address='$address', Phone='$phone', Email='$email', Photo='$photo', Location='$location', Comments='$comments' WHERE  ID=$id";}
	else if ($_POST["action"] == "delete"){$sql="DELETE FROM Clients WHERE  ID=$id";} 
	else if ($_POST["action"] == "insert"){$sql="INSERT INTO Clients ( ID , Name , Address , Phone , Email , Photo , Location, Comments ) VALUES ($id,'$name','$address','$phone','$email','$photo','$location','$comments')";} 
	echo "<br>SQL QUERY: SHOW<br>$sql";
	echo "<br>RUNNING QUERY: DONE";
	$result = mysqli_query($conn,$sql);
	echo "<br>CLOSING CONNECTION: DONE";
	mysqli_close($con);
}

echo "<br><br><a href='http://www.lifeteachesorg.ipage.com/admin/lt_admin_clients.php'>Click to return</a>";
exit();
?>
