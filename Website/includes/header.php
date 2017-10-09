<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
<mata charset="UTF-8">
<title>Front page</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<header >
	<div class="wrapper">
		<a href="index.php"><img src="img/noder2.jpg" alt="logo"></a>	
		<nav>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="gallery.php">GALLERY</a></li>
				<li><a href="blog.php">BLOG</a></li>
				<li><a href="signup.php">SIGNUP</a></li>
				<?php
					if (isset($_SESSION['id'])) {
						echo "<form class='wrapper' action='includes/logout.inc.php'>
								<button>LOG OUT</button>
							  </form>";
					} else {
						echo "<form class='wrapper' action='includes/logind.inc.php' method='POST'>
					  			<input type='text' name='uid' placeholder='Username'>
					  			<input type='password' name='pwd' placeholder='Password'>
					  			<button type='submit'>LOGIND</button>
					  		  </form>";
					}
				?>
			</ul>		
		</nav>
	</div>
</header>