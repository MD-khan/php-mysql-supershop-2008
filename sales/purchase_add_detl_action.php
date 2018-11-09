<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'INSERT INTO `purchase_details` VALUES( NULL,' .$_REQUEST['purchase_id'].','.$_REQUEST['item_id'] .',"' . $_REQUEST['purchase_price'] . '",'. $_REQUEST['mrp'] .', "' . $_REQUEST['quantity'] .'")';
//exit($sql);
$con = connect_db();
$result = mysql_query($sql, $con);
if($result) {
$purchase_id = $_REQUEST['purchase_id'];
//echo $purchase_id;
	header('location: purchase_details_add.php?purchase_id=' . $purchase_id);
}
else{
	header('location: purchase_details_add.php?y=failed');
}


?>