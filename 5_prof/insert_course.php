<?php

require_once "../scripts/database_connection.php";
$pid=$_SESSION['id'];
?>
<html>
<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
		<title>Insert a course</title>
</head>   
<body>
<h1>Insert a course</h1>

<form id="editistcou_form" action='istcou.php' method='POST'>
<table border='3'>
<tr><td>Course Name:</td>
<td><input type="text" name="coursename" ></td></tr>

<tr><td>PID:</td>
<td><input type="text" name="pid" value="<?php echo "$pid";?>" readonly=true></td></tr>


<tr><td>Department:</td>
<td><input type="text" name="coudept" ></td></tr>


<tr><td>Year:</td>
<td><input type="text" name="couyear" ></td></tr>


<tr><td>limit:</td>
<td><input type="text" name="maxstu"  ></td></tr>


<tr><td>Grade:</td>
<td>
<?php
		$gradename = array("Fresh","sophomore","Junior","Senior","Graduate 1","Graduate 2");
		for($i=0;$i<6;$i++) {
			echo "<input type=\"checkbox\" name=\"grade[]\" value=\"".$i."\" id=\"".$i."\">";
			echo $gradename[$i];
		}

?></td></tr>

<tr><td>Type:(optional or not)</td>
<td><input type="text" name="chooseyn"  ></td></tr>

<tr><td>Credit:</td>
<td><input type="text" name="coucredit"  ></td></tr>

<tr><td>Classroom:</td>
<td><input type="text" name="couplace"  ></td></tr>

<tr><td>Time:</td>
<td><input type="text" name="coutime"  ></td></tr>

<tr><td>Hours:</td>
<td><input type="text" name="hours"  ></td></tr>

<input type='submit' value="Submit">
</table>
</form>
</body></html>
