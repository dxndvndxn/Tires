<?php
include_once(ROOT . '/components/User.php');
class CabinetController{
    public function actionIndex(){
//        $userUp = User::SignUp();
//        $userIn = User::SignIn();
        $userId = Register::checkLogged();
        $userInfo = Register::getInfo($userId);
        $userOut = User::LogOut();
        include_once(ROOT . '/views/cabinet/cabinet.php');
        return true;
    }
}