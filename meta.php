<?
session_start();
include('helper_func.php');
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ComputerService</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(Image/white-wallpaper-18.jpg);
}
</style>



<body topmargin="0" >
<script language="javascript">
function fncSubmit()
{
	if(document.form1.txtUsername.value == "")
	{
		alert('กรุณากรอก "ชื่อผู้ใช้งาน"');
		document.form1.txtUsername.focus();
		return false;
	}	
	if(document.form1.txtPassword.value == "")
	{
		alert('กรุณากรอก "รหัสผ่าน"');
		document.form1.txtPassword.focus();		
		return false;
	}	
	document.form1.submit();
}
</script>
<div id="aaa">
<table width="841" border="0" align="center">
<tbody>
  <tr align="left" valign="top">
    <th height="189" colspan="3" scope="col"><img src="<?=site_url()?>Image/header2.jpg" width="999" height="187" alt=""/></th>
  </tr>