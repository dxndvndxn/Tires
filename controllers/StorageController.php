<?php

class StorageController
{
    public $var1 = "public";
    private $var2 = "private";
    protected $var3 = "protected";

    public function func1() {
//        echo $this->var1;
//        echo $this->var2;
//        echo $this->var3;
        $this->func3();
    }

    private function func2() {
        echo $this->var1;
        echo $this->var2;
        echo $this->var3;
    }

    protected function func3() {
        echo $this->var1;
        echo $this->var2;
        echo $this->var3;
    }
    public function  actionInfo(){
        require_once(ROOT . '/views/storage/storage.php');
        return true;
    }
}
class FirstClass
{
    public static $var1 = "var1";

    public static function staticValue() {
        return self::$var1;
    }
    protected function exp1(){
        echo 1;
    }
}

class SecondClass extends FirstClass
{
    public function var1Static() {
        return parent::$var1;
    }
    public function callExp1(){
        parent::exp1();
    }
}
//$newExp1 = new SecondClass();
//$newExp1->callExp1();

abstract class AbstClass {
    /* Данный метод должен быть определён в дочернем классе */
    abstract protected function getValue();

    /* Общий метод */
    public function printValue() {
        print $this->getValue() . "\n";
    }
}

class FirstClassBussines extends AbstClass
{
    protected function getValue() {
        return "FirstClassBussines";
    }
}

$class1 = new FirstClassBussines();

interface CarTemplate
{
    public function getId(); // получить id автомобиля
    public function getName(); // получить название
    public function add(); // добавить новый автомобиль
}
class Audi implements CarTemplate {
    function getId() {
        return "1-ATHD98";
    }

    function getName() {
        return "Audi";
    }

    function add() {
        //
    }
}

$class2 = new Audi();

class MyClass {
    public $c = "c value";

    public function __set($name, $value) {
        echo "__set, property - {$name} is not exists, can't set value - $value \n";
    }

    public function __get($name) {
        echo "__get, property - {$name} is not exists \n";
    }
}
//$obj = new MyClass;
//$obj->a = 2; // запись в свойство (свойство не существует)
//echo $obj->b; // получаем значение свойства (свойство не существует)
//echo $obj->c; // получаем значение свойства (свойство существует)

class MyClass1 {
    public function __call($name, $arguments) {
        return "__call, method - {$name} is not exists \n";
    }

    public function getId() {
        return "AH-15474";
    }
}

//$obj = new MyClass1;
//echo $obj->getName(); // вызов метода (метод не существует)
//echo $obj->getId(); // вызов метода (метод не существует)
class MyClass2 {
    public $var1 = 1;
//    public function __toString() {
//        return "MyClass class";
//    }
}

$obj = new MyClass2;
$obj2 = $obj;
$obj2->var1 = 2;
echo $obj2->var1 . ' $obj2' .'<br>';
echo $obj->var1 . ' $obj';
