<?php
	if (isset($_GET['editcou']))
	{$i=$_GET['editcou'];}
	echo "cid=".$i;
require_once "../scripts/database_connection.php";
	$sql = "select sid from take where cid = '$i';";
	$res = mysql_query($sql);
	while($row=mysql_fetch_array($res)) {
		$stu = $row[0];
		note($stu,$i,"Sorry, course $i has been deleted by the professor!");
	}
	$sql2 = "DELETE FROM course WHERE cid='$i';";
	$result = mysql_query($sql2);
	back ("Success deleted a course!");
?>



