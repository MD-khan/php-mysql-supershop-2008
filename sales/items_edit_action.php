<?php 
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');

$sql = 'UPDATE items SET item_name = "' . $_REQUEST['item_name'] . '", category_id = ' . $_REQUEST['category_id'] . ', mesure_unit = "' . $_REQUEST['mesure_unit'] . '", purchase_price = "' . $_REQUEST['purchase_price'] . '", mrp = "' . $_REQUEST['mrp'] . '" WHERE item_id = ' . $_REQUEST['item_id'];

//exit($sql);

$con = connect_db();
$result = mysql_query($sql, $con);
if($result) {
	header('Location: items.php?y=success&category_id='. $_REQUEST['category_id']);
}
else{
	header('Location: items.php?y=failed&category_id='. $_REQUEST['category_id']);
}


?>