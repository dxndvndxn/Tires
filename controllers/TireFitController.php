<?php
include_once(ROOT . '/components/User.php');
class TireFitController{
    public  function  actionInfo(){
        User::SignIn();
        User::SignUp();
        User::LogOut();
        //Проверяем есть ли сессия
        if(isset($_SESSION['user'])){
            $userInfo = Register::getInfo($_SESSION['user']);
        }
        require_once(ROOT . '/views/tirefit/tirefit.php');
        return true;
    }
}