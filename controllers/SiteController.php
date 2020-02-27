<?php
include_once(ROOT . '/model/ValuesForm.php');
include_once(ROOT . '/components/Pagination.php');
include_once(ROOT . '/components/User.php');



class SiteController{
    public function actionIndex($page = 1){
        if($page == ""){
            $page = 1;
        }
//        print_r($_SESSION);
////        foreach ($_SESSION['buylist'] as $id => $value){
////            unset($_SESSION['buylist'][$id]);
////        }
//        print_r($_SESSION['buylist']);
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
        $userIn = User::SignIn();
        $userUp = User::SignUp();
        $userOut = User::LogOut();
        if(isset($_SESSION['user'])){
            $userInfo = Register::getInfo($_SESSION['user']);
        }

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
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();
        if(isset($_SESSION['user'])){
            $userInfo = Register::getInfo($_SESSION['user']);
        }
        require_once(ROOT . '/views/output/output.php');
        return true;
    }
}
