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
	
	<form name="frm" action="items_add_action.php" method="post" onsubmit="return validate_item(this)">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
	<?php if($_REQUEST['y'] == "success"){?>
	  <tr>
        <td colspan="2"><span class="red_message">Item has been inserted.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['y'] == "failed"){?>
	  <tr>
        <td colspan="2"><span class="green_message">item insertion failed.</span></td>
      </tr>
	  <?php }?>
      <tr>
        <td colspan="2">Add Item </td>
        </tr>
      <tr>
        <td width="50%">Category</td>
        <td width="50%">
		<select name="category_id" id="category_id">
			<option value="">Select category</option>
			<?php
				$sql = 'SELECT * FROM `categories` ORDER BY category';
				$con = connect_db();
				$result = mysql_query($sql, $con);
				if($result && (mysql_num_rows($result) > 0) ) {
					while($data = mysql_fetch_array($result)) {
					?>
<option value="<?=$data['category_id']?>" <?=($_REQUEST['category_id'] == $data['category_id']) ? "selected" : ""?> ><?=$data['category']?></option>
					<?php
					}
				}
			?>
        </select>		</td>
      </tr>
      <tr>
        <td>Item</td>
        <td><input name="item_name" type="text" id="item_name" size="40" /></td>
      </tr>
      <tr>
        <td>Unit</td>
        <td><input name="mesure_unit" type="text" id="mesure_unit" /></td>
      </tr>
      <tr>
        <td>Purchase Price (TP) </td>
        <td><input name="purchase_price" type="text" id="purchase_price" class="right_align" /></td>
      </tr>
      <tr>
        <td>MRP</td>
        <td><input name="mrp" type="text" id="mrp" class="right_align" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Insert" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>
	<br />

	<?php
	if($_REQUEST['category_id']) {
		$sql = 'SELECT * FROM items WHERE category_id = ' . $_REQUEST['category_id'];
		$result = mysql_query($sql, $con);
		if($result && (mysql_num_rows($result) > 0) ) {
			
	?>
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <th width="40%">Item  </th>
            <th width="20%">Unit</th>
            <th width="20%">Purchase Price (TP) </th>
            <th width="20%">MRP</th>
          </tr>
		  <?php
		  while($data = mysql_fetch_array($result)) {
		  ?>
          <tr>
            <td><?=$data['item_name']?></td>
            <td><?=$data['mesure_unit']?></td>
            <td><?=$data['purchase_price']?></td>
            <td><?=$data['mrp']?></td>
          </tr>
		  <?php
		  }
		  ?>
      </table>
	  <?php
	  }
	  else {
	  	?>
		<p align="center">No item found in this category.</p>
		<p>
		  <?php
		}
	  }
	  ?>
    </p>
	<p>&nbsp;    </p></td>
  </tr>
  <tr>
<?php


// =======================
// Show guestbook entries
// =======================

// how many guestbook entries to show per page
$rowsPerPage = 2;

// by default we show first page
$pageNum = 1;

// if $_GET['page'] defined, use the value as page number
if(isset($_GET['page']))
{
	$pageNum = $_GET['page'];
}

// counting the offset ( where to start fetching the entries )
$offset = ($pageNum - 1) * $rowsPerPage;

// prepare the query string
		$sql = 'SELECT * FROM items'.
				'ORDER BY category_id DESC'.
				'LIMIT $offset, $rowsPerPage'.;

$con = connect_db();
// execute the query 
$result = mysql_query($sql,$con) or die('Error, query failed. ' . mysql_error());

// if the guestbook is empty show a message
if(mysql_num_rows($result) == 0)
{
?>
<p><br>
 <br>Item is empty </p>
<?php
}
else
{
	// get all guestbook entries
	while($row = mysql_fetch_array($result))
	{
		// list() is a convenient way of assign a list of variables
		// from an array values
		list($_REQUEST['item_name']) = $rows
		//list($id, $name, $email, $url, $message, $date) = $row;

		// change all HTML special characters,
		// to prevent some nasty code injection
		//$name    = htmlspecialchars($name);
		//$message = htmlspecialchars($message);		

		// convert newline characters ( \n OR \r OR both ) to HTML break tag ( <br> )
		//$message = nl2br($message);
?>
<table width="550" border="1" cellpadding="2" cellspacing="0">
 
 <tr> 
  <td colspan="2"> 
   <?=$data['item_name'];?>
    
   <?php
		}
?>
  </td>
 </tr>
  </tr>
  
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

