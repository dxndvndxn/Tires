<?php
// Front Controller

//1. Общие настройки
// Показывает ошибки
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
//2. Подключение файлос системы
define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/Router.php');


//3.Установка  соединения с БД

//4. Вызов ройутера
$router = new Router();
$router->run();
