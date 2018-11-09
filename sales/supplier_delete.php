<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'DELETE FROM  suppliers 
where supplier_id='.$_REQUEST['supplier_id'];
$con = connect_db();
$result = mysql_query($sql, $con);
if($result) {
	
	header('location:supplier_list.php?yd=success');
}
else{
	header('location: supplier_list.php?yd=failed');
}


?>