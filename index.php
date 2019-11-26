<?php
			ini_set('mysql.connect_timeout', 300);
			ini_set('default_socket_timeout', 300);

			include_once "resource/session.php";
					
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "register";
			
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			// else{
			// 	echo"<script> alert(1); </script>";
			// }
			
?>
<style>
	.col-md-4:hover img{
	transform: scale(1.0);
	transition: all 0.5s ease-in;
	filter: blur(2px) brightness(85%);
	position: relative;
	box-shadow: 0 0 16px cyan;
		
	}
	
	.hint{
	position: absolute;
	z-index: 1;
	align: center;
	top: 30%;
	left: 40%;
	color: #fff;
	text-decoration: bold;
	opacity: 0;
	transition: 2s;
	}
	.col-md-4:hover :not(img){
	opacity: 1;
	
	
	}


</style>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E Farming System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		
	
	<!-- Font-Awesome Icons -->
	<link href = "assets/css/font-awesome.min.css" rel = "stylesheet">
			
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    
</head>

<body style="padding-top: 0px; padding-bottom: 0px;">
    
    <!-- Navigation -->
   
<header class="jumbotron hero-spacer" style= "background: url(assets/img/background.jpg); margin-top: 0px; background-size: cover; height: 400px;">
    <nav class="navbar navbar-inverse navbar-fixed-top"style= "opacity: 0.7; filter:alpha (opacity =70);" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"  >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="index.php" style = "padding-right: 100px; font-size: 25px; "><strong>EFarming.com</strong></a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"  >
					<li>
                        <a href="register.php" style= "font-weight: bold;padding-right: 80px;" >Register</a>
                    </li>
					
					<li>
                        <a href="login.php" style= "font-weight: bold;padding-right: 80px;" >Buy Farm Products</a>
                    </li>
					<li>
                        <a href="loginfarmers.php" style= "font-weight: bold;padding-right: 80px;" >Login As Farmer</a>
                    </li>
					<li>
                        <a href="govt.html" style= "font-weight: bold;padding-right: 50px;" >Government Schemes</a>
                    </li>
					
				<li>
					<a  class = "cart" href = "#"; style = "color: #f9a023;"><strong>Cart</strong><i class= " fa fa-cart-plus" style ="color:#f9a023; height: 30%; "></i> </a>
				</li>
				
					
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	 <h1 align ="center" style = "padding-top: 80px;color: #fff;"><strong>Taking Agriculture to Another Level</strong></h1>
	 <p align = "center"style = "color: #fff;">A commercial platform to expand the customer scale for farmers and ease purchase for buyers online.</p>
	  <div class = "container">
	  <form method = "post" action = "searchresult.php" style = "width: 45%; margin: auto;">
			<input type = "text" name = "searchvalue" placeholder="What do you need?" maxlength="20" style="margin-left: 80px;width: 300px; padding:7px; border:1px solid blue; border-radius-top-left: 5px;border-radius-bottom-left: 5px;">
			<input class= "btn"type = "submit"  name = "search"value ="Search"style = "padding: 7px; background: blue; border: 2px solid blue; color: white;margin-left: -5px; "/>

			
			
		</form>
		</div>
	 </header>   
	<div class = "container">

	 <div class="row text-center" ">
	 <h1 align ="center" ><strong> Explore Our MarKetPlace</strong></h1><br/><br/>
	  <h1 align ="center" ><strong> Register or Log In to continue!</strong></h1><br/><br/>
		<!-- <?php
			$count = "SELECT * FROM category";
			echo ($count);
			$countquery = mysqli_query($conn, $count);
			$c = mysqli_num_rows($countquery);
			$rand = rand(9, $c) - 9;
			
			$sql = "SELECT * FROM category WHERE 'id' > '$rand' LIMIT 9";
			$run_user = mysqli_query($conn, $sql);
		
				
				$check_user = mysqli_num_rows($run_user);
				
				if($check_user > 0){
					while($row = mysqli_fetch_array($run_user)){
				
				?> -->
			<div class = "col-md-4">
			<div class = "thumbnail" align = "center">
				<form method = "post" action = "cart.php?action=add&id=<?php echo $row["id"]; ?>">
				<a href = "categoryvalue.php?action=view&value=<?php echo $row["Categoryname"]; ?>"><span class = "hint"><strong>Click to view </strong></span><img class = "img-responsive"
				<?php
					echo '<img src = "data:image/jpeg;base64,'.base64_encode($row["image"]).'">';
					
				
				$_SESSION['id'] =$row[0]; 
					
				?>
				
				
			
				</a>
				<h4 class = "text-info"><strong><?php echo $row["Categoryname"]; ?></strong></h4>
				<?php 
				
				$_SESSION['id'] =$row[0]; ?>
					
				</div>
				
				</form>
			
			</div>
				<?php
			
			}
				}
			
			
		?>
		
    </div>
    <!-- /.container -->
	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	
		</div>	
	
	<div style = "padding: 1em 0 2em 0;">
	
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
										<p align = "center">Contact Us: 8133936723
											&copy; EFarming. All rights reserved</p>
								
		</footer>
				
</div>
	
	</body>
	

</html>