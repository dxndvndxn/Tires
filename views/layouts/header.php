
<header class="grid">
    <div></div>
    <nav>
        <a href="/" class="logo-link"><div class="logo">Tire Life</div></a>
        <ul>
            <a href="/"><li>Магазин</li></a>
            <a href="/tirefit"><li>Шиномонтаж</li></a>
            <a href="/storage"><li>Хранение</li></a>
            <a href="/contacts"><li>Контакты</li></a>
            <a href="/cart"><li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAADz0lEQVR4nO2bz6sVZRjHv89FE/NHoIKVJXGjuOFGcKGSbvVuskUKLesfaOEiuZtwlQaJKxeKBoFuChdtKlBBCgKvhYJBKHZDC6VUoh+o1x/30+K86eM4c86ZmXfOnBnvFy7nnfe883yf5znf953nnZkrzWIWs5jFEwzzB8Crkt6UNJIYNyPpCzO7MCjHagHwM9m4WLd/VSD5S3fDy5V5USOSU+AVSW9LWuC6dzwYbPbI+DagZ0AADwa3MAFz8gwGdvQeNVS4JukrM7uaNSCXAhqKu5J2SdppZo/F8iQk4H/sNrOJZGfeBHwU1aVqYZLWS9oYju9JWpW7lvGFQGQHKwcwAnztQng/OSZPHdA4mNmMpC9d14rkmFYnIGC1a2deDTLR8CkwF7jhQlhXxEiTEzDu3L8MPLbot30KbHPtz9LqgJ5oqgJS5L+2qKGmJqCn/KV2TwEv/88LyV9qpgKC/K+XWv2dsSYmYHM/8pfaOwXiyF9qngKAOcC1KPIPBpuWAC//X7vJX2rnFIgnf6lZCgjy/8O5vD6G0SYlYFMe+UvtmwJx5S81RwGVyD8YbkoCcstf6m8K3El8Diu2uvbRKPKXJGA38C+wK4rBCpBS/Lxet08DRUL+vwFtW9y7AzjuErC3bn8GCuBdF/wM8FrdPg0EwHxgArjvEnAor52+H3eHy8pGSWskPZWXKCIWSBoLvjzr+s9J2mBmf0dnBEaBSYYX3wHLowcegl8GXKo5wCxcBt4Dcr3n4NHPiROSVob2tKTDkq4XJYyAW5J+l3RG0vdmdr9SNuAXl/G3KiUbRgDTLgEL6/YnNvqpmK649nhVjtSFft4Q2SNpeziclnREUtVvjN6UdFrSZHjGXx+o9ypwDthQawJCEkaBUzUlYRrYUlVsRSvBaoqOh3hR0huSFoXjfySNmdmV7FNaBuAlYMop4eO6fRo4gC0uAT9VwVF0CkjSD5K+jXbrKZ3zGUl/quPnLTN7uiquXo5kbYYmgdFIHCuB7XT+acP3nwhcx2LwFHGs12XwErCsJMcSHpbcU4nv5gFrgHq24MAeF+xt4GD4ux1rgQI+dLbyv8tXJcjYDAFbXf9UNxt9cPzobL2T+O4DOnel95XhKONc6mYIWOSVUZLDv87ynOsfAf4K/TPA3DI8aSizGRrPGFME/vzNrr1J0uLQvmFmd0vy5EfKGnAI+CTyGrDT2boDfAocAG66/v2xYsrrXD9XgaUlORYD57twXAWejxVTEQezNkOniFcHvAB8k8JxFhiLwZGGoasE6TzWXqvO+nRW0skq7wn8Bxce/oWs++7QAAAAAElFTkSuQmCC"><span id="count">
                    <?php if(!empty($_SESSION['tires']) || !empty($_SESSION['disks'])):?>
                    <?php echo $_SESSION['count'];?>
                    <?php else:?>
                    <?php echo $_SESSION['count'] = 0;?>
                    <?php endif;?></span></li></a>
        </ul>
    </nav>
    <div></div>
</header>
<div class="get-in grid">
    <div></div>
    <div class="wrap">
        <div class="error">
            <?php if(!empty($userUp)):;?>
            <?php foreach ($userUp as $value): ?>
            <?php echo $value ."<br>"; ?>
            <?php endforeach; ?>
            <?php elseif(!empty($userIn)): ;?>
            <?php foreach ($userIn as $value): ?>
            <?php echo $value .'<br>' ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="wrap-btns">
            <?php if(User::isGest()): ?>
            <button id="in">Вход</button>
            <button id="up">Регистрация</button>
            <?php else: ?>
            <div class="auth">
                <a href="/cabinet" class="name"><?php echo $userInfo['email'];?></a>
                <form action="" method="get" name="logout">
                    <button type="submit" id="logout" name="exit">Выход</button>
                </form>
            </div>
            <?php endif; ?>
            <div class="close">
                <div></div>
                <div></div>
            </div>
        </div>
        <form action="#" method="post" id="up_in">
            <input type="email" name="email" placeholder="Введите e-mail" class="signUp" id="email">
            <input type="password" name="passreg" placeholder="Пароль" class="signUp">
            <input type="text" name="login" placeholder="Логин" id="email2" class="signIn">
            <input type="password" name="passin" placeholder="Пароль" class="signIn">
            <input type="submit" name="submit" value="Вход" class="signIn signUp" disabled>
        </form>
    </div>
    <div></div>
</div>