<?php
include "includes/dbh.php";
include "includes/phpfunctions.inc.php";
if (isset($_POST['Submit'])) {
		update($_POST['Submit'], $_POST['number']);
		unset($GLOBALS['Submit']);
		header( "refresh:5" );
}
include "includes/header.php";
?>

<?php
if (!isset($_SESSION["u_id"])) {
    $sql = 'SELECT * FROM mangalist;';
} else {
    $sql = '
		SELECT userlist.userName, mangalist.HTTP, mangalist.MangaName, mangalist.ImgLink, mangalist.Summary, mangalist.LatestChapter, viewlist.ReadChapter, viewlist.ViewID
		FROM viewlist
		INNER JOIN userlist ON viewlist.UserID=userlist.userID
		INNER JOIN mangalist ON viewlist.MangaID=mangalist.MangaID
		WHERE userlist.UserID='.$_SESSION['u_id'].';';
}

$result = $conn->query($sql);
$test = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name[$test] = $row["MangaName"];
        $latestC[$test] = $row["LatestChapter"];
        $img[$test] = $row["ImgLink"];
        $summary[$test] = $row["Summary"];
				$link[$test] = str_replace("http://", "http://m.", $row["HTTP"]);
        if (isset($_SESSION["u_id"])) {
            $readC[$test] = $row["ReadChapter"];
						$listID[$test] = $row["ViewID"];
        }
        $test++;
    }
} else {
    $name[1] = "No data.";
    $latestC[1] = 0;
    $img[1] = "http://via.placeholder.com/208x322";
    $summary[1] = "No data.";
		$link[$test] = "http://m.mangafox.me/";
    if (isset($_SESSION["u_id"])) {
        $readC[1] = 0;
				$listID[1] = 0;
    }
}
$arrlength = count($name);

if (isset($_SESSION["u_id"])) {
	$success = 0;
	$warning = 0;
	$primary = 0;
	$secondary = 0;
	$danger = 0;
	for ($i=1; $i <= $arrlength; $i++) {
		$diff = $readC[$i] - $latestC[$i];
		if ($diff >= 1) {
				$danger += 1;
		} elseif ($diff == 0) {
				$secondary += 1;
		} elseif ($diff == -1 xor $diff == -2 xor $diff == -3) {
				$success += 1;
		} elseif ($diff == -4 xor $diff == -5 xor $diff == -6) {
				$warning += 1;
		} elseif ($diff <= -7) {
				$primary += 1;
		}
	}
	$progressbar1 = (($success / $arrlength) * 100);
	$progressbar2 = (($warning / $arrlength) * 100);
	$progressbar3 = (($primary / $arrlength) * 100);
	$progressbar4 = (($secondary / $arrlength) * 100);
	$progressbar5 = (($danger / $arrlength) * 100);
}

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-10 pt-3 pb-3">
							<?php
							if (isset($_SESSION["u_id"])) {
								echo '
                <div class="progress">
									<div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: '.$progressbar1.'%" aria-valuenow="'.$success.'" aria-valuemin="0" aria-valuemax="100">'.$success.'</div>
									<div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: '.$progressbar2.'%" aria-valuenow="'.$warning.'" aria-valuemin="0" aria-valuemax="100">'.$warning.'</div>
									<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: '.$progressbar3.'%" aria-valuenow="'.$primary.'" aria-valuemin="0" aria-valuemax="100">'.$primary.'</div>
									<div class="progress-bar bg-secondary progress-bar-striped" role="progressbar" style="width: '.$progressbar4.'%" aria-valuenow="'.$secondary.'" aria-valuemin="0" aria-valuemax="100">'.$secondary.'</div>
									<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: ' .$progressbar5.'%" aria-valuenow="'.$danger.'" aria-valuemin="0" aria-valuemax="100">'.$danger.'</div>
                </div>';
							}
							?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="list-group">
                    <div id="accordion" role="tablist">
                    <?php
										$bgcoller = "list-group-item-secondary";
                    for ($i = 1; $i <= $arrlength; $i++) {

											if ($bgcoller == "list-group-item-secondary") {
												$bgcoller = " ";
											} elseif ($bgcoller == " ") {
												$bgcoller = "list-group-item-secondary";
											}
                        echo '
                        <div class="d-flex justify-content-between">
                            <div class="card col-10 p-0">
                                <a class="linkNone" data-toggle="collapse" href="#collapse' . $i . '" aria-expanded="false" aria-controls="collapse' . $i . '" style="color: black; text-decoration: none;">
                                    <div class="card-header '.$bgcoller.'" role="tab">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-0">' . $name[$i] . '</h5>
                                            <div class="d-flex justify-content-between" style="width: 200px;">
                                                <small class="text-muted">Chapter ';
                                                if (isset($_SESSION["u_id"])) {
                                                    echo '' . $readC[$i] . '/' . $latestC[$i] . ' </small>';
                                                } else {
                                                    echo '' . $latestC[$i] . ' </small>';
                                                }

                                                if (isset($_SESSION["u_id"])) {
                                                    $diffC = $readC[$i] - $latestC[$i];
                                                    if ($diffC >= 1) {
                                                        $color = "danger";
                                                    } elseif ($diffC == 0) {
                                                        $color = "secondary";
                                                    } elseif ($diffC == -1 xor $diffC == -2 xor $diffC == -3) {
                                                        $color = "success";
                                                    } elseif ($diffC == -4 xor $diffC == -5 xor $diffC == -6) {
                                                        $color = "warning";
                                                    } elseif ($diffC <= -7) {
                                                        $color = "primary";
                                                    }
                                                echo '<span class="badge badge-pill badge-' . $color . '"> ' . $diffC . ' </span>';
                                                }
                                                echo '
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div id="collapse' . $i . '" class="collapse" role="tabpanel" aria-labelledby="heading' . $i . '" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="d-flex w-100 ">
                                            <a href="'.$link[$i].'" target="_blank"><img class="card-img-top border border-dark rounded" src="' . $img[$i] . '" style="width: 208px; height: 322px;"></a>
                                            <p class="card-text pl-3 ">' . $summary[$i] . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2" >
															';
															if (isset($_SESSION["u_id"])) {
																echo '<div class="d-flex  justify-content-between pt-1">
																		<form class="d-flex  justify-content-between" method="POST">
																				<input type="number" class="form-control mr-1" name="number" value="'.$readC[$i].'" style="width: 100px;">
		                                    <button type="submit" name="Submit" value="' . $listID[$i] . '" class="btn btn-primary">Set</button>
		                                </form>
																</div>';
															}
	                          	echo '</div>
	                    	</div>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
<?php
include "includes/footer.php";
?>
