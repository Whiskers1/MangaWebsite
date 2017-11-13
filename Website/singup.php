<?php
include "includes/header.php";

if (isset($_GET["singup"])) {
	$errorCode = $_GET["singup"];
	if ($errorCode == "invalid") {
		$error = "is-invalid";
		$errorText = "Please provide a valid UserName.";
	} elseif ($errorCode == "error") {
		$error = "is-invalid";
		$errorText = "UserName is already in use.";
	} else {
		$error = "";
		$errorText = "";
	}
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-5 pt-3">
                <form action="includes/singup.inc.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        <small class="form-text text-muted">Please write in your name (OPTIONAL)</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" class="form-control <?php echo $error; ?>" placeholder="UserName" name="username" required>
                      	<small class="form-text invalid-feedback"><?php echo $errorText; ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <small class="form-text text-muted invalid-feedback">Please provide a valid Password.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                        <small class="form-text text-muted">Please write in your Email address (OPTIONAL)</small>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label"><input type="checkbox" class="form-check-input" required>You have read and understood the</label>
                        <a href="files/Terms_of_Service.pdf">Terms of Service.</a>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>

<?php
include "includes/footer.php";
?>
