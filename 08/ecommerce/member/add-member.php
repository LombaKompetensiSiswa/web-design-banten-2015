<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Commerce</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
<style type="text/css">
a:link {
	text-decoration: none;
	color: #333;
}
a:visited {
	text-decoration: none;
	color: #333;
}
a:hover {
	text-decoration: underline;
	color: #000;
}
a:active {
	text-decoration: none;
	color: #000;
}
</style>
</head>

<body bgcolor="#F4F4F4">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="body">
  <tr>
    <td width="7" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="251" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="303" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" align="right" bgcolor="#FFFFFF" ><?php date_default_timezone_set("Asia/jakarta");
	('d-m-y');
		?></td>
    <td width="11" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="110" bgcolor="#FFFFFF">&nbsp;</td>
    <td height="110" colspan="2" valign="top" bgcolor="#FFFFFF"><img src="../bahan/logo.jpg" width="454" height="110" /></td>
    <td height="110" colspan="2" bgcolor="#FFFFFF"><a href="add-member.php">Register Member</a> | <a href="../toko/add-toko.php">Register Toko</a> | <a href="../toko/login-toko.php">Login Ke Toko Anda</a> |</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="35" colspan="2" id="menu">|<span class="link"> <a href="../index.php" class="link">Beranda </a></span>| <a href="../kategori.php" class="link">Kategori</a> | <a href="../pb.php" class="link">Produk Baru</a> |<a href="../pu.php" class="link"> Produk Unggulan</a> |<a href="../tk.php" class="link"> tantang Kami</a> |</td>
    <td width="28" align="right" bgcolor="#3EADE0">&nbsp;</td>
    <td width="400" bgcolor="#3EADE0"><form id="form1" name="form1" method="post" action="">
      <label for="cari"></label>
      <input type="text" name="cari" id="cari" placeholder="Cari Barang Anda Disini" class="lgcari" />
      <input name="cari2" type="submit" class="btncari" id="cari2" value="Cari" />
    </form></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="35" align="center" bgcolor="#FFFFFF"><strong>Login Member</strong></td>
    <td height="35" colspan="3" align="center" bgcolor="#FFFFFF"><strong>Produk Kami</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="153" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top"><table width="731" height="153" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" valign="top"><form id="form3" name="form3" method="post" action="proses-add-member.php">
          <table width="267" height="385" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="47"><label for="nama"></label>
                <input name="nama" type="text" class="login" id="nama"  placeholder="Isikan Nama Anda"  /></td>
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
                <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Isikan Alamat Anda" ></textarea></td>
            </tr>
            <tr>
              <td height="46"><label for="tlp"></label>
                <input name="tlp" type="text" class="login" id="tlp"  placeholder="Isikan No Tlp/HP" /></td>
            </tr>
            <tr>
              <td height="50"><label for="email"></label>
                <input name="email" type="text" class="login" id="email" placeholder="Isikan Email" /></td>
            </tr>
            <tr>
              <td height="47"><label for="username2"></label>
                <input name="username" type="text" class="login" id="username2" placeholder="User Name" /></td>
            </tr>
            <tr>
              <td height="48"><label for="password2"></label>
                <input name="password" type="text" class="login" id="password2" placeholder="Password" /></td>
            </tr>
            <tr>
              <td><input type="submit" name="daftar" id="daftar" value="Daftar" /></td>
            </tr>
          </table>
        </form></td>
        </tr>
    </table></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td height="60" colspan="4" valign="top" bgcolor="#239E83"><font color="#FFFFFF">|Copyright &copy; 2015 privacy policy</font></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="4" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>