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
	$address = test_input($_POST["address"]);
	$phone = test_input($_POST["phone"]);
	$website = test_input($_POST["website"]);
	$email = test_input($_POST["email"]);
	$services = test_input($_POST["services"]);
	$area = test_input($_POST["area"]);

	require ("../etc/config.php");

	// Create connection
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error . "---" . $config['servername']. $config['username']. $config['password']. $config['dbname']);
	}
	echo "<br>CONNECTED TO DATABASE: DONE";
	$sql = "";
	if ($_POST["action"] == "update") {$sql="UPDATE Main SET Name='$name', Address='$address', Phone='$phone', Website='$website', Email='$email', Services='$services', Areas='$area' WHERE  ID=$id";}
	else if ($_POST["action"] == "delete"){$sql="DELETE FROM Main WHERE  ID=$id";} 
	else if ($_POST["action"] == "insert"){$sql="INSERT INTO Main ( ID , Name , Address , Phone , Website , Email , Services , Areas ) VALUES ($id,'$name','$address','$phone','$website','$email','$services','$area')";} 
	echo "<br>SQL QUERY: SHOW<br>$sql";
	echo "<br>RUNNING QUERY: DONE";
	$result = mysqli_query($conn,$sql);
	echo "<br>CLOSING CONNECTION: DONE";
	mysqli_close($con);
}

echo "<br><br><a href='http://www.lifeteachesorg.ipage.com/admin/lt_admin_orgs.php'>Click to return</a>";
exit();
?>
