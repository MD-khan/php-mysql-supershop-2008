<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');


$sql = 'UPDATE categories SET category = "' . $_REQUEST['category'] . '" WHERE category_id = ' . $_REQUEST['category_id'];

#exit($sql);

$con = connect_db();
$result = mysql_query($sql, $con);
if($result){
	header('location: category.php?y=success');
}
else{
	header('location: category.php?y=failed');
}


?>