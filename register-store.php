<?php
 session_start();
 $msg='';
 require 'connection.php';
 if (isset($_POST['registration'])){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $password=md5($_POST['password']);
   $confirmpassword=md5($_POST['confirmpassword']);
   
   $check=mysqli_query($con, "SELECT * FROM register_store where store_email='$email'");
   if(mysqli_num_rows($check)>=1){
     
     while($row=mysqli_fetch_array($check)){
      //  $name=$row['name'];
       $dbemail=$row['store_email'];
     }
     if($email==$dbemail){
       $msg="User Exist";
     }
    }else{
      $query="insert into register_store (store_name,store_email,password,confirm_password)values('$name','$email','$password','$confirmpassword')";
      $r=mysqli_query($con,$query);	
      if($r){
        $_SESSION['user']=$email;
        $_SESSION['status']="Registerd Successfully";
        echo"<script>window.open('./Dashboard.php','_self')</script>";
      }	
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
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <a href="./" class="h1"><b>Book </b>Store</a>
            </div>
            <div class="card-body">
            <?php 
                if($msg){ ?>
                <p class="login-box-msg" style="color: #dc3545;"><?php echo $msg ?></p>
                <?php }else{ ?>
                <p class="login-box-msg">Register a new membership</p>
            <?php } ?>

            <form action="" method="POST" id="regform">
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" id="username" placeholder="Store Full Name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" id="exampleInput_Email1" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="exampleInput_Password1" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" name="confirmpassword" id="exampleInputconfirm_password1" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-8">
                    
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" id="submit" name="registration" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <a href="./login-store.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/jquery.validate.min.js"></script>
    <script src="dist/js/validate.js"></script>
</body>
</html>