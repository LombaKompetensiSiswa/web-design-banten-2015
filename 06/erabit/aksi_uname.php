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

$colname_qqq = "-1";
if (isset($_GET['id'])) {
  $colname_qqq = $_GET['id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_qqq = sprintf("SELECT * FROM pengguna WHERE id = %s", GetSQLValueString($colname_qqq, "int"));
$qqq = mysql_query($query_qqq, $koneksi) or die(mysql_error());
$row_qqq = mysql_fetch_assoc($qqq);
$totalRows_qqq = mysql_num_rows($qqq);

mysql_free_result($qqq);

?>
<?php if ($totalRows_qqq == 1) {echo "Username sudah digunakan";}else{echo "Username tersedia";} ?>