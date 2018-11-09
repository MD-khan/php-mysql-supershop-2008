<?php

function connect_db() {
	$con = mysql_connect(HOST_NAME, DB_USER, DB_PASS);
	if($con) {
		//select database
		mysql_select_db(DB_NAME, $con);
		return $con;
	}
	else {
		exit('Error: ' . mysql_error());
	}
}


function validate_login($user_id, $pass) {
	if( ($user_id == "") || (strlen($pass) < 3) ) {
		return false;
	}
	else if ($pass == "" || strlen($pass) < 5 ) {
		return false;
	}
	else {
		return true;
	}
}

function login($user_id, $pass) {
	$con = connect_db();
	
	$sql = 'SELECT * FROM users WHERE user_id = "' . $user_id . '" AND pass = MD5("' . $pass . '") ';
	$result = mysql_query($sql, $con);

	if($result) {
		if( mysql_num_rows($result) == 1 ) {
			$_SESSION['is_logged_in'] = 1;
			$_SESSION['user_id'] = $user_id;
			return true;
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
}



?>