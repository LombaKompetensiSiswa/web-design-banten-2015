<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="navbar-full">
  <div id="navbar">
  	<div id="pull-left-nav">
    	<a href="../"><img src="../bahan/logo.png" /></a>
    </div>
    <div id="pull-right-nav">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="kategori.php">Kategori</a>      </li>
      <li><a href="terbaru.php">Terbaru</a></li>
      <li><a href="terbaik.php">Terbaik</a>      </li>
      <li><a href="login.php">Login</a></li>
    </ul>
    </div>
  </div>
</div>
<center>
<div id="">
  <div id="banner">
  	<embed src="../bahan/banner.swf" width="1024" height="340"/>
  </div>

  
</div>
<div id="produk">
	<table border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
    	<div>Form Login</div>
        <form  action="../proses/pro_login.php" method="post">
            <div><input type="text" name="username" required="required" placeholder="Username"/></div>
            <div><input type="password" name="password" required="required" placeholder="Password" /></div>
            <div><input type="submit" value="Login" name="login_member" /></div>
        </form>
    </td>
    <td><div style="border-left: 2px solid #333; border-right: 2px solid #333;height:200px; padding:3px;"></div></td>
    <td>
    	
    	<div>Form Daftar</div>
        <form  action="../proses/pro_daftar.php" method="post">
            <div><input type="text" name="username" required="required" placeholder="Username"/></div>
            <div><input type="password" name="password" required="required" placeholder="Password" /></div>
            <div><input type="text" name="name" required="required" placeholder="Nama Anda" /></div>
            <div><input type="submit" value="Daftar" name="daftar_member" /></div>
        </form>
    </td>
  </tr>
</table>

</div>
<div id="footer-full">
  <div id="footer-in">
    <div id="pull-left">Copyright &copy; 2015 Online.com. All Right Reserved</div>
    <div id="pull-right">Powered By Rano Muhamad</div>
  </div>
</div>
</center>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
