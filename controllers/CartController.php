<?php
include_once(ROOT . '/components/User.php');
class CartController{
    function actionOpen(){
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();
        require_once('views/cart/cart.php');
        return true;
    }
}