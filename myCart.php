
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
	<title>cart</title>
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
	<div class="container">
		<div class="row">
			<div class="col-lg-12 box">
				<h1>MY CART</h1><br><br>
			</div>
			<div></div>
			<div class="col-lg-8">
            	<table class="table">
  					<thead class="text-center">
    					<tr>
      					<th >Serial No.	</th>
      					<th scope="col">Item Name</th>
      					<th scope="col">Item Price</th>
      					<th scope="col"></th>
						<th scope="col"></th>    
    					</tr>
  					</thead>
  					<tbody>
						<?php
							$total = 0;
							$sum = 0;
							if(isset($_SESSION['cart'])){
								foreach($_SESSION['cart'] as $key => $value)
								{
									$total=$total+1;
									$sum = $sum + $value['Price'];
									echo"
										<tr>
											<td>$total</td>
											<td>$value[Item_Name]</td>
											<td>$$value[Price]</td>
											<td><intput class='text-center' type='number' value='$value[Quantity]' min='1' max='10'></td>
											<td>
												<form action='manage_cart.php' method='POST'>
													<button name='Remove_Item' class='btn btn-danger kartik'>REMOVE</button>
													<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
												</form>
											</td>
										</tr>
									";
								}
							}
							
						?>
  					</tbody>
            	</table>
			</div>

			<div class="col-lg-4">
				<div>
					<h4>Total: </h4>
					<h5>$<?php echo $sum ?></h5>
					<br>
					<form>
						<button type="button" class="btn btn-primary">Make Purchase</button>
					</form>
				</div>
			</div>
</body>
</html>