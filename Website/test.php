<?php
include "includes/dbh.php";
include "includes/header.php";

$sql = "SELECT * FROM userlist;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$userName[$row["userID"]] = $row["name"];
	}
} else {
 $userName[0] = "No users.";
}
$arrlength = count($userName);
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-3 pt-3">
				<form action="index.php" method="POST">
					<div class="form-group d-flex w-100 justify-content-between">
		    <select name="userID"  class="form-control">
		      <?php
			    		for ($i=0; $i <= ($arrlength -1) ; $i++) { 
			    			echo ';  
			    		<option value="'.$i.'">'.$userName[$i].'</option>
			    		';
			    		}
			    	?>
		    </select>
		    <button type="submit" class="btn btn-primary">Submit</button>
		  	</div>
		  </form>
		 </div>
		</div>
		<div class="row">
			<div class="col-10 pt-3">
				<div class="progress ">
			  <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25</div>
			  <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20</div>
			  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30</div>
			  <div class="progress-bar bg-secondary progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20</div>
			  <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">5</div>
				</div>
			</div>
		</div>	
<?php 
if (empty($_POST["userID"])) {	
		$userID = 0;
 } else {
 	$userID = $_POST['userID'];
 }

if ($userID == 0) {
	$sql = 'SELECT * FROM mangalist;';		
} else {
	$sql = '
	SELECT userlist.userName, mangalist.MangaName, mangalist.ImgLink, mangalist.Summary, mangalist.LatestChapter, viewlist.ReadChapter
	FROM viewlist
	INNER JOIN userlist ON viewlist.UserID=userlist.userID
	INNER JOIN mangalist ON viewlist.MangaID=mangalist.MangaID
	WHERE userlist.UserID='.$userID.';';
}

$result = $conn->query($sql);
$test = 1;
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$name[$test] = $row["MangaName"];
		$latestC[$test] = $row["LatestChapter"];
		$img[$test] = $row["ImgLink"];
		$summary[$test] = $row["Summary"];
		if ($userID >= 1) {
			$readC[$test] = $row["ReadChapter"];
		}
		$test++;
	}
} else {
 $name[1] = "No data.";
	$latestC[1] = 0;
	$img[1] = "http://via.placeholder.com/208x322";
	$summary[1] = "No data.";
	if ($userID >= 1) {
		$readC[1] = 0;
	}
}
$arrlength = count($name);
?>

		<div class="row">
			<div class="col-10 pt-3">
				<div class="list-group">
					<div id="accordion" role="tablist">
				  <?php  
				  	for ($i=1; $i <= $arrlength ; $i++) { 
				  		echo '
						  		<div class="card">
						  			<a class="linkNone" data-toggle="collapse" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" style="color: black; text-decoration: none;">
								    <div class="card-header" role="tab">
							      	<div class="d-flex w-100 justify-content-between">
									      <h5 class="mb-0">'.$name[$i].'</h5>
															<div class="d-flex justify-content-between" style="width: 200px;">
									      	<small class="text-muted">Chapter ';
							      		if ($userID >= 1) {
							      			echo ''.$readC[$i].'/'.$latestC[$i].' </small>
										      	<form>
										      	 <input class="form-control-sm" type="text" name="type" value="" style="height: 20px; width: 50px;">
										      	</form>';									      	
										     } else  {
										     	echo ''.$latestC[$i].' </small>';
										     }

									      		if ($userID >= 1) {
									      			$diffC = $readC[$i] - $latestC[$i];
										      		if ($diffC >= 1) {
										      			$color = "danger";
										      		} elseif ($diffC == 0) {
										      			$color = "secondary";
										      		} elseif ($diffC == -1 xor $diffC == -2 xor $diffC == -3) {
									      				$color = "success";
									      			} elseif ($diffC == -4 xor $diffC == -5 xor $diffC == -6) {
									      				$color = "warning";
									      			}elseif ($diffC <= -7) {
									      				$color = "primary";
									      			}
									      			echo '
									      			<span class="badge badge-pill badge-'.$color.'"> '.$diffC.' </span>
									      			';
									      		}

									      	echo '
									     	</div>							    	
									     </div>
								    </div>  
								   </a> 

						    <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$i.'" data-parent="#accordion">
						      <div class="card-body">
						      		<div class="d-flex w-100 ">
								      	<img class="card-img-top border border-dark rounded" src="'.$img[$i].'" style="width: 208px; height: 322px;">
								       <p class="card-text pl-3 ">'.$summary[$i].'</p>
								      </div>
						      </div>
						    </div>
						  </div>
				  		';
				  	}
				  ?>
					</div>
			 </div> 
			</div>
		</div>
	</div>
</section>

<?php
include "includes/footer.php";
?>