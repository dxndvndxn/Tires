<?php
include_once(ROOT . '/components/Db.php');
class Register{
    //Проверяем емаил на существующий
    static function checkEmail($email)
    {
        $db = Db::getCon();
        $sql = "SELECT COUNT(*) FROM users where email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn()){
            return true;
        }else{
            return false;
        }
    }
    //Проверяем id для апдейта в профиле
    static function checkIdForUpdate($id)
    {
        $db = Db::getCon();
        $sql = "SELECT email FROM users WHERE id = :id;";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if($user){
            return $user['email'];
        }
    }
    //Регаем пользователя
    static function insertUser($email,$pass){
        $db = Db::getCon();

        $sql = 'INSERT INTO users(email,pass) VALUES(:email,:pass)';
        $result =  $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':pass',$pass,PDO::PARAM_STR);
        return $result->execute();

    }
    //Проверяем емаил на валидность
    static function justCheckEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    //Проверяем пароль на кол-во
    static function checkPass($pass){
        if(strlen($pass)>=8){
            return true;
        }else{
            return false;
        }
    }
    //Проверяем юзера зареган или нет
    public static function checkUser($email,$pass){
        $db = Db::getCon();
        $sql = 'SELECT * FROM users WHERE email = :email AND pass = :pass';
        $result =  $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':pass',$pass,PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if($user){
            if($user['email'] === $email && $user['pass'] === $pass){
                return $user['id'];
            }
        }else{
            return false;
        }

    }
    //Заносим пользователя в ссесию
    public static function Auth($userId){
        $_SESSION['user'] = $userId;
    }
    //Проверяем юсера залогинился или нет по сессии
    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            header("Location: /");
        }
    }
    //Получаем инфу о юзере по сессии
    public static function getInfo($id){
        if($id){
            $db = Db::getCon();
            $sql = 'SELECT * FROM users WHERE id = :id';
            $result =  $db->prepare($sql);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }
    public static function fillOut($userId,$namee,$lastname,$newlogin,$tel,$newpass){
        $db = Db::getCon();

        $query = "UPDATE users SET name = :namee, lastname = :lastname, email = :newlogin, tel = :tel, pass = :newpass WHERE id = :userId";
        $result = $db->prepare($query);
        $result->bindParam(':userId',$userId,PDO::PARAM_INT);
        $result->bindParam(':namee',$namee,PDO::PARAM_STR);
        $result->bindParam(':lastname',$lastname,PDO::PARAM_STR);
        $result->bindParam(':newlogin',$newlogin,PDO::PARAM_STR);
        $result->bindParam(':tel',$tel,PDO::PARAM_STR);
        $result->bindParam(':newpass',$newpass,PDO::PARAM_STR);
        return $result->execute();
    }
}
