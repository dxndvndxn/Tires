<?php
include_once(ROOT . '/components/User.php');
class CartController{
    function actionOpen(){
        $userUp = User::SignUp();
        $userIn = User::SignIn();
        $userOut = User::LogOut();

        $productInCart = User::getProduct();
//        print_r($productInCart);
        if($productInCart){
            //возвращает ключи из массива
            $productIds = array_keys($productInCart);
            $disks = [];
            $tires = [];
//            foreach ($productInCart as $id => $value){
//
//            }
            $newArr = [];
            for($i = 0; $i < count($productInCart);$i++){
                array_push($newArr,array_flip($productInCart));
            }
//            print_r($newArr);

//            $disk = preg_grep("/(\d)(?=d)/",array_flip($productInCart));
//            array_push($disks,array_flip($disk));
//            $tire = preg_grep("/(\d)(?=t)/",array_flip($productInCart));
//            array_push($tires,$tire);
//            print_r($disks);
//            print_r($tires);
            //Находи нужые ключи с d и t
//            $disks = preg_grep("/(\d)(?=d)/",$productIds);
//            $tires = preg_grep("/(\d)(?=t)/",$productIds);

//            print_r(array_flip($disks));

        }
        require_once('views/cart/cart.php');
        return true;
    }
}