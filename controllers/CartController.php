<?php

class CartController{
    function actionOpen(){
        require_once('views/cart/cart.php');
        return true;
    }
}