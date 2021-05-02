<?php
	echo '<link rel="stylesheet" href="ViewUsers.css">';
	$mysqli = new mysqli("mysql.eecs.ku.edu", "wesleysportsman", "Ree7Fa9s", "wesleysportsman");
	// check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	else{
		$query = "SELECT *
		FROM Users";
		
		//code for grabbing users
		if ($result = $mysqli->query($query)) {
			echo "<p>Success</p>";
			echo "<table>";
			 /* fetch associative array */
			while ($row = $result->fetch_assoc()) {
				//echo "<p>Test</p>";
				$temp = $row["user_id"];
				echo "<tr><td>$temp</tr></td>";
			}
			//free results
			echo "</table>";
			$result->free();
		}	
		else{
			printf("Something went wrong: %s\n", $mysqli->error);
		}
		//close connection
		
		$mysqli->close();
	}
?>