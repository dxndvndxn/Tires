<?php
include_once(ROOT . '/components/Db.php');
class AdminDbChanges
{
    public $description;
    public $nameArt;
    public $amount;
    public $price;
    public $width;
    public $diametr;
    public $mainTire;
    public $destPath = ROOT."/template/img/";
    public function insertNewItem(){
        $db = Db::getCon();
        $one = null;
        $two = null;
        if(isset($_POST['newTire'])){
            $this->description = $_POST['description'];
            $this->nameArt = $_POST['nameTire'];
            $this->amount = $_POST['amount'];
            $this->price = $_POST['price'];
            $this->mainTire = $_POST['newTire'];
            $this->width = $_POST['width_tire'];
            $this->diametr = $_POST['diametr_tire'];
            $height = $_POST['height'];
            $season = $_POST['season'];

            //Закидываем фотки
            foreach ($_FILES['photo'] as $k => $srcc){

                if($k == 'name'){

                    $two = $srcc;
                }

                if($k == 'tmp_name'){

                    $one = $srcc;
                }
            }
            if(isset($one) && isset($two)){

                foreach ($two as $i => $value){

                    copy($one[$i],$this->destPath.basename($two[$i]));

                    if($two[$i] === $this->mainTire){

                        unset($two[$i]);
                    }

                }

            }
            array_push($two, $this->mainTire);
            $src = implode(',',array_reverse($two));
            $sql = "INSERT INTO catalog_tire(catalog_tire_width,catalog_tire_height,catalog_tire_diameter,catalog_tire_season,catalog_tire_name,catalog_tire_description,available,catalog_tire_amount,catalog_tire_pics,price) VALUES ($this->width,$height,$this->diametr,$season,'$this->nameArt','$this->description',1,$this->amount,'$src',$this->price)";
            $db->query($sql);
            header("Location: http://localhost/admin");
        }
        elseif(isset($_POST['newDisk'])){
            $this->description = $_POST['description'];
            $this->nameArt = $_POST['nameTire'];
            $this->amount = $_POST['amount'];
            $this->price = $_POST['price'];
            $this->mainTire = $_POST['newDisk'];
            $this->width = $_POST['width_disks'];
            $this->diametr = $_POST['diametr_disks'];
            $takeoff = $_POST['takeoff'];
            $dia = $_POST['dia'];
            $bolt = $_POST['bolt'];
            $pcd = $_POST['pcd'];

            //Закидываем фотки
            foreach ($_FILES['photo'] as $k => $srcc){
                if($k == 'name'){
                    $two = $srcc;
                }
                if($k == 'tmp_name'){
                    $one = $srcc;
                }
            }
            if(isset($one) && isset($two)){

                foreach ($two as $i => $value){

                    copy($one[$i],$this->destPath.basename($two[$i]));

                    if($two[$i] === $this->mainTire){

                        unset($two[$i]);
                    }

                }

            }
            array_push($two,$this->mainTire);
            $src = implode(',',array_reverse($two));
            $sql = "INSERT INTO catalog_diskov(catalog_diskov_width,catalog_diskov_diametr,catalog_diskov_takeoff,catalog_diskov_bolt_amount,catalog_diskov_pcd,catalog_diskov_dia,catalog_diskov_name,catalog_diskov_description,available,catalog_diskov_amount,catalog_diskov_pics,price) VALUES ($this->width,$this->diametr,$takeoff,$bolt,$pcd,$dia,'$this->nameArt','$this->description',1,$this->amount,'$src',$this->price)";
            $db->query($sql);
            header("Location: http://localhost/admin");
        }
    }
    public static function deleteItem(){
        $db = Db::getCon();
        $url = $_SERVER['REQUEST_URI'];
        if(isset($_POST['deletedTire'])){
            $tires = implode(',',$_POST['deletedTire']);
            $getPics = "SELECT catalog_tire_pics FROM catalog_tire WHERE catalog_tire_id IN ($tires)";
            $result = $db->query($getPics);
            $pics = $result->fetchAll();
            $query = "DELETE FROM catalog_tire WHERE catalog_tire_id IN ($tires)";
            if($db->query($query)){
                foreach (explode(',',$pics[0][0]) as $pic){
                    unlink(ROOT."/template/img/".$pic);
                }
                if(!isset($_POST['deletedDisk'])){
                    header("Location: $url");
                }
            }
        }
        if(isset($_POST['deletedDisk'])){
            $disks = implode(',',$_POST['deletedDisk']);
            $getPics = "SELECT catalog_diskov_pics FROM catalog_diskov WHERE catalog_diskov_id IN ($disks)";
            $result = $db->query($getPics);
            $pics = $result->fetchAll();
            $query = "DELETE FROM catalog_diskov WHERE catalog_diskov_id IN ($disks)";
            if($db->query($query)){
                foreach (explode(',',$pics[0][0]) as $pic){
                    unlink(ROOT."/template/img/".$pic);
                }
                header("Location: $url");
            }
        }
    }

    public static function isAdmin(){
        if(isset($_SESSION['user']) and $_SESSION['user'] == 10){
            return true;
        }else{
            return false;
        }
    }
}

