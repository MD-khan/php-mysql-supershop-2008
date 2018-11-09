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
    <td width="25%" valign="top"><?php include('common_files/purchase_submenu.php'); ?></td>
    <td valign="top">
	
	<form name="pur_frm" action="purchase_add_action.php" method="post">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><strong>Purchase</strong></td>
        </tr>
      <tr>
        <td width="25%">MRR No. </td>
        <td width="75%"><input name="mrr_number" type="text" id="mrr_number" /></td>
      </tr>
      <tr>
        <td>MRR Date</td>
        <td><input name="mrr_date" type="text" id="mrr_date" /> 
          YYYY-MM-DD </td>
      </tr>
      <tr>
        <td>Invoice No.</td>
        <td><input name="invoice_number" type="text" id="invoice_number" /></td>
      </tr>
      <tr>
        <td>Invoice Date </td>
        <td><input name="invoice_date" type="text" id="invoice_date" /> 
          YYYY-MM-DD </td>
      </tr>
      <tr>
        <td>Supplier</td>
        <td>
			<select name="supplier_id" id="supplier_id">
			<option value="">Select supplier</option>
			<?php
				$sql = 'SELECT * FROM `suppliers` ORDER BY supplier_name';
				$con = connect_db();
				$result = mysql_query($sql, $con);
				if($result && (mysql_num_rows($result) > 0) ) {
					while($data = mysql_fetch_array($result)) {
					?>
				<option value="<?=$data['supplier_id']?>" ><?=$data['supplier_name']?></option>
					<?php
					}
				}
			?>
        </select>
        </td>
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

