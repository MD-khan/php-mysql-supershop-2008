<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'UPDATE suppliers 
SET supplier_name="'. $_REQUEST['supplier_name'] .'",
address="'.$_REQUEST['address'] .'",
phone="'.$_REQUEST['phone'] .'", 
email="' . $_REQUEST['email']. '"
where supplier_id='.$_REQUEST['supplier_id'];

$con = connect_db();
$result = mysql_query($sql, $con);
if($result) {
	
	header('location:supplier_list.php?ye=success');
}
else{
	header('location: supplier_list.php?ye=failed');
}


?>