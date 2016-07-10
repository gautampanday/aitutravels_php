<?php include_once 'databaseConnection.php';
       header('Content-type: text/javascript');  
$json1=array(
    'usrName'=>'',
    'passWord'=>'',
    'succes'=>false,
    'result'=>''
    );

//echo json_encode($json1);

  //echo '<script type="text/javascript"> alert("loiii"); </script>'; 
//echo $_POST['data'];
$username = $_REQUEST['usr1'];
$password = $_REQUEST['pass1'];
$json1['usrName']=$username;
$json1['passWord']=$password; 
$sqlQuery=mysql_query("SELECT * FROM adminlogin WHERE userName = '".$username."' and password ='".$password."'") or die(mysql_error());
 $loginRow=mysql_fetch_array($sqlQuery);
                 if($loginRow){
                     $json1['succes']=true;
                     $json1['result']="login Successful";
                     echo json_encode($json1);
                     session_start();
                     $_SESSION['login']="1";
                     $_SESSION['usrName']=$username;
                     //echo ' UmR Password';
                     //header("Location: sidebar.php");
                 }
             else {
                // echo 'alert("helloiii");'; 
                 echo '<script type="text/javascript"> alert(/"loiii/"); </script>';
                 //header("Location: login.php");
                     echo 'WRONG Username OR Password';
 }
?>