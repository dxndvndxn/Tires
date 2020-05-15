<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(User::isGest()): ?>
    <link rel="stylesheet" href="template/css/cart.css">
    <?php else: ?>
    <link rel="stylesheet" href="template/css/cabinet.css">
    <?php endif; ?>
    <title>Корзина</title>
</head>
<body>
<?php include_once('views/layouts/header.php') ?>
<div class="desk grid">
    <div></div>
    <div class="desk-content">
        <div class="tabs">
            <?php if(User::isGest()): ?>
            <span>Корзина</span>
            <?php else: ?>
            <span>Корзина</span>
            <span>Прошлые покупки</span>
            <span>Профиль</span>
            <?php endif; ?>
        </div>
        <div class="desk-content-in">
            <?php if(User::isGest()): ?>
            <?php include_once('views/layouts/repeatcart.php')?>
            <?php else: ?>
            <?php include_once('views/layouts/repeatcart.php')?>
            <div class="latest"></div>
            <div class="profile">
                <form action="#" method="post" id="update">
                    <div><label>Имя</label><input type="text" name="newname" value="<?php if(isset($userInfo['name'])):?><?php echo $userInfo['name']?><?php endif;?>"></div>
                    <div><label>Фамилия</label><input type="text" name="newfam" value="<?php if(isset($userInfo['lastname'])):?><?php echo $userInfo['lastname']?><?php endif;?>"></div>
                    <div><label>E-mail</label><input type="email" name="newem" value="<?php if(isset($userInfo['email'])):?><?php echo $userInfo['email']?><?php endif;?>"></div>
                    <div><label>Телефон</label><input type="text" name="tel" value="<?php if(isset($userInfo['tel'])):?><?php echo $userInfo['tel']?><?php endif;?>"></div>
                    <div><label>Новый пароль</label><input type="password" name="newpass" value="<?php if(isset($userInfo['pass'])):?><?php echo $userInfo['pass']?><?php endif;?>"></div>
                    <div class="errors">
                        <?php if(!empty($userUpdate)): ?>
                            <?php foreach ($userUpdate as $value): ?>
                                <?php echo $value ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div><input type="submit" name="update" value="Сохранить"></div>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div></div>
</div>

<?php include_once('views/layouts/footer.php') ?>
<script src="template/js/scroll.js"></script>
<script src="template/js/forma.js"></script>
<?php if(User::isGest()): ?>
<script src="template/js/cart.js"></script>
<?php else: ?>
<script src="template/js/cabinet.js"></script>
<?php endif; ?>
</body>
</html>
