<?php
$data = json_decode(file_get_contents("data/surah.json"));
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

function searchSurahs($data, $searchTerm) {
    $results = [];
    foreach ($data as $surah) {
        if (stripos($surah->index, $searchTerm) !== false || stripos($surah->title, $searchTerm) !== false) {
            $results[] = $surah;
        }
    }
    return $results;
}

$searchResults = ($searchTerm !== '') ? searchSurahs($data, $searchTerm) : $data;
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Search - Quran</title>
	<?php include "include/head.php"; ?>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="list-group mt-3 mb-3 h-100 vh-100" style="overflow-y: auto;">
					<?php	
					foreach($searchResults as $surah){?>
					<div onclick="window.location.href='<?=$url;?>/surah.php?num=<?=(int)$surah->index;?>'" class="list-group-item list-group-item-action d-flex flex-row">
						<span class="list-item-counter mr-2"><?=(int)$surah->index;?></span>
						<div class="d-flex flex-column">
							<h5 style="margin-bottom: 0;"><?=$surah->title;?></h5>
							<small class="text-muted" style="margin-bottom: -7px;">Place: <?=$surah->place." - ".$surah->type;?></small>
							<small class="text-muted">Count: <?=$surah->count;?></small>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php include "include/footer.php"; ?>
</body>
</html>