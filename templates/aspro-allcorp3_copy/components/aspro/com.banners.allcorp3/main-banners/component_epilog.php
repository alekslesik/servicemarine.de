<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//define global template name for body class
global $bodyDopClass, $USER, $bigBannersIndexClass;

if(strpos($bigBannersIndexClass, 'hidden') === false && $arParams['HEADER_OPACITY'] && $templateData['BANNERS_COUNT']) {
    $bodyDopClass .= ' header_opacity';
}

// for subscribe button in banner
if(isset($templateData['IS_SUBSCRIBE']) && $templateData['IS_SUBSCRIBE']){
    Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("banners-subscribe-".$arParams["IBLOCK_ID"]);
    
    $arSubscription = array();
    $email = '';
    $subscrId = '';
    if(CModule::IncludeModule("subscribe"))
    {
        //get current user subscription from cookies
        $arSubscription = CSubscription::GetUserSubscription();
    }
    if($arSubscription["ID"])
    {
        $email = $arSubscription["EMAIL"];
        $subscrId = $arSubscription["ID"];
    } else if( $USER->IsAuthorized() ){
        $email = $USER->GetEmail();
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            try{
                $('.banners-big .subscribe-edit__form input[name=EMAIL]').val('<?=$email?>');
                $('.banners-big .subscribe-edit__form input[name=ID]').val('<?=$subscrId?>');
                $('.banners-big .subscribe-edit__form input[name=sessid]').val('<?=bitrix_sessid();?>');
                //$('.banners-big~input[name=sessid]').appendTo('.banners-big .subscribe-edit__form');
            }
            catch(e){
            }
        });
    </script>
<?
    Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("banners-subscribe-".$arParams["IBLOCK_ID"], "");
}
?>
