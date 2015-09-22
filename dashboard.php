<?php

	session_start();

	if(!$_SESSION['fb_access_token']){		
		header("Location: http://www.reminber.com/");
		exit();
	}
	
	
?>
<!DoctypeHTML>
<html>
<head>
</head>
<body>

<?php
echo "Bello~ ".$_SESSION['user_name'] ."</br>";
?>
<script src="src/angular/angular.js" type="text/javascript"></script>
<script src="assets/js/dControl.js" type="text/javascript"></script>
</body>
</html>
