<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<script language="javascript">

function calculate_price() {
	var total = 0;
	var price = document.frm.price.value;
	var qty = document.frm.qty.value;
	if(price != "" && qty != "") {
		total = price * qty;
	}
	document.frm.total.value = total;
}


function make_r() {
	document.frm.test.readOnly = "1";
}

function make_w() {
	document.frm.test.readOnly = "0";
}


function change_color() {
	if(document.frm.color.value.length < 3) {
		document.frm.color.style.background = "#FF0000";
	}
	else {
		document.frm.color.style.background = "#FFFFFF";
	}
}

</script>

<style>
.test {
	background-color:
}

</style>

</head>

<body>

<form name="frm" action="">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input name="price" type="text" id="price" onblur="calculate_price()" /></td>
  </tr>
  <tr>
    <td>Qty</td>
    <td><input name="qty" type="text" id="qty" onblur="calculate_price()" /></td>
  </tr>
  <tr>
    <td>Total</td>
    <td><input name="total" type="text" id="total" readonly="1" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="test" type="text" id="test" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="r" type="button" id="r" value="Make Readonly" onclick="make_r()" />
      <input name="w" type="button" id="r2" value="Make Writeable" onclick="make_w()" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="color" type="text" id="color" onblur="change_color()" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="color2" type="text" id="color2" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
