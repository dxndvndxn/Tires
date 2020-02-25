<?php
class Db{
    public static function getCon(){
        $param = ROOT . '/config/db_param.php';
        $params = include($param);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'],$params['password']);
        return $db;
    }
}