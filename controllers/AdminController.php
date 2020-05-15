<?php
include_once(ROOT . '/model/ValuesForm.php');
include_once(ROOT . '/components/Pagination.php');
include_once(ROOT . '/model/Register.php');
include_once(ROOT . '/components/User.php');
include_once(ROOT . '/model/AdminDbChanges.php');

class AdminController{
   public function actionIndex($page = 1){
       if ($page == "") {
           $page = 1;
       }
        //ШИНЫ
        $widthTire = ValuesForm::getTireWidth();
        $heightTire = ValuesForm::getTireHeight();
        $diametrTire = ValuesForm::getTireDiametr();
        $season = ValuesForm::getSeason();
        //ДИСКИ
        $widthDisk = ValuesForm::getDiskWidth();
        $diametrDisk = ValuesForm::getDiskDiametr();
        $PCD = ValuesForm::getPCD();
        $DIA = ValuesForm::getDIA();
        $bolts = ValuesForm::getBolt();
        $takeoff = ValuesForm::getTakeoff();

        //Тотал кол-во айтемов
        $total = ValuesForm::countTires();

        //Добавляем новые айтемы
        $addArt = new AdminDbChanges();
        $addArt->insertNewItem();

        //Отображаем в админке все айтемы
        $allList = ValuesForm::getAllProducts($page,20);

        //Удаляем айтемы
        AdminDbChanges::deleteItem();

        //Пагинация
        $pagination = new Pagination($total,$page,20,'');

        //Вход Админа
        User::SignIn();

        require_once(ROOT . '/views/admin/admin.php');
        return true;
    }
}
