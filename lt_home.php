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
		<!--Social media stylesheet from font-awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/lt_js_data.js"></script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>

	</head>

	<body onload="startup();">
			
		<div class="lt_header">
			<a href="lt_home.php" class="header_link"><div class="lt_header_logo lt_float_left"></div></a>
			<a href="lt_home.php" class="header_link"><span class="lt_header_btn lt_float_left">HOME</span></a>
			<a href="lt_news.php" class="header_link"><span class="lt_header_btn lt_float_left">NEWS</span></a>
			<a href="lt_donate.php" class="header_link"><span class="lt_header_btn lt_float_left">DONATE</span></a>
			<a href="lt_contact.php" class="header_link"><span class="lt_header_btn lt_float_left">CONTACT</span></a>
			<a href="lt_log_in.php" class="header_link"><span class="lt_header_btn lt_float_right">LOGIN</span></a>	
			<!--a href="lt_contact.php" class="header_link"><span class="lt_header_client lt_float_right"></span></a-->
		</div>
		
		<div id="foo" class="lt_body lt_body_back">
			<div id="lt_body_slide_001" class="lt_body_item" style="opacity: 1;">	
				<div class="lt_body_banner"><span class="lt_color_head_blue">Life</span>Teaches</div>
				<div class="lt_body_phrase">PEOPLE HELPING PEOPLE HELP MORE PEOPLE</div>		
			</div>
			<div id="lt_body_slide_002" class="lt_body_item">	
				<div class="lt_body_phrase"><em>"Created to empower and restore hope and faith in humanity in the spirit of people helping people to solve all the world's problems. One problem at a time, one person at a time."</em></div>		
			</div>
			<div id="lt_body_slide_003" class="lt_body_item" onmouseenter="timer.stop()" onmouseleave="timer.start()">	
				<div class="lt_body_data">
					Money provides options, but PEOPLE are our most valuable resource.<br>
					Fun to say, but it's who we are and what we do.<br>
					We at <span class="lt_color_head_blue">Life</span><span class="lt_color_head_yellow">Teaches</span> are:<br>
					PEOPLE..HELPING PEOPLE..HELP MORE PEOPLE<br><br>
					Help us by donating:
					<ul class="lt_body_data_list">
					<li><a href="lt_contact.php" class="list_link">Time</a></li>
					<li><a href="lt_donate.php" class="list_link">Money</a></li>
					<li><a href="lt_contact.php" class="list_link">Product or Services</a></li>
					<li><a href="lt_contact.php" class="list_link">Skills</a></li>
					</ul>
					<br>
					Tell us what you want to offer. We will respond to coordinate with you on how to best utilize your donation(s). We want you to know how your donations benefit those who need it and how they make a difference. You should know the difference you are making in someone's life and how we, at Life Teaches, will benefit from knowing you.
				</div>		
			</div>
			<div class="lt_body_slide_box">
				<span id="lt_body_slide_btn_001" class="lt_body_slide_control" onclick="change_index(-1)">&#8593;</span>
				<span id="lt_body_slide_btn_002" class="lt_body_slide_control lt_body_slide_active" onclick="change_slide(0)"></span>
				<span id="lt_body_slide_btn_003" class="lt_body_slide_control" onclick="change_slide(1)"></span>
				<span id="lt_body_slide_btn_004" class="lt_body_slide_control" onclick="change_slide(2)"></span>
				<span id="lt_body_slide_btn_005" class="lt_body_slide_control" onclick="change_index(1)">&#8595;</span>
			</div>
		</div>
		
		<div class="lt_footer">
			<a href="https://www.twitter.com/LifeTeachesFndn" target="_blank" class="fa fa-twitter header_link lt_float_right"></a>
			<a href="https://www.facebook.com/LifeTeachesFoundation" target="_blank" class="fa fa-facebook header_link lt_float_right"></a> 
			<span class="lt_float_left lt_footer_cpy">&copy;2016-2018 LifeTeaches</span>
		</div>
	
	</body>

</html>