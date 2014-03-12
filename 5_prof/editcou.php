
<html><head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>Update Course Info</title></head>
<body>

<form id="editcou_form" action='updcou.php' method='POST'>
<?php
require_once "../scripts/database_connection.php";



	if (isset($_GET['editcou']))
	{$editcou=$_GET['editcou'];}

	$sqlBB="select * from course where cid='$editcou'";
	$sql2BB=mysql_query($sqlBB) or die(mysql_error());

	echo "<table border='3'>";
	while($list3BB=mysql_fetch_array($sql2BB))
	{
	?>
		<tr><td>CID:</td>
		<td>
		<input type="text" name="cid" value="<?php echo $list3BB['cid'];?>" readonly = true>
		</td></tr>
		<tr><td>PID:</td>
		<td>
		<input type="text" name="pid" value="<?php echo $list3BB['pid'];?>" readonly = true>
		</td></tr>
		<tr><td>Name:</td>
		<td>
		<input type="text" name="coursename" value="<?php echo $list3BB['name'];?>" >

		</td></tr>

		<tr><td>Department:</td>
		<td>


		<select name = "dept">
<?php

    		$sql = 'SELECT * from department';
		$result = mysql_query($sql);

		while($row = mysql_fetch_array($result)) {
			echo "<option value=\"".$row[0]."\"";
			if ($row[0] == $list3BB['did'])
				echo "selected";
			echo ">"."$row[1]"."</option>";
    		}

?>
    		</select>

		</td></tr>
		<tr><td>Required or not:</td>
		<td>
		<select name = "type">
			<option value='1'>Required</option>
			<option value='0'>Optional</option>
    		</select>
		</td></tr>



		</td></tr>
		<tr><td>year:</td>
		<td>
		<?php echo $list3BB['year'];?>
		</td></tr>

		<tr><td>Grade:</td>
		<td>
<?php
		$gradename = array("Fresh","sophomore","Junior","Senior","Graduate 1","Graduate 2");
		for($i=0;$i<6;$i++) {
			echo "<input type=\"checkbox\" name=\"grade[]\" value=\"".$i."\" id=\"".$i."\"";
			if (($list3BB['grade'] & (1<<$i)) >0)
				echo "checked";
			echo"><label for=\"".$i."\">".$gradename[$i]."</label>";
		}

?>
		</td></tr>


		<tr><td>Credit:</td>
		<td>
		<input type="text" name="coucredit" value="<?php echo $list3BB['credit'];?>" >
		</td></tr>
		<tr><td>Classroom:</td>
		<td>
		<input type="text" name="couplace" value="<?php echo $list3BB['classroom'];?>" >
		</td></tr>
		
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
			echo "Previous time :".$list3BB['class_time'];
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


		</table>
		<input type='submit' name="SUBMIT" value="update">
		
		</form>
		
<?php }
echo "</table>";
?>


</body></html>
