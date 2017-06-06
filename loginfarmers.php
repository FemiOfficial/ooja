<?php
	include_once "resource/session.php";
				$servername = "localhost";
				$username = "root";
				$password = "femi";
				$dbname = "register";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				
		
?>









<!DOCTYPE html>
<html >

  <head>
  <meta charset="UTF-8">
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
                        <a href="loginfarmers.php">Login As Farmer</a>
                    </li>
					
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 

 <div class="login-form" style = "margin-top: 75px;">
  <div class = "thumbnail" style="width: 50%; margin:auto;">
     <form method = "POST" style = "width:80%; margin: auto;">
	    <h1>Farmer's Sign In</h1>
			<?php
			if(isset($_POST["loginBtn"])){
				$username = mysqli_real_escape_string($conn, $_POST["username"]);
				$password = mysqli_real_escape_string($conn, $_POST["pass"]);
				//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				
				
				$sel_user = "SELECT * FROM farmers WHERE Company_Name = '$username' AND Password = '$password'";
				
				$run_user = mysqli_query($conn, $sel_user);
				
				$check_user = mysqli_num_rows($run_user);
				
				if($check_user > 0){
					$_SESSION['Company_Name'] = $username;
					
					echo "<script>window.open('FarmerProfile.php', '_self')</script>";
				}
				else{
				$result = "<p style='padding: 20px; color: red; line-height: 1.5;'>invalid password or usename</p>";
				echo $result;
				}
				
			}
			

			?>
			 <div class="form-group">
			   <input type="text" class="form-control"  id="UserName" name ="username" placeholder="Username" value = ""  >
			   <i class="fa fa-user"></i>
			 </div>
			 <div class="form-group log-status">
			   <input type="password" class="form-control" placeholder="Password" id="Passwod" name = "pass">
			   <i class="fa fa-lock"></i>
			 </div>
			<a class="link" style = "float: left;padding-left: 20px;"href="register.php">Register Here</a><a class="link" style = "float: right; padding-right: 20px;"href="forgot_passfarmer.php">Lost your password?</a></br>
			  </br>
			  <div align = "center">
			 <button style =" width: 45%;" name = "loginBtn" type="submit" class="btn btn-primary" ><strong>SIGN IN</strong></button>
			</br>
			 </br>
			</div>
			</form>
		   </div>
		   </div>
   
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	
</body>
</html>