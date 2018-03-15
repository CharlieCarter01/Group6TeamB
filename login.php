<?php
   session_start();
?>

<?php
		$emailErr = "";
		$passwordErr = "";
		$activatedErr = "";

		$email = "";
		$password = "";
		$activated = "";

		$loginSuccess = 1;

		// Create an SQL connection
		$mysqli = new mysqli("localhost", "root", "", "mydatabase");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			exit();
		}

		// CHECK EMAIL
		// Attempt to prepare an SQL query to check email
		if(!($stmt = $mysqli->prepare('SELECT Email FROM user WHERE Email=?'))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			exit();
		}
		// Attempt to bind values to SQL query
		if (!$stmt->bind_param("s", $_POST["inputEmail1"])) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		// Attempt to execute SQL query
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		$stmt->bind_result($email);
		$stmt->fetch();
		$stmt->close();
		if(!empty($email)){
			// EMAIL VALID
		}
		else{
			$emailErr = "That email is not registered. Please try again."; // could use this in frontend if you want
			$loginSuccess = 0;
		}
		// END CHECK EMAIL
		// CHECK PASSWORD
		// Attempt to prepare an SQL query to check password
		if(!($stmt = $mysqli->prepare('SELECT Password FROM user WHERE Email=?'))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			exit();
		}
		// Attempt to bind values to SQL query
		if (!$stmt->bind_param("s", $_POST["inputEmail1"])) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		// Attempt to execute SQL query
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		$stmt->bind_result($password);
		$stmt->fetch();
		$stmt->close();
		if(password_verify($_POST["inputPassword1"], $password)){
			// PASSWORD VALID
		}
		else{
			$passwordErr = "Incorrect password."; // could also use this in frontend if you want
			$loginSuccess = 0;
		}
		// END CHECK PASSWORD

		// CHECK ACCOUNT ACTIVATED
		// Attempt to prepare an SQL query to check if account is activated
		if(!($stmt = $mysqli->prepare('SELECT Activated FROM user WHERE Email=?'))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			exit();
		}
		// Attempt to bind values to SQL query
		if (!$stmt->bind_param("s", $_POST["inputEmail1"])) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		// Attempt to execute SQL query
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		$stmt->bind_result($activated);
		$stmt->fetch();
		$stmt->close();
		if($activated == 1){
			// ACCOUNT ACTIVATED
		}
		else{
			$activatedErr = "Account not activated"; // see previous 2 error comments
      echo 'Account not activated';
			$loginSuccess = 0;
      echo "<script type='text/javascript'>";
			echo "window.location.replace('index.php')";
			echo "</script>";
		}
		// END CHECK ACCOUNT ACTIVATED
		// If login successful, continue to create a session
		if($loginSuccess == 1){
			$_SESSION['valid'] = true;
			$_SESSION['username'] = $_POST["inputEmail1"];
			echo "<script type='text/javascript'>";
			echo "window.location.replace('index.php')";
			echo "</script>";
		}
	?>
