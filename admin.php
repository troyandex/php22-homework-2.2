<?php

$file = "list.php";
//если файла нет... тогда создаем
if (!file_exists($file)) {
    $fp = fopen($file, "w");
}
$file = "test.php";
if (!file_exists($file)) {
    $fp = fopen($file, "w");
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>2.2 «Обработка форм» - Форма загрузки</title>
    <meta charset="UTF-8">
    <style>
        .container { max-width: 950px; margin: 0 auto; }
        h1 {margin-bottom: 0.2em;}
        li {margin: 3px 0;}
    </style>
</head>

<body>
<div>
    <div class="container">
        <h2>Меню:</h2>
        <ul>
            <li><a href="admin.php">Форма загрузки тестов</a></li>
            <li><a href="list.php">Список тестов</a></li>
        </ul>

        <h2>Форма:</h2>
        <form method="post" enctype=multipart/form-data>
            <input type=file name=testfile>
            <input type=submit value=Загрузить>
        </form>


    </div>
</div>
</body>
</html>