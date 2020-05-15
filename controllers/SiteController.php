<?php

include_once(ROOT . '/model/ValuesForm.php');
include_once(ROOT . '/components/Pagination.php');
include_once(ROOT . '/components/User.php');



class SiteController
{
    public function actionIndex($page = 1)
    {
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
        $bolts = ValuesForm::getBolt();
        $takeoff = ValuesForm::getTakeoff();
        $total = ValuesForm::countTires();
        $userIn = User::SignIn();
        $userUp = User::SignUp();
        $userOut = User::LogOut();

        //Проверяем есть ли сессия
        if(isset($_SESSION['user'])){
            $userInfo = Register::getInfo($_SESSION['user']);
        }

        //Все товары
        $allList = ValuesForm::getAllProducts($page,10);

        //Пагинация
        $pagination = new Pagination($total,$page,10,'');

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionOutput($page = 1){
//        if($page == ""){
//            $page = 1;
//        }
//        echo $page;
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
        $tires = ValuesForm::outputTires($page);
        $disks = ValuesForm::outputDisks($page);
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();

        $count = null;
        //Узнаем колл-во шин и дисков по запросу юсера
        if($tires[0] != 0){
            $count = $tires[0];
        }elseif($disks[0] != 0){
            $count = $disks[0];
        }
//        echo $count;
        //Пагинация
        $pagination = new Pagination($count,$page,5,'');

        if(isset($_SESSION['user'])){
            $userInfo = Register::getInfo($_SESSION['user']);
        }
        require_once(ROOT . '/views/output/output.php');
        return true;
    }
}
