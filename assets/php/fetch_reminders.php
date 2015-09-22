<?php

	session_start();
	require_once("../../src/php/fun.php");

	$link = get_db();
	$user_fb_id = $_SESSION['user_id'];

	$result = mysql_query("SELECT * FROM reminders WHERE user_id = '$user_fb_id'",$link);

	$arr = array();
	while($row = mysql_fetch_assoc($result)){
		$arr[] = $row;
	}

	// fix mysql problem, encoding array
	$resp = str_replace("\\/","/",$json_encode($arr));

	if(!$resp){
		echo "ERROR DUMP: Encoding Error!";
	}else{
		echo $resp;
	}

	mysql_close($link);
	exit();
	
?>