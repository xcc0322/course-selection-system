
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
	require_once "database_connection.php";
$table[0] = "student";
$table[1] = "professor";
$table[2] = "admin";
$sid = isset($_POST['sid']) ? $_POST['sid'] : '';
$pw = isset($_POST['password']) ? $_POST['password'] : '';


//$pw = $_POST['password']; 
//搜尋資料庫資料
//$sql = "SELECT * FROM student where ID = '$ID'";
//$result = mysql_query($sql);
//$row = @mysql_fetch_row($result);
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個學生
$i = 0; 
for ($i=0; $i<3; $i++){
   if(foo($sid, $table[$i])) {
       $result = mysql_query("select * from {$table[$i]} where sid='$sid' ");
//and  password=ENCODE({$pw}, 'godisagirl')");
       $row = @mysql_fetch_row($result);
       break;
			}
}

if ($i == 3)
    {
        echo 'login fail!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
    }
if($sid != null && $pw != null)
    {
    if ($i==0)
       { 
       $_SESSION['username'] = $sid;
       echo"Hello,student!";
       echo '<meta http-equiv=REFRESH CONTENT=2;url=login.html>';}

       
    else if($i==1){ 
     $_SESSION['username'] = $ID;
     echo"Hello,professor";
     echo '<meta http-equiv=REFRESH CONTENT=2;url=login.html>';}
    else if($i==2){ 
     $_SESSION['username'] = $ID;
     echo"Hello,administrator!";
     echo '<meta http-equiv=REFRESH CONTENT=2;url=login.html>';}
     }
    else
     {echo"You have to apply an ID!";
      echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
        //echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
    }

?>

