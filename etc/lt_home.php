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
        <link rel="stylesheet" type="text/css" href="css/lt_css_data.css">
        <link rel="stylesheet" type="text/css" href="css/lt_css_home.css">
		<!--Social media stylesheet from font-awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- script src="js/lt_js_log_in.js"></script -->
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script type='text/javascript' src='http://code.jquery.com/jquery-1.5.js'></script>

	</head>

	<body>
			
		<div class="lt_header">
			<a href="lt_home.php" class="header_link"><span class="lt_header_btn">HOME</span></a>
			<a href="lt_news.php" class="header_link"><span class="lt_header_btn">NEWS</span></a>
			<a href="lt_donate.php" class="header_link"><span class="lt_header_btn">DONATE</span></a>
			<a href="lt_contact.php" class="header_link"><span class="lt_header_btn">CONTACT</span></a>
			
			
			<a href="lt_contact.php" class="header_link"><span class="lt_header_btn lt_float_right">LOGIN</span></a>
		</div>
		
		<div class="lt_body">
			<div class="lt_body_marquee">
				
				<?php
					$text = array("Life","Dreams","Hope","Teach","Love","Message","Passion");
					$classname = array("marquee_t01", "marquee_t02", "marquee_t03", "marquee_t04", "marquee_t05", "marquee_t06", "marquee_t07", "marquee_t08", "marquee_t09", "marquee_t11", "marquee_t12", "marquee_t13", "marquee_t14", "marquee_t15", "marquee_t16", "marquee_t17", "marquee_t18", "marquee_t19");
					$total = 200;
					for ($x = 0; $x <= $total; $x++) {
						$time = rand(25,125);
						$hgt = rand(5,85);
						$col = rand(20,255);
						$txt = rand(0,6);
						echo "<span class='marquee' style='style=height:5vw;width:5vw;top:$hgt%;animation: marquee_d1 ".$time."s linear infinite;-webkit-animation: marquee_d1 ".$time."s linear infinite;color: rgba(20,$col,20,1);'> $text[$txt] </span>";
					} 
				?>
				
			</div>
			<div class="lt_body_banner"><span class="lt_color_banner">LIFE</span>TEACHES</div>
			<div class="lt_body_phrase">PEOPLE HELPING PEOPLE</div>
		</div>
		
		<div class="lt_footer">
			<a href="https://www.twitter.com/LifeTeachesFndn" target="_blank" class="fa fa-twitter header_link lt_float_right"></a>
			<a href="https://www.facebook.com/LifeTeachesFoundation" target="_blank" class="fa fa-facebook header_link lt_float_right"></a> 
			<span class="lt_float_left lt_footer_cpy">&copy;2016-2018 LifeTeaches</span>
		</div>
	
	</body>

</html>