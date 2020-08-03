<?php
include_once(ROOT . '/components/User.php');
include_once (ROOT . '/model/SentOrder');
class CabinetController
{
    public function actionIndex()
    {
        $userId = Register::checkLogged();
        $userInfo = Register::getInfo($userId);
        $userOut = User::LogOut();
        $userUpdate = User::fillOutUser();
        $tires = User::productTires();
        $disks = User::productDisks();
        $totalPriceTire = User::totalPriceTires($tires);
        $totalPriceDisk = User::totalPriceDisks($disks);
        if(isset($totalPriceTire)){
            $totalPriceTire = User::totalPriceTires($tires);
        }else{
            $totalPriceTire = 0;
        }
        if(isset($totalPriceDisk)){
            $totalPriceDisk = User::totalPriceDisks($disks);
        }else{
            $totalPriceDisk = 0;
        }
        $commonTotal = $totalPriceTire + $totalPriceDisk;
        include_once(ROOT . '/views/cabinet/cabinet.php');
        return true;
    }
}