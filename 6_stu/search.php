
<html><head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>search</title></head>
<body>

<form id="editcou_form" action='search1_finish.php' method='POST'>
<?php
require_once "../scripts/database_connection.php";
	echo "<table border='3'>";

	?>
		




</form>

course name: <input type="text" name="cname" /> <br>

		</td></tr>
		
		
		
		
		
<tr><td>Grade:</td>
		<td>
<?php
		$gradename = array("Fresh","sophomore","Junior","Senior","Graduate 1","Graduate 2");
		//echo $list3BB['grade'];
		for($i=0;$i<6;$i++) {
			echo "<input type=\"checkbox\" name=\"grade[]\" value=\"".$i."\" id=\"".$i."\"";
		//	if (($list3BB['grade'] & (1<<$i)) >0)
		//		echo "checked";
			echo"><label for=\"".$i."\">".$gradename[$i]."</label>";
		}

?>
		</td></tr>
		
		
		
		
		
		
		
		
		

		<tr><td>Department:</td>
		<td>

<?php

$sql = 'SELECT * from department';
		$result = mysql_query($sql);
  $i=0;
        while($row = mysql_fetch_array($result)) {
			
			echo "<input type=\"checkbox\" name=\"dept[]\" value=\"".$i."\" id=\"".$i."\"";
			echo"><label for=\"".$i."\">".$row[1]."</label>";
                 $i+=1;
    		}
		

?>










		
		<tr><td>Time:</td>
		<td>
		<table>

		<tr>
			<td></td>
			<?php
			for($i = 1; $i <6; $i++)
				echo "<td>".$i."</td>";
			?>
		</tr>

		<?php
			for($i = 0; $i <14; $i++) {
				echo "<tr><td>".chr(ord('A')+$i)."</td>";
				for ($j=0;$j<5;$j++) 
					echo"<td><input type=\"checkbox\" name=\"time[]\" value=\"".($i+$j*14)."\" id=\"".($i*14+$j)."\"></td>";
				echo "</td>";
			}
		?>

		</table>
		</td></tr>
		<tr>
		<td>Mode:</td><td><select name = "mode"><option value = "1" selected>1</option><option value = "2">2</option></select></td>
		</tr>


		</table>
		<input type='submit' name="search" value="search">
		
		</form>
		
<?php 
echo "</table>";
?>


</body></html>
