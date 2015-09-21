<?php
	session_start();
	require_once __DIR__ . '/src/Facebook/autoload.php';
	
	$fb = new Facebook\Facebook([
		'app_id'=>'170197639986455',
		'app_secret' => 'ea3943cf3bfcdcb29b380e0ead4bb46a',
		'default_graph_version' => 'v2.4',
	]);	
	
	var_dump($fb);
	
	$helper = $fb->getRedirectLoginHelper();
	
	$loginUrl = $helper -> getLoginUrl('http://reminder.com/login-callback.php');
	echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';	

?>