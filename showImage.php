

<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "register";
			
			$conn = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $conn);
			if (isset($_GET['CompanyName'])){
				$username = mysql_real_escape_string($_GET['CompanyName']);
				$query = mysql_query("SELECT * FROM products WHERE 'CompanyName' = '$username'") ; 
				while($row = mysql_fetch_assoc($query){
					$imageData = $row["image"];
				}
				header("content-type: image/jpeg");
				echo $imageData;
			}
			else{
			
			echo "Error!";
			}



?>