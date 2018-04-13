<?php session_start();
if(!isset($_SESSION['member'])){
	?>
    <script type="text/javascript">
	alert("Anda Dilarang Mengakses Halaman ini, Silahkan Login Terlebih Dahulu");
	document.location.href="../index.php"
	</script>
    <?php
}else{
	include("../koneksi.php");
	$id=$_GET['id'];
	$q=mysql_query("select * from member where idmember='$id'");
	$data=mysql_fetch_array($q);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Commerce</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body bgcolor="#F4F4F4">
<table bgcolor="#3eade0" id="atas">
	<tr>
    	<td><font color="#FFFFFF">Selamat Datang <?php echo $_SESSION['username'];?> Anda Login Sebagai Member</font></td>
        <td><a href="logout.php" class="link">Logout
        </a></td>
    </tr>
</table>
<table width="772" height="525" border="0" align="center" cellpadding="0" cellspacing="0" id="body2">
  <tr>
    <td width="9" height="34" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="229" align="center"><strong>Menu Admin</strong></td>
    <td width="11">&nbsp;</td>
    <td width="338" align="center">Edit Akun</td>
    <td width="13" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="101" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="edit-member.php?id=<?php echo $data['idmember'];?>" class="box">Edit Akun</a></td>
        </tr>
      <tr>
        <td><a href="troly.php" class="box">Troly</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" valign="top"><form id="form3" name="form3" method="post" action="proses-edit-member.php">
          <table width="267" height="385" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="47"><label for="idmember"></label>
              <input type="hidden" name="idmember" id="idmember" value="<?php echo $data['idmember'];?>" /></td>
            </tr>
            <tr>
              <td height="47"><label for="nama"></label>
                <input name="nama" type="text" class="login" id="nama"  placeholder="Isikan Nama Anda" value="<?php echo $data['nama'];?>" /></td>
            </tr>
            <tr>
              <td><label for="jk"></label>
                <select name="jk" class="login" id="jk">
                <option value="0">Jenis Kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select></td>
            </tr>
            <tr>
              <td><label for="alamat"></label>
                <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Isikan Alamat Anda" ><?php echo $data['alamat'];?> </textarea></td>
            </tr>
            <tr>
              <td height="46"><label for="tlp"></label>
                <input name="tlp" type="text" class="login" id="tlp"  placeholder="Isikan No Tlp/HP" value="<?php echo $data['tlp'];?>"  /></td>
            </tr>
            <tr>
              <td height="50"><label for="email"></label>
                <input name="email" type="text" class="login" id="email" placeholder="Isikan Email" value="<?php echo $data['email'];?>"  /></td>
            </tr>
            <tr>
              <td height="47"><label for="username"></label>
                <input name="username" type="text" class="login" id="username" placeholder="User Name"  value="<?php echo $data['username'];?>" /></td>
            </tr>
            <tr>
              <td height="48"><label for="password"></label>
                <input name="password" type="text" class="login" id="password" placeholder="Password" value="<?php echo $data['password'];?>"  /></td>
            </tr>
            <tr>
              <td><input type="submit" name="daftar" id="daftar" value="Update" /></td>
            </tr>
          </table>
        </form></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="19" bgcolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="40" colspan="2" valign="top" bgcolor="#FFFFFF">Copyright &copy; 2015 privacy policy</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html><?php
}
?>