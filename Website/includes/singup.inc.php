<?php

if (isset($_POST['submit'])) {
	include_once 'dbh.php';

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	//Error handlers
	//Check if input characters are valid
	if (!preg_match("/^[a-zA-Z]*$/", $uid)) {
		header("Location: ../singup.php?singup=invalid");
		exit();
	} else {
		//Check if username is valid
		$sql = "SELECT * FROM userlist WHERE userName='$uid';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			header("Location: ../singup.php?singup=error");
			exit();
		} else {
			//Hashing the password
			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
			//Insert the user into the database
			$sql = "INSERT INTO `userlist`(`name`, `userName`, `password`, `email`) VALUES ('$name' , '$uid', '$hashedPwd', '$email');";
			$conn->query($sql);
			header("Location: ../index.php?singup=success");
			exit();
		}
	}
} else {
	header("Location: ../singup.php");
	exit();
}
