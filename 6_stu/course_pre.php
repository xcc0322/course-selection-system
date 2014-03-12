<?php

require_once "../scripts/database_connection.php";

$ID = $_SESSION['id'];
$cid = $_POST['cid'];
$error_flag=0;




//echo "<script>alert(\"{$ID}\");</script>";
$sql2 = "SELECT C.class_time FROM pretake T,course C where T.cid = C.cid and T.sid='$ID' ";
$result2 = mysql_query($sql2);
$sql3 = "SELECT class_time, grade, did FROM course where cid = '$cid'";
$result3 = mysql_query($sql3);
$cr = mysql_fetch_array($result3);
$ctime=$cr[0];
$sql3 = "SELECT grade, did FROM student where sid = '$ID'";
$result3 = mysql_query($sql3);
$st = mysql_fetch_array($result3);
while ($rows = mysql_fetch_array($result2)) {
	if(conflict($rows[0],$ctime)) {
		$error_flag=1;
		break;
	}
}
if ($cr[2]!=$st['did'] ||($cr[1]&(1<<($st['grade']-1)))==0) $error_flag = 2;

if($error_flag==0){
	$sql3 = "insert into pretake(sid, cid) values('$ID', '$cid');";
        if(mysql_query($sql3)) back('Successfully choosed the course!');
        else back('Failure');
}
else if ($error_flag==2) back("Sorry, but you are not qualified.");
else  back('Course time conflict!');
?>
