<?php

class Router{
    //Маршруты
    private  $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    //Получаем строку запроса
    private function  getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run(){
        //Получить строку запроса
       $url = $this->getURI();

       //Проверяем наличие запроса  в routes,где  $urlPattern это точно ищем и
        //$path это путь к введеной строке
        foreach ($this->routes as $urlPattern => $path){

            //Сравниваем строку запроса $url с $urlPattern, который записан в routes

            if(preg_match("~$urlPattern~",$url)){
                $intRoute = preg_replace("~uriPattern~",$path,$url);
                $segmentsS = explode('/',$intRoute);
                //Разделяем пути на массив
               $segments = explode('/',$path);
               //определяем контроллер
               $controllerName = array_shift($segments).'Controller';
               $controllerName = ucfirst($controllerName);
               $actionName = 'action'.ucfirst(array_shift($segments));
                $controllerFile = ROOT. '/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                $contrllObj = new $controllerName;
                $result = call_user_func_array(array($contrllObj, $actionName), $segmentsS);
//                $result = $contrllObj->$actionName($segments);
                if($result !=null){
                    break;
                }

            }
        }

    }
}
