<div class="forma grid">
    <div></div>

    <div class="real_form">
        <div class="legends">
            <div id="tire">Шины</div>
            <div id="disk">Диски</div>
        </div>
        <div class="form_wrap">
            <div class="labels">
                <div>Подбор шин по автомобилю</div>
                <div>Подбор дисков по автомобилю</div>
                <div>Подбор шин по параметрам</div>
                <div>Подбор дисков по параметрам</div>
            </div>
            <div class="selects_wrap">
                <form action="#" class="form_for_car" id="search_tire_by_car" autocomplete="off">
                    <select name="carname_tire">
                        <option value="">Марка</option>
                    </select>
                    <select name="carmodel_tire">
                        <option value="">Модель</option>
                    </select>
                    <select name="caryear_tire">
                        <option value="">Год</option>
                    </select>
                    <select name="carseries_tire">
                        <option value="">Модификация</option>
                    </select>
                </form>
                <form action="#" class="form_for_car" id="search_disk_by_car" autocomplete="off">
                    <select name="carname_disk">
                        <option value="">Марка</option>
                    </select>
                    <select name="carmodel_disk">
                        <option value="">Модель</option>
                    </select>
                    <select name="caryear_disk">
                        <option value="">Год</option>
                    </select>
                    <select name="carseries_disk">
                        <option value="">Модификация</option>
                    </select>
                </form>
                <form action="#" class="form_for_characteristics" id="search_tires" autocomplete="off">
                    <select name="width_tire">
                        <option value="">Ширина</option>
                        <?php foreach ($widthTire as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['width'];?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="height">
                        <option value="">Высота</option>
                        <?php foreach ($heightTire as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['height'];?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="diametr_tire">
                        <option value="">Диаметр</option>
                        <?php foreach ($diametrTire as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['diametr'];?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="season">
                        <option value="">Сезон</option>
                        <?php foreach ($season as $value): ?>
                            <option value="<?php echo $value['id'];?>"><?php echo $value['season'];?></option>
                        <?php endforeach;?>
                    </select>
                </form>
                <form action="#" class="form_for_characteristics" id="search_disks" autocomplete="off">
                    <div class="wrap">
                        <select name="width_disks">
                            <option value="">Ширина</option>
                            <?php foreach ($widthDisk as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['width'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="diametr_disks">
                            <option value="">Диаметр</option>
                            <?php foreach ($diametrDisk as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['diametr'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="takeoff">
                            <option value="">Вылет</option>
                            <?php foreach ($takeoff as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['takeoff'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="dia">
                            <option value="">DIA</option>
                            <?php foreach ($DIA as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['dia'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="wrap">
                        <select name="bolt">
                            <option value="">Болты</option>
                            <?php foreach ($bolts as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['bolt_amount'];?></option>
                            <?php endforeach;?>
                        </select>
                        <select name="pcd">
                            <option value="">PCD</option>
                            <?php foreach ($PCD as $value): ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['pcd'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrap_submit">
            <input type="submit" value="Подобрать" id="btn" form="search_tires">
        </div>
    </div>

    <div></div>
</div>
