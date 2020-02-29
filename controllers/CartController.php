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
//        print_r($_SESSION['tires']);
//        print_r($disks);
//        print_r($tires);
//        foreach ($tires as $id => $value){
//            echo $value['tire_id'];
//        }
//        print_r($_SESSION['tires']);
//        echo $_SESSION['tires'][1];
        require_once('views/cart/cart.php');
        return true;
    }
}