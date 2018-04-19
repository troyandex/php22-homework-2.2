<?php
$file_list = glob('server/*.json');
// var_dump($file_list);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>2.2 «Обработка форм» - Список тестов</title>
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

        <h2>Список тестов:</h2>
        <?php
        foreach ($file_list as $key => $file) { // key - номер  файла
            $file_test = file_get_contents($file);
            $test = json_decode($file_test, true);
            $title = $test['title'];
            echo "<li><a href=\"test.php?test=$key\">$title</a></li>";
        }
        ?>

    </div>
</div>
</body>
</html>