<?php
session_start();
require 'connection.php';
$msg='';
// Login
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$check=mysqli_query($con, "SELECT * FROM register_store where store_email='$email'");
	if(mysqli_num_rows($check)>=1){

		while($row=mysqli_fetch_array($check)){
			$name=$row['store_name'];
			$dbemail=$row['store_email'];
			$dbpassword=$row['password'];
		}

		if($email==$dbemail && md5($password)==$dbpassword){
			$cookpass=$password;
			$password=md5($password);
			setcookie('user',$email, time()+(86400*30));
			$_SESSION['user']=$dbemail;
			if(isset($_POST['remember'])){
				setcookie('email',$email, time()+(86400*30));
				setcookie('password',$password, time()+(86400*30));
			}else{
				setcookie('email', $email, time()-(86400*30));
				setcookie('password', $password, time()-(86400*30));
			}
      $_SESSION['status']="Welcome $name" ;
			echo"<script>window.open('./Dashboard.php', '_self')</script>";
		}else{
      $msg="Email or Password Incorrect";
		}
	}else{
    $msg="User Does Not Exist";
	}
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <a href="./" class="h1"><b>Book </b>Store</a>
            </div>
            <div class="card-body">
            <?php 
                if($msg){ ?>
                <p class="login-box-msg" style="color: #dc3545;"><?php echo $msg ?></p>
                <?php }else{ ?>
                <p class="login-box-msg">Sign in to start your session</p>
            <?php } ?>

            <form action="" method="POST" id="loginForm">
                <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="./register-store.php" class="text-center">Register a new membership</a>
            </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="dist/js/validate.js"></script>
</body>
</html>