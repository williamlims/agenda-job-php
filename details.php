<?php
include "scripts/connection.php";

$conn = new Connection();
$conn->connect();

$idcont = $_GET['idcont'];

session_start();

if(isset($_SESSION["login"]) && isset($_SESSION["pass"]) && isset($_SESSION["idus"]) && ($_SESSION["idco"] == NULL || isset($_SESSION["idco"]))){
    
$Query = "SELECT * FROM contacts WHERE id_cont = ".$idcont." ";

$ExecQuery = $conn->getConn()->query($Query);
$Result = mysqli_fetch_assoc($ExecQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home - Agenda</title>
  <link href="img/favicon.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="libs/js/settings/setting.js"></script>
</head>

<body  bgcolor="#fafafa">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="home.php">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">New Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="import.php">Import Data</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="scripts/out.php">logout</a>
      </li>    
    </ul>
    <form class="form-inline my-2 my-lg-0" name="fsearch" id="fsearch" method="post">
      <input class="form-control mr-sm-2" type="text"  placeholder="Search">
      <button class="btn btn-light my-2 my-sm-0" id="search" name="search" type="button">Search</button>
    </form>
    <div id="display"></div>
  </div>  
</nav>
<br>

<div class="container">
 
  <div class="row">
    <div class="col-sm-12 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><img src="img/ic_c.png" style="width:45px; height:45px;"/> <?php echo $Result['fst_name_cont']." ".$Result['mid_name_cont']." ".$Result['lst_name_cont']; ?></h5><br>
                <h6 class="card-subtitle mb-2 text-muted"> <img src="img/job.png" style="width:25px; height:25px;"/> <?php echo $Result['job_title_cont']; ?></h6>
                 <p class="card-text"><img src="img/mail.png" style="width:25px; height:25px;"/> <?php echo $Result['email_cont']; ?></p
                ><p class="card-text"><img src="img/birthday.png" style="width:25px; height:25px;"/> <?php echo $Result['birthday_cont']; ?></p>
                <p class="card-text"><img src="img/place.png" style="width:25px; height:25px;"/> <?php echo $Result['main_postal_code_cont'].", ".$Result['main_street_name_cont'].", ".$Result['main_number_st_cont'].", ".$Result['main_city_cont'].", ".$Result['main_state_cont'].", ".$Result['main_country_cont']; ?></p>
                <p class="card-text"><img src="img/phone.png" style="width:25px; height:25px;"/> <?php echo $Result['main_phone_number']; ?></p>
                <p class="card-text"><img src="img/web.png" style="width:25px; height:25px;"/> <?php echo $Result['webpage_cont']; ?></p>
            </div>
        </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-12 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><img src="img/place.png".png" style="width:45px; height:45px;"/> Others Addresses</h5>
                 <p class="card-text"><img src="img/place.png" style="width:25px; height:25px;"/> </p>         
                 <a href="otheraddress.php" class="card-link">Add a new address</a>     
            </div>
        </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-12 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><img src="img/phone.png".png".png" style="width:45px; height:45px;"/> Others Phone Numbers</h5>
                 <p class="card-text"><img src="img/place.png" style="width:25px; height:25px;"/> </p>          
                 <a href="otherphone.php" class="card-link">Add a new number</a>    
            </div>
        </div>
    </div>
  </div>
   
</div>

</body>
</html>
<?php 
} else {
	header("Location: index.php");
}
?>