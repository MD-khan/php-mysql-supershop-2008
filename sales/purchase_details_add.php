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

<link rel="stylesheet" href="style/style.css" type="text/css" />
</head>

<body onfocus="document.pd_frm.item_id.focus()">

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
  $sql = 'SELECT * FROM suppliers, purchase_mst where suppliers.supplier_id=purchase_mst.supplier_id
  AND purchase_id='.$_REQUEST['purchase_id'];
  $con = connect_db();
  $result = mysql_query($sql, $con);
  
  //if( $result && (mysql_num_rows($result)  > 0) ){
	$data = mysql_fetch_array($result);
  ?>
 	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><strong>Purchase Details</strong></td>
        </tr>
        
        <tr>
          <td >&nbsp;</td>
          <td align="right"><a href="purchase_details_print.php?purchase_id=<?=$_REQUEST['purchase_id']?>" target="_blank">Print Invoice</a></td>
        </tr>
        <tr>
		   <td>MRR No.</td>
          <td><?=$data['mrr_number']?></td>
	    </tr>
		  <tr>
		   <td>MRR Date</td>
          <td><?=$data['mrr_date']?></td>
		  </tr>
        <tr>
          <td >Invoice No.</td>
          <td ><?=$data['invoice_number']?></td>
	    </tr>
		   <tr>
		   <td >Invoice Date </td>
          <td ><?=$data['invoice_date']?></td>
		  </tr>
               <tr>
          <td>Supplier</td>
          <td width="52%"><?=$data['supplier_name']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
		  <form action="purchase_add_detl_action.php" method="post" enctype="multipart/form-data" name="pd_frm" >
		  <input name="purchase_id" type="hidden" id="purchase_id" value="<?=$_REQUEST['purchase_id']?>" />
		  <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center">Item</td>
              <td align="center">Purchse Price </td>
              <td align="center">MRP</td>
              <td align="center">Qty</td>
            </tr>
            <tr><?php
			  if($_REQUEST['item_id']) {
			  	$sql = 'SELECT * FROM items WHERE item_id = ' . $_REQUEST['item_id'];
				$result = mysql_query($sql, $con);
				
				if( $result && (mysql_num_rows($result)  > 0) ){
				$data = mysql_fetch_array($result);
				}
			  }
			  ?>
              <td>
			  <select name="item_id" id="item_id" onchange="submitItem(this)"  >
			 
			 		<option value="" >Select Item</option>
			<?php
				$sql = 'SELECT * FROM `items` ORDER BY item_name';
				//$con = connect_db();
				$result = mysql_query($sql, $con);
				if($result && (mysql_num_rows($result) > 0) ) {
					while($idata = mysql_fetch_array($result)) {
					?>
<option value="<?=$idata['item_id']?>" <?=($_REQUEST['item_id'] == $idata['item_id']) ? "selected" : ""?> ><?=$idata['item_name']?></option>
					<?php
					}
				}
			?>
        </select></td>
		  
              <td><input name="purchase_price" type="text" id="purchase_price" value="<?=$data['purchase_price']?>" class="right_align" /></td>
              <td><input name="mrp" type="text" id="mrp" value="<?=$data['mrp']?>" class="right_align"/></td>
              <td><input name="quantity" type="text" id="quantity" class="right_align"  /></td>
			 
                  <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Add" /></td>
            </tr>
          </table>
		  </form>		  </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
		  <form name="discount_frm" action="purchase_discount_action.php" method="post">
		  <input name="purchase_id" type="hidden" id="purchase_id" value="<?=$_REQUEST['purchase_id']?>" />
		  <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center">Item</td>
              <td align="center">Purchse Price </td>
              <td align="center">MRP</td>
              <td align="center">Qty</td>
              <td align="center">Amount</td>
            </tr>
			<?php
			$sql = 'SELECT items.item_name, purchase_details.purchase_price, purchase_details.mrp, purchase_details.quantity, purchase_details.purchase_price * purchase_details.quantity as amt FROM items, purchase_details where 
				purchase_details.item_id=items.item_id 
			AND purchase_details.purchase_id = '.$_REQUEST['purchase_id'];
			//exit($sql);
	  			
  				$result = mysql_query($sql, $con);
				if($result && (mysql_num_rows($result) > 0) ) {
				$total = 0;
				while($pddata = mysql_fetch_array($result)) {
					?>
			    <tr>
              <td ><?=$pddata['item_name']?></td>
              <td class="right_align"><?=$pddata['purchase_price']?></td>
              <td class="right_align"><?=$pddata['mrp']?></td>
              <td class="right_align"><?=$pddata['quantity']?></td>
              <td class="right_align"><?=$pddata['amt']?></td>
            
			<?php
			$total += $pddata['amt'];
			}
			}
			?>
			</tr>
			    <tr>
			      <td colspan="4" class="right_align">Total</td>
			      <td class="right_align"><?=number_format($total, 2, '.', ',');?></td>
		      </tr>
			  <script language="javascript">
					  var total = <?=$total?>;

					  function setAmount(v) {
					  	var per = total * parseFloat(v.value) / 100;
					  	document.discount_frm.discount_amount.value = parseFloat(per);
					  }
					  function setPercentage(v) {
					  	var amount = 0;
					  }
				  </script>
			    <tr>
			      <td colspan="4" class="right_align">Discount in Percentage</td>
			      <td class="right_align"><input name="discount_percentage" type="text" id="discount_percentage" size="10" class="right_align" value="<?=$data['discount_percentage']?>" onblur="setAmount(this)" />
			        %</td>
		      </tr>
			    <tr>
			      <td colspan="4" class="right_align">Discount amount</td>
			      <td class="right_align"><input name="discount_amount" type="text" id="discount_amount" size="10" class="right_align" value="<?=$data['discount_amount']?>" onblur="setPercentage(this)" />
			        Tk</td>
		      </tr>
			    <tr>
			      <td colspan="4" class="right_align">Net  </td>
			      <td class="right_align">
				  <?php
				  	$discount = $total * $data['discount_percentage'] / 100;
					$net = $total - $discount;
					$net = $net - $data['discount_amount'];
					echo( number_format($net, 2, '.', ','));
				  ?>				  </td>
		        </tr>
			    <tr>
			      <td colspan="4" class="right_align">&nbsp;</td>
			      <td class="right_align"><input name="btnsave" type="submit" id="btnsave" value="Save" /></td>
		        </tr>
          </table>
			</form>		  </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td></tr>
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

