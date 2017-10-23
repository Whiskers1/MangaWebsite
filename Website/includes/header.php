<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Front page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
				<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

<body style="margin-bottom: 50px">
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
        <a class="nav-link" href="ErrorReport.php">Error Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Registrer.php">Sing Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="MangaAdd.php">Add</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="includes/mangaSerach.inc.php" method="POST">
      <input class="form-control mr-sm-2" type="text" name="text" placeholder="Search" aria-label="Search">
      <input type="hidden" name="type" value="1">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

</header>