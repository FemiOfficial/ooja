<?php
			function displayimage(){
			$servername = "localhost";
			$username = "root";
			$password = "femi";
			$dbname = "register";
			
			$conn = mysql_connect($servername, $username, $password);
			mysql_select_db($dbname, $conn);
			
			$sql = "SELECT * FROM products WHERE CompanyName = 'Besttie'"; 
		
			$result = mysql_query($sql, $conn);
			  while($row = mysql_fetch_array($result)){
				echo '<img height = "150" width = "150" src = "data:image/jpeg;base64,'.base64_encode($row[7]).'">';
			}
		
		}
		

?>