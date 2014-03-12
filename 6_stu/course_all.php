
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
	<head>
  		<link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<div id="content">
	<h1>Course List</h1>

<table border = "1" align = "left">
    <tr>	
	<th>學年度</th>
	<th>學期別</th>
	<th>課號</th>
	<th>永久課號</th>
	<th>課程名稱</th>
	<th>人數上限</th>
	<th>上課時間</th>
	<th>上課教室</th>
	<th>學分</th>
	<th>時數</th>
	<th>開課教師</th>
	<th>所屬系所名稱</th>
	<th>選別</th>
	<th>開課系所</th>
    </tr>

<?php
	require_once "../scripts/_database_connection.php";
    	$sql = 'SELECT * from course2';
	$result = mysql_query($sql);
$total_fields = mysql_num_fields($result);

	while($row = mysql_fetch_array($result)) {
		echo "<tr>";
     		for ($i = 0; $i < $total_fields; $i++)
        		echo "<td>".$row[$i]."</td>";
		
    		echo "</tr>";
    	}
?>
</table>
</div></body></html>
