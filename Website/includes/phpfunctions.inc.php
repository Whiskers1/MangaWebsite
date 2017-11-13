<?php
include "includes/dbh.php";


function AddManga($name, $img, $summary, $chapter, $link, $type, $user) {
	include "includes/dbh.php";
	if (isset($name)) {
		if ($type == 1) {

			$link = rtrim($link, '/');

			$sql ="SELECT COUNT(HTTP) FROM mangalist WHERE HTTP = '$link';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$count = $row['COUNT(HTTP)'];
				}
			}

			if ($count == 0) {
				$sql = "INSERT INTO mangalist (MangaName, HTTP, ImgLink, LatestChapter, Summary) VALUES ('$name', '$link', '$img', '$chapter', '$summary');";
				$conn->query($sql);
			}

			$sql = "SELECT MangaID FROM mangalist WHERE HTTP = '$link';";
			$result =	$conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$mangaID = $row['MangaID'];
				}
				$sql ="SELECT COUNT(UserID) FROM viewlist WHERE UserID = '$user' AND MangaID = '$mangaID';";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$count = $row['COUNT(UserID)'];
					}
				}
				if ($count == 0) {
					$sql = "INSERT INTO viewlist (UserID, MangaID, ReadChapter) VALUES ('$user', '$mangaID', '0');";
					$conn->query($sql);
				}
			}
		} elseif ($type == 2) {
			$mangaID = $link;

			$sql ="SELECT COUNT(UserID) FROM viewlist WHERE UserID = '$user' AND MangaID = '$mangaID';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$count = $row['COUNT(UserID)'];
				}
			}

			if ($count == 0) {
				$sql = "INSERT INTO viewlist (UserID, MangaID, ReadChapter) VALUES ('$user', '$mangaID', '0');";
				$conn->query($sql);
			}
		}
	}
}


function mangaSerach($name, $img, $summary, $LatestC, $HTTP, $type) {
	$arrlength = count($name);
	for ($i=1; $i <= $arrlength ; $i++) {
		if (empty($summary[$i])) {
  	$summary[$i] = "No Summary";
		}
		echo '
			<div class="d-flex justify-content-between">
				<div class="card col-10 p-0">
					<a class="linkNone" data-toggle="collapse" href="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'" style="color: black; text-decoration: none;">
				    <div class="card-header" role="tab">
			     		<div class="d-flex w-100 justify-content-between">
				      	<h5 class="mb-0">'.$name[$i].'</h5>
								<div class="d-flex justify-content-between" style="width: 200px;">
				      		<small class="text-muted">Chapters '.$LatestC[$i].'</small>
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
				<div class="col-2">
					<div class="pt-1" style="width: 60px;">
						<form method="POST">
							<input type="hidden" name="mangaName" value="'.$name[$i].'">
							<input type="hidden" name="mangaImg" value="'.$img[$i].'">
							<input type="hidden" name="mangaSummary" value="'.$summary[$i].'">
							<input type="hidden" name="mangaChapter" value="'.$LatestC[$i].'">
							<input type="hidden" name="mangaLink" value="'.$HTTP[$i].'">
							<input type="hidden" name="type" value="'.$type.'">
							<button class="btn btn-primary" type="submit" name="Submit" value="'.$i.'">Add</button>
						</form>
					</div>
				</div>
			</div>

			';
 	}
}

function update($listID ,$chapter) {
	include "includes/dbh.php";
	if (isset($chapter)) {
		if (isset($listID)) {
			$data1 = mysqli_real_escape_string($conn, $listID);
			$data2 = mysqli_real_escape_string($conn, (str_replace(",", ".", $chapter)));
			$sql = "UPDATE viewlist SET ReadChapter='$data2' WHERE ViewID='$data1';";
			$conn->query($sql);

		}
	}

}
