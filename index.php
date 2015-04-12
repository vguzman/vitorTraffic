<?
	include "lib/clases.php";
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?

	$query=operacionSQL("SELECT id FROM Reporte WHERE status='PE'");
	for ($i=0;$i<mysql_num_rows($query);$i++)
	{
	}

?>

</body>
</html>
