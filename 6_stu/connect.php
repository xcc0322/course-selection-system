
<!--�W��y�k���ҥ�session�A���y�k�n��b�����̫e��-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//�s����Ʈw
	require_once "database_connection.php";
$table[0] = "student";
$table[1] = "professor";
$table[2] = "admin";
$sid = isset($_POST['sid']) ? $_POST['sid'] : '';
$pw = isset($_POST['password']) ? $_POST['password'] : '';


//$pw = $_POST['password']; 
//�j�M��Ʈw���
//$sql = "SELECT * FROM student where ID = '$ID'";
//$result = mysql_query($sql);
//$row = @mysql_fetch_row($result);
//�P�_�b���P�K�X�O�_���ť�
//�H��MySQL��Ʈw�̬O�_���o�Ӿǥ�
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

