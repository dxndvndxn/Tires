<?php
include_once(ROOT . '/components/User.php');
class CartController{
    function actionOpen(){
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();

        $productInCart = User::getProduct();

        if($productInCart){
            //возвращает ключи из массива
            $productIds = array_keys($productInCart);
            foreach ($productInCart as $id => $value){

            }
            $disks = preg_grep("/(\d)(?=d)/",$productIds);
            $tires = preg_grep("/(\d)(?=t)/",$productIds);
            print_r($disks);
            print_r($tires);

        }
        require_once('views/cart/cart.php');
        return true;
    }
}