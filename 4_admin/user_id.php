<?php
	require_once "../scripts/database_connection.php";
	$str = $_REQUEST['del'];
	$newpw = $_REQUEST['newpw'];
	$id = substr($str, 0, strpos($str, " "));
	echo $id;
	if(foo($id, 2)) {
		$row = mysql_fetch_array(mysql_query("select count(*) from admin"));
		if ($row[0] == 1) back("Caution: the last administrator!!");
		else
		mysql_query("DELETE FROM admin WHERE aid='$id';"); 
	}
	else {
		if(foo($id, 0)) $res = mysql_query("Select password FROM student WHERE sid='$id';"); 
		else if(foo($id, 1)) $res = mysql_query("Select password FROM professor WHERE pid='$id';");
		$row = mysql_fetch_array($res);
		$pw = $row['password'];
		$res = mysql_query("INSERT INTO admin(aid,password) values('$id','$pw');");
		if ($res ===false) echo"???";
	}	
	back("Success toggle the identity!");
?>
