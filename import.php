<?php
session_start();

if(isset($_SESSION["login"]) && isset($_SESSION["pass"]) && isset($_SESSION["idus"]) && ($_SESSION["idco"] == NULL || isset($_SESSION["idco"]))){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Import Data - Agenda</title>
  <link href="img/favicon.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="libs/js/settings/setting.js"></script>
</head>

<body bgcolor="#fafafa">

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
        <a class="nav-link" href="#">Import Data</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="scripts/out.php">logout</a>
      </li>  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-light my-2 my-sm-0" type="button">Search</button>
    </form>
  </div>  
</nav>
<br>

<div class="container">
  <div class="row">
    <div class="col-sm-12 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
       <form action="scripts/getcsv.php" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="iduser" id="iduser" value="<?php echo $_SESSION["idus"]; ?>"/>
          <br>
          <h4><img src="img/cont_icon.png" style="width:45px; height:45px; " title="Agenda Online"/> Import CSV file</h4><br>
          <div class="form-group w-75">
             <input type="file" name="csvfile" id="csvfile">
          </div>
          <br>
          <button type="submit" onClick="checkCsv()" class="btn btn-dark">Import file</button>
       </form>
       <br>
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