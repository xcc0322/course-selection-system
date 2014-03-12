<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>
<body style = "text-align:center">
	<div id="content">
	<h1>Course Management</h1>
<?php
	require_once "../scripts/database_connection.php";
	if($_POST && gettype($_POST["crs"])=='array'){
		foreach($_POST["crs"] as $i){
		$id = substr($i,0,strpos($i," "));
		$sql2 = "DELETE FROM course WHERE cid='$id';";
		$result = mysql_query($sql2);
    		}
	}
?>
	<form action="admin_course.php" method="post">
		<select size="10" name="crs[]" multiple>
		<?php

    			$sql = "SELECT * from course";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
				echo "<option>".$row['cid']."   ".$row['name']."   ".$row['year']."</option>";
  		  	}
		?>

		</select>
		</br>
		<input type="submit" value = "Delete the Course"></input>
		</br>
		<input type = "button" onClick = "this.form.action = 'admin_course_stu.php';this.form.submit()" value = "See the student list"></input>
	</form>

	
	</br></br>

	</form>
	</div>
</body>
</html>



