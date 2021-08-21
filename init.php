foreach ($providers as $key => $value) {

    $arFilter1 = array("IBLOCK_ID" =>array_keys($siteList), '!=IBLOCK_ID'=>[40,42], "!=ID"=>$arCopy, "!PROPERTY_SOLD_VALUE"=>'Y', "PROPERTY_IB_PROVIDER" => $key);
    $arSort1 = array("ID" => "ASC");
    $arSelect1 = array("ID");
    $arGroupBy1 = array();
    // $arGroupBy1 = false;
    $ElList1 = CIBlockElement::GetList($arSort1, $arFilter1, $arGroupBy1, false, $arSelect1);

    $arFilter2 = array("IBLOCK_ID" =>array_keys($siteList), '!=IBLOCK_ID'=>[40,42], "!=ID"=>$arCopy, "PROPERTY_SOLD_VALUE"=>'Y', "PROPERTY_IB_PROVIDER" => $key);
    $arSort2 = array("ID" => "ASC");
    $arSelect2 = array("ID");
    $arGroupBy2 = array();
    // $arGroupBy1 = false;
    $ElList2 = CIBlockElement::GetList($arSort2, $arFilter2, $arGroupBy2, false, $arSelect2);
    
    $arAdd = array(
          "UF_COUNT_PROD_AVA"  => $ElList1,
          "UF_COUNT_PROD_SOLD"  => $ElList2
      );
    $res = Local\Hlblock\Provider::update($value['ID'], $arAdd);
}
