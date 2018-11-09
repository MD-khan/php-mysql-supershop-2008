<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'INSERT INTO `purchase_mst` VALUES( NULL, ' . $_REQUEST['supplier_id'] . ', '.$_REQUEST['mrr_number'] .', "' . $_REQUEST['mrr_date'] . '", ' . $_REQUEST['invoice_number'] . ', "' . $_REQUEST['invoice_date'] . '") ';

$con = connect_db();
$result = mysql_query($sql, $con);
if($result) {
	$purchase_id = mysql_insert_id($con);
	header('location: purchase_details_add.php?purchase_id=' . $purchase_id);
}
else{
	header('location: purchase.php?y=failed');
}


?>