<?php
include_once(ROOT . '/model/ValuesForm.php');
include_once(ROOT . '/components/Pagination.php');

class SiteController{
    public function actionIndex($page = 1){
        if($page == ""){
            $page = 1;
        }
        $widthTire = ValuesForm::getTireWidth();
        $heightTire = ValuesForm::getTireHeight();
        $diametrTire = ValuesForm::getTireDiametr();
        $season = ValuesForm::getSeason();
        $widthDisk = ValuesForm::getDiskWidth();
        $diametrDisk = ValuesForm::getDiskDiametr();
        $PCD = ValuesForm::getPCD();
        $DIA = ValuesForm::getDIA();
        $total = ValuesForm::countTires();
        $bolts = ValuesForm::getBolt();
        $takeoff = ValuesForm::getTakeoff();
        $pagination = new Pagination($total,$page,10,'');

        $allList = ValuesForm::getAllProducts($page);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionOutputTire(){
        $widthTire = ValuesForm::getTireWidth();
        $heightTire = ValuesForm::getTireHeight();
        $diametrTire = ValuesForm::getTireDiametr();
        $season = ValuesForm::getSeason();
        $widthDisk = ValuesForm::getDiskWidth();
        $diametrDisk = ValuesForm::getDiskDiametr();
        $PCD = ValuesForm::getPCD();
        $DIA = ValuesForm::getDIA();
        $bolts = ValuesForm::getBolt();
        $takeoff = ValuesForm::getTakeoff();
        $tires = ValuesForm::outputTires();
        $disks = ValuesForm::outputDisks();
        require_once(ROOT . '/views/output/output.php');
        return true;
    }
}
