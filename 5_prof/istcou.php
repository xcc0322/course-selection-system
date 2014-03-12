<?php

require_once "../scripts/database_connection.php";


$id=$_SESSION['id'];
$name=$_POST['coursename'];

$cgrade = 0;	
if(gettype($_POST['grade'])=='array'){
    foreach($_POST['grade'] as $i){
        $cgrade += (1<< $i);
    }
}



$pid=$_POST['pid'];
$dept=$_POST['coudept'];
$year=$_POST['couyear'];
$limit=$_POST['maxstu'];
$type=$_POST['chooseyn'];
$credit=$_POST['coucredit'];
$classroom=$_POST['couplace'];
$time=$_POST['coutime'];
$hours=$_POST['hours'];


$sqlBB="select * from course   where pid='$pid'";
$sql2BB=mysql_query($sqlBB);
while($list3BB=mysql_fetch_array($sql2BB))
	if($year == $list3BB['year'] && conflict($time, $list3BB['class_time'])){
		back("Time confliction!");
		break;
	}

$sqlB = "select count(*) from course";
if(mysql_query($sqlB)==0) {
	$cid = 0;
}
else {
$sqlB = "select max(cid)+1 from course";
$sqlB2 = mysql_query($sqlB);
$listB = mysql_fetch_row($sqlB2);
$cid = $listB[0];
}

$sqla  = "insert into course (cid, pid, year, name, credit, type, size_limit, class_time, classroom, did, grade)values('$cid', '$pid', $year, '$name',$credit, '$type', $limit, '$time', '$classroom', '$dept',$cgrade);";

if(mysql_query($sqla)) {
	back ("Success added a course!");
}
else back ("Failure!");
?>

