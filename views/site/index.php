<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/index.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Scada:400,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Главная</title>
</head>
<body>
<?php include_once('views/layouts/header.php') ?>

<?php include_once('views/layouts/forma.php') ?>

<div class="catalog grid" id="catalog">
    <div></div>

    <div class="article">

        <?php foreach ($allList as $value): ?>
        <?php if(isset($value['tire_name'])): ?>
            <div class="article-out">
                <div class="wrap-img"><img src="template/img/tireone.png" alt=""></div>
                <div class="article-description">
                    <div class="title">
                        <span class="name"><?php echo $value['tire_name'] ?></span>
                        <span class="width"><?php echo $value['tire_width'] ?></span><span class="height">/S<?php echo $value['height'] ?></span>
                        <span class="diametr">R<?php echo $value['tire_diametr'] ?></span>
                    </div>
                    <p class="manual"><?php echo $value['tire_description'] ?>
                        <br>
                        <br>
                        <span class="where">сделаны в Португалии </span> <br>
                        <span class="useOrnot">б\у месяц</span><br>
                        <span class="season"><?php echo $value['season'] ?></span>
                    </p>
                </div>
                <div class="price-buy">
                    <div class="price">
                        <?php echo $value['tire_price'] ?> ₽
                    </div>
                    <div class="available">
                        В наличии
                    </div>
                    <div class="wrap_btn">
                        <button>В корзину <img src="https://img.icons8.com/pastel-glyph/100/000000/shopping-cart--v1.png"></button>
                        <button>Купить в 1 клик</button>
                    </div>
                </div>
            </div>
            <?php elseif(isset($value['disk_name'])):?>
                <div class="article-out">
                    <div class="wrap-img"><img src="template/img/tireone.png" alt=""></div>
                    <div class="article-description">
                        <div class="title">
                            <span class="name"><?php echo $value['disk_name'] ?></span>
                            <span class="width"><?php echo $value['disk_width'] ?>j</span>x<span class="diametr"><?php echo $value['disk_diametr'] ?></span>
                            <span class="width"><?php echo $value['bolt_amount'] ?></span>x<span class="diametr"><?php echo $value['pcd'] ?></span>
                            <span class="diametr">ET<?php echo $value['takeoff'] ?></span>
                            <span class="diametr">DIA<?php echo $value['dia'] ?></span>
                        </div>
                        <p class="manual"><?php echo $value['disk_description'] ?>
                        </p>
                    </div>
                    <div class="price-buy">
                        <div class="price">
                            <?php echo $value['disk_price'] ?> ₽
                        </div>
                        <div class="available">
                            В наличии
                        </div>
                        <div class="wrap_btn">
                            <button>В корзину <img src="https://img.icons8.com/pastel-glyph/100/000000/shopping-cart--v1.png"></button>
                            <button>Купить в 1 клик</button>
                        </div>
                    </div>
                </div>
            <?php else: continue ?>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

    <div></div>

    <div></div>

    <div class="pagi-wrap">
        <?php echo $pagination->get(); ?>
    </div>

    <div></div>
</div>

<?php include_once('views/layouts/footer.php') ?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="template/js/one.js"></script>
<script src="template/js/scroll.js"></script>
</body>
</html>
