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
<script src="js/PrintMoneyReceipt.js" type="text/javascript"></script>

<link rel="stylesheet" href="style/style.css" type="text/css" />
</head>

<body>

	<?php
  $sql = 'SELECT * FROM suppliers, purchase_mst where suppliers.supplier_id=purchase_mst.supplier_id
  AND purchase_id='.$_REQUEST['purchase_id'];
  $con = connect_db();
  $result = mysql_query($sql, $con);
  
 // if( $result && (mysql_num_rows($result)  > 0) ){
	//$data = mysql_fetch_array($result);
  ?>
<div id="invoice">
 	<table width="780" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><strong>Purchase Details</strong></td>
        </tr>
        
        <tr>
		   <td >MRR No.</td>
          <td ><?=$data['mrr_number']?></td>
	    </tr>
		  <tr>
		   <td >MRR Date</td>
          <td ><?=$data['mrr_date']?></td>
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
			    <tr>
			      <td colspan="4" class="right_align">Discount in Percentage</td>
			      <td class="right_align"><?=$data['discount_percentage']?> %</td>
		      </tr>
			    <tr>
			      <td colspan="4" class="right_align">Discount amount</td>
			      <td class="right_align"><?=$data['discount_amount']?> Tk.</td>
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
          </table>		  </td>
        </tr>
</table>
</div>

<br />
<table width="780" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td align="center"><input type="button" value="Print" onclick="printContent('invoice')" /> <a href="javascript:printContent('invoice')">Print</a></td>
	</tr>
</table>



</body>
</html>

