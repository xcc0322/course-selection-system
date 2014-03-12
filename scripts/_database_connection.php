<?php
	mysql_connect("localhost", "root", "") or die("<p>Error".mysql_error(). "</p>");
	mysql_select_db("hw2") or die("<p>Error of Database connection".mysql_error(). "</p>");

	function foo($arg_1, $arg_2)
	{
	$table[0] = "student";
	$table[1] = "professor";
	$table[2] = "admin";
	$idname[0] = "sid";
	$idname[1] = "pid";
	$idname[2] = "aid";
		$result = mysql_fetch_array(mysql_query("select * from {$table[$arg_2]} where {$idname[$arg_2]} = '$arg_1';")); 
		if ($result == 0)
		return false;
		else return true;
	}

	function conflict($s1, $s2)
	{
		$sn1 = 0;
		$sn2 = 0;
		for($i = 0; $i < strlen($s1); $i++)
		{
			if (ctype_digit($s1[$i]))$temp = $s1[$i];
			else $x1[$sn1++] = "$temp"."{$s1[$i]}";
			$out = ctype_digit($s1[$i]);
		}
		for($i = 0; $i < strlen($s2); $i++)
		{
			if (ctype_digit($s2[$i]))$temp = $s2[$i];
			else $x2[$sn2++] = "$temp"."{$s2[$i]}";
		}
		for($i = 0; $i < $sn1; $i++)
			for($j = 0; $j < $sn2; $j++)
				if ($x1[$i] == $x2[$j]) return true;
		return false;
	}

	function back($arg_1)
	{
		echo "<script>alert(\"{$arg_1}\");</script>";
		echo  "<script>window.location     =\"../index.html\";</script>"; 
		exit;
               //echo '<meta http-equiv=REFRESH CONTENT=2;url=../index.html>';
	}
	function linkto($arg_1)
	{
		echo  "<script>window.location     =\"{$arg_1}\";</script>"; 
		exit;
	}
?>
