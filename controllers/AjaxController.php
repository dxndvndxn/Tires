<?php
class AjaxController{
//    public static function count(){
//        if(isset($_SESSION['buylist'])){
//            $count = 0;
//            foreach ($_SESSION['buylist'] as $id => $amount){
//                $count += $amount;
//            }
//            return $count;
//        }else{
//            return 0;
//        }
//    }
    public static function actionIndex()
    {
//        $buyList = [];
//        $tires = [];
        $finalTires = [];
        $finalDisks = [];

        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            if(isset($_SESSION['tires'])){
                $finalTires = $_SESSION['tires'];
            }
            if(isset($_SESSION['disks'])){
                $finalDisks = $_SESSION['disks'];
            }

            foreach ($_POST as $i => $value){
                if($i == 'tire'){
                    if(array_key_exists($value,$finalTires)){
                        $_SESSION['tires'][$value]++;
                    }else{
                        $_SESSION['tires'][$value] = 1;
                    }
                }else{
                    if(array_key_exists($value,$finalDisks)){
                        $_SESSION['disks'][$value]++;
                    }else{
                        $_SESSION['disks'][$value] = 1;
                    }
                }
            }
            if(isset($_SESSION['tires'])){
                $tiresSum = array_sum($_SESSION['tires']);
            }
            if(isset($_SESSION['disks'])){
                $disksSum = array_sum($_SESSION['disks']);
            }
            if(empty($_SESSION['tires'])){
                $tiresSum = 0;
            }
            if(empty($_SESSION['disks'])){
                $disksSum = 0;
            }
            $_SESSION['count'] =  $tiresSum + $disksSum;
            echo $_SESSION['count'];
            die();
        }
    }
}
//class AjaxController{
//    public static function count(){
//        if(isset($_SESSION['buylist'])){
//            $count = 0;
//            foreach ($_SESSION['buylist'] as $id => $amount){
//                $count += $amount;
//            }
//            return $count;
//        }else{
//            return 0;
//        }
//    }
//    public static function actionIndex()
//    {
//        $buyList = [];
//        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//            if(isset($_SESSION['buylist'])){
//                $_SESSION['buylist'];
//                $buyList = $_SESSION['buylist'];
//            }
//            $count = 0;
//            foreach ($_POST as $i => $value){
//                if(array_key_exists($i,$buyList)){
//                    $_SESSION['buylist'][$i]++;
//                }else{
//                    $_SESSION['buylist'][$i] = 1;
//                }
//            }
//            foreach ($_SESSION['buylist'] as $id => $amount){
//                $count += $amount;
//            }
//            $_SESSION['count'] = $count;
//            echo $count;
//            die();
//        }
//    }
//}