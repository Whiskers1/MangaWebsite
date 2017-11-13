<?php
session_start();

if (isset($_POST['submit'])) {
  include 'dbh.php';

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
  if (empty($uid) || empty($pwd)) {
    header("Location: ../index.php?login=empty");
    exit();
  }else {
    $sql = "SELECT * FROM userlist WHERE userName='$uid';";
    $result = $conn->query($sql);
    if ($result->num_rows < 1) {
      header("Location: ../index.php?login=error");
      exit();
    } else {
      $row = $result->fetch_assoc();
			//De-hashing the password
      $hashedPwdCheck = password_verify($pwd, $row['password']);
      if ($hashedPwdCheck == false) {
        //header("Location: ../index.php?login=perror");
        //exit();
      } elseif ($hashedPwdCheck == true) {
				//Log in the user here
        $_SESSION['u_id'] = $row['userID'];
        header("Location: ../index.php?login=success");
        exit();
      }
    }
  }
} else {
  header("Location: ../index.php?login=error");
  exit();
}
