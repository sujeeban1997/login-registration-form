<?php
    if(isset($_POST['save'])){
        $conn=mysqli_connect("localhost", "root", "", "students");
        $user=$_POST['user'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $sql = "SELECT * FROM studentdata WHERE email = '{$email}'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){
            echo "<div class='alert alert-danger'> Email already exists</div>";
        }
        else{
            if($password===$cpassword){
                $pass=md5($password);
                $sql1="INSERT INTO studentdata(username, email, password) VALUES('{$user}', '{$email}', '{$pass}')";
                if(mysqli_query($conn, $sql1)){
                echo "<div class='alert alert-danger'> Hello $user Your have registered sucessfully...</div>";
                }else{
                    echo "Error";
                }
            }else{
            echo "<div class='alert alert-danger'> Password are not matching</div>";

            }
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
    margin-top: 50px;
}
</style>
</head>

<body>
    
<div class="login-form">
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <h1 class="text-center">Register</h1>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="user" placeholder="Username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control">
                    </div>

                    <div class="form-group my-4">
                        <input type="submit" name="save" class="form-control btn btn-success" value="Register">
                    </div>

                    <div class="form-group my-4">
                        Already have a account? <span><a href="index.php">Login</a></span>
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