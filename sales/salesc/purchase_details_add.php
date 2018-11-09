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
<script language="javascript">

function submitItem(e) {
	if(e.value != "") {
		document.pd_frm.action = "";
		document.pd_frm.submit();
		return true;
	}
	else {
		return true;
	}
}

</script>

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
	
	<?php
  $sql = 'SELECT * FROM purchase_mst WHERE purchase_id = ' . $_REQUEST['purchase_id'];
  $con = connect_db();
  $result = mysql_query($sql, $con);
  
  if( $result && (mysql_num_rows($result)  > 0) ){
  	$data = mysql_fetch_array($result);
	?>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><strong>Purchase Details</strong></td>
        </tr>
        
        <tr>
          <td width="25%">MRR No.</td>
          <td width="75%"><?=$data['mrr_number']?></td>
        </tr>
        <tr>
          <td>MRR Date</td>
          <td><?=$data['mrr_date']?></td>
        </tr>
        <tr>
          <td>Invoice No.</td>
          <td><?=$data['invoice_number']?></td>
        </tr>
        <tr>
          <td>Invoice Date </td>
          <td><?=$data['invoice_date']?></td>
        </tr>
        <tr>
          <td>Supplier</td>
          <td><?=$data['supplier_id']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
		  <form action="purchage_details_add_action.php" name="pd_frm" method="post">
		  <input type="hidden" name="purchase_id" value="<?=$data['purchase_id']?>" />
		  <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td>Item</td>
              <td>Purchse Price </td>
              <td>MRP</td>
              <td>Qty</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><input name="item_id" type="text" id="item_id" size="10" value="<?=$_REQUEST['item_id']?>" onblur="submitItem(this)" /></td>
			  <?php
			  if($_REQUEST['item_id']) {
			  	$sql = 'SELECT * FROM items WHERE item_id = ' . $_REQUEST['item_id'];
				$result = mysql_query($sql, $con);
				
				if( $result && (mysql_num_rows($result)  > 0) ){
				$data = mysql_fetch_array($result);
				}
			  }
			  ?>
              <td><input name="purchase_price" type="text" id="purchase_price" size="10" value="<?=$data['purchase_price']?>" /></td>
              <td><input name="mrp" type="text" id="mrp" size="10" value="<?=$data['mrp']?>" /></td>
              <td><input name="quantity" type="text" id="quantity" size="10" /></td>
              <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Add" /></td>

            </tr>
          </table>
		  </form>
		  </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
		  
		  
		  <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td>Item</td>
              <td>Purchse Price </td>
              <td>MRP</td>
              <td>Qty</td>
              <td>Amount</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	
	<?
	
  }
  else {
  	?>
	
	<p align="center"></p>
	<?
  }
  
  ?>
	</td></tr>
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

