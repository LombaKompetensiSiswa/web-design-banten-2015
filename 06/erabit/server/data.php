<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td colspan="5" align="center" bgcolor="#339999"><strong>DATA PENGGUNA</strong></td>
    </tr>
    <tr>
      <td width="3%" align="center" bgcolor="#339999"><strong>ID</strong></td>
      <td width="37%" align="center" bgcolor="#339999"><strong>Nama Lengkap</strong></td>
      <td width="20%" align="center" bgcolor="#339999"><strong>Alamat email</strong></td>
      <td width="20%" align="center" bgcolor="#339999"><strong>Level</strong></td>
      <td width="20%" align="center" bgcolor="#339999"><strong>Pilihan</strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_pengguna['id']; ?></td>
        <td><?php echo $row_pengguna['namadepan']; ?><?php echo $row_pengguna['namabelakang']; ?></td>
        <td><?php echo $row_pengguna['email']; ?></td>
        <td><?php echo $row_pengguna['level']; ?></td>
        <td align="center"><input type="button" name="button" id="button" value="Koreksi">
        <input type="button" name="button2" id="hapus" value="Hapus"></td>
      </tr>
      <?php } while ($row_pengguna = mysql_fetch_assoc($pengguna)); ?>
<tr>
      <td>&nbsp;</td>
      <td>Pertama - Terakhir</td>
      <td> Sebelumnya</td>
      <td>Selanjutnya</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($session);

mysql_free_result($pengguna);
?>