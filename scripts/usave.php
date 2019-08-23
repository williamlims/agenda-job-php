<?php
header("Content-Type: text/plain");
include ("connection.php");

$conn = new Connection();
$conn->connect();
$answer = NULL;

if(isset($_GET['name'])){
	$name = $_GET['name'];
}
if(isset($_GET['lastname'])){
	$lastname = $_GET['lastname'];
}
if(isset($_GET['postalcode'])){
	$postalcode = $_GET['postalcode'];
}
if(isset($_GET['city'])){
	$city = $_GET['city'];
}
if(isset($_GET['state'])){
	$state = $_GET['state'];
}
if(isset($_GET['country'])){
	$country = $_GET['country'];
}
if(isset($_GET['email'])){
	$email = $_GET['email'];
}
if(isset($_GET['pwd'])){
	$pwd = $_GET['pwd'];
}

$emailExist = "SELECT * FROM USERMASTER where email_user = '".$email."'";
$res = $conn->getConn()->query($emailExist);

if(mysqli_num_rows($res) <= 0){

	$sql = "INSERT INTO USERMASTER (fst_name_user, lst_name_user, postal_code_user, city_user, state_user,
										country_user, email_user, passwd_user) VALUES 
									   ('".$name."', '".$lastname."', '".$postalcode."',
										'".$city."', '".$state."', '".$country."', '".$email."', '".$pwd."')";
										
	if($conn->getConn()->query($sql)){
	   $answer = "Saved!";
	}else{
	   $answer = "Error: " . $conn->getConn()->error;
	}
} else {
	$answer = "This email already exists!";
}

$conn->disconnect();

echo $answer;

?>