<div class="cart">
    <form action="#" method="post">
        <div class="cards">
            <?php if (isset($_SESSION['tires']) && isset($tires)):?>
                <?php foreach ($tires as $id => $value):?>
                    <div class="article">
                        <div class="order">
                            <div class="title">
                                <span class="name"><?php echo $value['catalog_tire_name'];?></span>
                                <span class="useOrnot">б/у</span>
                                <span class="width"><?php echo $value['tire_width'];?></span><span class="height">/S<?php echo $value['height'];?></span>
                                <span class="diametr"><?php echo $value['tire_diametr'];?></span>
                            </div>
                            <div class="amount">X<input type="number" value="<?php echo $_SESSION['tires'][$value['tire_id']] * 4?>" data-am="1" disabled>
                                <div class="minus"><span class="remove"></span></div>
                                <div class="plus"><span class="add"></span><span class="add"></span></div>
                            </div>
                        </div>
                        <div class="price"><div class="wrapper"><input type="number" name="howmuch" value="<?php echo $value['tire_price'] * $_SESSION['tires'][$value['tire_id']] * 4;?>" data-value="<?php echo $value['tire_price'] * 4;?>" disabled>&#8381;</div><div class="close"><span></span><span class="cl tire" data-id="<?php echo $value['tire_id'] ?>"></span></div></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['disks']) && isset($disks)):?>
                <?php  foreach ($disks as $id => $value):?>
                    <div class="article">
                        <div class="order">
                            <div class="title">
                                <span class="name"><?php echo $value['catalog_diskov_name'];?></span>
                                <span class="width"><?php echo $value['disk_width'];?>j</span>x<span class="diametr"><?php echo $value['disk_diametr'];?></span>
                                <span class="width"><?php echo $value['bolt_amount'];?></span>x<span class="diametr"><?php echo $value['pcd'];?></span>
                                <span class="diametr"><?php echo $value['takeoff'];?></span>
                                <span class="diametr"><?php echo $value['dia'];?></span>
                            </div>
                            <div class="amount">X<input type="number" value="<?php echo $_SESSION['disks'][$value['disk_id']] * 4?>" data-am="1" disabled>
                                <div class="minus"><span class="remove"></span></div>
                                <div class="plus"><span></span><span class="add"></span></div>
                            </div>
                        </div>
                        <div class="price">
                            <div>
                                <input type="number" name="howmuch" value="<?php echo $value['disk_price'] * $_SESSION['disks'][$value['disk_id']] * 4;?>" data-value="<?php echo $value['disk_price'] * 4;?>" disabled>
                                &#8381;
                            </div>
                            <div class="close"><span></span><span class="cl disk" data-id="<?php echo $value['disk_id'] ?>"></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="wrap-btn">
            <span class="total">Итого: <input type="number" value="<?php echo $commonTotal * 4?>" data-totall="<?php echo $commonTotal *4?>" disabled class="total-inp">&#8381;</span>
        </div>
        <?php if ((isset($_SESSION['tires']) && isset($tires)) || ((isset($_SESSION['disks']) && isset($disks)))): ?>

        <div class="form-fill">
            <div class="delivery-fill">
                <div class="radios">
                    <input type="radio" id="dispatch" name="delivery" value="dispatch">
                    <label for="dispatch">Доставка</label>
                    <label for="pickup">Самовывоз</label>
                    <input type="radio" id="pickup" name="delivery" value="pickup">
                </div>
                <p>Доставка осуществляется в течение 5 дней*</p>
            </div>
            <input type="text" placeholder="Введите адрес">
            <div class="payment-fill">
                <div class="radios">
                    <input type="radio" id="cash" name="pay" value="cash">
                    <label for="cash">Оплата наличными при получении</label>
                    <label for="card">Оплата картой</label>
                    <input type="radio" id="card" name="pay" value="card">
                </div>
            </div>
            <div class="data-fill">
                <input type="text" name="CustomerName" placeholder="Имя" value="<?php if(isset($userInfo['name'])):?><?php echo $userInfo['name']?><?php endif;?>">
                <input type="tel" name="CustomerTel" placeholder="Телефон" value="<?php if(isset($userInfo['tel'])):?><?php echo $userInfo['tel']?><?php endif;?>">
                <input type="email" name="CustomerEmail" placeholder="E-mail" value="<?php if(isset($userInfo['email'])):?><?php echo $userInfo['email']?><?php endif;?>">
                <input type="submit" value="Перейти к оплате">
            </div>
        </div>
        <?php endif; ?>
    </form>
</div>