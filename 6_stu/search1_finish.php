<!--¤W¤è»yªk¬°±Ò¥Îsession¡A¦¹»yªk­n©ñ¦bºô­¶³Ì«e¤è-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	require_once "../scripts/database_connection.php";
	
	echo "Search result : course listing : <br>";
	echo "<table border=1>";
?>


	
    <tr>	
	<th>å­¸å¹´åº</th>
	<th>å­¸æœŸåˆ</th>
	<th>èª²è™Ÿ</th>
	<th>æ°¸ä¹…èª²è™Ÿ</th>
	<th>èª²ç¨‹åç¨±</th>
	<th>äººæ•¸ä¸Šé™</th>
	<th>ä¸Šèª²æ™‚é–“</th>
	<th>ä¸Šèª²æ•™å®¤</th>
	<th>å­¸åˆ†</th>
	<th>æ™‚æ•¸</th>
	<th>é–‹èª²æ•™å¸«</th>
	<th>æ‰€å±¬ç³»æ‰€åç¨±</th>
	<th>é¸åˆ¥</th>
	<th>é–‹èª²ç³»æ‰€</th>
    </tr>
<?php
	
	
$ID=$_SESSION['id'];  //don't care,maybe


echo ($_POST["cname"]) ;


////////////////////////////////////////////////////////////////COURSE NAME
$name="";
$sql = "";  // for scope
if (chop($_POST["cname"]) != "" )                   // check the column is null?
{$name .= "'%".$_POST["cname"]."%' ";
$sql = "SELECT * FROM course2 c where (c.name LIKE $name) ";}//
/////////////////////////////////////////////////////////////////////////GRADE
	 
	 if(isset($_POST['grade'])&&gettype($_POST['grade'])=='array'&&($_POST['grade'])!=""){
	    if ($sql == "" )$sql = "SELECT * FROM course2 c where  ";
        else 	$sql .= "and";	
         ///////////////////////////////////////////      
   	    $mask = 0;	    
	    foreach($_POST['grade'] as $i)
		    $mask = $mask | (1<<$i);
	    $gg = "c.grade & $mask>0";
	    $sql = $sql  . "(" . $gg . ")";                                            //  $sql = $sql . " and " . "(" . $gg . ")";
    echo $sql; //////////////
	 }
	 
///////////////////////////////////////////////////////////////////////////DEPT
	 
	 if(isset($_POST['dept']) && gettype($_POST['dept'])=='array'&&($_POST['dept'])!=""){
	 
	 	if ($sql=="" )$sql = "SELECT * FROM course2 c where  ";
        else 	$sql .= "and";	///notice 
	    $dd = "";
                   foreach($_POST['dept'] as $i){
                                                  if (  $dd != "") $dd = $dd . " or ";
                                                           $dd = $dd . "c.did = $i+1 ";} // ' '
                                                  $sql = $sql . "(" . $dd . ")";               
	 }	 
	echo $sql;///////////
	 //////////////////////////////////////////////////final result
	 if ($sql == "")$sql =  "SELECT * FROM course2";
	 $sql.=";";
	$result = mysql_query($sql);

	 if(isset($_POST['time']) && gettype($_POST['time'])=='array')
	 {
		 $ctime = trans_back($_POST['time']);
		 for($i=0; $i<strlen($ctime); $i++) echo $ctime[$i];
	 }
	
////////////////////////////show result
                                                          while($row = mysql_fetch_array($result)) 
                                                               {
                                                                    $total_fields = mysql_num_fields($result); 
								    // show
								    if (!isset($ctime)|| ($_POST['mode']==1&& conflict($ctime, $row['class_time']))
								   	|| ($_POST['mode']==2&& $ctime == trans_back(trans_time($row['class_time'])))) {
                                                                    	echo "<tr>";
                                                                    	for ($i = 0; $i < $total_fields; $i++)
                                                                    		echo "<td>".$row[$i]."</td>";
									echo "</tr>";
								    }
                                                               }	 
///////////////////////////////
  echo "</table><hr>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<form name="form">
<a href="search.php">back</a>
</form>
