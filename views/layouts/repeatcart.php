<div class="cart">
    <form action="#">
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
                            <div class="amount">X<input type="number" value="<?php echo $_SESSION['tires'][$value['tire_id']]*4?>" data-am="1" disabled>
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
                            <div class="amount">X<input type="number" value="<?php echo $_SESSION['disks'][$value['disk_id']]*4?>" data-am="1" disabled>
                                <div class="minus"><span class="remove"></span></div>
                                <div class="plus"><span></span><span class="add"></span></div>
                            </div>
                        </div>
                        <div class="price"><div><input type="number" name="howmuch" value="<?php echo $value['disk_price'] * $_SESSION['disks'][$value['disk_id']];?>" data-value="<?php echo $value['disk_price'];?>" disabled>&#8381;</div><div class="close"><span></span><span class="cl disk" data-id="<?php echo $value['disk_id'] ?>"></span></div></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="wrap-btn"><span class="total">Итого: <input type="number" value="<?php echo $commonTotal *4?>" data-totall="<?php echo $commonTotal *4?>" disabled class="total-inp">&#8381;</span><input type="submit" value="Оформить заказ"></div>
    </form>
</div>