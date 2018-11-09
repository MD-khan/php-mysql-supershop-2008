<?php
include_once('config.php');


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to <?=APP_TITLE?> :: Login</title>
<script src="js/common_functions.js" type="text/javascript"></script>
<link rel="stylesheet" href="style/style.css" type="text/css" />
</head>


<body onload="document.login_frm.user_id.focus()">
<form action="login_action.php" method="post" enctype="multipart/form-data" name="login_frm" onsubmit="return validate_login(this)">

<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center">Welcome to <?=APP_TITLE?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="50%">User Name:</td>
    <td width="50%"><input name="user_id" type="text" id="user_id" class="wide" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input name="pass" type="password" id="pass" class="wide" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnsubmit" type="submit" id="btnsubmit" value="Login" /></td>
  </tr>
</table>

</form>

</body>
</html>

