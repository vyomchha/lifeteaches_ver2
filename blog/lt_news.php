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
	
		<div class="lt_header_wrapper lt_min_width">	
			<div class="lt_header lt_min_width">
				<a href="../lt_home" class="header_link"><div class="lt_header_logo lt_float_left"></div></a>
				<a href="../lt_home" class="header_link"><span class="lt_header_btn lt_float_left">HOME</span></a>
				<a href="lt_news" class="header_link"><span class="lt_header_btn lt_float_left">NEWS</span></a>
				<a href="../lt_donate" class="header_link"><span class="lt_header_btn lt_float_left">DONATE</span></a>
				<a href="../lt_contact" class="header_link"><span class="lt_header_btn lt_float_left">CONTACT</span></a>
				<a href="../lt_log_in" class="header_link"><span class="lt_header_btn lt_float_right">LOGIN</span></a>	
			</div>
		</div>
		
		
		<div class="lt_body_wrapper lt_min_width lt_min_height">
			<div id="foo" class="lt_body lt_body_back lt_min_width lt_min_height">
				
				<?php
					require ("../etc/config.php");

					// Create connection
					$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
					
					// Check connection
					if ($conn->connect_error) {
						die('Connection failed: ' . $conn->connect_error);
					}
					$sql='SELECT * FROM News';
					$ID = 0;
					
					$result = mysqli_query($conn,$sql);
					
					while($row = mysqli_fetch_array($result)) {
						$ID=$row['ID'];
						$v = fmod($ID,6);
						$content_ht = $row['content_ht'];
						$handle_file_ht = fopen($content_ht, "r") or die('Cannot open file:  '.$content_ht);
						$file_ht = fread($handle_file_ht, filesize($content_ht));
						echo "<div id='lt_body_news_item_00$v' class='lt_body_news_item'>";
						echo "<div id='lt_body_news_item_col' class='lt_body_news_item'>";
						echo "<span class='lt_body_news_date'>".$row['cdate']."</span>";
						echo "<span class='lt_body_news_item'>".$row['header']."</span>";
						echo "<div class='lt_body_news_data ql-editor'>".$row['teaser']."......<br><br>";
						echo "<span class='pointer'><a href='lt_blog.php?ID=$ID'>READ MORE</a></span>";
						echo "</div></div></div>";
					}
					mysqli_close($conn);
					
				?>
					
			</div>
		</div>
		
		<div class="lt_footer_wrapper lt_min_width">
			<div class="lt_footer lt_min_width">
				<a href="https://www.twitter.com/LifeTeachesFndn" target="_blank" class="fa fa-twitter-square header_link lt_float_right"></a>
				<a href="https://www.facebook.com/LifeTeachesFoundation" target="_blank" class="fa fa-facebook-square header_link lt_float_right"></a> 
				<span class="lt_float_left lt_footer_cpy">&copy;2016-2018 LifeTeaches</span>
				<a href="https://www.guidestar.org/profile/81-4495036" target="_blank"><img src="https://widgets.guidestar.org/gximage2?o=9586471&l=v4" class="seal lt_float_left"/></a><a href="tutuwvbqfyybercu.html" style="display: none;" rel="file" id="rfqdvacxxtxfryafryuxrscfxqzqwvcx">xxyecayatrcaxdaufwvebdfeyuucc</a>
			</div>
		</div>
	
	</body>

</html>