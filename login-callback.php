<?php
session_start();
require_once __DIR__ . '/src/php/fun.php';
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

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);


$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

}

$str_accessToken = (string) $accessToken;

$_SESSION['fb_access_token'] = $str_accessToken;

try {
  	// Returns a `Facebook\FacebookResponse` object
  	$response = $fb->get('/me?fields=id,name', $str_accessToken);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
  	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
	}catch(Facebook\Exceptions\FacebookSDKException $e) {
  	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
}
$user = $response->getGraphUser();
$user_name = $user->getName();
$user_id = $user->getId();
$_SESSION['user_name'] = $user_name;
$_SESSION['user_id'] = $user_id;

//signup for user in database
$link = get_db();
$result = mysql_query("SELECT * FROM user WHERE fb_id = '$user_id'",$link);

if(mysql_num_rows($result) == 0){
	mysql_query("INSERT INTO user VALUE (NULL,'$user_id','$user_name')",$link);
}



header('Location: http://www.reminber.com/dashboard.php');
exit();

?>