<?php
include_once(ROOT . '/components/User.php');
class CabinetController{
    public function actionIndex(){
        $userId = Register::checkLogged();
        $userInfo = Register::getInfo($userId);
        $userOut = User::LogOut();
       $userUpdate = User::fillOutUser();
        include_once(ROOT . '/views/cabinet/cabinet.php');
        return true;
    }
}