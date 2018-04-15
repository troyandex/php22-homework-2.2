<?php
$file_list = glob('*.json');
$test = [];
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {
        $file_test = file_get_contents($file_list[$key]);
        $decode_file = json_decode($file_test, true);
        $test = $decode_file;
    }
}

$questions = $test['questions'];
//echo "<pre>";
//print_r($questions);

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>2.2 «Обработка форм» - Тест </title>
    <meta charset="UTF-8">
    <style>
        .container { max-width: 950px; margin: 0 auto; }
        h1 {margin-bottom: 0.2em;}
        li {margin: 3px 0;}
        .button {margin: 15px;}
        .answer:hover {text-decoration: underline;}
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

        <h2>Тест: <?=$test['title']?></h2>
        <form method="post">
            <fieldset>
                <?php
                foreach ($questions as $number) :
                    $question = $number['question'];
                    echo "<h4>Вопрос: $question</h4>";
                    $answers = $number['answers'];

                    foreach ($answers as $key => $item) :
                ?>

                <label class="answer">
                    <input type="checkbox" name="<?=$key;?>" value="<?=$item['answer'];?>">
                    <?=$item['answer'];?>
                </label>

                <?php
                    endforeach;
                endforeach;
                ?>

            </fieldset>
            <input class="button" type="submit" value="Отправить">
        </form>

    </div>
</div>
</body>
</html>