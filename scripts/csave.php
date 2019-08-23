<?php
header("Content-Type: text/plain");
include ("connection.php");

$conn = new Connection();
$conn->connect();

if(isset($_GET['iduser'])){
	$id_user = $_GET['iduser'];
}
if(isset($_GET['name'])){
	$name = $_GET['name'];
}
if(isset($_GET['middlename'])){
	$middlename = $_GET['middlename'];
}
if(isset($_GET['lastname'])){
	$lastname = $_GET['lastname'];
}
if(isset($_GET['webpage'])){
	$webpage = $_GET['webpage'];
}
if(isset($_GET['jobtitle'])){
	$jobtitle= $_GET['jobtitle'];
}
if(isset($_GET['gender'])){
	$gender = $_GET['gender'];
}
if(isset($_GET['birthday'])){
	$birthday = $_GET['birthday'];
}
if(isset($_GET['email'])){
	$email = $_GET['email'];
}
if(isset($_GET['phonenumber'])){
	$phonenumber = $_GET['phonenumber'];
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

$sql = "INSERT INTO CONTACTS (fk_id_user, fst_name_cont, mid_name_cont, lst_name_cont, webpage_cont, job_title_cont, gender_cont, birthday_cont, email_cont, main_phone_number, main_postal_code_cont, main_city_cont, main_state_cont, main_country_cont, main_street_name_cont, main_number_st_cont) VALUES (".$id_user.", '".$name."', '".$middlename."', '".$lastname."', '".$webpage."', '".$jobtitle."', '".$gender."', '".$birthday."', '".$email."', '".$phonenumber."', '".$postalcode."', '".$city."', '".$state."', '".$country."', '".$street."', '".$streetnumber."')";
									
if($conn->getConn()->query($sql)){
   echo "saved!";
}else{
   echo "Error: " . $conn->getConn()->error;
}

$conn->disconnect();

?>