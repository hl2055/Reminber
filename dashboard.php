<html>
<head>
</head>
<body>
<?php

	session_start();

	if(!$_SESSION['fb_access_token']){
		header("Location: /index.php");
		exit();

	}
	
	echo "Bello~ ".$_SESSION['user_name'] ."</br>";
?>
<script src="src/angular/angular.js" type="text/javascript"></script>
<script src="assets/js/dControl.js" type="text/javascript"></script>
</body>
</html>
