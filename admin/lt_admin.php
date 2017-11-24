<!doctype html>
<html>

	<head>
	
		<title> Life Teaches Foundation </title>

        <meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
		<style>
		body {
			background-color: rgba(240,240,240,1);
			color: rgba(40,40,40,1);
			padding:0;
			margin:0;
			min-width: 50rem;
			font-size: 4vh;
			height: 100vh;
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
		div.col1 {
			left:0;
			top: 0;
			display: inline-block;
			position: relative;
			width: 100%;
			height: 10rem;
			padding: 5rem 0;
			font-size: 5rem;
			text-align:center;
			background-color: rgba(40,40,40,1);
			color: rgba(240,240,240,1);
		}
		div.col2 {
			display: inline-block;
			position: relative;
			width: 100%;
			padding: 5rem 0;
			font-size: 5rem;
			text-align:center;
		}
		div.btn_data {
			padding: 1rem;
			border: solid rgba(40,40,40,1);
			margin: auto;
			text-align:center;
			transition: color 1.4s ease;
			transition: background-color 1.4s ease;
		}
		div.btn_data:hover {
			background-color: rgba(40,40,40,1);
			color: rgba(240,240,240,1);
		}
		a:link {
			text-decoration: none;
			color: rgba(40,40,40,1);
		}

		a:visited {
			text-decoration: none;
			color: rgba(40,40,40,1);
		}

		a:hover {
			text-decoration: none;
			color: rgba(40,40,40,1);
		}

		a:active {
			text-decoration: none;
			color: rgba(40,40,40,1);
		}
		</style>
        
	</head>

	<body>
	
		<div class='col1'>
			WELCOME!<br>Lifeteaches Team Member
		</div>
		
		<div class='col2'>
			<a href='lt_admin_orgs.php'><div class='btn_data'>ORGANIZATIONS</div></a>
			<a href='lt_admin_clients.php'><div class='btn_data'>CLIENTS</div></a>
		</div>
		
	</body>
</html>
