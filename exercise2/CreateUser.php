<?php
	echo '<link rel="stylesheet" href="CreateUser.css">';
	$mysqli = new mysqli("mysql.eecs.ku.edu", "wesleysportsman", "Ree7Fa9s", "wesleysportsman");
	// check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	else{
		//code for adding the user
		$user = $_POST["user"];
		if ($user != ""){//check not empty
			$query = "INSERT INTO Users (user_id) 
			VALUES ('$user')";
			//code for checking if it was a success
			if ($mysqli->query($query)) {
				echo"<p>User created successfully!</p>";
			}	
			else{
				echo"<p>Username already taken!</p>";
			}
		}
		else{
			echo"<p>Username cannot be empty!</p>";
		}
		//close connection
		$mysqli->close();
	}
?>