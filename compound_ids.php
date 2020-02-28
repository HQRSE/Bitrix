<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("compound_ids");
?>

<div class="container">

<?

$three_percent_section = 2019;

$five_percent_section = 2020;

$ten_percent_section = 2021;

$glob = glob("/home/h911249072/web-ohotaktiv.online/docs/12dev/promo/*.txt");

foreach ($glob as $file) {

	$real_file = basename($file);

	//echo $real_file."<br>";

	if ($real_file == 'ids3per.txt') {

		$section = $three_percent_section;

	} elseif ($real_file == 'ids5per.txt') {
		$section = $five_percent_section;

	}elseif ($real_file == 'ids10per.txt') {
		$section = $ten_percent_section;

	}

$filename = $real_file;

echo $filename."<br>";

}

//echo $filename."<br>";

/*
echo "<pre>";
print_r($glob);
echo "</pre>";
*/
/*
	$content = file ('3_percent_ids.txt');
	foreach ($content as $line) {
		$result = explode (',', $line);
	}
*/
	$end = 10; //count($id);

	$step = 2;

	$id = $result; //array('14509','5930'); 

	$iblock_id = 10;

	$i = $_GET['i']; //0;

	$sec_ids = [];

	while ( $end > $i) {

		$ElementId = $id[$i];

   		$db_groups = CIBlockElement::GetElementGroups($ElementId, true);

    		while($ar_group = $db_groups->Fetch()) {

    			$sec_ids[] = $ar_group["ID"];

			}

		if (!in_array($three_percent_section, $sec_ids)) {

			$sec_ids[] = $section;

		}
		/*
		$el = new CIBlockElement;
		$arLoadProductArray = Array(
		"IBLOCK_SECTION" => $sec_ids
		);
		$PRODUCT_ID = $id[$i];
		$res = $el->Update($PRODUCT_ID, $arLoadProductArray);

		$i++;

		$z = $i%$step;

		if ($z == 0) {
			$i++;
			header("refresh: 2; url=/12dev/promo/compound_ids.php?i=$i");
			break;
	} 
		*/
}

echo "i: ".$i."<br>";

echo '<a href="/12dev/promo/compound_ids.php?i=0">repeat</a><br>';

?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>