<?php

class Router{
    //Хранәтсә маршруты
    private  $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    //вовзраһает строку URL
    private function  getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run(){
       $url = $this->getURI();
       // Проверәем наличие такого запроса в routes.php
       foreach ($this->routes as $uriPattern => $path){
          if(preg_match("~$uriPattern~",$url)){
              //Делаем из строки массив разделив ее на части
              $intRoute = preg_replace("~uriPattern~",$path,$url);
              $segments = explode('/',$path);
              $segmentsS = explode('/',$intRoute);
              //Удаләет первыј эллемент массива
              $controllerName = array_shift($segments).'Controller';
              //Делает первуө букву болғшој
              $controllerName = ucfirst($controllerName);
              //Забираем метод из роутов
              $actionName = 'action'.ucfirst(array_shift($segments));

              $controllerFile = ROOT. '/controllers/'. $controllerName .'.php';

              if(file_exists($controllerFile)){
                  include_once($controllerFile);
              }
              $contrllObj = new $controllerName;
              $result = call_user_func_array(array($contrllObj, $actionName), $segmentsS);
//              $result = $contrllObj->$actionName($segmentsS);
              if($result !=null){
                  break;
              }

          }
       }
    }
}
