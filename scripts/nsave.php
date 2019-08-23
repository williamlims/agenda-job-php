<?php
header("Content-Type: text/plain");
include ("connection.php");

$conn = new Connection();
$conn->connect();


if(isset($_GET['iduser'])){
	$iduser = $_GET['iduser'];
}
if(isset($_GET['phonenumber'])){
	$phonenumber = $_GET['phonenumber'];
}

$sql = "INSERT INTO PHONE_CONTACTS_ALT (fk_id_cont, phone_number) VALUES (".$iduser.", '".$phonenumber."')";
									
if($conn->getConn()->query($sql)){
   echo "saved!";
}else{
   echo "Error: " . $conn->getConn()->error;
}

$conn->disconnect();

?>