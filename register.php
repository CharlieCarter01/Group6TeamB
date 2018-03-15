<?php
   session_start();
?>

<?php
	$emailErr = $pwdErr = ""; // Holds errors for incorrect fields
	
	// Declaring variables for user input
	$email = $pwd = "";
	
	// Was the user's registration successful or not
	$regSuccess = 0;

	// If a post request has been made, continue, else stop
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
		$mysqli = new mysqli("localhost", "root", "", "mydatabase");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			exit();
		}
		$query = 'SELECT Email FROM user WHERE Email="'.$_POST["inputEmail"].'"';
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		if($result->num_rows > 0){
			$emailErr = "That email is already registered, please use a different one";
			$fieldsValid = 0;
		}
		else{
			$email = removeJS($_POST["inputEmail"]);
		}

		$pwd = $_POST["inputPassword"];
		// Hash password for storage in database
		$pwd = password_hash($pwd, PASSWORD_DEFAULT);
		
		// Attempt to prepare first SQL insert query for main user table
		if(!($stmt = $mysqli->prepare("INSERT INTO user (Email, Password) VALUES (?,?)"))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			exit();
		}
		
		// Attempt to bind values to SQL query
		if (!$stmt->bind_param("ss", $email, $pwd)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		
		// Attempt to execute first query
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		else{
			$regSuccess = 1;
		}
		
		// Get userID for the activation email
		$query = 'SELECT UserID FROM user WHERE Email="'.$email.'"';
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		$id = $row["UserID"];
		
		// Email user their activation link
		$hash = uniqid();
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>StressMonitor Account Activation</title></head>
		<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
		<div style="padding:10px; background:#333; font-size:24px; color:#CCC;">
		<a href="http://127.0.0.1/">
		</a>StressMonitor Account Activation</div><div style="padding:24px; font-size:17px;">Hello and welcome to StressMonitor,<br><br>
		Click the link below to activate your account:<br><br>
		<a href="127.0.0.1/activation.php?id='.$hash.'">
		Click here to activate your account</a><br><br>Login after successful activation using your:
		<br> Email Address: <b>'.$email.'</b></div></body></html>';
		$headers = "From: stressmonitor123@gmail.com MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1\n";

		mail($email, 'StressMonitor Account Activation', $message, $headers);
		
		// Attempt to prepare query to insert user activation hash
		if(!($stmt = $mysqli->prepare("UPDATE user SET ActivationHash=? WHERE UserID=?"))){
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			exit();
		}
		// Attempt to bind values to SQL query
		if (!$stmt->bind_param("ss", $hash, $id)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		// Attempt to execute query
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit();
		}
		else{
			echo "<script type='text/javascript'>";
			echo "window.location.replace('index.php')";
			echo "</script>";
		}
		
		$mysqli->close();
	}
	
	// Gets rid of any potentially malicious JavaScript code submitted by user
	function removeJS($input){
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;
	}
?><br>