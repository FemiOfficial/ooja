<?php
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
					if(isset($_POST['email'])){
							$email = $_POST['email'];
							$username = $_POST['username'];
							$password = $_POST['password'];
							
							$sql = "INSERT INTO Users(username, email, password)
							VALUES ('$username', '$email', '$password')";
						if ($conn->query($sql) === TRUE) {
							echo "New record created successfully";
						} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
				}		


			}
			
			

				$conn->close();
  ?>  
<html>
<head>
	<title>User Registeration Using PHP & MySQL</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		 
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
		 
		<link rel="stylesheet" href="style.css" >
		 
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
		<div class="container">
			  <form class="form-signin" method="GET">
			  
			  
				<h2 class="form-signin-heading">Please Register</h2>
				<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">@</span>
					  <input type="text" name="username" class="form-control" placeholder="Username" required>
				</div>
						<label for="inputEmail" class="sr-only">Email address</label>
						<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox">
				  <label>
					<input type="checkbox" value="remember-me"> Remember me
				  </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
				<a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
			  </form>
		</div>
 
</body>
 
</html>
