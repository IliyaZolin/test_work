AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("MyClass", "CheckOwnerBeforeDelete"));

class MyClass {
  public function CheckOwnerBeforeDelete($ID) {
    global $APPLICATION, $USER;
      
      $rsElement = CIBlockElement::GetByID($ID);
      $arElement = $rsElement->GetNext();

      if ($arElement['SHOW_COUNTER'] >= 10000) {
    
         $APPLICATION->ThrowException('Нельзя удалить данный товар, так как он очень популярный на сайте'); 
         return false;

			/* отправка ajax (в стандартную форму на сайте с возможностью изменить текст) с id товара, кол-вом и id пользователя который редактировал товар */
      /* создать файл куда придут данные*/
      /* создать почтовое событие и шаблон, внести данные и протестировать отправку */
      
    }
  }
}
