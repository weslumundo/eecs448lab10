 <?php
	echo '<link rel="stylesheet" href="CreatePosts.css">';
	$mysqli = new mysqli("mysql.eecs.ku.edu", "wesleysportsman", "Ree7Fa9s", "wesleysportsman");
	// check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	else{
		//code for checking if user exists
		$user = $_POST["user"];
		$post = $_POST["post"];
		if($user != ""){
			if ($post != ""){//check post not empty
				//check user exists
				$query = "SELECT *
				FROM Users 
				WHERE user_id='$user'";
				//code for checking if user exists
				if ($result=$mysqli->query($query)) {
					$row=$result->fetch_assoc();
					$test=$row["user_id"];
					if($row["user_id"]==$user){
						//add post
						$query = "INSERT INTO Posts (content, author_id) 
						VALUES ('$post','$user')";
						if($mysqli->query($query)){
							echo"<p>Post created successfully!</p>";
						}
						else{
							printf("Something went wrong: %s\n", $mysqli->error);
						}
					}
					else{
						echo"<p>User doesn't exist!</p>";
					}
					$result->free();
				}	
				else{
					printf("Something went wrong: %s\n", $mysqli->error);
				}
			}
			else{
				echo"<p>Post cannot be empty!</p>";
			}
		}
		else{
			echo"<p>Username cannot be empty!</p>";
		}
		//close connection
		$mysqli->close();
	}
?>