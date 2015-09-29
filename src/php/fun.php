<?php
// Contain functions that will be used repeatly to keep code clean
	
	// return database link: $link
	function get_db(){
		$link = mysql_connect('**************', '******************', '***************'); 
		if (!$link) { 
    		die('Connection Error: ' . mysql_error()); 
		} 

		mysql_select_db(***********); 

		return $link;
	}


?>
