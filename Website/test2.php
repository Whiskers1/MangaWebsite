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

<?php
include "includes/dbh.php";

if (isset($_GET['name'])) {
	$name = str_replace("_", " ", $_GET['name']);
	$sql = "SELECT * FROM `mangalist` WHERE MangaName = '$name';";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $name = $row["MangaName"];
      $LChapter = $row["LatestChapter"];
      $img = $row["ImgLink"];
      $summary = $row["Summary"];
			$link = str_replace("http://", "http://m.", $row["HTTP"]);
			$mangaID = $row["MangaID"];
    }
	} else {
	}

} else {
	$name = "";
	$LChapter = "";
	$img = "http://via.placeholder.com/208x322";
	$summary = "";
	$link = "http://m.mangafox.me/";
}

if (isset($_SESSION["u_id"])) {
	$sql = "SELECT `ViewID`, `ReadChapter` FROM `viewlist` WHERE UserID = '$name' AND MangaID = '$mangaID';";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$viewID = $row["ViewID"];
			$RChapter = $row["ReadChapter"];
		}
	} else {
		$RChapter = "0";
		$viewID = "";
	}

	$dif = $LChapter - $RChapter;

} else {
	$RChapter = "";
	$dif = "";
}
 ?>

<section>
  <div class="container">
    <div class="row">
			<div class="col-auto pt-3">
				<div class="card" style="width: 209px;">
				  <a href="<?php echo $link; ?>" target="_blank"><img class="card-img-top border border-dark rounded" src="<?php echo $img; ?>" alt="Card image cap" style="width: 208px; height: 322px;"></a>
				  <div class="card-body">
						<?php
							if (isset($_SESSION["u_id"])) {
								echo '<form class="d-flex justify-content-between mb-2" method="POST">
										<input type="number" step="0.1" class="form-control mr-1" name="number" value="'.$RChapter.'" >
										<button type="submit" name="Submit" value="'.$viewID.'" class="btn btn-primary">Set</button>
								</form>';
							}
							$RChapter = "/$RChapter";
						 ?>
						<small class="text-muted">Chapter <?php echo $LChapter, $RChapter; ?></small>
						<span class="badge w-100 badge-pill badge-secondary mt-2"><?php echo $dif; ?></span>
				  </div>
				</div>
			</div>
			<div class="col-9 pt-3">
				<div class="card">
				  <div class="card-header"><h5 class="card-title"><?php echo $name; ?></h5></div>
				  <div class="card-body">
				    <p class="card-text"><?php echo $summary; ?></p>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">

			</div>
		</div>



	</div>
	<div class="container fixed-bottom">
		<nav class="navbar-dark bg-light">
			<ul class="nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="error.report.php">Error Report</a>
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
