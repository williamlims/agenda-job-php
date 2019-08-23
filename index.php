<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - Agenda</title>
  <link href="img/favicon.png" rel="icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body bgcolor="#fafafa">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item my-2 my-lg-0">
        <a class="nav-link my-2 my-lg-0" href="user.php">User Registration</a>
      </li>    
    </ul>
  </div>  
</nav>
<br>

<div class="container">
  <div class="row">
    <div class="col-sm-4 rounded" style="background-color:#f5f5f5; border:solid 1px #eeeeee; margin: 0 auto;">
       <form action="scripts/loginsys.php" method="post">
          <br>
          <h4><img src="img/cont_icon.png" style="width:45px; height:45px; " title="Agenda Online"/> Agenda</h4>
          <div class="form-group">
             <label for="email">Email:</label>
             <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required>
          </div>
          
          <div class="form-group">
             <label for="pwd">Password:</label>
             <input type="password" class="form-control" placeholder="Password" id="pwd" name="pwd" required>
          </div>
          <div class="form-group form-check">
             <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
             </label>
          </div>
          <p class="small">Don't have an account? <a href="user.php">register</a></p>
          <button type="submit" class="btn btn-dark">Sign in</button>
       </form>
       <br>
    </div>
</div>

</body>
</html>