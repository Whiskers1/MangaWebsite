<?php
include "includes/header.php";
?>

<section>
	<div class="container">
		<div class="row" style="height: 10px;"></div>
		<div class="row">
			<div class="col-10">

				<div class="list-group">
					<div id="accordion" role="tablist">
					  <div class="card">
					  	<a class="linkNone" data-toggle="collapse" href="#collapseon" aria-expanded="false" aria-controls="collapseon" style="color: black; text-decoration: none;">
					    <div class="card-header" role="tab">
				      	<div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-0">Tales of Demons and Gods</h5>
						      <div class="d-flex justify-content-between" style="width: 200px;">
						      	<small class="text-muted">Chapter 1143/1144 </small>
						      	<span class="badge badge-pill badge-success "> 1 </span>
						     	</div>
						    	</div>
					    </div>
					   </a>

					    <div id="collapseon" class="collapse" role="tabpanel" aria-labelledby="headingon" data-parent="#accordion">
					      <div class="card-body">
					      		<div class="d-flex w-100 ">
							      	<img class="card-img-top border border-dark rounded" src="https://lmfcdn.secure.footprint.net/store/manga/16627/cover.jpg?token=4f9ec33698bceada501f1b299f4ed82d87c2e698&ttl=1507788000&v=1507512254" style="width: 208px; height: 322px;">
							       <p class="card-text pl-3">From ReadManga.Today:<br><br>
														In his past life, although too weak to protect his home when it counted, out of grave determination Nie Li became the strongest Demon Spiritist and stood at the pinnacle of the martial world. However, he lost his life during the battle with the Sage Emperor and six deity-ranked beasts.<br><br>
														His soul was then brought back to when he was still 13 years old. Although he's the weakest in his class with the lowest talent, having only a red soul realm and a weak one at that, with the aid of the vast knowledge which he accumulated from his previous life, he decided to train faster than anyone could expect. He also decided to help those who died nobly in his previous life to train faster as well.<br><br>
														He aims to protect the city from the coming future of being devastated by demon beasts and the previous fate of ending up destroyed. He aims to protect his lover, friends, family and fellow citizens who died in the beast assault or its aftermath. And he aims to destroy the so-called Sacred family who arrogantly abandoned their duty and betrayed the city in his past life.<br><br>
														Original Webtoon
														http://ac.qq.com/Comic/comicInfo/id/533395</p>
							      </div>
					      </div>
					    </div>
					  </div>

					  <div class="card">
					    <div class="card-header" role="tab">
					    		<a class="linkNone" data-toggle="collapse" href="#collapseto" aria-expanded="false" aria-controls="collapseto" style="color: black; text-decoration: none;">
					      	<div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-0">The New Gate</h5>
													<div class="d-flex justify-content-between" style="width: 200px;">
							      	<small class="text-muted">Chapter 40/55 </small>
							      	<span class="badge badge-pill badge-success "> 5 </span>
							     	</div>							    	
							     </div>
					      </a>
					    </div>

					    <div id="collapseto" class="collapse" role="tabpanel" aria-labelledby="headingto" data-parent="#accordion">
					      <div class="card-body">
					      		<div class="d-flex w-100 ">
							      	<img class="card-img-top border border-dark rounded" src="https://lmfcdn.secure.footprint.net/store/manga/14588/cover.jpg?token=67ebc6f6d601f43ae73dea6b8ee05291e7685258&ttl=1507791600&v=1507701004" style="width: 208px; height: 322px;">
							       <p class="card-text pl-3 ">"THE NEW GATE", an online game that trapped its players and turned into a death game, was now releasing the thousands of players that had been dragged into it, thanks to the efforts of Shin, one of the most powerful players. But after having defeated the last boss and freed everyone, he was swallowed up by a strange light and found himself inside the game world 500 years in the future and unable to leave.</p>
							      </div>
					      </div>
					    </div>
					  </div>

					  <?php  
					  	for ($i=0; $i <=20 ; $i++) { 
					  		echo '
							  		<div class="card">
							  			<a class="linkNone" data-toggle="collapse" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" style="color: black; text-decoration: none;">
									    <div class="card-header" role="tab">
								      	<div class="d-flex w-100 justify-content-between">
										      <h5 class="mb-0">The New Gate</h5>
																<div class="d-flex justify-content-between" style="width: 200px;">
										      	<small class="text-muted">Chapter 40/55 </small>
										      	<span class="badge badge-pill badge-success "> 5 </span>
										     	</div>							    	
										     </div>
									    </div>  
									   </a> 

							    <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="heading'.$i.'" data-parent="#accordion">
							      <div class="card-body">
							      		<div class="d-flex w-100 ">
									      	<img class="card-img-top border border-dark rounded" src="https://lmfcdn.secure.footprint.net/store/manga/14588/cover.jpg?token=67ebc6f6d601f43ae73dea6b8ee05291e7685258&ttl=1507791600&v=1507701004" style="width: 208px; height: 322px;">
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