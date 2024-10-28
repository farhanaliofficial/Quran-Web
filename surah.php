<?php
if(!isset($_GET["num"]) || empty($_GET["num"]) || !(intval($_GET["num"]) >= 1 && intval($_GET["num"]) <= 114)){
	header("Location: ".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST']);
}
$num = $_GET["num"];
$data = json_decode(file_get_contents("data/surah/surah_".$num.".json"));
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $data->name; ?></title>
	<?php include "include/head.php"; ?>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="list-group mt-3 mb-3 h-100 vh-100" style="overflow-y: auto;">
					<?php	
					foreach($data->verse as $index=>$ayah){
						echo "<span class=\"aya-no\">" . explode("_", $index)[1] . "</span><p class=\"ayah\">" . $ayah . "</p>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php include "include/footer.php"; ?>
</body>
</html>