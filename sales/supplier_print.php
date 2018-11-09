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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Welcome to <?=APP_TITLE?> :: Home</title>
<script src="js/common_functions.js" type="text/javascript"></script>
<link rel="stylesheet" href="style/style.css" type="text/css" />

</head>

<body>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><a href="#" onclick="window.print()">Print</a> | <a href="#" onclick="window.close()">Close</a></td>
  </tr>
</table>

<br />

<table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center">List of Supplier </td>
  </tr>
  <tr>
   <td>Sl.No </td>
    <td> Supplier Name </td>
    <td>Address </td>
	<td>Phone</td>
	<td>E-mail</td>
  </tr>
  <?php
 $sql = 'SELECT * FROM suppliers order by supplier_name';
  $con = connect_db();
  $result = mysql_query($sql, $con);
  $count=0;
  if( $result && (mysql_num_rows($result)  > 0) ){
  while($data = mysql_fetch_array($result)){
  $count+=1;
  ?>
  <tr>
    <td ><?=$count?></td>
    <td ><?=$data['supplier_name']?></td>
	 <td ><?=$data['address']?></td>
	  <td ><?=$data['phone']?></td>
	   <td ><?=$data['email']?></td>
  </tr>
  <?php
  }//end while
  }//end if
  
  ?>
</table>
</body>
</html>
