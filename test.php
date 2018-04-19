<?php
$file_list = glob('server/*.json');
$test = [];
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {  // в параметре гет номер теста который декодим
        $file_test = file_get_contents($file_list[$key]);
        $decode_file = json_decode($file_test, true);
        $test = $decode_file;
    }
}
$questions = $test['questions']; // масив из вопросов с ответами выбраного (по гет) теста
$result_true_array = array(); // обьявляем масив с верными ответами в исходном тесте

echo "<pre>"; // смотрю что в массивах пост и верные
    echo "Выбрал пользователь: <br>";
    print_r($_POST);
    echo "<br>Верные ответы: <br>";
    $correct_arr[0] = "test";
    print_r($correct_arr);
echo "</pre>";


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

                foreach ($questions as $key1 => $number) :  // для каждого вопроса по порядку
                    $question = $number['question'];// массив с вопросами
                    $answers = $number['answers']; // массив с ответами

                    echo "<h4>Вопрос: $question</h4>"; // выводим вопрос
                    foreach ($answers as $key2 => $option) : // выводим каждый ответ и собираем правильные

                        if ($option['result'] ===  true) {
                            $index = "$key1-$key2";
                            global $correct_arr;
                            $correct_arr[$index] = $option['answer'] ; // если верен - добавляем к массиву
                        }
                        ?>
                        <label class="answer">
                            <!-- $key1 - вопрос, $key2 - ответ, -->
                            <input type="checkbox" name="<?php echo $key1 . "-" . $key2;?>" value="<?=$option['answer'];?>">
                            <?=$option['answer'];?>
                        </label>

                    <?php
                    endforeach; // заканчиваем цикл с выводом всех и подсчетом верных ответов
                endforeach;
                ?>
                <br>
                <input class="button" type="submit" value="Отправить">
            </fieldset>
        </form>

    </div>
</div>
</body>
</html>