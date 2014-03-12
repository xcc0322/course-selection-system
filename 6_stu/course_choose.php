
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form name="form" method="post" action="course_pre.php">
cid : <input type="text" name="cid" /> <br>

<input type="submit" name="button" value="submit" />
</form>

<?php
require_once "database_connection.php";

$sql = "SELECT * FROM course";
$result = mysql_query($sql);

echo "all course : <br>";
$total_fields = mysql_num_fields($result);
echo "<table border=1>";
echo "<tr><td>cid</td><td>pid</td><td>year</td><td>course</td><td>credit</td>";
echo "<td>type</td>";
echo "<td>size_limit</td><td>class_time</td><td>classroom</td>";
echo "<td>department_id</td><td>grade</td></tr>";
while ($rows= mysql_fetch_array($result, MYSQL_NUM)) {
     echo "<tr>";
     for ($i = 0; $i < $total_fields; $i++)
        echo "<td>".$rows[$i]."</td>";
	echo "</tr>";
   }
   echo "</table><hr>";
?>

<form name="form">
<a href="login_stu.php">back</a>
</form>
