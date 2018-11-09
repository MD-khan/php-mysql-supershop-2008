<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'INSERT INTO `suppliers` VALUES( NULL,"' . $_REQUEST['supplier_name'] . '", "'.$_REQUEST['address'] .'", "' . $_REQUEST['phone'] . '", "' . $_REQUEST['email']. '") ';

$con = connect_db();
$result = mysql_query($sql, $con);
if($result) {
	
	header('location: supplier_add.php?y=success');
}
else{
	header('location: supplier_add.php?y=failed');
}


?>