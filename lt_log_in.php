<?php 
//Google Auth
session_start(); 
if (!is_writable(session_save_path())) {
    echo "Session path ".session_save_path()." is not writable for PHP!"; 
}
require_once ("vendor/autoload.php");
//Step 1: Enter you google account credentials
//AIzaSyDBNXiiJoKgaBbcM7jIjKCRSsgooEAtJ_w
$g_client = new Google_Client();
$g_client->setClientId("32130717978-rkpvcg6r8qsc14rk1hkkdkvfr5m91uj4.apps.googleusercontent.com");
$g_client->setClientSecret("fSSX51fi8vfIm7BYeJ1sILZD");
$g_client->setRedirectUri("http://www.lifeteaches.org/lt_log_in.php");
$g_client->setScopes("email");
//Step 2 : Create the url
$google_auth_url = $g_client->createAuthUrl();
//Step 3 : Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;
//Step 4: Get access token
if(isset($code)) {
    try {
        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $g_client->setAccessToken($token);
    }catch (Exception $e){
        echo $e->getMessage();
    }
    try {
        $pay_load = $g_client->verifyIdToken();
    }catch (Exception $e) {
        echo $e->getMessage();
    }
} else{
    $pay_load = null;
}
if(isset($pay_load)){ 
	$_SESSION['user'] = $pay_load['email'];
	$_SESSION['log'] = true;
    if(isset($_SESSION['user'])) {
		echo "<script type='text/javascript'> window.location.href = 'lt_home.php';</script>";
	}
}
?>

<?php
require_once ("src/Facebook/autoload.php");
$fb = new Facebook\Facebook([
  'app_id'                => '1902419030016719',
  'app_secret'            => '1958b60162bee9f34936f0c2cae0c888',
  'default_graph_version' => 'v2.1',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$facebook_auth_url = $helper->getLoginUrl('http://www.lifeteaches.org/lt_log_in_fb.php', $permissions);
?>

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
        <link rel="stylesheet" type="text/css" href="css/lt_css_login.css">
		<!--Social media stylesheet from font-awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/lt_js_data.js"></script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>

	</head>

	<body onload="startup();">
			
		<div class="lt_header_wrapper">	
			<div class="lt_header">
				<a href="lt_home.php" class="header_link"><div class="lt_header_logo lt_float_left"></div></a>
				<a href="lt_home.php" class="header_link"><span class="lt_header_btn lt_float_left">HOME</span></a>
				<a href="blog/lt_news.php" class="header_link"><span class="lt_header_btn lt_float_left">NEWS</span></a>
				<a href="lt_donate.php" class="header_link"><span class="lt_header_btn lt_float_left">DONATE</span></a>
				<a href="lt_contact.php" class="header_link"><span class="lt_header_btn lt_float_left">CONTACT</span></a>
				<a href="lt_log_in.php" class="header_link"><span class="lt_header_btn lt_float_right">LOGIN</span></a>	
			</div>
		</div>
		
		<div class="lt_body_wrapper">
			<div class="lt_body lt_body_back">
				<br><br><span class="lt_body_header">PLEASE LOG IN USING:</span>
				
						<a class='login' href="<?php echo $google_auth_url; ?>">				  
						<div id="lt_btn_log_google" class="lt_btn_menu"> 
							<span class="fa fa_login fa-google-plus"></span> 
							<span class="lt_btn_menu_log_in"> GOOGLE </span>
						</div>
						</a>
						
						<a class='login' href="<?php echo $facebook_auth_url; ?>">
						<div id="lt_btn_log_facebook" class="lt_btn_menu"> 
							<span class="fa fa_login fa-facebook"></span> 
							<span class="lt_btn_menu_log_in"> FACEBOOK </span>
						</div>
						</a>
						
				<span class="lt_body_header">OR SIGN UP:</span>						
						<!--a class='login' href="https://ots.sumacpages.com/sumac/sumac_start_new_session.php?package=signup2&userfolder=../ORG/lifeteachesfoundation"-->
						<a class='login' href="https://visitor.r20.constantcontact.com/d.jsp?llr=nwqs879ab&p=oi&m=1128397357773&sit=v858vbvlb&f=8bda1fc1-59be-497c-a271-70a5dc2fc9cc">
						<div class="lt_btn_menu"> 
							<span class="lt_btn_menu_sign"> SIGN UP </span>
						</div>
						</a>
			</div>
		</div>
		
		<div class="lt_footer_wrapper">
			<div class="lt_footer">
				<a href="https://www.twitter.com/LifeTeachesFndn" target="_blank" class="fa fa-twitter-square header_link lt_float_right"></a>
				<a href="https://www.facebook.com/LifeTeachesFoundation" target="_blank" class="fa fa-facebook-square header_link lt_float_right"></a> 
				<span class="lt_float_left lt_footer_cpy">&copy;2016-2018 LifeTeaches</span>
				<a href="https://www.guidestar.org/profile/81-4495036" target="_blank"><img src="https://widgets.guidestar.org/gximage2?o=9586471&l=v4" class="seal lt_float_left"/></a><a href="tutuwvbqfyybercu.html" style="display: none;" rel="file" id="rfqdvacxxtxfryafryuxrscfxqzqwvcx">xxyecayatrcaxdaufwvebdfeyuucc</a>
			</div>
		</div>
	
	</body>

</html>
				