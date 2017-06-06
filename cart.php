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
				
			if(isset($_POST["buy"])){
				if(isset($_SESSION["shopping_cart"])){
					$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
					if(!in_array($_GET["id"], $item_array_id)){
						
						$count = count($_SESSION["shopping_cart"]); 
						$item_array = array(
						'item_id' => $_GET["id"],
						'item_name' => $_POST["hidden_cat"],
						'item_price' => $_POST["hidden_price"],
						'item_quantity' => $_POST["quantity"]
							
						
					);
					$_SESSION["shopping_cart"][$count] = $item_array;
					
				
					}
					/*else{
						echo '<script>alert("item already added")</script>';
						echo '<script>window.location = "index.php"</script>';
					}
					*/
				}
				else{
					$item_array = array(
						'item_id' => $_GET["id"],
						'item_name' => $_POST["hidden_cat"],
						'item_price' => $_POST["hidden_price"],
						'item_quantity' => $_POST["quantity"]
						
								);
					$_SESSION["shopping_cart"][0] = $item_array;
				}
				
				
			}
			if(isset($_GET["action"])){
			
				if($_GET["action"] == "delete"){
				foreach($_SESSION["shopping_cart"] as $keys => $values){
					if($values["item_id"] == $_GET["id"]){
						unset($_SESSION["shopping_cart"][$keys]);
						echo '<script>alert("item removed")</script>';
						echo  '<script>window.location = "cart.php"</script>';
					
					}
				
				
				}
				}
			
			
			}
			

?>

<html>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

	<body>
	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style = "padding-right = 45px; "><strong>Farm Connect</strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li>
                        <a href="register.php">Register</a>
                    </li>
					
					<li>
                        <a href="login.php">Buy Farm Products</a>
                    </li>
					<li>
                        <a href="buyerProfile.php"><strong>View Profile</strong></a>
                    </li>
					
					<li>
						<a href = "logout.php">Logout</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<div class = "container">
	<header class="jumbotron hero-spacer"style= "background: url(img/background.jpg); margin-top: 0px; background-size: cover; height: 200px;">
     <h1 align ="center" style= "color: white;">Welcome, <?php if(isset($_SESSION['username'])) $username = $_SESSION['username']; echo $username ; ?></h1>
	 
	 </header>   
	  <div class="row text-center">
			<div class = "table-responsive">
			<table class = "table table-bordered">
				<tr>
					<th width = "10%">Product Id</th>
					<th width = "20%">Item Name</th>
					<th width = "10%">Quantity</th>
					<th width = "20%">Price</th>
					<th width = "15%">Total</th>
					<th width = "5%">Action</th>
				</tr>
				<?php
					$total = 0;
					if(!empty($_SESSION["shopping_cart"])){
						
						foreach($_SESSION["shopping_cart"] as $keys => $values){
				
				?>	
					<tr>
						<?php
							$id = $values["item_id"];
							 $category = $values["item_name"];
							$quantity = $values["item_quantity"];
							$price = $values["item_price"];
							
							
							 
						?> 
					
						<td><?php $productid =  uniqid(); echo $productid; ?></td>
						<td><?php echo $category; ?></td>
						<td><?php echo $quantity; ?></td>
						<td># <?php echo $price; ?></td>
						<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
						<td><a href = "cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class = "text-danger">Remove</span></a></td>
						
					</tr>
					<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
						
						
						
					
					}
					$sql = "INSERT INTO `order`(`orderid`, `category`, `quantity`, `price`, `Buyer`, `productid`) VALUES 
							('$productid','$category','$quantity','$price','$username','$id')";
					$result = mysqli_query($conn, $sql);
			
					}else{
						echo " ";
					}
					
					
					
					?>

					<p>
						<h3 align = "right"><strong>Bill: #<?php  echo  number_format($total, 2) ?></strong></h3>
					</p>
								
			</table>
			<button name = "order" class = "btn" style = "float: right;"><strong>Order Now</strong></button>
		
		</div>
		<h1 align ="center"><strong>Explore Our Marketplace</strong></h1>

		<?php
			$page = $_GET["page"];
			
			$count = "SELECT * FROM products";
			$countquery = mysqli_query($conn, $count);
			$c = mysqli_num_rows($countquery);
			$rand = rand(6, $c) - 6;
			
			
			
			if($page == "" || $page == "1"){
			
			$page1 = 0;
			
			}else{
				$page1 = ($page*5)-5;
			
			}
			
			
			$sql = "SELECT * FROM products WHERE 'id' > '$rand' LIMIT $page1,6";
			$run_user = mysqli_query($conn, $sql);
			$check_user = mysqli_num_rows($run_user);
				
				if($check_user > 0){
					while($row = mysqli_fetch_array($run_user)){
				
				?>
			<div class = "col-md-4">
			<div class = "thumbnail" align = "center">

				<form method = "post" action = "cart.php?action=add&id=<?php echo $row["id"]; ?>">
				<img class = "img-responsive"
				<?php
					echo '<img src = "data:image/jpeg;base64,'.base64_encode($row[8]).'">';
				?>
				<div align = "center">
				<h4 class = "text-info"><strong><?php echo $row["Category"]; ?></strong></h4>
				<h4 class = "text-info" ><strong>Seller: </strong><?php echo $row["CompanyName"]; ?></h4>
				
				<h4 class = "text-danger">Price: #<?php echo $row["Prcie"]; ?></h4>
				<input type = "hidden" name = "hidden_cat" value = "<?php echo $row["Category"]; ?>" />
				<input type = "hidden" name = "hidden_price" value = "<?php echo $row["Prcie"]; ?>" />
				<input type = "hidden" name = "hidden_name" value = "<?php echo $row["CompanyName"]; ?>" />
				<input type ="text"  style = "width: 120px;" name = "quantity" class = "form-control" placeholder = "Enter Quantity"/></br>
				<input  style =" background: green;" type = "submit" name = "buy" class="btn btn-primary" value = "Buy Now!"/> </br>
					

				</div>
				</div>
				</form>
			
			</div></br>
				<?php
					 
			}
					$no_of_pages = ceil($c/9);
					
					for($i = 1 ; $i <= $no_of_pages; $i++){
						?><a href = "cart.php?page=<?php echo $i ?>"><?php echo $i." "; ?></a><?php 
					
					}
				}
			
			
			
		
		?>
		
	</div>	
	
	</div>
				<!-- Footer -->

	
	</body>
</html>