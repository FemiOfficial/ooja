<?php
	
	ini_set('mysql_connect.connect_timeout', 300);
	ini_set('default_socket_timeout', 300);

	include_once "resource/session.php";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "register";
	
$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	
	
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$sql = "SELECT * FROM products WHERE id = '$id' ";
		if($result = mysqli_query($conn,$sql)){
		$row = mysqli_fetch_array($result); 
		
		
		
	
	}}
	if (isset($_POST["AddProduct"])){
		 if (!empty($_POST['phone']) && (!empty($_POST['select_category'])) && (!empty($_POST['category'])) && (!empty($_POST['price']))){
		$username = $_POST["username"];
		$phone = $_POST["phone"];
		$category = $_POST["category"];
		$description = $_POST["description"];
		$select = $_POST['select_category'];
		
		$price = $_POST["price"];
		$id = $_GET["edit"];


		$sql = "UPDATE products SET CompanyName = '$_POST[username]', 
					Category='$_POST[category]', 
					Description='$_POST[description]', 
					Phone='$_POST[phone]', Price='$_POST[price];'
				    WHERE id = '$id' ";
		$result = mysqli_query($conn,$sql);
		?>
		
		<script type = "text/javascript">
		alert("Product Update Successful");
		window.location.href = "FarmerProfile.php";
		</script>
	<?php
		}
		else{
			?>
		
		<script type = "text/javascript">
		alert("Please Complete form");
		window.location.href = "editProduct.php?edit=<?php echo $id?>";
		</script>
	<?php

		
		}
				}
		if(isset($_POST["imageUpdate"]) ){
			if($_FILES['image']['tmp_name'] == 0){
			$image = base64_encode($row["image"]);
			$name = $row["ImageName"];
		}
		else{
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image = mysqli_real_escape_string(file_get_contents($image));
		
		$sql = "UPDATE products SET image = '$image', ImageName = '$name' WHERE id = '$id' "; 
		$result = mysqli_query($conn,$sql);
	
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

    <title>E - Farming : Buy and Sell Raw Product Online</title>

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
                <a class="navbar-brand" href="#"><strong>E- Farming</strong></a>
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
	<form method = "post" enctype = "multipart/form-data" action = ""style = "width:50%; margin: auto;">
		<br/>
		<h1>Add Product</h1>
		<div class="form-group ">
		   <input type="text" class="form-control" placeholder="Company Name " id="username" minlength="8" name ="username" value = "<?php echo $row["CompanyName"]; ?>">
		   <i class="fa fa-user"></i>
		 </div>
		<div class="form-group ">
		   <input type="number" class="form-control" placeholder="Phone Number " id="Phone" minlength="8" name ="phone" value = "<?php echo $row["Phone"]; ?>">
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
		   <input type="text" class="form-control" minlength="4" placeholder="Kind of Product e.g Rice, yam, palm oil e.t.c" id="category" name ="category" value = "<?php echo $row["Category"]; ?>">
		   <i class="fa fa-user"></i>
		 </div>
		  <div class="form-group ">
		   <input type="number" class="form-control" minlength="6"  placeholder="Enter Price of Product" id="price" name ="price" value = "<?php echo $row["Price"]; ?>">
		   <i class="fa fa-user"></i>
		 </div>
		 
		<div class="form-group ">
		   <textarea class="form-control" minlength="20" maxlength = "120" placeholder="Description " id="description" name ="description"  style="width:100%;height:150px;"><?php echo $row["Description"]; ?></textarea>
		   <i class="fa fa-user"></i>
		 </div>
		<div class="form-group ">

			<form method = "post" enctype = "multipart/form-data" style = "width:50%; margin: auto;">
		<hr>
		
		<p>       </p><?php echo '<img  style = " border-radius: 10px;height: 45px; width: 45px;"src = "data:image/jpeg;base64,'.base64_encode($row["image"]).'">'; ?>
		
		<br/>
	
		<input type = "file" name = "image"><br/><button name = "imageUpdate" type="file" class="btn" style ="float: left;"><strong>Update Image</strong></button><br/>
		  
		<p>		
		<br/>
		  <button name = "AddProduct" type="submit" class="btn btn-primary" style ="float: right;"><strong>UPDATE PRODUCT</strong></button> 
        </p>
	</form>
	
	
		<div style = "padding: 1em 0 2em 0;">
	
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
										<p align = "center">Contact Us:  8133936723
											&copy; EFarming. All rights reserved</p>
								
		</footer>
				
</div>

			


	
	
	
</body>
</html>	