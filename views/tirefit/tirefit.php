<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/tirefit.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Scada:400,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Шиномонтаж</title>
</head>
<body>
<?php include_once('views/layouts/header.php') ?>
<div class="grid table-tirefit">
    <div></div>
    <div class="table-wrap">
        <table>
            <caption>
                Стоимость шиномонтажных работ
                <br>
                Легковые автомобили
            </caption>
            <thead>
            <tr>
                <th rowspan="2">Наименование услуг</th>
                <th colspan="5">Размер колёс</th>
            </tr>
            <tr>
                <td>R12,13,14</td>
                <td>R15,16</td>
                <td>R17,18</td>
                <td>R19,20</td>
                <td>R21 и более</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Снятие, установка</td>
                <td>100</td>
                <td>150</td>
                <td>200</td>
                <td>250</td>
                <td>300</td>
            </tr>
            <tr>
                <td>Балансировачные грузики</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Демонтаж</td>
                <td>50</td>
                <td>75</td>
                <td>100</td>
                <td>125</td>
                <td>150</td>
            </tr>
            <tr>
                <td>Монтаж</td>
                <td>50</td>
                <td>75</td>
                <td>100</td>
                <td>125</td>
                <td>150</td>
            </tr>
            <tr>
                <td>Балансировка</td>
                <td>100</td>
                <td>100</td>
                <td>150</td>
                <td>150</td>
                <td>200</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td>Итого за 4 колеса</td>
                <td>1400</td>
                <td>1800</td>
                <td>2400</td>
                <td>2800</td>
                <td>3400</td>
            </tr>
            </tfoot>
        </table>
        <table>
            <caption>
                Джипы и минивены
            </caption>
            <thead>
            <tr>
                <th rowspan="2">Наименование услуг</th>
                <th colspan="4">Размер колёс</th>
            </tr>
            <tr>
                <td>R15,16</td>
                <td>R17,18</td>
                <td>R19,20</td>
                <td>R21 и более</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Снятие, установка</td>
                <td>200</td>
                <td>250</td>
                <td>300</td>
                <td>350</td>
            </tr>
            <tr>
                <td>Балансировачные грузики</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Демонтаж</td>
                <td>100</td>
                <td>150</td>
                <td>150</td>
                <td>200</td>
            </tr>
            <tr>
                <td>Монтаж</td>
                <td>100</td>
                <td>150</td>
                <td>150</td>
                <td>200</td>
            </tr>
            <tr>
                <td>Балансировка</td>
                <td>150</td>
                <td>150</td>
                <td>200</td>
                <td>250</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td>Итого за 4 колеса</td>
                <td>2400</td>
                <td>3000</td>
                <td>3600</td>
                <td>4200</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div></div>
</div>
<?php include_once('views/layouts/footer.php') ?>
<script src="template/js/_vars.js"></script>
<?php if(User::isGest()): ?>
    <script src="template/js/forma.js"></script>
<?php endif; ?>
<script src="template/js/scroll.js"></script>
</body>
</html>


