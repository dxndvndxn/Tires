<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/cabinet.css">
    <title>Кабинет</title>
</head>
<body>
<?php include_once('views/layouts/header.php') ?>
<div class="desk grid">
    <div></div>
    <div class="desk-content">
        <div class="tabs">
            <span>Корзина</span>
            <span>Прошлые покупки</span>
            <span>Профиль</span>
        </div>
        <div class="desk-content-in">
            <div class="cart">
                <form action="#">
                    <div class="cards">
                        <div class="article">
                            <div class="order">
                                <div class="title">
                                    <span class="name">ContiSportContact™5</span>
                                    <span class="useOrnot">б/у</span>
                                    <span class="width">255</span><span class="height">/S55</span>
                                    <span class="diametr">R19</span>
                                </div>
                                <div class="amount">X<input type="number" value="1" data-am="1" disabled>
                                    <div class="minus"><span class="remove"></span></div>
                                    <div class="plus"><span></span><span class="add"></span></div>
                                </div>
                            </div>
                            <div class="price"><div class="wrapper"><input type="number" name="howmuch" value="23000" data-value="23000" disabled>&#8381;</div><div class="close"><span></span><span class="cl"></span></div></div>
                        </div>
                        <div class="article">
                            <div class="order">
                                <div class="title">
                                    <span class="name">WSP R648</span>
                                    <span class="width">9.0j</span>x<span class="diametr">18</span>
                                    <span class="width">5</span>x<span class="diametr">120.0</span>
                                    <span class="diametr">ET32.0</span>
                                    <span class="diametr">DIA72.6</span>
                                </div>
                                <div class="amount">X<input type="number" value="1" data-am="1" disabled>
                                    <div class="minus"><span class="remove"></span></div>
                                    <div class="plus"><span></span><span class="add"></span></div>
                                </div>
                            </div>
                            <div class="price"><div><input type="number" name="howmuch" value="23000" data-value="23000" disabled>&#8381;</div><div class="close"><span></span><span class="cl"></span></div></div>
                        </div>
                    </div>
                    <div class="wrap-btn"><span class="total">Итого: <input type="number" value="46000" data-totall="46000" disabled class="total-inp">&#8381;</span><input type="submit" value="Оформить заказ"></div>
                </form>
            </div>
            <div class="latest"></div>
            <div class="profile">
                <form action="#" method="post">
                    <div><label>Имя</label><input type="text" placeholder="Илья"></div>
                    <div><label>Фамилия</label><input type="text" placeholder="Налимов"></div>
                    <div><label>E-mail</label><input type="email" placeholder="<?php echo $userInfo['email'];?>"></div>
                    <div><label>Старый пароль</label><input type="password" name="oldpass" placeholder="********"></div>
                    <div><label>Новый пароль</label><input type="password" name="newpass" placeholder="********"></div>
                    <div><input type="submit" value="Сохранить"></div>
                </form>
            </div>
        </div>
    </div>
    <div></div>
</div>
<?php include_once('views/layouts/footer.php') ?>
<script src="template/js/scroll.js"></script>
<script src="template/js/forma.js"></script>
<script src="template/js/cabinet.js"></script>
</body>
</html>