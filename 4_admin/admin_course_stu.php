<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body style = "text-align:center">
	<div id="content">
	<h1>Student List</h1>
<?php

	require_once "../scripts/database_connection.php";
?>
			<table border = "0" align = "center">
				<td><td>
	<p>Students in this class:</p>
	<form action="admin_course_stu_del.php" method="post">
		<select size="10" name="del[]" multiple>
<?php
	if($_POST){
		$i = $_POST["crs"][0];
		$id = substr($i,0,strpos($i," "));
		$_SESSION['course_id'] = $id;
    		$sql = "SELECT S.sid,S.name,S.did from student S,take T where S.sid = T.sid and T.cid='{$id}';";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			echo "helloTT";
			echo "<option>".$row['sid']."   ".$row['name']."   ".$row['grade']."</option>";
  		  }
	}
?>
		</select>
				<input type = "submit" value = ">>"></input>
				</td>
				<td>
	</form>

	<p>Students out of this class:</p>
	<form action="admin_course_stu_add.php" method="post">
				<input type = "submit" value = "<<"></input>
		<select size="10" name="add[]" multiple>
<?php
	if($_POST){;
		$sql = " SELECT SS.sid,SS.name,SS.did from student SS where 0 = 
			(SELECT count(*) from student S,take T where S.sid = T.sid and T.cid='{$id}' and S.sid = SS.sid) ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			echo "<option>".$row['sid']."   ".$row['name']."   ".$row['grade']."</option>";
  		  }
	}
?>
		</select>
				</td></tr>
			
	</form>
	</div>
</body>
</html>
