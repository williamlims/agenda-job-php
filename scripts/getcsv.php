<meta charset="utf-8">
<?php
include "connection.php";

$conn = new Connection();
$conn->connect();

if(isset($_POST["iduser"])){
	$id = $_POST["iduser"];
}

$row = 0;

$iscsv = strtolower(pathinfo($_FILES["csvfile"]["name"], PATHINFO_EXTENSION));

if($iscsv === "csv"){

	if(isset($_FILES["csvfile"]["tmp_name"])) {
	
		if (($handle = fopen($_FILES["csvfile"]["tmp_name"], "r")) !== FALSE)
		{
		  //pass row by row
		  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
		  {
			  
			  $sql = "INSERT INTO CONTACTS (fk_id_user, fst_name_cont, mid_name_cont, lst_name_cont, webpage_cont, job_title_cont, gender_cont, birthday_cont, email_cont, main_phone_number, main_postal_code_cont, main_city_cont, main_state_cont, main_country_cont, main_street_name_cont, main_number_st_cont) VALUES (".$id.", '".$data[1]."', '".$data[2]."','".$data[3]."', '".$data[4]."', '".$data[5]."', '".$data[6]."', '".$data[7]."', '".$data[8]."', '".$data[9]."', '".$data[10]."', '".$data[11]."', '".$data[12]."', '".$data[13]."', '".$data[14]."', '".$data[15]."')";
			  
			  $conn->getConn()->query($sql);	  
			  $row++;
			  
		  }
		  fclose($handle);
		  $conn->disconnect();
		}
	}
    echo "<script> alert(\"Data was saved!\"); history.go(-1); </script>";
}else{
	echo "<script> alert(\"Data was not saved!\"); history.go(-1); </script>";
}
?>