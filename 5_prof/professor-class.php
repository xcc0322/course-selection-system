
<html>
<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
		<title>professor-class</title>
</head>   
<body>
		
	<h1>Teacher-My Course</h1>
	<a href="insert_course.php">Insert a new course</a></br>
	<a href="update.php">Update personal info</a></br>
		<?php
		
		require_once "../scripts/database_connection.php";
		$username = $_SESSION['id'];
		$sql="select * from course where pid='$username'";
		$sql2=mysql_query($sql) or die(mysql_error());
		
		echo "<table border=3>";
		echo "<td>year</td><td>name</td>";
		
		$total_fields = mysql_num_fields($sql2);
		while($list3=mysql_fetch_array($sql2)){
		     echo "<tr>";
			     echo "<td>".$list3['year']."</td>";
			     echo "<td>".$list3['name']."</td>";
		?>
		
		<td><a href="prof_course_stu.php?editcou=<?php echo $list3['cid'];?>">Student List</a></td>
		<td><a href="editcou.php?editcou=<?php echo $list3['cid'];?>">Edit The Course</a></td>
		<td><a href="prof_del.php?editcou=<?php echo $list3['cid'];?>">Delete The Course</a></td></tr>
		
		<?php
		     echo "</tr>";
		}
		
		?>
		</table>
</body>
</html>
