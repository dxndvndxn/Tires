<?php
include_once (ROOT . '/model/Register.php');
class User{
    public static function SignUp(){
        $errors = [];
        if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['passreg'])){
            $name = $_POST['email'];
            $passreg = $_POST['passreg'];
            $result = false;
            if(!Register::justCheckEmail($name)){
                array_push($errors,'email - не OK');
            }
            if(!Register::checkPass($passreg)){
                array_push($errors,'pass - не OK');
            }
            if(Register::checkEmail($name)) {
                array_push($errors,  'Такой E-mail уже используется');
            }
            if($errors == false){
                Register::insertUser($name,$passreg);
            }
        }
        return $errors;
    }
    public static function SignIn(){
        $errors = [];
        if(isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['passin'])){
            $login = $_POST['login'];
            $pass = $_POST['passin'];
            if(!Register::justCheckEmail($login)){
                array_push($errors,'Неправильный E-mail');
            }
            if(!Register::checkPass($pass)){
                array_push($errors,'Неправильный пароль');
            }
            //Проверяем пользователя
            $userId = Register::checkUser($login,$pass);
            if($userId == false){
                array_push($errors,'Неправильный логин или пароль');
            }else{
                Register::Auth($userId);
                header("Location: /cabinet");
            }
        }
        return $errors;
    }
    public static function LogOut(){
        if(isset($_POST['submit'])){
            if(isset($_POST['logout'])){
                unset($_SESSION['user']);
                header("Location: /");
            }
        }
    }
    public static function isGest(){
        if(isset($_SESSION['user'])){
            return false;
        }else{
            return true;
        }
}
}
