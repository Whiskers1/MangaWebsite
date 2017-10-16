<?php
include "includes/header.php";
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-5 pt-3">
				<form>
					<div class="form-group">
			    <label for="exampleInputEmail1">Name*</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
			    <small id="emailHelp" class="form-text text-muted">placeholder</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">User Name*</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UserName">
			    <small id="emailHelp" class="form-text text-muted">placeholder</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password*</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			    <small id="emailHelp" class="form-text text-muted">Password isn't implemented yet, but we still need some data in the input field!!!</small>
			  </div>
			  <div class="form-check">
			    <label class="form-check-label">
			      <input type="checkbox" class="form-check-input">
			      You have read and understood the
			    </label>
			    <a href="Terms_of_Service.pdf">Terms of Service.</a>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>

				</form>
			</div>
















		</div>
	</div>
</section>


<?php
include "includes/footer.php";
?>