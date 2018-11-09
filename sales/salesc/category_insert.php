<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql='INSERT INTO categories VALUES (NULL, "' . $_REQUEST['category'] . '")';

$con = connect_db();
$result = mysql_query($sql, $con);
if($result){
	header('location: category_add.php?y=success');
}
else{
	header('location: category_add.php?y=failed');
}


?>