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
        print_r($_SESSION);
        print_r($_POST);
        require_once('views/cart/cart.php');
        return true;
    }
}