<?php
include_once(ROOT . '/components/Db.php');
class AdminDbChanges{
    public static function insertTires(){
        if(isset($_POST['newTire'])){
            print_r($_POST);
//            print_r($_FILES);
            $description = $_POST['description'];
            $name = $_POST['nameTire'];
            echo $name;
            echo $description;
            $amount = $_POST['amount'];
            $width = $_POST['width_tire'];
            $height = $_POST['height'];
            $diametr = $_POST['diametr_tire'];
            $season = $_POST['season'];
            $mainTire = $_POST['newTire'];
            $destPath = ROOT."/template/img/";

            $one = null;
            $two = null;
            //Закидываем фотки
            foreach ($_FILES['photo'] as $k => $srcc){
                if($k == 'name'){
                    $two = $srcc;
                }
                if($k == 'tmp_name'){
                    $one = $srcc;
                }
            }
            if(isset($one) && isset($two)){
                foreach ($two as $i => $value){
                    copy($one[$i],$destPath.basename($two[$i]));
                    if($two[$i] === $mainTire){
                        unset($two[$i]);
                    }
                }
            }

            array_push($two,$mainTire);
            $src = implode(',',array_reverse($two));
            echo $src;
            $db = Db::getCon();
            $sql = "INSERT INTO catalog_tire(catalog_tire_width,catalog_tire_height,catalog_tire_diameter,catalog_tire_season,catalog_tire_name,catalog_tire_description,available) VALUES ($width,$height,$diametr,$season,'$name','$description',1)";
            if($db->query($sql)){
                echo 'YES';
            }else{
                echo 'NOPE';
            }
        }
    }
}
