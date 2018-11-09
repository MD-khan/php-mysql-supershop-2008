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
	$sql = 'SELECT * FROM `items` WHERE item_id = ' . $_REQUEST['item_id'];
	//exit($sql);
	$con = connect_db();
	$result = mysql_query($sql, $con);
	if($result && (mysql_num_rows($result) > 0) ) {
		$data = mysql_fetch_array($result);
	
	?>
	
	<form name="frm" action="items_edit_action.php" method="post" onsubmit="return validate_item(this)">
	<input type="hidden" name="item_id" value="<?=$data['item_id']?>" />
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
	
      <tr>
        <td colspan="2">Edit Item </td>
        </tr>
      <tr>
        <td width="35%">Category</td>
        <td width="65%">
		<select name="category_id" id="category_id">
			<option value="">Select category</option>
			<?php
				$sql = 'SELECT * FROM `categories` ORDER BY category';
				$result = mysql_query($sql, $con);
				if($result && (mysql_num_rows($result) > 0) ) {
					while($cat_data = mysql_fetch_array($result)) {
					?>
<option value="<?=$cat_data['category_id']?>" <?=($data['category_id'] == $cat_data['category_id']) ? "selected" : ""?> ><?=$cat_data['category']?></option>
					<?php
					}
				}
			?>
        </select></td>
      </tr>
      <tr>
        <td>Item</td>
        <td><input name="item_name" type="text" id="item_name" class="wide" value="<?=$data['item_name']?>" /></td>
      </tr>
      <tr>
        <td>Unit</td>
        <td><input name="mesure_unit" type="text" id="mesure_unit" value="<?=$data['mesure_unit']?>" /></td>
      </tr>
      <tr>
        <td>Purchase Price (TP) </td>
        <td><input name="purchase_price" type="text" id="purchase_price" class="right_align"  value="<?=$data['purchase_price']?>" /></td>
      </tr>
      <tr>
        <td>MRP</td>
        <td><input name="mrp" type="text" id="mrp" class="right_align" value="<?=$data['mrp']?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Save" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>
	
	<?php
	}
	else {
	?>
	<br />
	<br />
	<br />
	<p align="center">No items found.</p>
	<br />
	<br />

	<?php
	}
	?>
	</td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

