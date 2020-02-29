<?php
include_once (ROOT . '/model/Register.php');
class User{


    //Регеаем
    public static function SignUp(){
        $errors = [];
        if(isset($_POST['submit'])){
            $name = trim($_POST['email']);
            $passreg = trim($_POST['passreg']);
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
                array_push($errors,'Успешная регистрация!');
            }
        }
        return $errors;
    }



    //Заходим
    public static function SignIn(){
        $errors = [];
        if(isset($_POST['in'])){
            $login = trim($_POST['login']);
            $pass = trim($_POST['passin']);
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



    //Выходим
    public static function LogOut(){
        if(isset($_GET['exit'])){
            unset($_SESSION['user']);
            header("Location: /");
        }
    }



    //Гость или нет
    public static function isGest(){
        if(isset($_SESSION['user'])){
            return false;
        }else{
            return true;
        }
}

    public static function getTiresBuyList(){
        if(isset($_SESSION['tires'])){
            return $_SESSION['tires'];
        }else {
            return false;
        }
    }
    public static function getDisksBuyList(){
        if(isset($_SESSION['disks'])){
            return $_SESSION['disks'];
        }else {
            return false;
        }
    }
    public static function productTires(){
        $productTires = self::getTiresBuyList();
        $getArticles;
        if($productTires){
            $tiresIds = array_keys($productTires);
            $getArticles = Register::getTiresById($tiresIds);
        }
        if(isset($getArticles)){
            return $getArticles;
        }
    }
    public static function productDisks(){
        $productDisks = self::getDisksBuyList();
        $getArticles;
        if($productDisks){
            $disksIds = array_keys($productDisks);
            $getArticles = Register::getDisksById($disksIds);
        }
        if(isset($getArticles)){
            return $getArticles;
        }
    }
    public static function totalPriceTires($products){
        $amountProductsInSess = self::getTiresBuyList();
        $total = 0;
        if($amountProductsInSess){
            foreach ($products as $item){
                $total += $item['tire_price'] * $amountProductsInSess[$item['tire_id']];
            }
        }
        return $total;
    }
    public static function totalPriceDisks($products){
        $amountProductsInSess = self::getDisksBuyList();
        $total = 0;
        if($amountProductsInSess){
            foreach ($products as $item){
                $total += $item['disk_price'] * $amountProductsInSess[$item['disk_id']];
            }
        }
        return $total;
    }



    //Заполняем данные о юзере в базу
    public static function fillOutUser(){
        $userId = Register::checkLogged();
        $user = Register::getInfo($userId);
        $errors = [];
        if(isset($_POST['update'])){
                $name = trim($_POST['newname']);
                $lastname = trim($_POST['newfam']);
                $newlogin = $_POST['newem'];
                $tel = trim($_POST['tel']);
                $newpass = trim($_POST['newpass']);
                if($newlogin == Register::checkIdForUpdate($userId)) {
                    Register::fillOut($userId,$name,$lastname,$newlogin,$tel,$newpass);
                }elseif($newlogin != Register::checkIdForUpdate($userId) && Register::checkEmail($newlogin)){
                    array_push($errors,  'Такой E-mail уже используется');
                }
                if(empty($errors)){
                    Register::fillOut($userId,$name,$lastname,$newlogin,$tel,$newpass);
                }
        }
        return $errors;
    }
}
