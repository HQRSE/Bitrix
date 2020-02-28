<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("cart_rules");
?>

<div class="container">

<?

$content = file ('3_percent_ids.txt');
foreach ($content as $line) { // читаем построчно
    $result = explode (',', $line); // разбиваем строку и записываем в массив
/*
echo "<pre>";
print_r($result);
echo "</pre>";
*/
}

/* replace */

$mzf = $result; //array('256559', '256561', '256563');

$i = 0;

$j = 1;

$count = count($mzf);

$fp = fopen("3_percent_rules.txt", "a");

$action_start = 'ACTIONS:<br>a:3:{s:8:"CLASS_ID";s:9:"CondGroup";s:4:"DATA";a:1:{s:3:"All";s:3:"AND";}s:8:"CHILDREN";a:1:{i:0;a:3:{s:8:"CLASS_ID";s:14:"ActSaleBsktGrp";s:4:"DATA";a:6:{s:4:"Type";s:8:"Discount";s:5:"Value";s:1:"3";s:4:"Unit";s:4:"Perc";s:3:"Max";i:0;s:3:"All";s:2:"OR";s:4:"True";s:4:"True";}s:8:"CHILDREN";a:2:{i:0;a:0:{}i:1;a:3:{s:8:"CLASS_ID";s:13:"ActSaleSubGrp";s:4:"DATA";a:2:{s:3:"All";s:3:"AND";s:4:"True";s:4:"True";}s:8:"CHILDREN";a:1:{i:0;a:2:{s:8:"CLASS_ID";s:13:"CondIBElement";s:4:"DATA";a:2:{s:5:"logic";s:5:"Equal";s:5:"value";';
fwrite($fp, $action_start. PHP_EOL);

$action_count = 'a:'.$count.':{';
fwrite($fp, $action_count. PHP_EOL);

while ($i < $count) {

$action_counters = 'i:'.$j.';i:'.$mzf[$i].';';
fwrite($fp, $action_counters. PHP_EOL);

$j++;

$i++;

}

$action_end = '}}}}}}}}}/n/n/n';

fwrite($fp, $action_end. PHP_EOL);

/* **************** */

$cond_start = '<br><br>CONDITIONS:<br>a:3:{s:8:"CLASS_ID";s:9:"CondGroup";s:4:"DATA";a:2:{s:3:"All";s:3:"AND";s:4:"True";s:4:"True";}s:8:"CHILDREN";a:1:{i:0;a:3:{s:8:"CLASS_ID";s:20:"CondBsktProductGroup";s:4:"DATA";a:2:{s:5:"Found";s:5:"Found";s:3:"All";s:2:"OR";}s:8:"CHILDREN";a:1:{i:0;a:2:{s:8:"CLASS_ID";s:13:"CondIBElement";s:4:"DATA";a:2:{s:5:"logic";s:5:"Equal";s:5:"value";';
fwrite($fp, $cond_start. PHP_EOL);

$cond_count = 'a:'.$count.':{';
fwrite($fp, $cond_count. PHP_EOL);

$i = 0;

$j = 1;

//$cond_counters = [];

while ($i < $count) {

$cond_counters = 'i:'.$j.';i:'.$mzf[$i].';';
	fwrite($fp, $cond_counters. PHP_EOL);

$j++;

$i++;

}

//fwrite($fp, $cond_counters. PHP_EOL);
/*
echo "<pre>";
print_r($cont_counters);
echo "</pre>";
*/
$cond_end = '}}}}}}}';
fwrite($fp, $cond_end. PHP_EOL);
fclose($fp);

/* write */

/*
$fp = fopen("3_percent_rules.txt", "a");
$text = "'".$item['ID']."',"; 
fwrite($fp, $text. PHP_EOL);
fclose($fp);
*/

/*
echo "<pre>";
print_r($mzf);
echo "</pre>";
*/

?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>