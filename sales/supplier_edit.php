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

<link rel="stylesheet" href="style/style.css" type="text/css" /></head>

<body>

<table width="771" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100" colspan="2" align="center"><?php include('common_files/header.php'); ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top">
      <?php include('common_files/top_menu.php'); ?>
    </td>
  </tr>
  <tr>
    <td width="15%" valign="top"><?php include('common_files/supplier_submenu.php'); ?></td>
    <td valign="top">
	<?php
$sql = 'SELECT * FROM `suppliers` where supplier_id='.$_REQUEST['supplier_id'];
	$con = connect_db();
	$result = mysql_query($sql, $con);
	if($result && (mysql_num_rows($result) > 0) ) {
	$data = mysql_fetch_array($result);
	?>
	
	

	<form name="sup_edit_frm" action="supplier_edit_action.php" method="post">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
	
		<tr>
        <td colspan="2">Supplier </td>
        </tr>
      <tr>
        <td width="25%">Supplier name</td>
        <td width="75%"><input name="supplier_name" type="text" id="supplier_name" value="<?=$data['supplier_name']?>" class="wide"/></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><input name="address" type="text" id="address" value="<?=$data['address']?>" class="wide"/></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td><input name="phone" type="text" id="phone" value="<?=$data['phone']?>" class="wide"/></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input name="email" type="text" id="email" value="<?=$data['email']?>" class="wide"/></td>
      </tr>
	  <tr>
       <td><input name="supplier_id" type="hidden" id="supplier_id" value="<?=$data['supplier_id']?>" class="wide"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Save" /></td>
      </tr>
    </table>
	</form>
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

