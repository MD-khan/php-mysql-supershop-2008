<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql='INSERT INTO items VALUES (NULL, "' . $_REQUEST['item_name'] . '", "'.$_REQUEST['category_id'].'", "'.$_REQUEST['mesure_unit'].'", "'.$_REQUEST['purchase_price'].'", "'.$_REQUEST['mrp'].'")';

//exit($sql);

$con = connect_db();
$result = mysql_query($sql, $con);
if($result){
	header('location: add_items.php?category_id='.$_REQUEST['category_id'].'&y=success');
}
else{
	header('location: add_items.php?category_id='.$_REQUEST['category_id'].'&y=failed');
}


?>