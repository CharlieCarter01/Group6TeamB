<?php
	// Used to activate user's account once they click a link we send to them via email

	// Check that the request method is get and there is an ID parameter
	if($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET["id"])){
		$id = removeJS($_GET["id"]);
		// Open a new SQL connection
		$mysqli = new mysqli("localhost", "root", "", "mydatabase");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			exit();
		}
		// Attempt to prepare an SQL update query to activate the user's account
		if(!($stmt = $mysqli->prepare("UPDATE user SET Activated=1 WHERE ActivationHash=?"))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			exit();
		}
		// Attempt to bind ID to SQL query
		if (!$stmt->bind_param("s", $id)){
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		// Attempt to execute query
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		else{
			echo "Account activated!";
			echo "<script type='text/javascript'>";
			echo "window.location.replace('index.php')";
			echo "</script>";
		}
	}
	
	// Remove any potentially malicious JS code
	function removeJS($input){
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;
	}
?>