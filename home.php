<?php
include "scripts/connection.php";

$conn = new Connection();
$conn->connect();

session_start();

if(isset($_SESSION["login"]) && isset($_SESSION["pass"]) && isset($_SESSION["idus"]) && ($_SESSION["idco"] == NULL || isset($_SESSION["idco"]))){
    
$Query = "SELECT * FROM contacts WHERE fk_id_user = ".$_SESSION["idus"]." ORDER BY fst_name_cont ASC ";

$ExecQuery = $conn->getConn()->query($Query);
$affected = mysqli_num_rows($ExecQuery);

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
  <a class="navbar-brand" href="#">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
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
<?php if($affected === 0 || empty($affected) || $affected == NULL ){ ?>
  <div class="row">
    <div class="col-sm-12 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">No contact was found!! </h5>
                <h6 class="card-subtitle mb-2 text-muted">First of all, welcome to your agenda.</h6>
                <p class="card-text">With this agenda, you can manage your contacts easily and get access to their information fast. </p>
                <a href="contact.php" class="card-link">Add new contacts</a>
            </div>
        </div>
    </div>
  </div>
<?php } ?>

  <?php while ($Result = mysqli_fetch_array($ExecQuery)) { ?>
  
  <div class="row">
    <div class="col-sm-12 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><img src="img/ic_c.png" style="width:45px; height:45px;"/> <?php echo $Result['fst_name_cont']." ".$Result['lst_name_cont']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $Result['email_cont']; ?></h6>
                <p class="card-text"><img src="img/place.png" style="width:25px; height:25px;"/> <?php echo $Result['main_street_name_cont'].", ".$Result['main_number_st_cont'].", ".$Result['main_city_cont'].", ".$Result['main_state_cont'].", ".$Result['main_country_cont']; ?></p>
                <p class="card-text"><img src="img/phone.png" style="width:25px; height:25px;"/> <?php echo $Result['main_phone_number']; ?></p>
                <a href="details.php?idcont=<?php echo $Result['id_cont'];?>" class="card-link">More About</a>
                <a href="#" class="card-link">Update</a>
            </div>
        </div>
    </div>
  </div>
    
  <?php } ?>
  
</div>

</body>
</html>
<?php 
} else {
	header("Location: index.php");
}
?>

