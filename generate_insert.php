<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("generate_insert");
?>

<div class="container">

<?

	$content = file ('ids3per.txt');
	foreach ($content as $line) {
		$result = explode (',', $line);
	}

	$end = count($result);
	$i = 0;

	while ( $end > $i ) {

	echo "(2048,".$result[$i]."),";

	$i++;
	
	}

?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>