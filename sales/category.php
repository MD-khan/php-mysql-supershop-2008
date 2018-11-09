<?php
include('config.php');
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
    <td width="25%" valign="top"><?php include('common_files/cat_submenu.php'); ?></td>
    <td valign="top">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
	
	<?php if($_REQUEST['y'] == "success"){?>
	  
	  
	  <tr>
        <td colspan="4"><span class="red_message">Category has been updated.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['y'] == "failed"){?>
	  <tr>
        <td colspan="4"><span class="green_message">Category update failed.</span></td>
      </tr>
	  <?php }?>
	  	<?php if($_REQUEST['z'] == "success"){?>
	  
	  
	  <tr>
        <td colspan="4"><span class="red_message">Category has been deleted.</span></td>
      </tr>
	  <?php }
	  if($_REQUEST['z'] == "failed"){?>
	  <tr>
        <td colspan="4"><span class="green_message">Category deletion failed.</span></td>
      </tr>
	  <?php }?>
      <tr>
        <td colspan="4">Category List</td>
        </tr>
<?php

$sql = 'SELECT * FROM `categories` ORDER BY category ';

$con = connect_db();
$result = mysql_query($sql, $con);

if($result && (mysql_num_rows($result) > 0) ) {
	while($data = mysql_fetch_array($result) ) {
?>
	  <tr>
        <td width="5%" align="center"><?=$data['category_id']?></td>
        <td width="55%"><?=$data['category']?></td>
        <td width="20%" align="center"><a href="category_edit.php?category_id=<?=$data['category_id']?>">Edit</a></td>
        <td width="20%" align="center"><a href="delete_cat.php?category_id=<?=$data['category_id']?>" onclick="return confirm_delete()">Delete</a></td>
      </tr>
<?php
	}
}
else {
?>
	  <tr>
        <td colspan="4">No data found.</td>
      </tr>
<?php
}

?>
    </table></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center"><?php include('common_files/footer.php'); ?></td>
  </tr>
</table>


</body>
</html>

