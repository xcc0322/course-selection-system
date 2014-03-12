

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	require_once "../scripts/database_connection.php";
$cid = $_POST['cid'];
$ID=$_SESSION['id'];
$sql3 = "delete from take WHERE cid='$cid' and sid ='$ID'; ";
if(mysql_query($sql3))
{
	echo 'Successfully dropped the course!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=course_p_pre.php>';
}
else
{
	echo 'Failure!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=course_p_pre.php>';
}
?>


