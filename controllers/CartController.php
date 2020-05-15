<?php
include_once(ROOT . '/components/User.php');
class CartController{
    function actionOpen(){
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();
        $tires = User::productTires();
        $disks = User::productDisks();
        $totalPriceTire = User::totalPriceTires($tires);
        $totalPriceDisk = User::totalPriceDisks($disks);
        if(!User::isGest()){
            $userId = Register::checkLogged();
            $userInfo = Register::getInfo($userId);
        }
        //Забираем общий прайс за шины и диски
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
        require_once('views/cart/cart.php');
        return true;
    }
}