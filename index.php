<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link href="/src/bt/css/bootstrap.min.css" rel="stylesheet">
        
    <title>Online Reminder</title>
    </head>
    
    <body>
        <!-- example -->
        <form class="main">
            <div class="row">
                
                <div class="col-xs-12 col-sm-3"><p class="text-center">Centered Text</p></div>
                
            </div>
        
            <div class="row">
                
                <div class="col-xs-12 col-sm-6"><p class="text-center">Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.></div>
                
            </div>
            
            
            
            <div class="atom">
                <p id="title" class="text-center">Reminder</p>
            </div>
            <div class="atom">
                <p id="contents" class="text-center">Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.Don't forget to do.</p>
            </div>
            <div class="atom well center-block">
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
        </form>
    </body>
</html>
