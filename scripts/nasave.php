<?php
header("Content-Type: text/plain");
include ("connection.php");

$conn = new Connection();
$conn->connect();


if(isset($_GET['iduser'])){
	$iduser = $_GET['iduser'];
}
if(isset($_GET['postalcode'])){
	$postalcode = $_GET['postalcode'];
}
if(isset($_GET['city'])){
	$city = $_GET['city'];
}
if(isset($_GET['street'])){
	$street = $_GET['street'];
}
if(isset($_GET['streetnumber'])){
	$streetnumber = $_GET['streetnumber'];
}
if(isset($_GET['state'])){
	$state = $_GET['state'];
}
if(isset($_GET['country'])){
	$country = $_GET['country'];
}

$sql = "INSERT INTO ADDRESS_CONTACTS_ALT (fk_id_cont, postal_code_cont, city_cont, street_name_cont, number_st_cont, state_cont, country_cont) VALUES (".$iduser.", '".$postalcode."', '".$city."', '".$street."', '".$streetnumber."', '".$state."', '".$country."')";
									
if($conn->getConn()->query($sql)){
   echo "saved!";
}else{
   echo "Error: " . $conn->getConn()->error;
}

$conn->disconnect();

?>