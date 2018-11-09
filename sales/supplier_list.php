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

<link rel="stylesheet" href="style/style.css" type="text/css" /></head>

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
    <td width="25%" valign="top"><?php include('common_files/supplier_submenu.php'); ?></td>
    <td valign="top">
	<form name="frm" method="post" action="">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <?php if($_REQUEST['ye'] == "success"){?>
	  <tr>
        <td colspan="4"><span class="red_message">Supplier has been updated.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['ye'] == "failed"){?>
	  <tr>
        <td colspan="4"><span class="green_message">Supplier update failed.</span></td>
      </tr>
	  <?php }?>
	   <?php if($_REQUEST['yd'] == "success"){?>
	  <tr>
        <td colspan="4"><span class="red_message">Supplier has been deleted.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['yd'] == "failed"){?>
	  <tr>
        <td colspan="4"><span class="green_message">Supplier delete failed.</span></td>
      </tr>
	  <?php }?>
	  <tr>
        <td colspan="2"><strong>Supplier</strong></td>
        </tr>
      <tr>
        <td width="50%">&nbsp;</td>
        <td width="50%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
		<?php
			$sql = 'SELECT * FROM suppliers order by supplier_name';
			$con=connect_db();
			//exit($sql);
			$result = mysql_query($sql, $con);
			if($result && (mysql_num_rows($result) > 0) ) {
			?>
			<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			  <th >Sl.No</th>
				<th >Supplier Name</th>
				<th >Address</th>
				<th >Phone</th>
				<th >E-mail</th>
				<th colspan="2"> Action</th>
				</tr>
			<?php
				$count = 1;
				while($data = mysql_fetch_array($result)) {
				?>
				  <tr>
					<td align="center"><?=$count++?></td>
					<td><?=$data["supplier_name"]?></td>
					<td><?=$data["address"]?></td>
					<td ><?=$data["phone"]?></td>
					<td ><?=$data["email"]?></td>
					<td align="center" ><a href="supplier_edit.php?supplier_id=<?=$data['supplier_id']?>">Edit</a></td>
					<td align="center" ><a href="supplier_delete.php?supplier_id=<?=$data['supplier_id']?>" onclick="return window.confirm('Are Your Sure You Want to Delete')">Delete</a></td>
				  </tr>
				<?php
				}
				}
				?>
	</table>
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
