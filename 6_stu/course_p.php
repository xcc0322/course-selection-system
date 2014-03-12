
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
	require_once "database_connection.php";


$ID=$_SESSION['id'];

//將資料庫裡的所有課程資料顯示在畫面上
$sql = "SELECT cid FROM take where sid= '$ID' ";
//$sql = "SELECT cid FROM take where sid= 201201 ";
$result = mysql_query($sql);


/////////////////////

echo "My course : <br>";
  echo "<table border=1>";
 echo "<tr><td>cid</td><td>pid</td><td>year</td><td>course</td><td>credit</td>";
echo "<td>type</td>";
echo "<td>size_limit</td><td>class_time</td><td>classroom</td>";
echo "<td>department_id</td><td>grade</td></tr>";
////////////////////////////
while($row = mysql_fetch_array($result, MYSQL_NUM)) 
  {


 $sql2 = "SELECT * FROM course where cid='$row[0]' ";
$result2 = mysql_query($sql2);

  $total_fields = mysql_num_fields($result2); 



   // 表格顯示查詢結果


   while ($rows = mysql_fetch_array($result2, MYSQL_NUM)) {
     echo "<tr>";
     for ($i = 0; $i < $total_fields; $i++)
        echo "<td>".$rows[$i]."</td>";
     echo "</tr>";
   }
   


                                           
 }
 

 


echo "</table><hr>";


 $sql = "SELECT class_time FROM take t ,course c  where sid= '$ID' and t.cid=c.cid";
$result = mysql_query($sql);
$hours = 0;
while ($rows = mysql_fetch_array($result)) {
	$hours+=count(trans_time($rows[0]));
}

 echo "My total hours : "; echo $hours; echo "<br>";

 /////////////////////////////////////////////////////////////////////

 
 $sql = "SELECT SUM(c.credit) FROM take t ,course c  where sid= '$ID' and t.cid=c.cid ";
 $result = mysql_query($sql);
 $rows = mysql_fetch_row($result);
 
  
echo "My total credit : "; echo $rows[0];echo "<br>";

 
 

?>

<form name="form">
<a href="login_stu.php">back</a>
</form>
