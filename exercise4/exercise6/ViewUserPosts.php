<?php
	echo '<link rel="stylesheet" href="ViewUserPosts.css">';
	$mysqli = new mysqli("mysql.eecs.ku.edu", "wesleysportsman", "Ree7Fa9s", "wesleysportsman");
	// check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	else{
		$user = $_POST["user"];
		$query = "SELECT *
		FROM Posts
		WHERE author_id='$user'
		ORDER BY post_id";
		//code for grabbing users
		if ($result = $mysqli->query($query)) {
			echo "<p>Success</p>";
			echo "<p>Here are $user's posts.</p>";
			echo "<table>";
			 /* fetch associative array */
			while ($row = $result->fetch_assoc()) {
				//echo "<p>Test</p>";
				$temp = $row["content"];
				echo "<tr><td>$temp</tr></td>";
				echo "<tr><td><br></tr></td>";
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