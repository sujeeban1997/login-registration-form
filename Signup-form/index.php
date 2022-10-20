<?php
    if(isset($_POST['submit'])){
        $conn=mysqli_connect("localhost", "root", "", "students");
        $email=$_POST['email'];
        $password=$_POST['password'];
        $incpass=md5($password);
        $sql = "SELECT * FROM studentdata WHERE email = '{$email}'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $pass = $row['password'];
            if($pass===$incpass){
                session_start();
                $_SESSION['user']=$row['username'];
                header("location://localhost/signup-form/home.php");
            }else{
                echo "<div class='alert alert-danger'>Invalid password</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>Invalid email</div>";
        }
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
    margin-top: 120px;
}
</style>
</head>

<body>
    
<div class="login-form">
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <h1 class="text-center">Login</h1>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group my-4">
                        <input type="submit" name="submit" class="form-control btn btn-success" value="Login">
                    </div>

                    <div class="form-group my-4">
                        Not have a account? <span><a href="register.php">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>