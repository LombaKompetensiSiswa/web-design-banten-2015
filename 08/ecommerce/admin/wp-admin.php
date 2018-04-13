<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Login</title>
<style type="text/css">
#utama{
	padding-top:200px;
	padding-left:500px;
	padding-right:40px;	
}
#body{ 
box-shadow:0px 0px 3px #000;
}
#judul{
	background-color:#3eade0;
	font-size:16px;
	color:#FFF;
	height:40px;
	width:220px;
	border-top-right-radius:5px;
	border-top-left-radius:5px;
	text-align:center;
	
}
.login{
	height:40px;
	width:240px;
	border-radius:4px;
	padding-left:10px;
}

</style>
</head>

<body bgcolor="#CCCCCC">
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="body">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="259" colspan="2" align="center"><form id="form1" name="form1" method="post" action="proses-login.php">
      <table width="250" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" id="judul">Login Admin</td>
        </tr>
        <tr>
          <td height="47"><label for="username"></label>
            <input name="username" type="text" class="login" id="username" placeholder="Username" /></td>
        </tr>
        <tr>
          <td height="45"><label for="password"></label>
            <input name="password" type="password" class="login" id="password" placeholder="Password" /></td>
          </tr>
        <tr>
          <td><input type="submit" name="login" id="login" value="Login" /></td>
          </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>