<?php 
	include "dbh.php";
	session_start();

$type = $_POST['type'];
$text = $_POST['text'];

if ($type == 1) {
	$textS = str_replace(" ", "_", $text);
	$url = 'https://mangafox.me/search.php?name_method=cw&name='.$textS.'&advopts=1';

	$dom = new DOMDocument;
	@$dom->loadHTMLFile($url);
	$xpath = new DOMXpath($dom);

	for ($i=1; $i <= 5 ; $i++) { 
		$elements = $xpath->query("//*[@id=\"mangalist\"]/ul/li[".$i."]/div/a/@href");
		
		foreach ($elements as $key) {
			$url = "http:".$key->nodeValue;
			$domL = new DOMDocument;
			@$domL->loadHTMLFile($url);
			$xpathL = new DOMXpath($domL);

			$MangaHTTP[$i] = $url;

			$name = explode("/",$url);
			$MangaName[$i] = str_replace("_", " ", $name[4]);

			$img = $xpathL->query("//*[@id=\"series_info\"]/div[1]/img/@src");
			$summary = $xpathL->query("//*[@id=\"title\"]/p");
			$latestC = $xpathL->query("//*[@id=\"chapters\"]/ul[1]/li[1]/div/h3/a");

			foreach ($img as $keyI) {
				$MangaImg[$i] = $keyI->nodeValue;
			};

			foreach ($summary as $keyS) {
				$MangaSummary[$i] = $keyS->nodeValue;
			};

			foreach ($latestC as $keyL) {
				$latest = $keyL->nodeValue;
				$latestt = explode(" ",$latest);
				$MangaLatestC[$i] = preg_replace('/[^0-9.]/', '', end($latestt));
			};
		};
	}
$_SESSION["serach[HTTP]"] = $MangaHTTP;
} elseif ($type == 2) {
	
	$sql = "SELECT * FROM `mangalist` WHERE `MangaName` LIKE'%".$text."%';";
	$result = $conn->query($sql);
	$i=1;
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$MangaName[$i] = $row["MangaName"];
			$MangaLatestC[$i] = $row["LatestChapter"];
			$MangaImg[$i] = $row["ImgLink"];
			$MangaSummary[$i] = $row["Summary"];
			$i++;
		}
	} else {
		echo "no data";
	}
}


$_SESSION["serach[name]"] = $MangaName;
$_SESSION["serach[img]"] = $MangaImg;
$_SESSION["serach[summary]"] = $MangaSummary;
$_SESSION["serach[LatestC]"] = $MangaLatestC;


header("Location: ../MangaAdd.php");