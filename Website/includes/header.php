<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Front page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
<body style="margin-bottom: 50px" >
<?php session_start();?>
	<header>

		<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		  <a class="navbar-brand" href="index.php"><img src="img/img1.png" style="width: 30px; height: 30px;"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="manga.add.php">Add</a>
		      </li>
		      <li class="nav-item">
						<a class="nav-link" href="error.report.php">Error Report</a>
		      </li>
				<?php
				if (!isset($_SESSION['u_id'])) {
					echo '<li class="nav-item">
						<a class="nav-link" href="singup.php">Sing Up</a>
		      </li>';
				}
				?>
		    </ul>

		<?php
			if (isset($_SESSION['u_id'])) {
				echo '<form action="includes/logout.inc.php" method="POST">
					<button class="btn btn-outline-dark" type="submit" name="submit">Logout</button>
				</form>';
			} else {
				echo '<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#login">Login</button>
		    <div class="modal fade" id="login" tabindex="-1" role="dialog"  aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h5 class="modal-title" >Modal title</h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form action="includes/login.inc.php" method="POST">
		              <div class="form-group">
		                  <label>User Name</label>
		                  <input type="text" class="form-control" name="uid"  placeholder="User Name">
		                  <small class="form-text text-muted">We´ll never share your information with anyone else.</small>
		                </div>
		                <div class="form-group">
		                  <label for="exampleInputPassword1">Password</label>
		                  <input type="password" class="form-control" name="pwd" placeholder="Password">
		                </div>
		                <div class="form-check">
		                  <label class="form-check-label"><input type="checkbox" class="form-check-input">Check me out</label>
		                </div>
		                <button type="submit" name="submit" class="btn btn-primary">Login</button>
		            </form>
		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		          </div>
		        </div>
		      </div>
		    </div>';
			}
		?>
		  </div>
		</nav>
	</header>
