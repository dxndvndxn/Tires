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
    public static function justCheckEmail($email = NULL){
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
    //Заполняем данные о пользователе
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
    //Заполняем карзину шинами
    public static function getTiresById($ids){
        $products = [];
        $db = Db::getCon();
        $idStr = implode(',',$ids);
        $sql = "SELECT width AS tire_width,height,diametr AS tire_diametr,catalog_tire.catalog_tire_id AS tire_id,catalog_tire.catalog_tire_name,catalog_tire.price AS tire_price FROM tire_width 
JOIN catalog_tire on tire_width.id = catalog_tire.catalog_tire_width
JOIN tire_height on catalog_tire.catalog_tire_height = tire_height.id 
JOIN tire_diametr on catalog_tire.catalog_tire_diameter = tire_diametr.id 
 WHERE available = 1 AND catalog_tire.catalog_tire_id IN ($idStr) ORDER by catalog_tire.catalog_tire_id DESC";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row = $result->fetch()){
            $products[$i]['tire_id'] = $row['tire_id'];
            $products[$i]['tire_width'] = $row['tire_width'];
            $products[$i]['height'] = $row['height'];
            $products[$i]['tire_diametr'] = $row['tire_diametr'];
            $products[$i]['tire_price'] = $row['tire_price'];
            $products[$i]['catalog_tire_name'] = $row['catalog_tire_name'];
            $i++;
        }
        return $products;
    }
    public static function getDisksById($ids){
        $products = [];
        $db = Db::getCon();
        $idStr = implode(',',$ids);
        $sql = "SELECT width AS disk_width,diametr AS disk_diametr,takeoff,bolt_amount,pcd,dia,catalog_diskov.catalog_diskov_id AS disk_id,catalog_diskov.catalog_diskov_name,catalog_diskov.price AS disk_price FROM disk_width 
JOIN catalog_diskov ON disk_width.id = catalog_diskov.catalog_diskov_width 
JOIN disk_diametr ON catalog_diskov.catalog_diskov_diametr = disk_diametr.id 
JOIN disk_takeoff ON catalog_diskov.catalog_diskov_takeoff = disk_takeoff.id 
JOIN disk_bolt_amount ON catalog_diskov.catalog_diskov_bolt_amount = disk_bolt_amount.id 
JOIN pcd ON catalog_diskov.catalog_diskov_pcd = pcd.id 
JOIN dia ON catalog_diskov.catalog_diskov_dia = dia.id 
WHERE available = 1 AND catalog_diskov.catalog_diskov_id IN ($idStr) ORDER BY catalog_diskov.catalog_diskov_id DESC";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while($row =$result->fetch()){
            $products[$i]['disk_id'] = $row['disk_id'];
            $products[$i]['disk_width'] = $row['disk_width'];
            $products[$i]['takeoff'] = $row['takeoff'];
            $products[$i]['disk_diametr'] = $row['disk_diametr'];
            $products[$i]['disk_price'] = $row['disk_price'];
            $products[$i]['catalog_diskov_name'] = $row['catalog_diskov_name'];
            $products[$i]['bolt_amount'] = $row['bolt_amount'];
            $products[$i]['pcd'] = $row['pcd'];
            $products[$i]['dia'] = $row['dia'];
            $products[$i]['disk_price'] = $row['disk_price'];
            $i++;
        }
        return $products;
    }
}
