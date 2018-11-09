<?php
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to <?=APP_TITLE?> :: Home</title>
<script src="js/common_functions.js" type="text/javascript"></script>

<link rel="stylesheet" href="style/style.css" type="text/css" />
</head>

<body>

<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100" colspan="2" align="center"><?php include('common_files/header.php'); ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top">
      <?php include('common_files/top_menu.php'); ?>
    </td>
  </tr>
  
  
  <tr>
    <td width="25%" valign="top"><?php include('common_files/items_submenu.php'); ?></td>
    <td valign="top">     
	<?php 
	$sql="SELECT * FROM items, categories WHERE item_id=" . $_REQUEST["item_id"] . " and items.category_id = categories.category_id ";
	//exit ($sql);
	$con=connect_db();
	$result = mysql_query ($sql, $con);
	if ($result && mysql_num_rows ($result)>0){
	$data = mysql_fetch_array ($result);
	/*echo "<pre>";
	print_r ($data);
	echo "</pre>";*/
	
	?>
	 <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
        
        <tr>
          <td colspan="2"> Item details </td>
        </tr>
        <tr>
          <td width="50%">Category</td>
          <td width="50%"><?=$data["category"]?></td>
        </tr>
        <tr>
          <td>Item</td>
          <td><?=$data["item_name"]?></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td><?=$data["mesure_unit"]?></td>
        </tr>
        <tr>
          <td>Purchase Price (TP) </td>
          <td><?=$data["purchase_price"]?></td>
        </tr>
        <tr>
          <td>MRP</td>
          <td><?=$data["mrp"]?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php 
		}
		?>
		</table>
	  <br />
      
    
    </td></tr>
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

