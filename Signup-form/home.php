<?php
   session_start();
   if(!isset($_SESSION['user'])){
        header("location://localhost/signup-form/index.php");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
.login-form .container{
    margin-top: 50px;
}
</style>
</head>

<body>
    

<div class="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $_SESSION['user'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
      </li>
      
    </ul>
    
  </div>
</nav>
</div>

<div class="login-form">
    <div class="container">
        <div class="row">
            <div class=" col-md-12" id="welcome">
                Welcome
            </div>
            <div class="col-md-12" id="username">
                <?php echo $_SESSION['user'] ?>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>