<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/admin.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Scada:400,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Админ</title>
</head>
<body>
<div class="panel">
    <div class="panel-tabs">
        <div class="plus">
            <span data-el = '0'></span>
        </div>
        <div class="hamb">
            <span data-el = '1'></span>
            <span data-el = '1'></span>
            <span data-el = '1'></span>
        </div>
    </div>
    <div class="panel-marks">
        <div class="add">
            <div class="wrap-title_tabs">
                <div class="title">
                    <h1>Добавление нового товара</h1>
                </div>
            </div>
            <div class="add-descr">
                <label for="description">Описание</label>
                <input type="text" id="description" name="description">
            </div>
            <div class="add-name_amount">
                <div class="add-name_amount_fields">
                    <div class="wrap">
                        <label for="nameTire">Название</label>
                        <textarea name="nameTire" id="nameTire" form="search_tires"></textarea>
                    </div>
                    <div class="wrap">
                        <label for="amount">Кол-во</label>
                        <input type="number" id="amount" name="amount" form="search_tires">
                    </div>
                </div>
                <div class="tabs">
                    <span>Шины</span>
                    <span>Диски</span>
                </div>
            </div>
            <div class="forms">
                <form action="#" enctype="multipart/form-data" method="post" class="form_for_characteristics" id="search_tires" autocomplete="off">
                    <select name="width_tire" required>
                        <option value="">Ширина</option>
                        <?php foreach ($widthTire as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['width'];?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="height" required>
                        <option value="">Высота</option>
                        <?php foreach ($heightTire as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['height'];?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="diametr_tire" required>
                        <option value="">Диаметр</option>
                        <?php foreach ($diametrTire as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['diametr'];?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="season" required>
                        <option value="">Сезон</option>
                        <?php foreach ($season as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['season'];?></option>
                        <?php endforeach;?>
                    </select>
                </form>
                <form action="#" enctype="multipart/form-data" method="post" class="form_for_characteristics" id="search_disks" autocomplete="off">
                    <div class="wrap">
                        <select name="width_disks" required>
                            <option value="">Ширина</option>
                            <?php foreach ($widthDisk as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['width'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="diametr_disks" required>
                            <option value="">Диаметр</option>
                            <?php foreach ($diametrDisk as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['diametr'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="takeoff" required>
                            <option value="">Вылет</option>
                            <?php foreach ($takeoff as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['takeoff'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="dia" required>
                            <option value="">DIA</option>
                            <?php foreach ($DIA as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['dia'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="wrap">
                        <select name="bolt" required>
                            <option value="">Болты</option>
                            <?php foreach ($bolts as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['bolt_amount'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="pcd" required>
                            <option value="">PCD</option>
                            <?php foreach ($PCD as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['pcd'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="add-photo">
                <div class="add-photo-show">
                    <div class="add-plus">
                    </div>
                    <div class="wrap">
                        Добавить фото
                        <input type="file" form="search_tires" name="photo[]" accept="image/*" id="uploadImg" value="" multiple>
                    </div>
                </div>
                <div class="add-photo-out">
                    <div class="out"></div>
                    <div class="add-photo-out-btn">
                        <button type="submit" name="newTire" id="btn" form="search_tires">Дабавить товар</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="existing"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="template/js/admin.js"></script>
</body>
</html>

