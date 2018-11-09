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
    <td width="25%" valign="top"><?php include('common_files/cat_submenu.php'); ?></td>
    <td valign="top">
	
<?php

$sql = 'SELECT * FROM categories WHERE category_id = ' . $_REQUEST['category_id'];

$con = connect_db();
$result = mysql_query($sql, $con);

// check result if no data found 
if($result && (mysql_num_rows($result) > 0) ) {
	$data = mysql_fetch_array($result);
?>
	<form name="add_cat" action="category_edit_action.php" method="post" onsubmit="return validate_category(this)">
	<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><strong>Edit Category </strong></td>
        </tr>
      <tr>
        <td width="50%">Category Name : </td>
        <td width="50%"><input name="category" type="text" id="category" size="40" value="<?=$data['category']?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;<input type="hidden" name="category_id" value="<?=$data['category_id']?>" /></td>
        <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Save" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	
	</form>
<?php
}
else {
	# this section will display when no data found or error has been ocured.
?>
<br />
<br />

<p align="center">No data found</p>

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

