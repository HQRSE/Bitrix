<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("compound_ids");
?>

<div class="container">

<?

	$content = file ('3_percent_ids.txt');
	foreach ($content as $line) {
		$result = explode (',', $line);
	}

	$id = $result; //array('14509','5930'); 

	$iblock_id = 10;

	$three_percent_section = 2018;

	$i = 0;

	$sec_ids = [];

	while (count($id) > $i) {

		$ElementId = $id[$i];

   		$db_groups = CIBlockElement::GetElementGroups($ElementId, true);

    		while($ar_group = $db_groups->Fetch()) {

    			$sec_ids[] = $ar_group["ID"];

			}

		if (!in_array($three_percent_section, $sec_ids)) {

			$sec_ids[] = $three_percent_section;

		}

		$el = new CIBlockElement;
		$arLoadProductArray = Array(
		"IBLOCK_SECTION" => $sec_ids
		);
		$PRODUCT_ID = $id[$i];
		$res = $el->Update($PRODUCT_ID, $arLoadProductArray);

		$i++;

}

?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>