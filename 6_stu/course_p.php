
<!--�W��y�k���ҥ�session�A���y�k�n��b�����̫e��-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//�s����Ʈw
//�u�n�������W���Ψ�s��MySQL�N�ninclude��
	require_once "database_connection.php";


$ID=$_SESSION['id'];

//�N��Ʈw�̪��Ҧ��ҵ{�����ܦb�e���W
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



   // �����ܬd�ߵ��G


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
