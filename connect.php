<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$topic = $_POST['topic'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','my_database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, topic, message) values(?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $email, $topic, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>