<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("compound_ids");
?>

<div class="container">

<?

	$content = file ('ids3per.txt'); // Файл с айдишками
	foreach ($content as $line) {
		$result = explode (',', $line);
	}

	$id = $result; //array('14509','5930'); 

	$end = 10; //count($id); // Конец выполнения цикла

	$step = 2; // Шаг цикла

	$section = 2018; // ID добавляемого раздела

	$iblock_id = 10; // ID ИБ

	$i = $_GET['i']; //0; // Счетчик шагов

	$sec_ids = [];

	while ( $end > $i ) {

		$ElementId = $id[$i];

   		$db_groups = CIBlockElement::GetElementGroups($ElementId, true); // Узнаю каким разделам товар уже принадлежит

    		while($ar_group = $db_groups->Fetch()) {

    			$sec_ids[] = $ar_group["ID"];

			}

		if (!in_array($section, $sec_ids)) { // Есть ли там мой раздел?

			$sec_ids[] = $section;

		}

		$el = new CIBlockElement;
		$arLoadProductArray = Array(
		"IBLOCK_SECTION" => $sec_ids
		);
		$PRODUCT_ID = $id[$i];
		$res = $el->Update($PRODUCT_ID, $arLoadProductArray); // Привязываю раздел

		$i++;

		$z = $i%$step;

		if ($z == 0) { // Закончился шаг цикла?
			$i++;
			header("refresh: 2; url=/12dev/promo/compound_ids.php?i=$i");
			break;
		} 

}

echo "i: ".$i."<br>";

echo '<a href="/12dev/promo/compound_ids.php?i=0">repeat</a><br>';

?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
