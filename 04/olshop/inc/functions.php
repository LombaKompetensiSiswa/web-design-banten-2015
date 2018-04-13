<?php

function dbq($s){
	$q=mysql_query($s) or die (mysql_error().'<br/>'.$s);
	return $q;
}

function dbes($s){
	$es=mysql_real_escape_string($s);
	return ($es);
}

function dbfa($s){
	$fa=mysql_fetch_array($s);
	return ($fa);
}

function hsc($s){
	$hsc=htmlspecialchars($s);
	return ($hsc);
}

function pem($s){
	$e='<div class="error">'.($s).'</div>';
	return $e;
}
function display_error($s){

	$page='
<html>
<head><title>'.$title.'</title>
<link rel="stylesheet" type="text/css" href="css/style.css"></head>
<body>
'.$header.'
'.$menu.'<br>
<div class="body">'.$error.'
'.$contents.'
</div>
'.$footer.'
</body>
</html>';

return $error;
}

	




?>