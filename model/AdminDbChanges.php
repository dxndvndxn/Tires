<?php
include_once(ROOT . '/components/Db.php');
class AdminDbChanges{
    public static function insertTires(){
        if(isset($_POST['newTire'])){
//            print_r($_POST);
            print_r($_FILES);
//            print_r($_FILES['photo']['name']);
            $src = implode(',',$_FILES['photo']['name']);
            $destPath = "C:/xampp/htdocs/Tires/template/img/";
//            print_r($src);
            $one = null;
            $two = null;
            foreach ($_FILES['photo'] as $k => $srcc){
                if($k == 'name'){
                    $two = $srcc;
                }
                if($k == 'tmp_name'){
                    $one = $srcc;
                }
                if(isset($one) && isset($two)){
                    foreach ($two as $i => $value){
                        if(copy($one[$i],$destPath.basename($two[$i]))){
                            echo 'YEP';
                        }else{
                            echo  'NOPE';
                        }
                    }
                }
            }
        }
    }
}
