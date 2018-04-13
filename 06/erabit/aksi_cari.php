<?php if ($totalRows_pencarian > 0) { // Show if recordset not empty ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><?php echo $row_pencarian['namabarang']; ?></td>
    </tr>
  </table>
  <?php } // Show if recordset not empty ?>
<?php require_once('Connections/koneksi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_pencarian = "-1";
if (isset($_GET['cari'])) {
  $colname_pencarian = $_GET['cari'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_pencarian = sprintf("SELECT * FROM produk WHERE namabarang LIKE %s", GetSQLValueString("%" . $colname_pencarian . "%", "text"));
$pencarian = mysql_query($query_pencarian, $koneksi) or die(mysql_error());
$row_pencarian = mysql_fetch_assoc($pencarian);
$totalRows_pencarian = mysql_num_rows($pencarian);

mysql_free_result($pencarian);
?>
