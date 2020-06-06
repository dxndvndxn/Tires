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
<?php include_once('views/layouts/footer.php') ?>
<script src="template/js/_vars.js"></script>
<?php if(User::isGest()): ?>
    <script src="template/js/forma.js"></script>
<?php endif; ?>
</body>
</html>


