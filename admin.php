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
            if (isset($_FILES) && isset($_POST) && isset($_FILES['test_file'])) {
                $file_name = $_FILES['test_file']['name'];
                $tmp_file = $_FILES['test_file']['tmp_name'];
                if (is_dir("server"))
                {
                    $server = 'server/';
                    $path_info = pathinfo($server . $file_name);

                    if ($path_info['extension'] === 'json') {
                        move_uploaded_file($tmp_file, $server .$file_name);
                        echo "<strong>Тест загружен на сервер</strong>";
                        exit;
                    }else {
                        echo "<strong>Неверный формат (нужен .json)</strong>";
                    };
                } else {
                    echo "Нет папки для загрузки тестов";
                }
            };

            ?>
            </p>
        </form>
    </div>
</body>
</html>