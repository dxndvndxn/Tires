<?php
include_once(ROOT . '/components/Db.php');
class Register{

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
    static function insertUser($email,$pass){
        $db = Db::getCon();

        $sql = 'INSERT INTO users(email,pass) VALUES(:email,:pass)';
        $result =  $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':pass',$pass,PDO::PARAM_STR);
        return $result->execute();

    }
    static function justCheckEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    static function checkPass($pass){
        if(strlen($pass)>=8){
            return true;
        }else{
            return false;
        }
    }
    public static function checkUser($email,$pass){
        $db = Db::getCon();
        $sql = 'SELECT * FROM users WHERE email = :email AND pass = :pass';
        $result =  $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_INT);
        $result->bindParam(':pass',$pass,PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if($user){
            return $user['id'];
        }else{
            return false;
        }
//        $i = 0;
//        while ($user = $result->fetch()){
//            array_push($dataUser,$user);
//        }
//        return $dataUser;

    }
    public static function Auth($userId){
        $_SESSION['user'] = $userId;
    }
    public static function checkLogged(){
        $dt = array();
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            header("Location: /");
        }
    }
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
}
