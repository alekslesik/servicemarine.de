<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(count($arResult['COMBO']) == 1) {
	$hidden = true;
	foreach ($arResult['COMBO'][0] as $value) {
		if($value){
			$hidden = false;
		}
	}
}

if($arResult['ITEMS'])
{
	foreach($arResult["ITEMS"] as $key => $arItem)
	{
		if(isset($arItem['PRICE']) && $arItem['PRICE'])
		{
			if(isset($arItem['VALUES']['MIN']['HTML_VALUE']) || $arItem['VALUES']['MAX']['HTML_VALUE'])
			{
				$arResult['PRICE_SET'] = 'Y';
				break;
			}
		}

		$i = 0;

		if($arItem['PROPERTY_TYPE'] == 'S' || $arItem['PROPERTY_TYPE'] == 'L' || $arItem['PROPERTY_TYPE'] == 'E')
		{
			foreach($arItem['VALUES'] as $arValue)
			{
				if(isset($arValue['CHECKED']) && $arValue['CHECKED'])
				{
					$arResult["ITEMS"][$key]['PROPERTY_SET'] = 'Y';
					++$i;
				}
			}

			if($i)
			{
				$arResult["ITEMS"][$key]['COUNT_SELECTED'] = $i;
			}
		}

		if($arItem['PROPERTY_TYPE'] == 'N')
		{
			foreach($arItem['VALUES'] as $arValue)
			{
				if(isset($arValue['HTML_VALUE']) && $arValue['HTML_VALUE'])
				{
					$arResult['ITEMS'][$key]['PROPERTY_SET'] = 'Y';
				}
			}
		}
	}
}

$GLOBALS['SHOW_SMART_FILTER'] = !$hidden;

if($hidden) {
	$arResult['ITEMS'] = array();
}

global $sotbitFilterResult;
$sotbitFilterResult = $arResult;