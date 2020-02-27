<?php

class ValuesForm
{
    static function getConnect()
    {
        return  mysqli_connect('localhost','root','','tire_life');
    }
    //Получаем параметры в форму
    public static function getTireWidth()
    {
        $db = self::getConnect();
        $widthList = array();

        $tireWidth = mysqli_query($db,'SELECT `id`,`width`'.'FROM `tire_width`'.'ORDER BY width ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($tireWidth)){
            $widthList[$i]= $row;
            $i++;
        }
        return $widthList;
    }
    public static function getTireHeight()
    {
        $db = self::getConnect();
        $heightList = array();

        $tireHeight = mysqli_query($db,'SELECT `id`,`height`'
            .'FROM `tire_height`'
            .'ORDER BY height ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($tireHeight)){
            $heightList[$i]= $row;
            $i++;
        }
        return $heightList;
    }
    public static function getTireDiametr()
    {
        $db = self::getConnect();
        $diametrList = array();

        $tireDiametr = mysqli_query($db,'SELECT `id`,`diametr`'.'FROM `tire_diametr`'.'ORDER BY diametr ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($tireDiametr)){
            $diametrList[$i]= $row;
            $i++;
        }
        return $diametrList;
    }
    public static function getSeason()
    {
        $db = self::getConnect();
        $seasonList = array();

        $tireSeason = mysqli_query($db,'SELECT `id`,`season`'.'FROM `tire_season`'.'ORDER BY id ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($tireSeason)){
            $seasonList[$i]= $row;
            $i++;
        }
        return $seasonList;
    }
    public static function getDiskWidth()
    {
        $db = self::getConnect();
        $widthList = array();

        $diskWidth = mysqli_query($db,'SELECT `id`,`width`'.'FROM `disk_width`'.'ORDER BY width ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($diskWidth)){
            $widthList[$i]= $row;
            $i++;
        }
        return $widthList;
    }
    public static function getDiskDiametr()
    {
        $db = self::getConnect();
        $diametrList = array();

        $diskDiametr = mysqli_query($db,'SELECT `id`,`diametr`'.'FROM `disk_diametr`'.'ORDER BY diametr ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($diskDiametr)){
            $diametrList[$i]= $row;
            $i++;
        }
        return $diametrList;
    }
    public static function getPCD()
    {
        $db = self::getConnect();
        $pcdList = array();

        $pcd = mysqli_query($db,'SELECT `id`,`pcd`'.'FROM `pcd`'.'ORDER BY pcd ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($pcd)){
            $pcdList[$i]= $row;
            $i++;
        }
        return $pcdList;
    }
    public static function getDIA()
    {
        $db = self::getConnect();
        $diaList = array();

        $dia = mysqli_query($db,'SELECT `id`,`dia`'.'FROM `dia`'.'ORDER BY dia ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($dia)){
            $diaList[$i]= $row;
            $i++;
        }
        return $diaList;
    }
    public static function getBolt(){
        $db = self::getConnect();
        $boltList = array();

        $bolt = mysqli_query($db,'SELECT `id`,`bolt_amount`'.'FROM `disk_bolt_amount`'.'ORDER BY bolt_amount ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($bolt)){
            $boltList[$i]= $row;
            $i++;
        }
        return $boltList;
    }
    public static function getTakeoff(){
        $db = self::getConnect();
        $takeList = array();

        $takeoff = mysqli_query($db,'SELECT `id`,`takeoff`'.'FROM `disk_takeoff`'.'ORDER BY takeoff ASC;');

        $i = 0;
        while ($row = mysqli_fetch_array($takeoff)){
            $takeList[$i]= $row;
            $i++;
        }
        return $takeList;
    }
    //Получаем все товары на главную
    public static function getAllProducts($page=1){

        $db = self::getConnect();

        //Запросы в базу на все записи
        $tires = mysqli_query($db,"SELECT width AS tire_width,height,diametr AS tire_diametr,season,catalog_tire.id AS tire_id,catalog_tire.tire_name,catalog_tire.price AS tire_price,catalog_tire.tire_description FROM tire_width 
JOIN catalog_tire on tire_width.id = catalog_tire.tire_width_id 
JOIN tire_height on catalog_tire.tire_height_id = tire_height.id 
JOIN tire_diametr on catalog_tire.tire_diametr_id = tire_diametr.id 
JOIN tire_season on catalog_tire.tire_season_id = tire_season.id
 WHERE available = 1 ORDER by catalog_tire.id DESC");

        $disks = mysqli_query($db,'SELECT width AS disk_width,diametr AS disk_diametr,takeoff,bolt_amount,pcd,dia,catalog_diskov.id AS disk_id,catalog_diskov.disk_name,catalog_diskov.disk_description,catalog_diskov.price AS disk_price FROM disk_width 
JOIN catalog_diskov ON disk_width.id = catalog_diskov.disk_width_id 
JOIN disk_diametr ON catalog_diskov.disk_diametr_id = disk_diametr.id 
JOIN disk_takeoff ON catalog_diskov.disk_takeoff_id = disk_takeoff.id 
JOIN disk_bolt_amount ON catalog_diskov.bolt_amount_id = disk_bolt_amount.id 
JOIN pcd ON catalog_diskov.pcd_id = pcd.id 
JOIN dia ON catalog_diskov.dia_id = dia.id 
WHERE available = 1 ORDER BY catalog_diskov.id DESC');

        $commonList = array();
        $shuffList = array();
        $lastList = array();
        //Пушим данные из БД в массив
        $i = 0;
        while ($row = mysqli_fetch_array($tires)){
            array_push($commonList,$row);
            $i++;
        }
        while ($row = mysqli_fetch_array($disks)){
            array_push($commonList,$row);
            $i++;
        }
        //Мешаем
//        shuffle($commonList);
//        //Пушим в новый массив
//        foreach ($commonList as $row => $value){
//            array_push($shuffList,$value);
//        }
//
//        //Пушим первые 10 массивов
//        //Удаялем первые 10 и так далее..
//         for($k = 0; $k < count($shuffList); $k++){
//             array_push($lastList,array_slice($shuffList,0,10));
//             array_splice($shuffList,0,10);
//         }
        $lastList = array_fill(0,1,'');

         for($k = 0; $k < count($commonList); $k++){
             array_push($lastList,array_slice($commonList,0,10));
             array_splice($commonList,0,10);
         }
         //Возвращаем массив , где в каждом ключе нужные данные для вывода на одну страницу
        return $lastList[$page];

    }
    //Получаем кол-во записей на главеую
    public static function countTires(){
        $db = self::getConnect();

        $countTires = mysqli_query($db,'SELECT COUNT(id) as COUNT FROM catalog_tire WHERE available = 1');
        $countDisks = mysqli_query($db,'SELECT COUNT(id) as COUNT FROM catalog_diskov WHERE available = 1');
        $row = mysqli_fetch_array($countTires);
        $row2 = mysqli_fetch_array($countDisks);
        return $row[0] + $row2[0];
    }
    //Присылаем шины
    public static function outputTires(){
        $db = self::getConnect();
        foreach ($_GET as $name =>$value){
            if($value == null){
                $_GET[$name] = "'%'";
            }
        }
        $tiresList = array();
        if(isset($_GET['width_tire']) && isset($_GET['height']) && isset($_GET['diametr_tire']) && isset($_GET['season'])){
            $width = $_GET['width_tire'];
            $height = $_GET['height'];
            $diametr = $_GET['diametr_tire'];
            $season = $_GET['season'];

            $query = mysqli_query($db, "SELECT width,height,diametr,season,catalog_tire.id,catalog_tire.tire_name,catalog_tire.price,catalog_tire.tire_description FROM tire_width
        JOIN catalog_tire on tire_width.id = catalog_tire.tire_width_id
        JOIN tire_height on catalog_tire.tire_height_id = tire_height.id
        JOIN tire_diametr on catalog_tire.tire_diametr_id = tire_diametr.id
        JOIN tire_season on catalog_tire.tire_season_id = tire_season.id
        WHERE tire_width_id LIKE $width AND tire_height_id LIKE $height AND tire_diametr_id LIKE $diametr AND tire_season_id LIKE $season ORDER BY catalog_tire.id DESC;");

            while($row = mysqli_fetch_array($query)){
                array_push($tiresList,$row);
            }
        }

        return $tiresList;

    }
    //Присылаем диски
    public static function outputDisks(){
        $db = self::getConnect();
        foreach ($_GET as $name =>$value){
            if($value == null){
                $_GET[$name] = "'%'";
            }
        }
        $diskList = array();
        if(isset($_GET['width_disks']) && isset($_GET['takeoff']) && isset($_GET['diametr_disks']) && isset($_GET['dia']) && isset($_GET['bolt']) && isset($_GET['pcd'])) {
            $width = $_GET['width_disks'];
            $takeoff = $_GET['takeoff'];
            $diametr = $_GET['diametr_disks'];
            $dia = $_GET['dia'];
            $bolt = $_GET['bolt'];
            $pcd = $_GET['pcd'];

            $query = mysqli_query($db, "SELECT width,diametr,takeoff,dia,bolt_amount,pcd,catalog_diskov.id,catalog_diskov.disk_name,catalog_diskov.price,catalog_diskov.disk_description FROM disk_width 
            JOIN catalog_diskov on disk_width.id = catalog_diskov.disk_width_id 
            JOIN disk_diametr on catalog_diskov.disk_diametr_id = disk_diametr.id 
            JOIN disk_takeoff on catalog_diskov.disk_takeoff_id = disk_takeoff.id 
            JOIN dia on catalog_diskov.dia_id = dia.id 
            JOIN disk_bolt_amount on catalog_diskov.bolt_amount_id = disk_bolt_amount.id 
            JOIN pcd on catalog_diskov.pcd_id = pcd.id 
            WHERE disk_width_id LIKE $width AND disk_diametr_id LIKE $diametr AND disk_takeoff_id LIKE $takeoff AND dia_id LIKE $dia AND bolt_amount_id LIKE $bolt AND pcd_id LIKE $pcd ORDER BY catalog_diskov.id DESC;");

            while ($row = mysqli_fetch_array($query)) {
                array_push($diskList, $row);
            }
        }
        return $diskList;
    }

}
