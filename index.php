<?php
session_start();
require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="dist/js/sweetalert2.js"></script>

    <!-- Template Main CSS File -->
    <link href="dist/css/custom.css" rel="stylesheet">

    <title>Book Store</title>
  </head>
  <body>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">BooK Store</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Books</a></li>
          
          <?php   
				if(isset($_SESSION['user'])){
					$user=$_SESSION['user'];
					$adduser=mysqli_query($con, "SELECT * FROM user_register where user_email='$user'");
					if(mysqli_num_rows($adduser)>=1){
						
						while($row=mysqli_fetch_array($adduser)){
						$user_name=$row['user_name'];
						}
					}
					?>
				<li class="dropdown"><a href="#"><i class="far fa-user"></i></a>
					<ul>
						<li><a href="#" clas="user"><?php echo $user_name; ?></a></li>
						<li><a href="./cart.php">My Cart</a></li>
						<li><a href="#">Drop Down 3</a></li>
						<li><a href="./logout.php">Log Out</a></li>
					</ul>
				</li>
				<!-- <a class="shopping-cart" href="#"><i class="fas fa-shopping-cart"></i></a> -->
				<?php
					}else{
						?>
				  <li><a class="nav-link" href="./user-login.php">User Login</a></li>
          		  <li><a class="nav-link" href="./login-store.php">Store Login</a></li>
				<?php
					};
				?>
        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Whu Us Section ======= -->
  <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2><span>Our Books</span></h2>
        </div>

        <div class="row">
			<div class="col-md-2" id="stores">
				<ol class="list-group list-group-numbered section-products" >
					<a href="#" 
						<li class="list-group-item d-flex justify-content-between align-items-start">
							<div class="ms-2 me-auto">
							<div class="fw-bold">Store Name</div>
							</div>
						</li>
					</a>
					<a href="">
					<li class="list-group-item d-flex justify-content-between align-items-start">
						<div class="ms-2 me-auto">
						<div class="fw-bold">ALL</div>
						</div>
						<span class="badge bg-primary rounded-pill">14</span>
					</li>
					</a>
					<?php 
						$store=mysqli_query($con,"SELECT * FROM register_store");
							// $i=0;
							while($stor=mysqli_fetch_array($store)){
								// $i=$i+1;
						?>
					<li class="list-group-item d-flex justify-content-between align-items-start">
						<div class="ms-2 me-auto">
						<div class="fw-bold"><?php echo $stor['store_name']; ?></div>
						</div>
						<span class="badge bg-primary rounded-pill">14</span>
					</li>
					<?php } ;?>
				</ol>
			</div>
			<div class="col-md-10">
				<section class="section-products">
				<div class="container">
					<div class="row">
					<?php 
						$products=mysqli_query($con,"SELECT * FROM books");
							$i=0;
							while($prod=mysqli_fetch_array($products)){
						?>
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div id="product-1" class="single-product">
								<div class="part-1" style="background: url('<?php echo $prod['book_image'];?>')center;">
									<span class="discount">15% off</span>
									<ul>
										<?php 
											if(isset($_SESSION['user'])){
												$user=$_SESSION['user'];
											?>
											<li>
												<input type="hidden" class="user" value="<?php echo $user ?>">
												<input type="hidden" class="product_name" value="<?php echo $prod['book_name'];?>">
												<input type="hidden" class="product_price" value="<?php echo $prod['book_price'];?>">
												<input type="hidden" class="product_image" value="<?php echo $prod['book_image'];?>">
												<a href="" class="shopping-cart"><i class="fas fa-shopping-cart"></i></a>
											</li>

										<?php } else{ ?>
											<li><a href="./login.php"><i class="fas fa-shopping-cart" name="cart"></i></a></li>
										<?php }?>
										<li><a href="#"><i class="fas fa-heart"></i></a></li>
										<li><a href="./Product-detail.php?id=<?php echo $prod['book_id'];?>"><i class="fas fa-eye"></i></a></li>
										<li><a href="#"><i class="fas fa-expand"></i></a></li>
									</ul>
								</div>
								<div class="part-2 text-center">
									<h3 class="product-title"><?php echo $prod['book_name'];?></h3>
									<!-- <h4 class="product-old-price">$79.99</h4> -->
									<h4 class="product-price">$<?php echo $prod['book_price'];?></h4>
								</div>
							</div>
						</div>
						<?php 
							};
						?>
					</div>
				</div>
				</section>
			</div>
		</div>

      </div>
    </section><!-- End Whu Us Section -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
	<script src="dist/js/main.js"></script>
    <?php 
				if(isset($_SESSION['status']) && $_SESSION['status']!='success'){?>
				<script>
					swal({
					title: "<?php echo $_SESSION['status'];?>",
					text: "WELCOME TO BOOK STORE",
					icon: "success",
					button: "Ok!",
					});
				
				</script>
				<?php
					unset($_SESSION['status']);
				}

			?>
  </body>
</html>