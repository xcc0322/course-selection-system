
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	require_once "database_connection.php";
	
	  echo "My course : <br>";
      echo "<table border=1>";
      echo "<tr><td>cid</td><td>pid</td><td>year</td><td>course</td><td>credit</td>";
      echo "<td>hours</td><td>type</td>";
      echo "<td>size_limit</td><td>class_time</td><td>classroom</td>";
      echo "<td>department_id</td><td>grade</td></tr>";
	
	
	
//
$ID=$_SESSION['id'];  //don't care,maybe





////////////////////////////////////////////////////////////////COURSE NAME
 // check the column is null?
 $name="";
   if (chop($_POST["cname"]) != "" )
    
	 {$name .= "'%".$_POST["cname"]."%' ";
      $sql = "SELECT * FROM course c where c.name LIKE $name ";
	  $result = mysql_query($sql); 
                                           //////////////////////
    while($row = mysql_fetch_array($result, MYSQL_NUM)) 
    {
        $sql2 = "SELECT * FROM course where cid='$row[0]' ";
        $result2 = mysql_query($sql2);
        $total_fields = mysql_num_fields($result2); 
   // show result
     while ($rows = mysql_fetch_array($result2, MYSQL_NUM)) {
       echo "<tr>";
        for ($i = 0; $i < $total_fields; $i++)
        echo "<td>".$rows[$i]."</td>";
        echo "</tr>";
     }
                                              
    }  
	  }

	  ///////////////////////////////////////////////////////GRADE
	 
	 if(gettype($_POST['grade'])=='array'&&($_POST['grade'])!=""){
	 
                   foreach($_POST['grade'] as $i){
			                  if($i+1){echo ($i+1); $sql = "SELECT * FROM course c where c.grade = ('$i'+1 ) ";
					                     $result = mysql_query($sql); 
                                                ////////////////////////////
                                                          while($row = mysql_fetch_array($result, MYSQL_NUM)) 
                                                               {
                                                                    $sql2 = "SELECT * FROM course where cid='$row[0]' ";
                                                                    $result2 = mysql_query($sql2);
                                                                    $total_fields = mysql_num_fields($result2); 
                                                                     // show
                                                                    while ($rows = mysql_fetch_array($result2, MYSQL_NUM)) {
                                                                    echo "<tr>";
                                                                    for ($i = 0; $i < $total_fields; $i++)
                                                                    echo "<td>".$rows[$i]."</td>";
                                                                    echo "</tr>";
                                                                    }
                                                               }
					                   }
                   }
	 }
	 
	  ///////////////////////////////////////////////////////DEPT
	 
	 if(gettype($_POST['dept'])=='array'&&($_POST['dept'])!=""){
	 
                   foreach($_POST['dept'] as $i){
			                  if($i){echo ($i); $sql = "SELECT * FROM course c where c.did = '$i' ";
					                     $result = mysql_query($sql); 
                                                ////////////////////////////
                                                          while($row = mysql_fetch_array($result, MYSQL_NUM)) 
                                                               {
                                                                    $sql2 = "SELECT * FROM course where cid='$row[0]' ";
                                                                    $result2 = mysql_query($sql2);
                                                                    $total_fields = mysql_num_fields($result2); 
                                                                     // show
                                                                    while ($rows = mysql_fetch_array($result2, MYSQL_NUM)) {
                                                                    echo "<tr>";
                                                                    for ($i = 0; $i < $total_fields; $i++)
                                                                    echo "<td>".$rows[$i]."</td>";
                                                                    echo "</tr>";
                                                                    }
                                                               }
					                   }
                   }
	 }	 
	 
	 
	 
///////////////////////////////
  echo "</table><hr>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<form name="form">
<a href="search.php">back</a>
</form>
