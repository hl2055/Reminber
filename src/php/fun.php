<?php
// Contain functions that will be used repeatly to keep code clean
	
	// return database link: $link
	function get_db(){
		$link = mysql_connect('reminbercom.ipagemysql.com', 'reminberteam', 'reminberteam!23'); 
		if (!$link) { 
    		die('Connection Error: ' . mysql_error()); 
		} 

		mysql_select_db(reminber); 

		return $link;
	}


?>