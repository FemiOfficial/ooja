<?php
			include_once "functions.php";
			ini_set('mysql.connect_timeout', 300);
			ini_set('default_socket_timeout', 300);

			include_once "resource/session.php";
					
			
			$servername = "localhost";
			$username = "root";
			$password = "femi";
			$dbname = "register";
			
			//$conn = mysql_connect($servername, $username, $password);
			//mysql_select_db($dbname, $conn);
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
   
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>Farm Connect</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
					<li>
                        <a href="register.php"><strong>Register</strong></a>
                    </li>
					
					<li>
                        <a href="login.php"><strong>Buy Farm Products</strong></a>
                    </li>
					
					<li>
                        <a href="logout.php"><strong>Logout</strong></a>
                    </li>
					
                </ul>
            </div>
        </div>
    </nav>
	</br>
	
</br>	
</br>
<div class = "container">
	<header class="jumbotron hero-spacer" style= "background: url(img/background.jpg); margin-top: 0px; background-size: cover; height: 200px;">
     <h1 align ="center" style = "color: white;">Welcome, <?php if(isset($_SESSION['username'])) echo $_SESSION['username'] ; ?> </h1>
	
	 </header>   
	
	
	 <div class="row text-center" ">
			
		<h1 align = "left">My Orders</h1><form method = "post"><input style = "float: right;" type = "submit" name = "buyProduct" class="btn btn-primary" value = "Buy a Product"/> <br/><br/></form>
		<?php
			if(isset($_POST["buyProduct"])){
				
				echo "<script>window.open('cart.php', '_self')</script>";
				}
		?>
		
			
		<table class = "table table-bordered">
				<tr>
					<th width = "10%">Product ID</th>
					<th width = "13%">Category</th>
					<th width = "20%">Quantity</th>
					<th width = "10%">Price</th>
					<th width = "10%">Status</th>
				
				</tr>
				
				<?php
				
				if(isset($_SESSION['username'])){
					$username = $_SESSION['username'];
				
					$sql ="SELECT * FROM `order` WHERE `Buyer` = '$username' " ;
					
					
					$result =  mysqli_query($conn, $sql);
					
					$check_user = mysqli_num_rows($result);
				
					if($check_user > 0){
					while($row = mysqli_fetch_array($result)){
				?>
				
					<tr>
						<td><?php echo $row["orderid"]; ?></td>
						<td><?php echo $row['category']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['price']; ?></td>
						
					</tr>
				
				<?php
				}
					
					}
					
					}
					
					
					
				?>
				
			</table></br>
							
		
		
		
	
	
	
	
	</div>
	
	
	
	
	
	
	</div>


</body>

</html>