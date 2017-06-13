<?php
				include_once "functions.php";
				include_once "resource/session.php";
				ini_set('mysql.connect_timeout', 300);
				ini_set('default_socket_timeout', 300);
										
?>






<!DOCTYPE html>
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
                </button> <a class="navbar-brand" href="index.php" style = "padding-right = 45px; "><strong>Farm Connect</strong></a>
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
                        <a href="loginfarmers.php">Login As Farmer</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <div class="login-form">
  <div class = "thumbnail" style="width: 65%; margin:auto;">
	
     <form method = "POST" enctype = "multipart/form-data" style = "width:70%; margin: auto;" >
	<h1>Registration Form</h1>
	 	
	<?php
	
	
							$servername = "localhost";
							$username = "root";
							$password = "femi";
							$dbname = "register";
							
							$conn = mysql_connect($servername, $username, $password);
							mysql_select_db($dbname, $conn);
							
	if(isset($_POST['signUpbtn']) ){
	
				
				if( isset($_POST['category']) && (isset($_POST['email'])) && (isset($_POST['username'])) && (!empty($_POST['password'])) ){
					
				
				
				$value = $_POST['category'];				
				if($value == 'buyer' ){
				if($_POST['password'] == $_POST['confirmpassword']){
							
			
					$email = $_POST['email'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
								
							
							$sql = "INSERT INTO users(username, email, password)
							VALUES ('$username', '$email', '$password')";
					
					$result = mysql_query($sql, $conn);
						if($result){
						?>
				
							<script type = "text/javascript">
							alert("Registration Successful");
							window.location.href = "login.php";
							</script>

							<?php
									
						
				}
				else{
				?>
				
							<script type = "text/javascript">
							alert("Invalid Username");
							</script>

							<?php
							
				
				}
							}
				else{
						?>
				
							<script type = "text/javascript">
							alert("Password does not match");
							window.location.href = "register.php";
							</script>

							<?php
				
				
				}
							
						} 
						
		
		
			elseif($value == 'farmer'){
				if($_POST['password'] == $_POST['confirmpassword']){
					
					   $email = $_POST['email'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
						
							
							$sql = "INSERT INTO farmers(Company_Name, email, password)
							VALUES ('$username', '$email', '$password ')";
						
						$result = mysql_query($sql, $conn);
						
						$message = "
									Click the link below to confirm your email
									localhost
						
						
						";
						
						if($result) {
								?>
				
							<script type = "text/javascript">
							alert("Registration Successful");
							window.location.href = "loginfarmers.php";
							</script>

							<?php
							} 
							else{
				?>
				
							<script type = "text/javascript">
							alert("Invalid Username");
							</script>

							<?php
							
				
				}
					
					
					
					} 
					
					else{
						?>
				
							<script type = "text/javascript">
							alert("Password does not match");
							window.location.href = "register.php";
							</script>

							<?php
				
				
					
					}
					
				
				}

			
				else{
				
				}
				
				
				
			}
			else{
					?>
				
							<script type = "text/javascript">
							alert("Please Complete the Form ");
							window.location.href = "register.php";
							</script>

							<?php

			}
					
					
									
						
			}
			
				
					
	
				

			
			?>
			<p style='padding-left:5px; margin-bottom: 0px;color: #808080;'>Please select category</p>
			 <div name = "select-cat" style= "padding-right: 50px; color: #808080;">
				<input name = "category" type= "radio" <?php if(isset($category) && $category=="buyer") echo "checked";?> value= "buyer">Buyer
				<input name = "category" type ="radio" <?php if(isset($category) && $category=="farmer") echo "checked";?> value = "farmer">Farmer
			 </div>
			 
			 
			 <div class="form-group" style = "position:relative;">
			   <input   type="text" style = "padding-left: 25px;" class="form-control" minlength="8" placeholder="Username or Company Name " id="UserName" name ="username"/>
			  <i class="fa fa-user" style = "position: absolute; left: 0; top:2px; padding: 9px 8px; color: #aaa"></i>
			 </div>
			 <div class="form-group" style = "position:relative;">
			   <input type="email"  style = "padding-left: 25px;" class="form-control" placeholder="Email " id="Email" name ="email">
			   <i class="fa fa-envelope" style = "position: absolute; left: 0; top:2px; padding: 9px 8px; color: #aaa"></i>
			 </div>
			 <div class="form-group log-status" style = "position:relative;">
			   <input type="password" style = "padding-left: 25px;" class="form-control"  class="form-control" placeholder="Password" minlength="8" id="Passwod" name = "password">
			   <i class="fa fa-lock"style = "position: absolute; left: 0; top:2px; padding: 9px 8px; color: #aaa"></i>
			 </div>
			 <div class="form-group log-status"style = "position:relative;">
			   <input type="password"  style = "padding-left: 25px;" class="form-control" class="form-control" placeholder="Confrim Password" minlength="8" id="Passwod" name = "confirmpassword">
			   <i class="fa fa-lock" style = "position: absolute; left: 0; top:2px; padding: 9px 8px; color: #aaa"></i>
			 </div>
		
		
		<div align = "center" >
          <button  align = "center"; style = "width: 50%; margin-bottom: 50px;"name = "signUpbtn" type="submit" class="btn btn-primary" ><strong>Register</strong></button> 
		</div>
			
		
		  
   </form>
      </div>
    </div>

	<div style = "padding: 1em 0 2em 0;">
	
		<footer id="footer" class="container" style ="background: #fff; color: black; width: 100%; ">
										<hr style = "border-top: 1px solid #ccc;"><br/><br/><br/>
										<p align = "center">Contact Us: (234) 8133936723
											&copy; FarmConnect. All rights reserved</p>
								
		</footer>
				
</div>


	
</body>
</html>
