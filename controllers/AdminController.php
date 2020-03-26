<?php
include_once(ROOT . '/model/ValuesForm.php');
include_once(ROOT . '/components/Pagination.php');
include_once(ROOT . '/model/AdminDbChanges.php');

class AdminController{
    function actionIndex(){
        //ШИНЫ
        $widthTire = ValuesForm::getTireWidth();
        $heightTire = ValuesForm::getTireHeight();
        $diametrTire = ValuesForm::getTireDiametr();
        $season = ValuesForm::getSeason();
        //ДИСКИ
        $widthDisk = ValuesForm::getDiskWidth();
        $diametrDisk = ValuesForm::getDiskDiametr();
        $PCD = ValuesForm::getPCD();
        $DIA = ValuesForm::getDIA();
        $bolts = ValuesForm::getBolt();
        $takeoff = ValuesForm::getTakeoff();

        AdminDbChanges::insertTires();
//        print_r($_POST);
//        unset($_FILES['photo']);
//        print_r($_FILES);
        require_once(ROOT . '/views/admin/admin.php');
        return true;
    }
}
