<?
session_start();
include('helper_func.php');
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ComputerService</title>
<link href="<?=site_url()?>css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=site_url()?>js/jquery-3.2.1.min.js"></script>

<style type="text/css">

body {
	background-color: #FFFFFF;
	background-image: url(Image/images
%20(1).jpg);
	background-image: url(Image/white-wallpaper-18.jpg);
}
</style>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="<?=site_url()?>css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
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
  