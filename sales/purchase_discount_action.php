<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'UPDATE `purchase_mst` SET `discount_percentage` = "' . $_REQUEST['discount_percentage'] . '", `discount_amount` = "' . $_REQUEST['discount_amount'] . '" WHERE `purchase_id` = ' . $_REQUEST['purchase_id'];

$con = connect_db();
$result = mysql_query($sql, $con);

if($result) {
	$purchase_id = mysql_insert_id($con);
	header('location: purchase_details_add.php?purchase_id=' . $_REQUEST['purchase_id']);
}
else {
	header('location: purchase_details_add.php?y=failed&purchase_id=' . $_REQUEST['purchase_id']);
}


?>