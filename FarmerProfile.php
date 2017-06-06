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
				
				
				if(isset($_SESSION['Company_Name'])){
				 $valuetosearch = $_SESSION['Company_Name'];
				 $sql = "SELECT * FROM products WHERE CompanyName = '$valuetosearch'";
				$result = mysqli_query($conn, $sql);
				 
				}
				else{
					$sql = "SELECT * FROM 'products'";
					$result = mysqli_query($conn, $sql);
				}
				
				if(isset($_POST['addProduct'])){
				echo "<script>window.open('addProduct.php', '_self')</script>";
				}
				
				if(isset($_POST['delete'])){
				$sql = "DELETE FROM products WHERE id = '$_POST[hidden]' ";
				$result = mysqli_query($conn, $sql);
				?>
				
				<script type = "text/javascript">
				alert("Product Will be Deleted");
				window.location.href = "FarmerProfile.php";
				</script>

				<?php
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
                        <a href="loginfarmers.php">Login As Farmer</a>
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
     <h1 align ="center" style= "color:white;"><strong> <?php if(isset($_SESSION['Company_Name'])) echo $_SESSION['Company_Name'] ; ?></strong></h1>
	 </header>   
	  <div class="row text-center">
	  <form method = "post">
		<input type = "hidden" name = "valuetoSearch" value = "<?php echo $_SESSION['Company_Name']; ?>"  />
	  </br>
	  <h1 align = "left">Products</h1><input style = "float: right;" type = "submit" name = "addProduct" class="btn btn-primary" value = "Add new Product"/> </br>

	  </br>
	<div class = "table-responsive">
			<table class = "table table-bordered">
				<tr>
					<th width = "10%">Order ID</th>
					<th width = "13%">Category</th>
					<th width = "35%">Buyer</th>
					<th width = "10%">Unit Price</th>
					<th width = "10%">Action</th>
				
				</tr>
				
				<?php 
				
					$check_user = mysqli_num_rows($result);
				
					if($check_user > 0){
					while($row = mysqli_fetch_array($result)){
			
				?>
				
				<tr>
				<td><?php echo '<img  style = " border-radius: 10px;height: 45px; width: 45px;"src = "data:image/jpeg;base64,'.base64_encode($row["image"]).'">'; ?></td>
				<td><?php echo $row['Category']; ?></td>
				<td><?php echo $row['Description']; ?></td>
				<td><?php echo $row['Prcie']; ?></td>
				<td><a style= "padding: 5px;" href = "editProduct.php?edit=<?php echo $row["id"] ?>"><span class = "text-danger"><strong>Edit</strong></span></a><br/><button name = "delete" class= "btn" ><span class = "text-danger"><strong>Delete</strong></span></button></td>
				
			   <input type= "hidden" name = "hidden" value = <?php echo $row["id"]; ?> />
				
				
				<?php 
				}
				}
				?>	
				</tr>							
			</table></br>
		
		
		</div>
		</form>
		<br/>
		<br/>
		</div>
		<div class="row text-center">
		<form method = "post">
		<h1 align = "left">Orders</h1>
		<table class = "table table-bordered">
				<tr>
					<th width = "10%">Product ID</th>
					<th width = "13%">Category</th>
					<th width = "13%">Buyer</th>
					<th width = "20%">Quantity</th>
					<th width = "10%">Price</th>
					<th width = "10%">Action</th>
				
				</tr>
				
				<?php
				
					if(isset($_SESSION['Company_Name'])){
					$sql ="SELECT order.orderid, products.category, order.Buyer, order.quantity, order.price, products.CompanyName
							FROM `products`, `order`
							WHERE products.id = order.productid AND products.CompanyName = '$_SESSION[Company_Name]' ";
					
					
					$result =  mysqli_query($conn, $sql);
		
					$check_user = mysqli_num_rows($result);
				
					if($check_user > 0){
					while($row = mysqli_fetch_array($result)){
				?>
				
					<tr>
						<td><?php echo $row["orderid"]; ?></td>
						<td><?php echo $row['category']; ?></td>
						<td><?php echo $row['Buyer']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['price']; ?></td>
						
					</tr>
				
				<?php
				}
					
					}
					
					}
					
					
					
				?>
				
			</table></br>
		
		
		</form>
		
		</div>
		
		
		
		
		
		
	</div>	
	</div>
	</br>
	</br>
	<hr "size = 2" style = "color: #000;"/>	
	   <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; farmconnect.com</p>
                </div>
            </div>
        </footer>

		</body>
</html>