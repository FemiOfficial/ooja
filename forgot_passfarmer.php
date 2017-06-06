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
<!--img src = "img/background3.jpg" id = "fsbg" width = "100%" height ="auto" style = "margin-top:0px; z-index: -100; min-width: 1040px;min-height: 100%;margin-left: 0px; position: fixed;"-->
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
<div style = "height: 75%;">
  <div class="login-form"  style = "margin-top: 75px;">
  <div class = "thumbnail" style="width: 50%; margin:auto;">

    <form method = "POST" style = "width:80%; margin: auto;" >
	 <h1>Password Reset</h1>
	 
			<?php
			
				if(isset($_POST['paswordResetBtn'])){
					$email = $_POST['email'];
					$password1 = $_POST['new_password'];
					$password2 = $_POST['confirm_password'];
				
						if($password1 != $password2){
						?>
				
							<script type = "text/javascript">
							alert("Passwords do not match");
							window.location.href = "forgot_passfarmer.php";
							</script>

							<?php
						
						}
						else{
							$sqlQuery = "SELECT * FROM farmers WHERE Email = '$email'";
							$run_user = mysqli_query($conn, $sqlQuery);
				
							$check_user = mysqli_num_rows($run_user);
				
							if($check_user > 0){
									$hashed_password = password_hash($password, PASSWORD_DEFAULT);
									$sqlUpdate = "UPDATE users SET Password = '$password1' WHERE Email = '$email'";
									$run_user = mysqli_query($conn, $sqlUpdate);
									
								?>
				
									<script type = "text/javascript">
									alert("Password Reset Successful");
									window.location.href = "loginfarmers.php";
									</script>

							<?php
							
							}
							else{
								?>
				
									<script type = "text/javascript">
									alert("Invalid Password");
									window.location.href = "forgot_passfarmer.php";
									</script>

							<?php
								}
						
						}
				
				
				}
			
			?>
			 <div class="form-group">
			   <input type="email" class="form-control"  id="UserName" name ="email" placeholder="Email" value = ""  >
			   <i class="fa fa-user"></i>
			 </div>
			 <div class="form-group log-status">
			   <input type="password" class="form-control" minlength="8" placeholder="New Password" id="Passwod" name = "new_password">
			   <i class="fa fa-lock"></i>
			 </div>
			 <div class="form-group log-status">
			   <input type="password" class="form-control" minlength="8" placeholder="Confirm Password" id="Passwod" name = "confirm_password">
			   <i class="fa fa-lock"></i>
			 </div>
			  </br>
			  <div align = "center">
			 <button style =" width: 45%;" name = "paswordResetBtn" type="submit" class="btn btn-primary" ><strong>RESET</strong></button>
			</br>
			 </br>
			</div>
			</form>
		   </div>
		   </div>
		  </div>
		   
	   <footer style = "height: 250px; background: #f1f1f1;">
	   <hr "size = 2" style = "color: #000;"/>	
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; farmconnect.com</p>
                </div>
            </div>
        </footer>

   
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	
</body>
</html>
