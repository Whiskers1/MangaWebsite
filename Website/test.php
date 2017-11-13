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
						<a class="nav-link" href="error.report.php">Error Report</a>
		      </li>


				<?php
				if (isset($_SESSION['u_id'])) {
					echo '<li class="nav-item">
		        <a class="nav-link" href="manga.add.php">Add</a>
		      </li>';
				}
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

<section>
  <div class="container">
		<div class="row">
				<div class="col-10 pt-3 pb-3">
					<?php
					/*if (isset($_SESSION["u_id"])) {
						echo '
						<div class="progress">
							<div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: '.$progressbar1.'%" aria-valuenow="'.$success.'" aria-valuemin="0" aria-valuemax="100">'.$success.'</div>
							<div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: '.$progressbar2.'%" aria-valuenow="'.$warning.'" aria-valuemin="0" aria-valuemax="100">'.$warning.'</div>
							<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: '.$progressbar3.'%" aria-valuenow="'.$primary.'" aria-valuemin="0" aria-valuemax="100">'.$primary.'</div>
							<div class="progress-bar bg-secondary progress-bar-striped" role="progressbar" style="width: '.$progressbar4.'%" aria-valuenow="'.$secondary.'" aria-valuemin="0" aria-valuemax="100">'.$secondary.'</div>
							<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: ' .$progressbar5.'%" aria-valuenow="'.$danger.'" aria-valuemin="0" aria-valuemax="100">'.$danger.'</div>
						</div>';
					}*/
					?>
				</div>
		</div>
    <div class="row">
			<div class="col-12 pt-3">
				<div class="list-group">
					<div class="d-flex justify-content-between">
						<div class="col-10 p-0">
					  	<a href="test2.php?name=4_god_ranger" target="_blank" class="border-secondary list-group-item list-group-item-action">
								<div class="d-flex w-100 justify-content-between">
									<h6 class="mb-0">4 god ranger</h6>
									<div class="d-flex justify-content-between" style="width: 200px;">
										<small class="text-muted">Chapter 555.55/555.55</small>
										<span class="badge badge-pill badge-secondary">555.55</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-2 pt-1">
							<form class="d-flex  justify-content-between" method="POST">
									<input type="number" step="0.1" class="form-control mr-1" name="number" value="0" style="width: 100px;">
									<button type="submit" name="Submit" value="" class="btn btn-primary">Set</button>
							</form>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="col-10 p-0 ">
							<a href="test2.php?name=4_god_ranger" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary">
								<div class="d-flex w-100 justify-content-between">
									<h6 class="mb-0">4 god ranger</h6>
									<div class="d-flex justify-content-between" style="width: 200px;">
										<small class="text-muted">Chapter 555.55/555.55</small>
										<span class="badge badge-pill badge-secondary">555.55</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-2 pt-1">
							<form class="d-flex  justify-content-between" method="POST">
									<input type="number" step="0.1" class="form-control mr-1" name="number" value="0" style="width: 100px;">
									<button type="submit" name="Submit" value="" class="btn btn-primary">Set</button>
							</form>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="col-10 p-0">
					  	<a href="test2.php?manga=4_god_ranger" target="_blank" class="border-secondary list-group-item list-group-item-action">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-0">4 god ranger</h5>
									<div class="d-flex justify-content-between" style="width: 200px;">
										<small class="text-muted">Chapter 555.55/555.55</small>
										<span class="badge badge-pill badge-secondary">555.55</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-2 pt-1">
							<form class="d-flex  justify-content-between" method="POST">
									<input type="number" step="0.1" class="form-control mr-1" name="number" value="0" style="width: 100px;">
									<button type="submit" name="Submit" value="" class="btn btn-primary">Set</button>
							</form>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="col-10 p-0 ">
							<a href="test2.php?manga=4_god_ranger" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-0">4 god ranger</h5>
									<div class="d-flex justify-content-between" style="width: 200px;">
										<small class="text-muted">Chapter 555.55/555.55</small>
										<span class="badge badge-pill badge-secondary">555.55</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-2 pt-1">
							<form class="d-flex  justify-content-between" method="POST">
									<input type="number" step="0.1" class="form-control mr-1" name="number" value="0" style="width: 100px;">
									<button type="submit" name="Submit" value="" class="btn btn-primary">Set</button>
							</form>
						</div>
					</div><div class="d-flex justify-content-between">
						<div class="col-10 p-0">
					  	<a href="test2.php?manga=4_god_ranger" target="_blank" class="border-secondary list-group-item list-group-item-action">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-0">4 god ranger</h5>
									<div class="d-flex justify-content-between" style="width: 200px;">
										<small class="text-muted">Chapter 555.55/555.55</small>
										<span class="badge badge-pill badge-secondary">555.55</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-2 pt-1">
							<form class="d-flex  justify-content-between" method="POST">
									<input type="number" step="0.1" class="form-control mr-1" name="number" value="0" style="width: 100px;">
									<button type="submit" name="Submit" value="" class="btn btn-primary">Set</button>
							</form>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="col-10 p-0 ">
							<a href="test2.php?manga=4_god_ranger" target="_blank" class="list-group-item list-group-item-action list-group-item-secondary">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-0">4 god ranger</h5>
									<div class="d-flex justify-content-between" style="width: 200px;">
										<small class="text-muted">Chapter 555.55/555.55</small>
										<span class="badge badge-pill badge-secondary">555.55</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-2 pt-1">
							<form class="d-flex  justify-content-between" method="POST">
								<input type="number" step="0.1" class="form-control mr-1" name="number" value="0" style="width: 100px;">
								<button type="submit" name="Submit" value="" class="btn btn-primary">Set</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





	<div class="container fixed-bottom">
		<nav class="navbar-dark" style="background-color: #ffffff;">
			<ul class="nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
			</ul>
		</nav>
	</div>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script>
$(function () {
$('[data-toggle="popover"]').popover()
})
</script>
<script>
$('.popover-dismiss').popover({
trigger: 'focus'
})
</script>

</body>

</html>
