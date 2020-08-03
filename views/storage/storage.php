<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/storage.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Scada:400,700,700i&display=swap&subset=cyrillic" rel="stylesheet">
    <title>Хранение</title>
</head>
<body>
<?php include_once('views/layouts/header.php') ?>

<div class="grid table-tirefit">
    <div></div>
    <div class="table-wrap">
        <table>
            <caption>
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
                <td>Комплект (4 колеса)/за 1 месяц)</td>
                <td>250</td>
                <td>350</td>
                <td>400</td>
                <td>450</td>
                <td>500</td>
            </tr>
            <tr>
                <td>Комплект (4 колеса)/за 6 месяцев)</td>
                <td>1500</td>
                <td>2100</td>
                <td>2400</td>
                <td>2700</td>
                <td>3000</td>
            </tr>
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
                <td>Комплект (4 колеса)/за 1 месяц)</td>
                <td>500</td>
                <td>600</td>
                <td>700</td>
                <td>800</td>
            </tr>
            <tr>
                <td>Комплект (4 колеса)/за 6 месяцев)</td>
                <td>3000</td>
                <td>3600</td>
                <td>4200</td>
                <td>4700</td>
            </tr>
            </tbody>
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

