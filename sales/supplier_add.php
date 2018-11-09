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
	
	<form name="pur_frm" action="supplier_add_action.php" method="post">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
	<?php
	if($_REQUEST['y']=='success') {?>
	      <tr>
        <td colspan="2">Supplier Has Been Inserted</td>
        </tr>
		<?php }
		if($_REQUEST['y']=='failed') {?>
		<tr>
        <td colspan="2">Supplier Has Been Inserted Failed</td>
        </tr>
		<?php } ?>
		<tr>
        <td colspan="2">Supplier Information</td>
        </tr>
      <tr>
        <td width="25%"><label for="checkbox_row_2">Supplier name</label></td>
        <td width="75%"><input name="supplier_name" type="text" id="supplier_name" class="wide"/></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><input name="address" type="text" id="address"  class="wide"/></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td><input name="phone" type="text" id="phone"  class="wide"/></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input name="email" type="text" id="email"  class="wide"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Insert" /></td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

