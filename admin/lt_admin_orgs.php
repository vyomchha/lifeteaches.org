<!doctype html>
<html>

	<head>
	
		<title> Life Teaches Foundation </title>

        <meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
		<style>
		body {
			background-color: rgba(40,40,40,1);
			color: rgba(240,240,240,1);
		}
		td {
			width: 10vw;
			height: 2vw;
			min-width:100px;
			min-height: 20px;
			text-align:center;
			font-size: 1vw;
		}
		input {
			cursor: pointer;
			height: 100%;
			width: 90%;
			padding: 0 5%;
			background-color: rgba(40,40,40,1);
			color: rgba(240,240,240,1);
			border: solid rgba(240,240,240,1);
		}
		input[type=text]:hover, input[type=submit]:hover {
			background-color: rgba(240,240,240,1);
			color: rgba(40,40,40,1);
		}
		a {
			font-size: 1.5rem;
			background-color: rgba(240,240,240,1);
			color: rgba(40,40,40,1);
		}
		</style>
        
	</head>

	<body>

		<?php
			echo "<a href='lt_admin.php'>RETURN TO MAIN MENU</a><br><br>";
			
			require ("../etc/config.php");

			// Create connection
			$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql="SELECT * FROM Main";
			$id = 1;
			
			$result = mysqli_query($conn,$sql);
			echo "<div><table>";
				echo "<tr><td>ID</td>";
				echo "<td>NAME</td>";
				echo "<td>ADDRESS</td>";
				echo "<td>PHONE</td>";
				echo "<td>WEBSITE</td>";
				echo "<td>EMAIL</td>";
				echo "<td>SERVICES</td>";
				echo "<td>AREAS</td>";
				echo "<td colspan='2'>BUTTON</td></tr>";
			while($row = mysqli_fetch_array($result)) {
				$id=$row['ID'];
				echo "<tr><form action='lt_admin_orgs_update.php' method='post' enctype='multipart/form-data'>";
				echo "<td><input type='text' name='id' value='".$row['ID']."' readonly></td>";
				echo "<td><input type='text' name='name' value='".$row['Name']."' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='address' value='".$row['Address']."' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='phone' value='".$row['Phone']."' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='website' value='".$row['Website']."' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='email' value='".$row['Email']."' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='services' value='".$row['Services']."' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='area' value='".$row['Areas']."' placeholder='Enter...'></td>";
				echo "<td><input type='submit' name='action' value='update'></td>";
				echo "<td><input type='submit' name='action' value='delete'></td>";
				echo "</form></tr>";
			}
			mysqli_close($con);
				echo "<tr><form action='lt_admin_orgs_update.php' method='post' enctype='multipart/form-data'>";
				echo "<td><input type='text' name='id' value='".($id+1)."' readonly></td>";
				echo "<td><input type='text' name='name' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='address' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='phone' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='website' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='email' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='services' placeholder='Enter...'></td>";
				echo "<td><input type='text' name='area' placeholder='Enter...'></td>";
				echo "<td><input type='submit' name='action' value='insert'></td>";
				echo "</form></tr>";
			echo "</table></div>";
			echo "<br><br><a href='lt_admin.php'>RETURN TO MAIN MENU</a><br><br>";
		?>
	</body>
</html>