<?php
			include_once "functions.php";
			ini_set('mysql.connect_timeout', 300);
			ini_set('default_socket_timeout', 300);

			include_once "resource/session.php";
					
			
			$servername = "localhost";
			$username = "root";
			$password = "femi";
			$dbname = "register";
			
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farm Connect: Buy and Sell Raw Product Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    
</head>

<body style="padding-top: 0px;">
    
    <!-- Navigation -->
   
<header class="jumbotron hero-spacer" style= "background: url(img/background.jpg); margin-top: 0px; background-size: cover; height: 400px;">
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
              <a class="navbar-brand" href="index.php" style = "padding-right = 45px; font-size: 25px; "><strong>FarmConnect.com</strong></a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"  >
					<li>
                        <a href="register.php">Register</a>
                    </li>
					
					<li>
                        <a href="login.php">Buy Farm Products</a>
                    </li>
					<li>
                        <a href="loginfarmers.php">Login As Farmer</a>
                    </li>
					
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	 <h1 align ="center" style = "padding-top: 80px;color: #fff;"><strong>Taking Agriculture to Another Level</strong></h1>
	 <p align = "center"style = "color: #fff;">A commercial platform to expand the customer scale for farmers and ease purchase for buyer online.</p>
	  <form method = "post" action = "searchresult.php" style = "width: 45%; margin: auto;">
			<div><input type = "text" name = "searchvalue" placeholder="What do you need?" maxlength="20" style="margin-left: 80px;width: 300px; padding:7px; border:1px solid blue; border-radius-top-left: 5px;border-radius-bottom-left: 5px;">
			<input class= "btn"type = "submit"  name = "search"value ="Search"style = "padding: 7px; background: blue; border: 2px solid blue; color: white;margin-left: -5px; "/>

			
			
		</form>
	 </header>   
	<div class = "container">

	 <div class="row text-center" ">
	 <h1 align ="center" ><strong> Explore Our MarKetPlace</strong></h1><br/><br/>
		<?php
			$count = "SELECT * FROM products";
			$countquery = mysqli_query($conn, $count);
			$c = mysqli_num_rows($countquery);
			$rand = rand(9, $c) - 9;
			
			$sql = "SELECT * FROM products WHERE 'id' > '$rand' LIMIT 9";
			$run_user = mysqli_query($conn, $sql);
		
				
				$check_user = mysqli_num_rows($run_user);
				
				if($check_user > 0){
					while($row = mysqli_fetch_array($run_user)){
				
				?>
			<div class = "col-md-4">
			<div class = "thumbnail" align = "center">
				<form method = "post" action = "cart.php?action=add&id=<?php echo $row["id"]; ?>">
				<a href = "productsview.php?action=view&id=<?php echo $row["id"]; ?>"><img class = "img-responsive"
				<?php
					echo '<img src = "data:image/jpeg;base64,'.base64_encode($row[8]).'">';
					
				
				$_SESSION['id'] =$row[0]; 
					
				?>
			
				</a>
				<h4 class = "text-info"><strong><?php echo $row["Category"]; ?></strong></h4>
				<h4 class = "text-info" ><strong>Seller: </strong><?php echo $row["CompanyName"]; ?></h4>
				
				<h4 class = "text-danger">Price: #<?php echo $row["Prcie"]; ?></h4>
				<input type = "hidden" name = "hidden_cat" value = "<?php echo $row["Category"]; ?>" />
				<input type = "hidden" name = "hidden_price" value = "<?php echo $row["Prcie"]; ?>" />
				<input type = "hidden" name = "hidden_ID" value = "<?php echo  $row[0]; ?>" />
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
	
	</div>
	
	</body>
</html>