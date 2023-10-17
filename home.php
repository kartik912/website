
<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<html>


<head>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>David China Bistro</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barrio&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Carrois+Gothic+SC&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">

	<style> @import url('https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap'); </style>
	<style> @import url('https://fonts.googleapis.com/css2?family=Barrio&display=swap'); </style>
	<style> @import url('https://fonts.googleapis.com/css2?family=Rubik+Vinyl&display=swap'); </style>
	<style> @import url('https://fonts.googleapis.com/css2?family=Carrois+Gothic+SC&display=swap'); </style>
	<style> @import url('https://fonts.googleapis.com/css2?family=Prosto+One&display=swap'); </style>
	<style> @import url('https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap'); </style>
</head>



<body>
	<nav id="header-nav" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="home.php">
					<div id="logo-img" alt="logo image" class="visible-md visible-lg pull-left">
					</div>
				</a>
				
				<div class="navbar-brand">
					<a href="home.php"><h1>David's China Bistro</h1></a>
					<p>
						<img src="images/name.webp" width=20px height=20px alt="Kosher Certification" class="md-d-block ">
						<span class="kosher">Kosher Certification</span>
					</p>
				</div>
				<button id="navbarToggle" type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toogle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div id="navbar-collapse" class="collapse navbar-collapse fam">
				<ul id="nav-list" class="nav navbar-nav navbar-right">
					<li>
						<a href="#" onclick="$dc.loadMenuCategories();">
						<span class="glyphicon glyphicon-cutlery"></span>
						<br class="hidden-xs">Menu</a>
					</li>
					<li>
					<?php
						$count=0;
							if(isset($_SESSION['cart']))
							{
								$count = count($_SESSION['cart']);
							}
					?>
						<a href="myCart.php">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						<br class="hidden-xs">Cart (<?php echo ($count) ?>)</a>
					</li>
					<li>
						<a href="logout.php">
						<span class="glyphicon glyphicon-user"></span>
						<br class="hidden-xs">Log-out</a>
					</li>
					<li id="phone" class="hidden-xs">
					<a href="tel:750-006-4210">
						<span>99x-xxx-xxxx</span></a><div>* we Deliver</div>
						<br>
						<div>
                        <h4 style="color:#850000; font-size: 1.2em; font-weight: bold;">Welcome <?php echo $username;?></h4>
						</div>
					</li>
				</ul>
			</div>
		</div>

        <div>
        
        </div>
	</nav>

	<div id="call-btn" class="visible-xs container">
		<a class="btn" href="tel:99x-xxx-xxxx">
		<span class="glyphicon glyphicon-earphone"></span>
		99x-xxx-xxxx
		</a>
		<div class = "fam">
		<h4 style="color:white; font-size: 1.2em">Welcome <?php echo $username;?></h4>
		</div>
	</div>
	<div id="xs-deliver" class="text-center visible-xs">* WE DEVIVER </div>


	<div id="main-content" class="container"></div>

	<footer class="panel-footer">
		<div class="container">
			<div class="row">
				<section id="hours" class="col-sm-4">
					<span>Hours:</span><br>
					Sun-Thurs: 11:15am - 10:00pm<br>
					Fri: 11:15am - 2:30pm<br>
					Saturday Closed
					<hr class="visible-xs">
				</section>
				<section id="address" class="col-sm-4">
					<span>Address:</span><br>
					7105 Reistertown Road<br>
					Baltimore, MD 21215
					<p>* Delivery area within 3-4 miles, with minimum order of $20 plus $3 charge for all delivery.</p>
					<hr class="visible-xs">
				</section>
				<section id="testimonials" class="col-sm-4">
					<p>"The best Chinese restaurant I've beet to! And that's the saying a lot,since i have been to many!"</p>
					<p>"Amazing food! Great service! couldn't ark for more! I will gladely come back again with my friends!"</p>
				</section>
			</div>
			<div class="text-center">&copy; Copyright David's China Bistrow 2022</div>
		</div>
		
	</footer>
	<!-- jQuery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/ajax-utils.js"></script>

</body>
</html>