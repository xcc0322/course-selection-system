
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="drop.php">
	cid : <input type="text" name="cid" /> <br>
	<input type="submit" name="button" value="submit" />
</form>

<?php
require_once "database_connection.php";
$ID = $_SESSION['id'];
$sql = "SELECT cid FROM pretake where sid= '$ID' ";
$result = mysql_query($sql);

//echo "<script>alert(\"{$ID}\");</script>";

echo "My course : <br>";
echo "<table border=1>";
echo "<tr><td>cid</td><td>pid</td><td>year</td><td>course</td><td>credit</td>";
echo "<td>type</td>";
echo "<td>size_limit</td><td>class_time</td><td>classroom</td>";
echo "<td>department_id</td><td>grade</td></tr>";

while($row = mysql_fetch_array($result)) { 
	$sql2 = "SELECT * FROM course where cid='$row[0]' ";
	$result2 = mysql_query($sql2);
  	$total_fields = mysql_num_fields($result2);
	while ($rows = mysql_fetch_array($result2)) {
     		echo "<tr>";
     		for ($i = 0; $i < $total_fields; $i++)
        	echo "<td>".$rows[$i]."</td>";
     		echo "</tr>";
   	}
                                            
}
echo "</table><hr>";
?>

<form name="form">
<a href="login_stu.php">back</a>
</form>
