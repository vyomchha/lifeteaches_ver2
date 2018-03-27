<?php session_start();?>
<html>

	<head>
	
		<title> Life Teaches Foundation </title>

        <meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
		
		<meta name="description" content="Lifeteaches Foundation is a resource organization that teaches people how to change the world by changing lives.">
		<meta name="keywords" content="Lifeteaches, Foundation, Life, Teaches, Donations, Volunteer, Help, Search, Grow, Change">
		<meta name="author" content="Vyom Chhabra, Lija Jose">
		<link rel="icon" href="img/lt_logo_002.jpg">
        
		<!--Link StyleSheets-->
        <link rel="stylesheet" type="text/css" href="lt_css_data.css">
		<!--Social media stylesheet from font-awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--script src="js/lt_js_data.js">	</script-->

	</head>
	
	<body>
			
			<?php
				require ("config.php");

				// Create connection
				$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
				
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql="SELECT * FROM Clients";

				$result = mysqli_query($conn,$sql);

				while($row = mysqli_fetch_array($result)) {
					echo "<div class='lt_bc_para_head lt_bc_ph_client'>";
					echo "<div class='client_info1'>" . "<img class='client_img' src='img/clients/" . $row['Photo'] . "' alt='client-image'></img><br>" . $row['Name'] . "<br>" . $row['Location'] . "<br></div>";
					echo "<div class='client_info2'>" . nl2br($row['Comments']) . "</div>";
					echo "</div>";
				}
				mysqli_close($conn);
			?>
			
	
	</body>

</html>