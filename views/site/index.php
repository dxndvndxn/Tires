<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/index.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Scada:400,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="template/fancybox-master/dist/jquery.fancybox.min.css">
    <title>Главная</title>
</head>
<body>
<?php include_once('views/layouts/header.php') ?>

<?php include_once('views/layouts/forma.php') ?>

<div class="catalog grid" id="catalog">
    <div></div>

    <div class="article">

        <?php foreach ($allList as $value): ?>
        <?php if(isset($value['catalog_tire_name'])): ?>
            <div class="article-out">
                <div class="wrap-img">
                    <?php foreach (explode(',',$value['catalog_tire_pics']) as $img):?>
                        <a href="template/img/<?php echo $img?>" data-fancybox="gallery<?php echo $value['tire_id']?>t" data-caption="Caption #1">
                            <img src="template/img/<?php echo $img?>" alt="" loading="auto">
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="article-description">
                    <div class="title">
                        <span class="name"><?php echo $value['catalog_tire_name'] ?></span>
                        <span class="width"><?php echo $value['tire_width'] ?></span><span class="height">/S<?php echo $value['height'] ?></span>
                        <span class="diametr">R<?php echo $value['tire_diametr'] ?></span>
                    </div>
                    <p class="manual"><?php echo $value['catalog_tire_description'] ?>
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
                        <button class="buy tire" data-id="<?php echo $value['tire_id']?>" <?php if(isset($_SESSION['tires'][$value['tire_id']])){echo 'disabled';} ?>>
                            <?php if(isset($_SESSION['tires'][$value['tire_id']])){
                                echo 'В корзине!';
                            }else{
                                echo "В корзину <img src=\"https://img.icons8.com/pastel-glyph/100/000000/shopping-cart--v1.png\"";
                            } ?>
                        </button>
                        <button class="buy tire" data-id="<?php echo $value['tire_id']?>" <?php if(isset($_SESSION['tires'][$value['tire_id']])){echo 'disabled';} ?>><a href="/cart">Купить в 1 клик</a></button>
                    </div>
                </div>
            </div>
            <?php elseif(isset($value['catalog_diskov_name'])):?>
                <div class="article-out">
                    <div class="wrap-img">
                        <?php foreach (explode(',',$value['catalog_diskov_pics']) as $img):?>
                            <a href="template/img/<?php echo $img?>" data-fancybox="gallery<?php echo $value['disk_id']?>d" data-caption="Caption #1">
                                <img src="template/img/<?php echo $img?>" alt="" loading="auto">
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="article-description">
                        <div class="title">
                            <span class="name"><?php echo $value['catalog_diskov_name'] ?></span>
                            <span class="width"><?php echo $value['disk_width'] ?>j</span>x<span class="diametr"><?php echo $value['disk_diametr'] ?></span>
                            <span class="width"><?php echo $value['bolt_amount'] ?></span>x<span class="diametr"><?php echo $value['pcd'] ?></span>
                            <span class="diametr">ET<?php echo $value['takeoff'] ?></span>
                            <span class="diametr">DIA<?php echo $value['dia'] ?></span>
                        </div>
                        <p class="manual"><?php echo $value['catalog_diskov_description'] ?>
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
                            <button class="buy disk" data-id="<?php echo $value['disk_id']?>" <?php if(isset($_SESSION['disks'][$value['disk_id']])){echo 'disabled';} ?>>
                                <?php if(isset($_SESSION['disks'][$value['disk_id']])){
                                    echo 'В корзине!';
                                }else{
                                    echo "В корзину <img src=\"https://img.icons8.com/pastel-glyph/100/000000/shopping-cart--v1.png\"";
                                } ?>
                            </button>
                            <button class="buy disk" data-id="<?php echo $value['disk_id']?>" <?php if(isset($_SESSION['disks'][$value['disk_id']])){echo 'disabled';} ?>><a href="/cart">Купить в 1 клик</a></button>
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
<script src="template/js/_vars.js"></script>
<script src="template/js/one.js"></script>
<script src="template/js/scroll.js"></script>
<script src="template/js/ajax.js"></script>
<?php if(User::isGest()): ?>
    <script src="template/js/forma.js"></script>
<?php endif; ?>
<!--<script src="template/slick/slick.min.js"></script>-->
<script src="template/fancybox-master/dist/jquery.fancybox.min.js"></script>
</body>
</html>
