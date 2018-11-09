<?php
session_start();

include_once('config.php');
include_once('functions/common_functions.php');

if( validate_login($_REQUEST['user_id'], $_REQUEST['pass']) && login($_REQUEST['user_id'], $_REQUEST['pass']) ) {
		header('Location: index.php');
}
else {
	header('Location: login.php');
}

?>