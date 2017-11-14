<!DOCTYPE HTML>

<html>
	<head>
		<title>NAGS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Phantom</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="Discover.html">Discover</a></li>
							<li><a href="Discover.html">Booking</a></li>
							<li><a href="Discover.html">Events</a></li>
							
						</ul>
					</nav>

			<?php
$ser="localhost";
$user="root";
$pass="";
$db="food";
$conn=mysqli_connect($ser,$user,$pass,$db);
if(isset($_POST['submit'])){
$item=$_POST['item'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];	
$query="INSERT INTO orders(item,name,phone,address) VALUES('$item','$name','$phone','$address')";
mysqli_query($conn,$query);

}
mysqli_close($conn);
?>
<form method="POST" action="Discover.php">
  <div class="form-group row">
  <div class="col-xs-3">
    <label for="ex1">TYPE</label>
    <input class="form-control" name="item" id="ex1" type="text" required>
  </div>
  <div class="col-xs-3">
    <label for="ex2">NAME</label>
    <input class="form-control" name="name" id="ex2" type="text" required>
  </div>
  <div class="col-xs-3">
    <label for="ex3">PHONE</label>
    <input class="form-control" name="phone" id="ex3" type="text" pattern="^\d{4}\d{3}\d{3}$">
  </div>
  
  <div class="col-xs-6"><br>
    <div class="form-group">
  <label for="comment">Address:</label>
  <textarea class="form-control" name="address" rows="5" id="comment" required></textarea>
</div>
 <button type="submit" name="submit" class="btn btn-primary btn-sm" >Submit</button>
  </div>
 
</div>
</form>
</div>
<br><br><br><br>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="field half first">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>
									<div class="field half">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<textarea name="message" id="message" placeholder="Message"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send" class="special" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="https://twitter.com/nagendrareddy96" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/reddynagendrarock" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/reddy_nags/" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
								</ul>
							</section>
						
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>