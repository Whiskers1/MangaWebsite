<?php
include "includes/header.php";
include "includes/dbh.php";

$sql = "SELECT * FROM MangaList";
$result = array($conn->query($sql)); 
$arrlength = count($result);
$name = array();
$img = array();
$LC = array();


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     $name[$row] = $row["MangaNavn"];
     $img[$row] = $row["ImgLink"];
     $LC[$row] = $row["LatestChaper"];
    }
} else {
    echo "0 results";
}

?>

<section>
	<div class="container">
		<div class="row" style="height: 10px;"></div>
		<div class="row">
			<div class="col-10">

				<div class="list-group">
					<div id="accordion" role="tablist">
				  <?php  
				  	for ($i=0; $i <=$arrlength ; $i++) { 
				  		echo '
						  		<div class="card">
						  			<a class="linkNone" data-toggle="collapse" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" style="color: black; text-decoration: none;">
								    <div class="card-header" role="tab">
							      	<div class="d-flex w-100 justify-content-between">
									      <h5 class="mb-0">'.$name.'</h5>
															<div class="d-flex justify-content-between" style="width: 200px;">
									      	<small class="text-muted">Chapter 40/'.$LC.' </small>
									      	<span class="badge badge-pill badge-success "> 5 </span>
									     	</div>							    	
									     </div>
								    </div>  
								   </a> 

						    <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$i.'" data-parent="#accordion">
						      <div class="card-body">
						      		<div class="d-flex w-100 ">
								      	<img class="card-img-top border border-dark rounded" src="'.$img.'" style="width: 208px; height: 322px;">
								       <p class="card-text pl-3 ">"THE NEW GATE", an online game that trapped its players and turned into a death game, was now releasing the thousands of players that had been dragged into it, thanks to the efforts of Shin, one of the most powerful players. But after having defeated the last boss and freed everyone, he was swallowed up by a strange light and found himself inside the game world 500 years in the future and unable to leave.</p>
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

</body>

</html>