<?php
	
	ini_set('mysql.connect_timeout', 300);
	ini_set('default_socket_timeout', 300);

	include_once "resource/session.php";


		if(isset($_POST['AddProduct'])){
			if(isset($_POST['username']) && (isset($_POST['phone'])) && (isset($_POST['select_category'])) && (isset($_POST['category'])) && (isset($_POST['price'])) && ($_FILES['image']['tmp_name'] == TRUE) ){
				$image = addslashes($_FILES['image']['tmp_name']);
				$name = addslashes($_FILES['image']['name']);
				$image = mysql_real_escape_string(file_get_contents($image));
				//$image = base64_encode($image);
				saveimage($name, $image);
						
		
			
			}
			else{
			
					?>
				
							<script type = "text/javascript">
							alert("Please Complete the Form ");
							window.location.href = "addProduct.php";
							</script>

							<?php

			}
			
		
		}
		
		
		function saveimage($name, $image){
			$servername = "localhost";
			$username = "root";
			$password = "femi";
			$dbname = "register";
			
			$conn = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $conn);
			
			
			$username = $_POST['username'];
			$phone = $_POST['phone'];
			$price = $_POST['price'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$select = $_POST['select_category'];
			
				
			$sql = "INSERT INTO products (CompanyName, Category, type_product, Description, Phone, Prcie, ImageName, image)
			VALUES ('$username', '$category', '$select', '$description', '$phone', '$price', '$name', '$image')";
		
				$result = mysql_query($sql, $conn);
				if($result){
					echo "<script>window.open('FarmerProfile.php', '_self')</script>";
				}
				else{
					echo "<br/>Not Uploaded";
				}
			
						
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
                <a class="navbar-brand" href="index.php"><strong>Farm Connect</strong></a>
            </div>
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
        </div>
    </nav>
	</br>
	
	<h3 align = "center">You are logged in as <?php if(isset($_SESSION['Company_Name'])) echo $_SESSION['Company_Name'] ; ?></h3>
</br>	
</br>
	<form method = "post" enctype = "multipart/form-data" style = "width:50%; margin: auto;">
		<br/>
		<h1>Add Product</h1>
		<div class="form-group ">
		   <input type="text" class="form-control" placeholder="Company Name " minlength="8"  id="username" name ="username">
		   <i class="fa fa-user"></i>
		 </div>
		<div class="form-group ">
		   <input type="number" class="form-control" placeholder="Phone Number"  minlength="11"  id="Phone" name ="phone">
		   <i class="fa fa-user"></i>
		 </div>
			 <div class="form-group ">
				<select name = "select_category" style = "width: 100%;">
					<option>Select product category here</option>
					<option>Livestock</option>
					<option>Fruits</option>
					<option>Vegetables</option>
					<option>Raw foods</option>
					<option>Beverages</option>
					<option>Cocoa</option>
					<option>Fishery</option>
					<option>Mushroom</option>
					<option>Grain</option>
					<option>Agrochemicals</option>
					<option>Feeds</option>
					<option>Seafoods</option>
					<option>Animal Oil</option>
			</select>
		   <p style = "color:blue;">Products with specified category have more customers</p>
		   <i class="fa fa-user"></i>
		 </div>
		
		<div class="form-group ">
		   <input type="text" class="form-control" minlength="4" placeholder="Kind of Product e.g Rice, yam, palm oil e.t.c" id="category" name ="category">
		   <i class="fa fa-user"></i>
		 </div>
		  <div class="form-group ">
		   <input type="number" class="form-control" minlength="6"  placeholder="Enter Price of Product" id="price" name ="price">
		   <i class="fa fa-user"></i>
		 </div>
		 
		<div class="form-group ">
		   <textarea class="form-control" placeholder="Description " minlength="20" maxlength = "120" id="description" name ="description" style="width:100%;height:150px;"></textarea>
		   <i class="fa fa-user"></i>
		 </div>
		<div class="form-group ">

			<form method = "post" enctype = "multipart/form-data" style = "width:50%; margin: auto;">
		<hr>
		
		Upload Picture:
		</br>
		<input type = "file" name = "image"/>
		<br/><br/>
		  <i class="fa fa-user"></i>
		 </div>
		 <p>
           <button name = "AddProduct" type="submit" class="btn btn-primary" style ="float: right;">Add Product</button> 
        </p>
	</form>
	
	
	

	
	
	
</body>
</html>	