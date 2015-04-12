<?php



function operacionSQL($aux)
{
	$link=mysql_connect ("localhost","root","123456") or die ('I cannot connect to the database because: ' . mysql_error());
	mysql_select_db("VitorTraffic");	
	$query=mysql_query($aux,$link);
	
	//mysql_close($link);
	
	
	if (!($query))
	{
		echo $error=mysql_error();
		echo "<br><br>";
		//mysql_query("INSERT INTO errormysql VALUES ('".$aux."','".$error."')",$link);
		mysql_close($link);
	}
	else
	{
		mysql_close($link);
		return $query;	
	}
}



?>
