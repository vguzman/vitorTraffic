<?
	include "lib/clases.php";
	$contenido=$_POST['contenido'];
	$uri=$_POST['uri'];
	
	$lineas=explode("|",$contenido);
	
	for ($i=0;$i<count($lineas);$i++)
	{
		echo $lineas[$i]."<br>";
	}

	operacionSQL("INSERT INTO Reporte VALUES (null,".$uri.",NOW(),'".trim($contenido)."','PE')");

?>