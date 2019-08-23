<?php
include ("connection.php");

$conn = new Connection();
$conn->connect();

if(isset($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['email']) && !empty($_POST['pwd'])){
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
}

$sql = "SELECT * FROM USERMASTER where email_user = '$email' AND passwd_user = '$pwd'; ";

if(mysqli_num_rows($exeQuery = $conn->getConn()->query($sql))>= 1){
   $Result = mysqli_fetch_assoc($exeQuery);
    
   session_start();

   $_SESSION["login"] = $Result['email_user'];
   $_SESSION["pass"] = $Result['passwd_user'];
   $_SESSION["idus"] = $Result['id_user'];
   $_SESSION["idco"] = NULL;
   	
   header("Location: ../home.php");
   
}else{
	
   echo "<script> alert(\"User dosn't exist!\"); history.go(-1); </script>"; 
   
}

$conn->disconnect();

?>