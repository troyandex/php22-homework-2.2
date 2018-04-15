<?php
echo "<pre>";
print_r($_FILES);
echo "<hr>";
print_r($_POST);
echo "<hr>";

if (isset($_FILES)) { // могу ошибаться с условием (пример по которому работал - больше условий)
    $file_name = $_FILES['test_file']['name'];
    echo $file_name . " - имя файла <hr>";

    $tmp_dir = $_FILES['test_file']['tmp_name'];
    echo $tmp_dir . " - временный адрес файла <hr>";

    $server = 'server/';
    $new_dir = $server . $file_name;
    echo $new_dir . " - будет новый адрес файла <hr>";

    $path_info = pathinfo($server . $file_name);
    print_r($path_info);
    echo " - масив с информацие по файлу <hr>";
};
echo "</pre>";
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
    <div class="container">
        <h2>Меню:</h2>
        <ul>
            <li><a href="admin.php">Форма загрузки тестов</a></li>
            <li><a href="list.php">Список тестов</a></li>
        </ul>

        <h2>Форма:</h2>
        <form method="post" enctype=multipart/form-data>
            <input type=file name=test_file>
            <input type=submit value=Загрузить>
            <p>
                <?php
                if ($path_info['extension'] === 'json') {
                    move_uploaded_file($_FILES['test_file']['tmp_name'], $new_dir); // пока ошибка
                    echo "<strong>Тест загружен на сервер</strong>";
                }else{
                    echo "<strong>Неверный формат (нужен .json)</strong>";
                }
                ?>
            </p>
        </form>
    </div>
</body>
</html>