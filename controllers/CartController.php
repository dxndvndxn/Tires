<?php
include_once(ROOT . '/components/User.php');
class CartController{
    function actionOpen(){
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();
        $tires = User::productTires();
        print_r($tires);
        require_once('views/cart/cart.php');
        return true;
    }
}