<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id'=>'170197639986455',
	'app_secret' => 'ea3943cf3bfcdcb29b380e0ead4bb46a',
	'default_graph_version' => 'v2.4',
	]);	

$helper = $fb -> getRedirectLoginHelper();
try{
	$accessToken = $helper -> getAccessToken();		
}catch(Facebook\Exceptions\FacebookResponseException $e) {  		
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {  		
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}
// 400 bad request
if (! isset($accessToken)) {
	if ($helper->getError()) {
		header('HTTP/1.0 401 Unauthorized');
		echo "Error: " . $helper->getError() . "\n";
		echo "Error Code: " . $helper->getErrorCode() . "\n";
		echo "Error Reason: " . $helper->getErrorReason() . "\n";
		echo "Error Description: " . $helper->getErrorDescription() . "\n";
	} else {
		header('HTTP/1.0 400 Bad Request');
		echo 'Bad request';
	}
	exit;
}	


var_dump($accessToken->getValue());


?>