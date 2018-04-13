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
    <td height="110" colspan="2" bgcolor="#FFFFFF"><a href="../member/add-member.php">Register Member</a> | <a href="add-toko.php">Register Toko</a> | <a href="login-toko.php">Login Ke Toko Anda</a> |</td>
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
    <td height="35" colspan="3" align="center" bgcolor="#FFFFFF"><strong>Registrasi Toko</strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="153" bgcolor="#FFFFFF">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td colspan="3" valign="top"><table width="731" height="153" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="center" valign="top"><form id="form3" name="form3" method="post" action="proses-add-toko.php">
          <table width="200" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="50"><label for="namatoko"></label>
                <input type="text" name="namatoko" id="namatoko" class="login" placeholder="Nama Toko Anda" /></td>
            </tr>
            <tr>
              <td height="47"><label for="namapemilik"></label>
                <input type="text" name="namapemilik" id="namapemilik" class="login" placeholder="Nama lengkap Anda" /></td>
            </tr>
            <tr>
              <td height="89"><label for="alamattoko"></label>
                <textarea name="alamattoko" id="alamattoko" cols="45" rows="5" placeholder="Alamat Toko Anda"></textarea></td>
            </tr>
            <tr>
              <td height="90"><label for="alamatpemilik"></label>
                <textarea name="alamatpemilik" id="alamatpemilik" cols="45" rows="5" placeholder="Alamat Anda"></textarea></td>
            </tr>
            <tr>
              <td height="49"><label for="email"></label>
                <input name="email" type="text" class="login" id="email" placeholder="Email Anda" /></td>
            </tr>
            <tr>
              <td height="50"><label for="idbarang">
                <input name="username" type="text" class="login" id="username" placeholder="Username" />
              </label></td>
            </tr>
            <tr>
              <td height="48"><label for="username">
                <input name="password" type="text" class="login" id="password"  placeholder="Password"/>
              </label></td>
            </tr>
            <tr>
              <td><label for="password"></label></td>
            </tr>
            <tr>
              <td><input type="submit" name="Daftar" id="Daftar" value="Daftar" /></td>
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