<?php
include "includes/header.php";

if (!empty($_SESSION["serach[name]"])) {
	$name = $_SESSION["serach[name]"];
	$img = $_SESSION["serach[img]"];
	$summary = $_SESSION["serach[summary]"]; 
	$LatestC = $_SESSION["serach[LatestC]"];
	if (!empty($_SESSION["serach[HTTP]"])) {
		$HTTP = $_SESSION["serach[HTTP]"];
	}
	
	$arrlength = count($name);
}

?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-4 pt-3">
					<form action="includes/mangaSerach.inc.php" method="POST">
								<div class="form-group">
						    <label for="exampleFormControlSelect1">Example select</label>
						    <select class="form-control" name="type" style="width: 140px; height: 40px;" id="exampleFormControlSelect1">
						      <option value="1">MangaFox</option>
						      <option value="2">Database</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Søge ord</label>
						    <input type="text" name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Søge ord">
						    <small id="emailHelp" class="form-text text-muted">placeholder</small>
						  </div>
					  <button type="submit" class="btn btn-primary">Søg</button>
					</form>	
			</div>
		</div>

		<div class="row">
			<div class="col-10 pt-3">
				<div class="list-group">
					<div id="accordion" role="tablist">
				<?php
					if (!empty($_SESSION["serach[name]"])) {
						for ($i=1; $i <= $arrlength ; $i++) { 				    
							echo '
								<div class="card">
									<a class="linkNone" data-toggle="collapse" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" style="color: black; text-decoration: none;">
							    <div class="card-header" role="tab">
						     	<div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-0">'.$name[$i].'</h5>
													<div class="d-flex justify-content-between" style="width: 200px;">
							      	<small class="text-muted">Chapters '.$LatestC[$i].'</small>
								      	<form>
								      	 <input type="hidden" name="type" value="1">
										      <input type="hidden" name="type" value="1">
										      <input type="hidden" name="type" value="1">
										      <input type="hidden" name="type" value="1">
								      		<button type="submit" class="border-0 badge badge-pill badge-primary" >Add</button>
								      	</form>
							     	</div>							    	
							     </div>
							    </div>  
						   </a> 
						  
							  <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$i.'" data-parent="#accordion">
							    <div class="card-body">
							    		<div class="d-flex w-100 ">
							      	<img class="card-img-top border border-dark rounded" src="'.$img[$i].'" style="width: 208px; height: 322px;">
							       <p class="card-text pl-3 ">';					       
		       	if (empty($summary[$i])) { 
		       		echo 'No Data';
		       	} else {
		       		echo ''.$summary[$i].'';
		       	}
						     echo '</p>
										      </div>
										    </div>
										  </div>
								</div>';
      	
					 }
					}?>
					
			 </div> 
			</div>
		</div>
	</div>
</section>



<?php
include "includes/footer.php";
session_destroy();
?>
