<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>

<body style = "text-align:center">
	<div id="content">
	<h1>Student List</h1>
<?php

	if (isset($_GET['editcou']))
		$id=$_GET['editcou'];
	require_once "../scripts/database_connection.php";
?>


	<table border = "0">
	<tr>
	<td>
	<p>Students in this class:</p>
	<form action="prof_course_stu_del.php?editcou=<?php echo $id;?>" method="post">
		<select size="10" name="del[]" multiple>
<?php
	if(isset($_GET['editcou'])){
    		$sql = "SELECT S.sid,S.name from student S,take T where S.sid = T.sid and T.cid='$id';";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			echo "<option>".$row['sid']." ".$row['name'];
  		  }
	}
?>
	</select>
	<input type = "submit" value = ">>">
	</form>
	</td>
	<td>
	<p>Students out of this class:</p>
		<select size="10" name="add[]" multiple>
<?php
	if(isset($_GET['editcou'])){
		$sql = " SELECT SS.sid,SS.name from student SS where 0 = 
			(SELECT count(*) from student S,take T where S.sid = T.sid and T.cid='{$id}' and S.sid = SS.sid) ";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			echo "<option>".$row['sid']."   ".$row['name'];
  		  }
	}
?>
		</select>
	</td></tr>
	</table>
			
	</div>
</body>
</html>
