<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Online Reminder</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
        
        <!-- javascript sdk -->
        <div id="fb-root">
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            </div>

		<!-- Header -->
			<header id="header">
				<h1>Reminder</h1>
				<p>We just want to remind you in a simple way.</a>.</p>
			</header>

        <!-- Facebook Login Button -->
        <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false">
        	<?php
				session_start();
				require_once __DIR__ . '/src/Facebook/autoload.php';
				
				$fb = new Facebook\Facebook([
					'app_id'=>'170197639986455',
					'app_secret' => 'ea3943cf3bfcdcb29b380e0ead4bb46a',
					'default_graph_version' => 'v2.4',
				]);	
				
				$helper = $fb->getRedirectLoginHelper();
				
				$loginUrl = $helper -> getLoginUrl('http://www.reminber.com/login-callback.php');
				echo '<a class="btn btn-primary" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';	
			?>
        </div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>