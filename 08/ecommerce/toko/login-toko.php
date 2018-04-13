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
	background-color:#EFEFEF;
	height:300px;
}
#judul{
	background-color:#3eade0;
	font-size:16px;
	color:#FFF;
	height:40px;
	width:240px;
	border-top-right-radius:5px;
	border-top-left-radius:5px;
	text-align:center;
	
}
.login{
	height:40px;
	width:225px;
	border-radius:4px;
	padding-left:10px;
}

</style>
</head>

<body bgcolor="#EAEAEA">
<div id="utama">
	<div id="judul"> Halaman Login
    </div><form id="form" name="form" method="post" action="proses-login-toko.php">
    <div><label for="username"></label>
            <input name="username" type="text" class="login" id="username" placeholder="User Name" />
    </div>
    <div style="margin-top:10px" ><label for="password"></label>
            <input name="password" type="password" class="login" id="password" placeholder="password" />
    </div>
    <div style="margin-top:10px"><input type="submit" name="login" value="login" />
    </div>
    </form>
</div>
</body>
</html>