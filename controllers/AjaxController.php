<?php

class AjaxController{
    public static function count(){
        if(isset($_SESSION['buylist'])){
            $count = 0;
            foreach ($_SESSION['buylist'] as $id => $amount){
                $count += $amount;
            }
            return $count;
        }else{
            return 0;
        }
    }
    public static function actionIndex()
    {
        $buyList = [];
        $_SESSION['buylist'];
        $buyList = $_SESSION['buylist'];
        $count = 0;
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            foreach ($_POST as $i => $value){
                if(array_key_exists($i,$buyList)){
                    $_SESSION['buylist'][$i]++;
                }else{
                    $_SESSION['buylist'][$i] = 1;
                }
            }
            foreach ($_SESSION['buylist'] as $id => $amount){
                $count += $amount;
            }
            $_SESSION['count'] = $count;
            echo $count;
            die();
        }
    }
}