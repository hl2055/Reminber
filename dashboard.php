<?php

	session_start();

	if(!$_SESSION['fb_access_token']){
		header("Location: /index.php");
		exit();

	}
	
	echo "Bello~ ".$_SESSION['user_name'] ."</br>";
?>