<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$password = $_POST['psame'];
	$confirmPassword = $_POST['psame'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fullName, email, password, confirmPassword) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $fullName, $email, $password, $confirmPassword);
		$execval = $stmt->execute();
		echo $execval;
		header('Location: after.html');
		exit();
		$stmt->close();
		$conn->close();
	}
?>