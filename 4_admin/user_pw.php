<?php
//signup_prof
	require_once "../scripts/database_connection.php";
	$str = $_REQUEST['del'];
	$newpw = $_REQUEST['newpw'];
	$table[0] = "student";
	$table[1] = "professor";
	$table[2] = "admin";
	$idname[0] = "sid";
	$idname[1] = "pid";
	$idname[2] = "aid";

	$id = substr($str, 0, strpos($str, " "));
	echo $id;
		for ($i=0; $i<3; $i++)
        	if(foo($id, $i)) 
			$res = mysql_query("UPDATE {$table[$i]} SET password = ENCODE('$newpw', 'godisagirl') WHERE {$idname[$i]}={$id};"); 
		if ($res===false) echo "???";
		else
	back("Success changed password!");
?>
