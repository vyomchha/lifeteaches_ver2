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
		
		<meta name="google-signin-scope" content="profile email">
		<meta name="google-signin-client_id" content="990784423612-l3kkc8u2n1rcbhoodj7lnnk9cqb977bl.apps.googleusercontent.com">
			
		<!--Link StyleSheets-->
        <link rel="stylesheet" type="text/css" href="../css/lt_css_data.css">
		<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
		<!--Social media stylesheet from font-awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- script src="js/lt_js_log_in.js"></script -->
		<script src="https://apis.google.com/js/platform.js" async defer></script>

	</head>

	<body>
	
		<div class="lt_header_wrapper">	
			<div class="lt_header">
				<a href="../lt_home.php" class="header_link"><div class="lt_header_logo lt_float_left"></div></a>
				<a href="../lt_home.php" class="header_link"><span class="lt_header_btn lt_float_left">HOME</span></a>
				<a href="lt_news.php" class="header_link"><span class="lt_header_btn lt_float_left">NEWS</span></a>
				<a href="../lt_donate.php" class="header_link"><span class="lt_header_btn lt_float_left">DONATE</span></a>
				<a href="../lt_contact.php" class="header_link"><span class="lt_header_btn lt_float_left">CONTACT</span></a>
				<a href="../lt_log_in.php" class="header_link"><span class="lt_header_btn lt_float_right">LOGIN</span></a>	
			</div>
		</div>
		
		<div class="lt_body_wrapper">
				<div class="lt_body_blog">
				<?php
					require ("../etc/config.php");

					// Create connection
					$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
					
					// Check connection
					if ($conn->connect_error) {
						die('Connection failed: ' . $conn->connect_error);
					}
					
					$ID = $_GET["ID"];
					$sql= "SELECT * FROM News WHERE ID=$ID";
					
					$result = mysqli_query($conn,$sql);
					
					while($row = mysqli_fetch_array($result)) {
						$ID=$row['ID'];
						$content_ht = $row['content_ht'];
						$handle_file_ht = fopen($content_ht, "r") or die('Cannot open file:  '.$content_ht);
						$file_ht = fread($handle_file_ht, filesize($content_ht));
						echo "<h4  style='text-align:left;' >".$row['cdate']."</h4><br>";
						echo "<h1>".$row['header']."</h1><hr>";
						echo "<div style='height:500px;'><div class='ql-editor' style='text-align:left;'>".html_entity_decode($file_ht)."<hr></div><br><br></div>";
					}
					
					mysqli_close($conn);
					
				?>
				
					<div id="fb-root" style="display: block;position: relative;">PLEASE TURN OFF TRACKING PROTECTION TO LIKE OR COMMENT VIA FACEBOOK</div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=1902419030016719&autoLogAppEvents=1';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=1902419030016719&autoLogAppEvents=1';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					  <!-- Your like button code -->
					<div class="fb-like" data-href="<?php echo "http://lifeteaches.org/blog?ID=$ID.php";?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					<div  style="display: block;position: relative;" class="fb-comments" data-href="<?php echo "http://lifeteaches.org/blog?ID=$ID.php";?>" data-width="100%" data-numposts="5"></div>
			</div>
		</div>
			
	</body>

</html>