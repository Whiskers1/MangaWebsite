<?php
include "includes/header.php";
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-6 pt-3">
				<form action="includes/mangaSerach.inc.php" method="POST">
						<div class="d-flex w-100 justify-content-between">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Søge ord</label>
					    <input type="text" name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Søge ord">
					    <small id="emailHelp" class="form-text text-muted">placeholder</small>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Example select</label>
					    <select class="form-control" name="type" id="exampleFormControlSelect1">
					      <option value="1">1</option>
					      <option value="2">2</option>
					    </select>
					  </div>
					 </div>
				  <button type="submit" class="btn btn-primary">Søg</button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-10">
				<div class="list-group">
					<div id="accordion" role="tablist">
				<?php  
					echo '
						<div class="card">
							<a class="linkNone" data-toggle="collapse" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" style="color: black; text-decoration: none;">
				    <div class="card-header" role="tab">
				     	<div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-0">'.$name[$i].'</h5>
											<div class="d-flex justify-content-between" style="width: 200px;">
					      	<small class="text-muted">Chapter '.$latestC[$i].'</small>
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
					</div>';?>
			 </div> 
			</div>
		</div>
	</div>
</section>

<?php  

$curl = curl_init();

$url = 'https://mangafox.me/search.php?name_method=cw&name=black&type=&author_method=cw&author=&artist_method=cw&artist=&genres%5BAction%5D=0&genres%5BAdult%5D=0&genres%5BAdventure%5D=0&genres%5BComedy%5D=0&genres%5BDoujinshi%5D=0&genres%5BDrama%5D=0&genres%5BEcchi%5D=0&genres%5BFantasy%5D=0&genres%5BGender+Bender%5D=0&genres%5BHarem%5D=0&genres%5BHistorical%5D=0&genres%5BHorror%5D=0&genres%5BJosei%5D=0&genres%5BMartial+Arts%5D=0&genres%5BMature%5D=0&genres%5BMecha%5D=0&genres%5BMystery%5D=0&genres%5BOne+Shot%5D=0&genres%5BPsychological%5D=0&genres%5BRomance%5D=0&genres%5BSchool+Life%5D=0&genres%5BSci-fi%5D=0&genres%5BSeinen%5D=0&genres%5BShoujo%5D=0&genres%5BShoujo+Ai%5D=0&genres%5BShounen%5D=0&genres%5BShounen+Ai%5D=0&genres%5BSlice+of+Life%5D=0&genres%5BSmut%5D=0&genres%5BSports%5D=0&genres%5BSupernatural%5D=0&genres%5BTragedy%5D=0&genres%5BWebtoons%5D=0&genres%5BYaoi%5D=0&genres%5BYuri%5D=0&released_method=eq&released=&rating_method=eq&rating=&is_completed=&advopts=1';

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$manga = array();

preg_match_all('!<a class="title series_preview top" href="\/\/mangafox.me\/manga\/.*?\/" rel=".*?">(.*?)<\/a>!', $result, $match);
$manga['name'] = $match[0];

print_r($manga['name']);
?>



<?php
include "includes/footer.php";
?>
