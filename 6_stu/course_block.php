<?php

require_once "../scripts/database_connection.php";

$ID = $_SESSION['id'];
$cid = $_POST['cid'];
$error_flag=0;

$sql2 = "SELECT class_time FROM course where cid='$cid';";
$result2 = mysql_query($sql2);
$rows = mysql_fetch_array($result2);
$ctime = $rows[0];

$sql2 = "SELECT C.class_time FROM take T,course C where T.cid = C.cid and T.sid='$ID';";
$result2 = mysql_query($sql2);
while ($rows = mysql_fetch_array($result2)) {
	if(conflict($rows[0],$ctime)) {
		$error_flag=1;
		break;
	}
}

if($error_flag==0){
	$sql3 = "insert into take(sid, cid) values('$ID', '$cid');";
        if(mysql_query($sql3))
        {
                echo 'Successfully choosed the course!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=course_p_pre.php>';
        }
        else
        {
                echo 'Failure!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=course_p_pre.php>';
        }
}
else  {
                echo 'Course time conflict!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=login_stu.php>';
}
?>
