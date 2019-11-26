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
				
			if(isset($_POST['add'])){
				?>
							<script type = "text/javascript">
							alert("Please Login or Create A Free Account ");
							window.location.href = "login.php";
							</script>
				<?php
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

    <title>E-` Farming: Buy and Sell Raw Product Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

		
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
	<style>
	
	</style>
  
</head>

<body>
   
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>E-Farming</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
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
                        <a href="#" style= "font-weight: bold;padding-right: 50px;" >How it Works</a>
                    </li>
					
				<li>
					<a  class = "cart" href = "#"; style = "color: #f9a023;"><strong>Cart</strong><i class= " fa fa-cart-plus" style ="color:#f9a023; height: 30%; "></i> </a>
				</li>
				
                </ul>
            </div>
        </div>
    </nav>
	</br>
	
</br>	
</br>
<div class = "container" "width: 80%; margin: auto;">
	<?php
			
					if(isset($_GET["action"])){
			
				if($_GET["action"] == "view"){
						
						$sql = "SELECT * FROM products WHERE id = '$_GET[id]'";
			$run_user = mysqli_query($conn, $sql);
		
				
				$check_user = mysqli_num_rows($run_user);
				
				if($check_user > 0){
					while($row = mysqli_fetch_array($run_user)){
				
				?>
		
	
	<div name="left" style = "width: 60%; float: left; margin-right: 25px;">
		
				
		<a href = "#"><img class = "img-responsive"
				<?php
					
					echo '<img src = "data:image/jpeg;base64,'.base64_encode($row[8]).'">';
				?>
			
				</a>
	
	</div>
	
	<div class = "right" style = "width: 30%; float: left; margin-right: 25px; ">
				<h3 class = "text-info" ><strong>Seller: </strong><?php echo $row["CompanyName"]; ?></h3>

				<h3 class = "text-info"><strong>Product Name: </strong><?php echo $row["Category"]; ?></h3>
		
				<h3 class = "text-danger"><strong>Price: </strong> #<?php echo $row["Prcie"]; ?></h3>
				<h3 class = "text-info"><strong>Description</strong></h3>
				<h5 class = "text-danger"><?php echo $row["Description"]; ?></h5>
				<input type = "hidden" name = "hidden_cat" value = "<?php echo $row["Category"]; ?>" />
				<input type = "hidden" name = "hidden_price" value = "<?php echo $row[5]; ?>" />
				<br/>
				<br/>
				<br/>
				<form method = "post">
				<input style =" float: right;width: 45%; background: green;" name = "add" type="submit" class="btn btn-primary" value= "Add to Cart" />
				</form>
	</div>

	<?php
			
			}
				}
						
						
					}
		
				}	
			
			
			



?>

</div>
	<div style = "padding: 1em 0 2em 0;">
	
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
										<p align = "center">Contact Us:  8133936723
											&copy; EFarming. All rights reserved</p>
								
		</footer>
				
</div>



</body>
</html>