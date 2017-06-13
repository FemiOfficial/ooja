<?php
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
	
		<!-- Font-Awesome Icons -->
	<link href = "assets/css/font-awesome.min.css" rel = "stylesheet">

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
             <a class="navbar-brand" href="index.php" style = "padding-right: 100px; "><strong>Farm Connect</strong></a>
            </div>
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style = "font-weight: bold;">
                <ul class="nav navbar-nav">
                   <li>
                        <a  id = "productsbtn" style = "padding-right: 100px;" href="FarmerProfile.php?username=<?php if(isset($_SESSION['Company_Name'])) echo $_SESSION['Company_Name'] ; ?>">View My Products</a>
                    </li>
					<li>
                        <a  id = "orderbtn" style = "cursor: pointer; padding-right: 100px;" >View My Orders</a>
                    </li>
					<li>
                        <a  id = "orderbtn" style = "padding-right: 100px;" href = "addProduct.php?username=<?php if(isset($_SESSION['Company_Name'])) echo $_SESSION['Company_Name'] ; ?>"  >Add New Product</a>
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
	<header class="jumbotron hero-spacer"style= "background: url(assets/img/background.jpg); margin-top: 0px; background-size: cover; height: 200px;">
     <h1 align ="center" style= "color:white;"><strong> <?php if(isset($_SESSION['Company_Name'])) echo $_SESSION['Company_Name'] ; ?></strong></h1>
	 </header>   
	  <div class="row text-center">
	  <form method = "post">
		<input type = "hidden" name = "valuetoSearch" value = "<?php echo $_SESSION['Company_Name']; ?>"  />
	  </br>
	<div class = "table-responsive" id = "productsdiv" style= "padding-left: 50px;">
		<h1 align = "left" >My Products</h1><br>
	
	<table class = "table table-bordered" >
				
				<tr>
					<th width = "10%">Order ID</th>
					<th width = "13%">Category</th>
					<th width = "35%">Description</th>
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
		<div class="table table-responsive" id = "orderdiv" style = "display:none; padding-left: 40px;">
		<form method = "post">
		<h1 align = "left">Order Deliveries</h1>
		<table class = "table table-bordered">
				<tr>
					<th width = "10%">Order ID</th>
					<th width = "13%">Buyer's FirstName</th>	
					<th width = "13%">Buyer's Lastname</th>
					<th width = "10%">Product</th>
					<th width = "13%">Mobile Number</th>
					<th width = "20%">Address</th>
					<th width = "10%">State</th>
					<th width = "10%">Status</th>
					
				
				</tr>
				
				<?php
				
					if(isset($_SESSION['Company_Name'])){
					$sql ="SELECT order.orderid,farmers.Company_Name, order.category, delivery.firstname,
								delivery.lastname, delivery.mobile, delivery.address,
							delivery.city, delivery.near, delivery.state, delivery.status 
							FROM `delivery`, `order`, `farmers`
							WHERE delivery.id = order.orderid AND farmers.Company_Name = '$_SESSION[Company_Name]' ";
					
					
					$result =  mysqli_query($conn, $sql);
					
					$check_user = mysqli_num_rows($result);
				
				if($check_user > 0){
					while($row = mysqli_fetch_array($result)){
			
				?>
						<tr>
							<td><?php echo $row["orderid"]; ?></td>
							<td> <?php echo $row["firstname"];?></td>
							<td> <?php echo $row["lastname"]; ?></td>
							<td><?php echo $row["category"]; ?></td>
							<td><?php echo $row["mobile"]; ?></td>
							<td><?php echo "$row[address], $row[near]" ?></td>
							<td><?php echo $row["state"]; ?></td>
							<?php if($row["status"] == "Not Delivered"){ 
							?>
							<td><input type= "text" class = "status" value = "Not Delivered" style = "color: red; border: 0px; font-weight: bold;"readonly/>
							</td>
							<?php
							}else{
							?>
							<td><input type= "text" class = "status" value = "Confirmed Delivery" style = "color: red; border: 0px; font-weight: bold; " readonly/>
							</td>
						
							<?php
							}
							?>
						</tr>
					
				<?php
					} 						}				
						
					}
					
					
					
				?>
				
			</table></br>
		
		
		</form>
		
		</div>
		
		
		
		
		
		
	</div>
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type = "text/javascript" src = "js/showhide.js"></script>

	
	</div>
	</br>
	</br>
		<div style = "padding: 1em 0 2em 0;">
	
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
										<p align = "center">Contact Us: (234) 8133936723
											&copy; FarmConnect. All rights reserved</p>
								
		</footer>
				
</div>
    </footer>

		</body>
</html>