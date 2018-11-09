<?php
session_start();

if( !isset( $_SESSION['is_logged_in'] ) || empty( $_SESSION[
'is_logged_in'] ) ) {
	header('Location: login.php');
}

include_once('config.php');
include_once('functions/common_functions.php');


//print_r($_REQUEST);

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
	<form name="frm" method="post" action="">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <?php if($_REQUEST['y'] == "success"){?>
	  <tr>
        <td colspan="4"><span class="red_message">Items has been updated.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['y'] == "failed"){?>
	  <tr>
        <td colspan="4"><span class="green_message">Items update failed.</span></td>
      </tr>
	  <?php }?>
	   <?php if($_REQUEST['yd'] == "success"){?>
	  <tr>
        <td colspan="4"><span class="red_message">Items has been deleted.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['yd'] == "failed"){?>
	  <tr>
        <td colspan="4"><span class="green_message">Items delete failed.</span></td>
      </tr>
	  <?php }?>
	  <tr>
        <td colspan="2"><strong>Items</strong></td>
        </tr>
      <tr>
        <td width="50%">Select Category</td>
        <td width="50%">
		<select name="category_id" onchange="document.frm.submit()">
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
        </select>        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
		<?php
		if ($_REQUEST["category_id"])
		{  
			$sql = "SELECT * FROM items WHERE  category_id = " . $_REQUEST["category_id"];
			//echo $sql;
			$result = mysql_query($sql, $con);
			if($result && (mysql_num_rows($result) > 0) ) {
			?>
			<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<th width="10%">ID</th>
				<th width="50%">Items</th>
				<th colspan="2">Action</th>
				</tr>
			<?php
				$count = 1;
				while($data = mysql_fetch_array($result)) {
				?>
				  <tr>
					<td align="center"><?=$count++?></td>
					<td><A href="item_details.php?item_id=<?=$data["item_id"]?>"><?=$data["item_name"]?></A></td>
					<td width="20%" align="center"><a href="items_edit.php?item_id=<?=$data["item_id"]?>">Edit</a></td>
					<td width="20%" align="center"><a href="items_delete.php?item_id=<?=$data["item_id"]?>&category_id=<?=$data["category_id"]?>" onclick="return window.confirm('Are you sure to delete this item?')">Delete</a></td>
				  </tr>
				<?php
				}
				?>
				 </table>
				<?php
			}
			else 
			{
			?>
			<p align="center">No Product Found in this catagory</p>
			<?php
			}
		}
		else 
		{
		?>
		<p align="center">Select catagory first</p>
		<?php
		}
		?>
		</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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

