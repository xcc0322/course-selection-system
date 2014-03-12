
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
	require_once "database_connection.php";

//將資料庫裡自己的課程資料顯示在畫面上
$result = mysql_query("select *   from take  where sid='$ID' ");
$row = mysql_fetch_row($result);

$result2 = mysql_query("select *   from course  where cid='$row[1]' ");


echo "所有課程資料如下：<br>";

while($row2 = mysql_fetch_row($result2))
    {
  echo "$row[0] - year : $row[1], " . 
 "course : $row[2], credit : $row[3],hours : $row[4],type: $row[5],size_limit :  $row[6],"
"class_time :  $row[7],  classroom :   $row[8],      department_id  : $row[9], grade : $row[10]"<br>";                                           
    }
?>

<form name="form">
<a href="login_stu.php">back</a>
</form>
