<?php
include "includes/dbh.php";
include "includes/header.php";

$sql = "SELECT * FROM errortype;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$errorTypeN[$row["errorTypeID"]] = $row["errorTypeName"];
		$errorTypeD[$row["errorTypeID"]] = $row["errorTypeDescription"];
	}
} else {
 $errorTypeN[1] = "No error type.";
}
$arrlength = count($errorTypeN);
?>


<section>
	<div class="container">
		<div class="row">
			<div class="col-8 pt-3">
				<form action="includes/error.inc.php" method="POST">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Error Type</label>
			    <select name="type" class="form-control col-3 ">
			    	<?php
			    		for ($i=1; $i <= $arrlength ; $i++) { 
			    			echo ';  
			    		<option value="'.$i.'">'.$errorTypeN[$i].'</option>
			    		';
			    		}
			    	?>
			    </select>
			  </div>
			  <div class="form-group">
	    		<label for="exampleFormControlTextarea1">Error Report</label>
	    		<textarea name="text" class="form-control" rows="6"></textarea>
	  		</div>
			  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col pt-3">
				<a class="badge badge-secondary" href="#" data-toggle="popover" data-container="body" data-trigger="focus" title="Hej" data-placement="bottom" data-content="med dig.">Info</a> 
			</div>
		</div>
	</div>
</section>

<?php
include "includes/footer.php";
?>