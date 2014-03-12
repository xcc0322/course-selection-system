<?php 

require_once "../scripts/database_connection.php";
?>
<html><head>
<meta http-equiv="content-type" content="text/
html;charset=utf-8">
<title>Update Course Info</title></head>
<body>
<?php
		$cid=$_POST['cid'];
		$coursename=$_POST['coursename'];
		$cougrade = 0;	
if(gettype($_POST['grade'])=='array'){
    foreach($_POST['grade'] as $i){
        $cougrade += (1<< $i);
    }
    echo $cougrade;
}
else $cougrade = (1<<6)-1;

		$coudept=$_POST['dept'];
		$yn=$_POST['type'];

if(gettype($_POST['time'])=='array'){
	$coutime = trans_back($_POST['time']);
}
else back("You didn't assign the time!");


		$pid=$_POST['pid'];
		$hours=$_POST['hours'];
		$coucredit=$_POST['coucredit'];
		$couplace=$_POST['couplace'];

		$sqlBB="select * from course   where pid='$pid' and cid!='$cid'";
		$sql2BB=mysql_query($sqlBB);
		while($list3BB=mysql_fetch_array($sql2BB)) 
			if(conflict($coutime,$list3BB['class_time'])) {
				Back ("Conflict");
				break;
		}
		
		$sqla = "update course set name = '$coursename', grade='$cougrade',did='$coudept',hours='$hours',
       		       	   type = $yn, classroom='$couplace',class_time='$coutime',credit = $coucredit,
        		 where cid = '$cid';
		";
		//
		//2013.5.13.22£º22
		//
		//
		$sqlBB="select * from take   where cid='$cid'";
		$info = "success";
		$sql2BB=mysql_query($sqlBB);
		while($list3BB=mysql_fetch_array($sql2BB)) {
		//	$stu = $list3BB['sid'];
		//	$sql = "select * from student where sid = '$sid';";
			$stu = $list3BB[0016996];
			$sql = "select * from student where sid = 0016996;";
			$res = mysql_query($sql);
			while($list=mysql_fetch_array($res)) {
				if (!($coutime & (1<<$list['grade']))) $info = "You are not in the right grade for Course $cid now!";
				if ($list['did']!=$coudept) $info = "You are not in the right department for Course $cid now!";
			}
			$sql = "select * from take where sid = '$sid' and cid!='$cid';";
			$res = mysql_query($sql);
			while($list=mysql_fetch_array($res)) {
				$mycid = $list['cid'];
				$temp = mysql_fetch_array(mysql_query("select class_time from course where cid = '$mycid'"));
				if ($coutime&&$temp) $info = "Course $cid conflicts with another course now!";
			}
			if ($info != "success") {note($stu,$cid,$info);}
		}
		if( mysql_query($sqla) )	back("success");
		else back("Failure");
?>
</body></html>
