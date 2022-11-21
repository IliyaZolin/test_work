/* вносить в файл init.php */
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyClass", "CheckOwnerBeforeUpdate"));

class MyClass {
public function CheckOwnerBeforeUpdate(&$arParams) {
global $APPLICATION, $USER;

$rsElement = CIBlockElement::GetByID($arParams["ID"]);
$arElement = $rsElement->GetNext();

$date = new DateTime('-7 days');
$dateminus[] = $date->format('Y-m-d');

$dat = date_create($arElement['TIMESTAMP_X']);
$datecreate[] = date_format($dat, 'Y-m-d');

if ($dateminus['0'] > $datecreate['0']) {
/* 8 и больше */
}else{
$APPLICATION->ThrowException('Товар '. $arElement['NAME'] .' был создан менее одной недели назад и не может быть изменен.');
return false;
}
}
}