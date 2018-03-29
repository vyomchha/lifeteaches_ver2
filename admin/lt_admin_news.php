<!doctype html>
<html>

	<head>
	
		<title> Life Teaches Foundation </title>

        <meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
		
		<!--Link StyleSheets-->
        <link rel="stylesheet" type="text/css" href="../css/lt_css_admin.css">
        
	</head>

	<body>

		<?php			
			require ("../etc/config.php");

			// Create connection
			$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql="SELECT * FROM News";
			$ID = 0;
			
			$result = mysqli_query($conn,$sql);
			echo "<div><table>";
				echo "<tr><td>ID</td>";
				echo "<td>DATE</td>";
				echo "<td class='td_long'>HEADER</td>";
				echo "<td colspan='2'>ACTIONS</td></tr>";
			while($row = mysqli_fetch_array($result)) {
				$ID=$row['ID'];
				echo "<tr><form action='lt_admin_news_update.php' method='post' enctype='multipart/form-data'>";
				echo "<input type='hidden' name='content_ht' value='".$row['content_ht']."' readonly>";
				echo "<input type='hidden' name='content_js' value='".$row['content_js']."' readonly>";
				echo "<input type='hidden' name='teaser' value='".$row['teaser']."' readonly>";
				echo "<td><input type='hidden' name='ID' value='".$row['ID']."' readonly>".$row['ID']."</td>";
				echo "<td><input type='hidden' name='cdate' value='".$row['cdate']."' readonly>".$row['cdate']."</td>";
				echo "<td class='td_long'><input type='hidden' name='header' value='".$row['header']."' readonly>".$row['header']."</td>";
				echo "<td><input type='submit' name='action' value='change'></td>";
				echo "<td><input type='submit' name='action' value='delete'></td>";
				echo "</form></tr>";
			}
			mysqli_close($conn);
				echo "<tr><form action='lt_admin_news_insert.php' method='post' enctype='multipart/form-data'>";
				echo "<td><input type='hidden' name='ID' value='".($ID+1)."' readonly>".($ID+1)."</td>";
				echo "<td colspan='4'><input type='submit' name='action' value='insert new'></td>";
				echo "</form></tr>";
			echo "</table></div>";
		?>
	</body>
</html>