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
		div.client {
			margin-bottom: 5vh;
			padding: .5vw;
			background-color: rgba(40,40,40,1);
			color: rgba(240,240,240,1);
			border-bottom: solid rgba(240,240,240,1);
		}			
		td {
			width: 10vw;
			height: 2vw;
			min-width:100px;
			min-height: 20px;
			text-align:center;
			font-size: 1vw;
		}
		input,textarea {
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
			$sql="SELECT * FROM Clients";
			$id = 1;
			
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($result)) {
				$id=$row['ID'];
				echo "<div class='client'><form action='lt_admin_clients_update.php' method='post' enctype='multipart/form-data'><table>";
				
				echo "<tr>";
				echo "<td colspan='6'><input type='text' name='id' value='".$row['ID']."' readonly></td>";
				echo "<td rowspan='4'>COMMENTS:</td>";
				echo "<td colspan='3' rowspan='4'><textarea name='comments' placeholder='Enter...'>".$row['Comments']."</textarea></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>NAME:</td>";
				echo "<td colspan='2'><input type='text' name='name' value='".$row['Name']."' placeholder='Enter...'></td>";
				echo "<td>ADDRESS:</td>";
				echo "<td colspan='2'><input type='text' name='address' value='".$row['Address']."' placeholder='Enter...'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>PHONE:</td>";
				echo "<td colspan='2'><input type='text' name='phone' value='".$row['Phone']."' placeholder='Enter...'></td>";
				echo "<td>EMAIL:</td>";
				echo "<td colspan='2'><input type='text' name='email' value='".$row['Email']."' placeholder='Enter...'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>LOCATION:</td>";
				echo "<td colspan='2'><input type='text' name='location' value='".$row['Location']."' placeholder='Enter...'></td>";
				echo "<td>PHOTO:</td>";
				echo "<td colspan='2'><input type='file' name='photo' accept='.jpg,.png'></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td><input type='submit' name='action' value='update'></td>";
				echo "<td></td> <td></td> <td></td> <td>CURRENT PHOTO:</td> <td><input type='text' name='photo' value='".$row['Photo']."' readonly></td> <td></td> <td></td> <td></td>";
				echo "<td><input type='submit' name='action' value='delete'></td>";
				echo "</tr>";
				
				echo "</table></form></div>";
			}
			mysqli_close($con);
			
			echo "<div class='client'><form action='lt_admin_clients_update.php' method='post' enctype='multipart/form-data'><table>";
			
			echo "<tr>";
			echo "<td colspan='6'><input type='text' name='id' value='".($id+1)."' readonly></td>";
			echo "<td rowspan='4'>COMMENTS:</td>";
			echo "<td colspan='3' rowspan='4'><textarea name='comments' placeholder='Enter...'></textarea></td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>NAME:</td>";
			echo "<td colspan='2'><input type='text' name='name' placeholder='Enter...'></td>";
			echo "<td>ADDRESS:</td>";
			echo "<td colspan='2'><input type='text' name='address' placeholder='Enter...'></td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>PHONE:</td>";
			echo "<td colspan='2'><input type='text' name='phone' placeholder='Enter...'></td>";
			echo "<td>EMAIL:</td>";
			echo "<td colspan='2'><input type='text' name='email' placeholder='Enter...'></td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>LOCATION:</td>";
			echo "<td colspan='2'><input type='text' name='location' placeholder='Enter...'></td>";
			echo "<td>PHOTO:</td>";
			echo "<td colspan='2'><input type='file' name='photo' accept='.jpg,.png'></td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td><input type='submit' name='action' value='insert'></td>";
			echo "<td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>";
			echo "<td><input type='reset' value='reset'></td>";
			echo "</tr>";
			
			echo "</table></form></div>";
			
			echo "<a href='lt_admin.php'>RETURN TO MAIN MENU</a><br><br>";
		?>
	</body>
</html>