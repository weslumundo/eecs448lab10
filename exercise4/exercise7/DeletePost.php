<?php
	echo '<link rel="stylesheet" href="DeletePost.css">';
	$mysqli = new mysqli("mysql.eecs.ku.edu", "wesleysportsman", "Ree7Fa9s", "wesleysportsman");
	// check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	else{
		$posts = $_POST["posts"];
		//code for deleting posts
		if(empty($posts)){
			echo "<p>No posts selected</p>";
		}
		else{
			$size=sizeof($posts);
			for($i=0;$i<$size;$i++){
				$temp = $posts[$i];
				$query = "DELETE FROM Posts
				WHERE post_id='$temp'";
				if ($mysqli->query($query)) {
					echo"<p>Success deleting post $temp</p>";
				}	
				else{
					printf("Something went wrong deleting post ".$temp." : %s\n", $mysqli->error);
				}
			}	
		}
		//close connection
		$mysqli->close();
	}
?>