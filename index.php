<html>
<head>
    <title>Практические работы</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<body style="text-align: center;">

<?php
$pdo = new \PDO("sqlite:db.db");
if ($pdo == false) {
    echo 'Whoops, could not connect to the SQLite database!';
    return;
}
//$pdo->query("DROP TABLE `T3`");
//$pdo->query("TRUNCATE TABLE `T3`");
//$pdo->query("DELETE FROM `T3`");
$pdo->query("CREATE TABLE IF NOT EXISTS T3 (id int NOT NULL, name varchar(255), type varchar(255), firm varchar(255), PRIMARY KEY (id));");

$pdo->beginTransaction();
$data = [
    [1, 'Pascal', 'Процедурный', 'Borland'],
    [2, 'Java', 'Объектно-ориентированный', 'Oracle'],
    [3, 'Visual C', 'Объектно-ориентированный', 'Microsoft'],
    [4, 'Visual Basic', 'Объектно-ориентированный', 'Microsoft'],
    [5, 'C', 'Процедурный', 'ISO/IEC'],
    [6, 'C#', 'Объектно-ориентированный', 'IEC'],
    [7, 'Delphi', 'Объектно-ориентированный', 'Borland'],
    [8, 'Lisp', 'Сценарный', 'IBM'],
    [9, 'Prolog', 'Сценарный', 'IBM'],
    [10, 'XML', 'Сценарный', 'Borland']
];
$sql = "INSERT INTO `T3` (`id`, `name`, `type`, `firm`) values (?, ?, ?, ?) ON CONFLICT DO NOTHING;";
$stmt = $pdo->prepare($sql);
foreach ($data as $row) {
    $stmt->execute($row);
}
$stmt = $pdo->query("SELECT * FROM `T3`");
$data = $stmt->fetchAll();
$pdo->commit();
?>

<!--4-->
<?php
// Практическая работа №4

function printPrac4()
{
    echo "<h4 class='d-block'> Практическая работа №4 </h4>";
    prac4_task_1("blue", 15);
    prac4_task_2();
    prac4_task_3();
    prac4_task_4();
    prac4_task_5("fr");
    prac4_task_6("en");
    prac4_task_7("ru");
}

/**
 * @param String $color
 * @param int $size
 */
function prac4_task_1($color, $size)
{
    echo "<h4 class='d-block'> Задача №1 </h4>";
    echo "<p style='font-size: $size px; color: $color'>Text</p>";
}

function prac4_task_2()
{
    echo "<h4 class='d-block'> Задача №2 </h4>";
    echo "(a) - gamburger and tea, потому что $\$breakfast = \$gamburger, которой мы присвоили 'and tea' <br>";
    echo "(б) gamburger \$gamburger, потому что $$ читается как текстовая $ и $ указывающая на переменную <br>";
    echo "(в) gamburger and tea, потому что теперь все читается нормально и $$ указывают на переменную <br>";
}

function prac4_task_3()
{
    echo "<h4 class='d-block'> Задача №3 </h4>";
    $breakfast = "gamburger";
    $breakfast2 = $breakfast;
    echo $breakfast2 . '</br>';
    $breakfast = "tea";
    echo $breakfast2 . '</br>';
    echo "Выводится одно и тоже значение, потому что мы присваиваем по значению, <br> а не по ссылке, что бы присвоить по ссылке нужно сделать \$breakfast2 = &\$breakfast";
}

function prac4_task_4()
{
    echo "<h4 class='d-block'> Задача №4 </h4>";
    define("NUM_E", 2.71828);
    echo "Число е равно " . NUM_E;
    $num_e1 = NUM_E;
    echo "Тип \$num_e1 = " . gettype($num_e1) . ", значение $num_e1 <br>";
    $num_e1 = (string)$num_e1;
    echo "Тип \$num_e1 = " . gettype($num_e1) . ", значение $num_e1 <br>";
    $num_e1 = (int)$num_e1;
    echo "Тип \$num_e1 = " . gettype($num_e1) . ", значение $num_e1 <br>";
    $num_e1 = (boolean)$num_e1;
    echo "Тип \$num_e1 = " . gettype($num_e1) . ", значение $num_e1 <br>";

}

/**
 * @param String $lang
 */
function prac4_task_5($lang)
{
    echo "<h4 class='d-block'> Задача №5 </h4>";
    if ($lang == "ru") {
        echo "Русский";
    } elseif ($lang == "en") {
        echo "Английский";
    } elseif ($lang == "fr") {
        echo "Французский";
    } elseif ($lang == "de") {
        echo "Немецкий";
    } else {
        echo "язык неизвестен";
    }
    echo "<br>";
}

/**
 * @param String $lang
 */
function prac4_task_6($lang)
{
    echo "<h4 class='d-block'> Задача №6 </h4>";
    switch ($lang) {
        case "ru":
        {
            echo "Русский";
            break;
        }
        case "en":
        {
            echo "Английский";
            break;
        }
        case "de":
        {
            echo "Немецкий";
            break;
        }
        case "fr":
        {
            echo "Французский";
            break;
        }
        default:
        {
            echo "язык неизвестен";
            break;
        }
    }
}

/**
 * @param String $lang
 */
function prac4_task_7($lang)
{
    echo "<h4 class='d-block'> Задача №7 </h4>";
    echo $lang == "ru" ? "Привет" : "Hello";
}

//printPrac4();

?>
<!--5-->
<?php
// Практическая работа №5
function printPrac5()
{
    echo "<h4 class='d-block'> Практическая работа №5 </h4>";
    prac5_task1("cadetblue");
    prac5_task2("blue");
    prac5_task3();
    prac5_task4();
    prac5_task5();
}

/**
 * @param String $color
 */
echo "
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 5px;
        }
    </style>";
function prac5_task1($color)
{

//        tr:nth-child(1) td:nth-child(1),
//        tr:nth-child(2) td:nth-child(2),
//        tr:nth-child(3) td:nth-child(3),
//        tr:nth-child(4) td:nth-child(4),
//        tr:nth-child(5) td:nth-child(5),
//        tr:nth-child(6) td:nth-child(6),
//        tr:nth-child(7) td:nth-child(7),
//        tr:nth-child(8) td:nth-child(8),
//        tr:nth-child(9) td:nth-child(9),
//        tr:nth-child(10) td:nth-child(10) {
//            background-color: cadetblue;
//        }


    echo "<h4 class='d-block'> Задача №1 </h4>";
    echo '<table style="margin: 0 auto;" border="1">';
    $arr = [10][10];
    $i = 1;
    $y = 1;
    while ($i <= 10) {
        echo "<tr>";
        while ($y <= 10) {
            $arr[$i][$y] = $i * $y;
            if ($i == $y) {
                echo "<td style='background-color: $color'>" . $arr[$i][$y] . "</td>";
            } else {
                echo "<td>" . $arr[$i][$y] . "</td>";
            }
            $y++;
        }
        echo "</tr>";
        $y = 1;
        $i++;
    }
    echo "</table>";
}

/**
 * @param String $color
 */
function prac5_task2($color)
{
    echo "<h4 class='d-block'> Задача №2 </h4>";
    echo '<table style="margin: 0 auto;" border="1">';
    $arr = [10][10];
    $i = 0;
    $y = 0;
    $counter = 0;
    while ($i <= 10) {
        echo "<tr>";
        while ($y <= 10) {
            $arr[$i][$y] = $i + $y;
            if ($counter == 0) {
                echo "<td style='color: red'>+</td>";
            } elseif ($i == 0 || $y == 0) {
                echo "<td style='color: $color'>" . $arr[$i][$y] . "</td>";
            } else {
                echo "<td>" . $arr[$i][$y] . "</td>";
            }
            $y++;
            $counter++;
        }
        echo "</tr>";
        $y = 0;
        $i++;
    }
    echo "</table>";
}

function prac5_task3()
{
    echo "<h4 class='d-block'> Задача №3 </h4>";
    if (isset($_GET['color'], $_GET['lang'])) {
        $lang = $_GET['lang'];
        $lang($_GET['color']);
    }
    // http://practis/?color=blue&lang=Ru
}

function Ru($color)
{
    echo "<span style='color: $color'>Здравствуйте!</span>";
}

function En($color)
{
    echo "<span style='color: $color'>Hello!</span>";
}

function Fr($color)
{
    echo "<span style='color: $color'>Bonjour!</span>";
}

function De($color)
{
    echo "<span style='color: $color'>Guten Tag!</span>";
}

$GLOBALS['size'] = 40;
function prac5_task4()
{
    echo "<h4 class='d-block'> Задача №4 </h4>";
    global $size;
    echo WeekDay(7, "blue", $size);
    $size -= 4;
    echo WeekDay(6, "green", $size);
    $size -= 4;
    echo WeekDay(5, "yellow", $size);
    $size -= 4;
    echo WeekDay(4, "red", $size);
    $size -= 4;
    echo WeekDay(3, "orange", $size);
    $size -= 4;
    echo WeekDay(2, "black", $size);
    $size -= 4;
    echo WeekDay(1, "darkblue", $size);

}

function WeekDay($val, $color, $size)
{
    $str = "<span class='d-block' style='font-size:" . $size . "px; color: $color'>";
    switch ($val) {
        case 7:
            $str .= "понедельник";
            break;
        case 6:
            $str .= "вторник";
            break;
        case 5:
            $str .= "среда";
            break;
        case 4:
            $str .= "четверг";
            break;
        case 3:
            $str .= "пятница";
            break;
        case 2:
            $str .= "суббота";
            break;
        case 1:
            $str .= "воскресенье";
            break;
        default:
            $str .= "день неопределен";
            break;
    }
    $str .= "</span>";
    return $str;
}

function prac5_task5()
{
    echo "<h4 class='d-block'> Задача №5 </h4>";
    echo "<span class='d-block'>Листинг 8-5</span>";
    function ListItem($txt)
    {
        global $num_of_calls;
        $num_of_calls++;
        print "<b>$num_of_calls: $txt</b>";
    }

    ListItem("Видеокамеры");
    echo("<p>Sony, Panasonic</p>");
    ListItem("Фотоаппараты");
    echo("<p>Canon, Casio</p>");
    echo "<span class='d-block'>Листинг 8-6</span>";
    function ListItem2($txt)
    {
        static $num_of_calls = 0;
        $num_of_calls++;
        print "<b>$num_of_calls. $txt</b>";
    }

    ListItem2("Видеокамеры ");
    print("<p>Sony, Panasonic</p>");
    ListItem2("Фотоаппараты");
    print("<p>Canon, Casio</p>");

    echo "<span class='d-block'>Листинг 8-7</span>";
    function FontSize($txt, $size = 4)
    {
        print "<font size=\"$size\">$txt</font>";
    }

    FontSize("<p>Крупный шрифт", 5);
    FontSize("<p>Нормальный шрифт, первая строка");
    FontSize("<p>Нормальный шрифт, вторая строка");

    echo "<span class='d-block'>Листинг 8-8</span>";

    function AddFive2($num)
    {
        $num += 5;
    }

    $var = 10;
    AddFive2($var);
    print $var; // выводится 15, без & выведется 10

    echo "<span class='d-block'>Листинг 8-9</span>";
    function AddFive(&$num)
    {
        $num += 5;
    }

    $var = 10;
    AddFive($var);
    print $var;

}

//printPrac5();
?>
<!--6-->
<?php
// Практическая работа №6
function printPrac6()
{
    echo "<h4 class='d-block'> Практическая работа №6 </h4>";
    prac6_task1();
    prac6_task2();
    prac6_task3();
    prac6_task4();
    prac6_task5();
}

function prac6_task1()
{
    echo "<h4 class='d-block'> Задача №1 </h4>";
    echo "<span class='d-block'>Подзадача 1</span>";
    $treug = [];
    for ($i = 1; $i <= 10; $i++) {
//        $treug[$i - 1]
        $treug[$i] = $i * ($i + 1) / 2;
    }
    echo implode("  ", $treug);
    echo "<span class='d-block'>Подзадача 2</span>";
    $kvd = [];
    for ($i = 1; $i <= 10; $i++) {
        $kvd[$i] = $i * $i;
    }
    echo implode("  ", $kvd);
    echo "<span class='d-block'>Подзадача 3</span>";
    $rez = array_merge($treug, $kvd);
    echo implode("  ", $rez);
    echo "<span class='d-block'>Подзадача 4</span>";
    sort($rez);
    echo implode("  ", $rez);
    echo "<span class='d-block'>Подзадача 5</span>";
    echo array_shift($rez);
    echo "<span class='d-block'>Подзадача 6</span>";
    $rez1 = array_unique($rez);
    echo implode("  ", $rez1);
}

function prac6_task2()
{
    echo "<h4 class='d-block'> Задача №2 </h4>";
    $treug = [];
    for ($i = 1; $i <= 30; $i++) {
        $treug[$i] = $i * ($i + 1) / 2;
    }
    $kvd = [];
    for ($i = 1; $i <= 30; $i++) {
        $kvd[$i] = $i * $i;
    }
    echo '<table style="margin: 0 auto;" border="1">';
    $arr = [30][30];

    for ($y = 1; $y <= 30; $y++) {
        echo "<tr>";
        for ($x = 1; $x <= 30; $x++) {
            $arr[$x][$y] = $x * $y;
            // для квадратов и треугольников красный
            // для треугольников зеленый
            $row = "<td>" . $arr[$x][$y] . "</td>";
            $temp = $arr[$x][$y];
            if (in_array($temp, $kvd)) {
                $row = "<td style='background-color: blue'>" . $arr[$x][$y] . "</td>";
            }
            if (in_array($temp, $treug)) {
                $row = "<td style='background-color: green'>" . $arr[$x][$y] . "</td>";
            }

            if (in_array($temp, $treug) && in_array($temp, $kvd)) {
                $row = "<td style='background-color: red'>" . $arr[$x][$y] . "</td>";
            }
            echo $row;
        }
        echo "</tr>";
//        $y = 1;
    }
    echo "</table>";
    echo implode("  ", $treug);
}

function prac6_task3()
{
    echo "<h4 class='d-block'> Задача №3 </h4>";
    echo '<table style="margin: 0 auto; height: 50%; width: 50%" border="1">';

    for ($y = 1; $y <= 30; $y++) {
        echo "<tr style='padding: 0;'>";
        for ($x = 1; $x <= 30; $x++) {
            $el = ($x * $y) % 7;
            $str = "<td style=\"padding: 0; height: 15px; width: 14px; background-color:";
            switch ($el) {
                case 0:
                    $str .= "white";
                    break;
                case 1:
                    $str .= "aqua";
                    break;
                case 2:
                    $str .= "blue";
                    break;
                case 3:
                    $str .= "yellow";
                    break;
                case 4:
                    $str .= "purple";
                    break;
                case 5:
                    $str .= "red";
                    break;
                case 6:
                    $str .= "lime";
                    break;
            }
            echo $str . ";\">" . "&nbsp</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function prac6_task4()
{
    echo "<h4 class='d-block'> Задача №4 </h4>";

    $colors = ['white', 'aqua', 'blue', 'yellow', 'purple', 'red', 'lime'];
//    function
    for ($k = 4; $k <= 7; $k++) {
        echo "<span class='d-block'>k = $k</span>";
        echo '<table style="margin: 0 auto; height: 50%; width: 50%" border="1">';
        for ($y = 1; $y <= 30; $y++) {
            echo "<tr style='padding: 0;'>";
            for ($x = 1; $x <= 30; $x++) {
                $el = ($x * $y) % $k;
                $str = "<td style=\"padding: 0; height: 15px; width: 14px; background-color:";
                $str .= $colors[$el];
                echo $str . ";\">" . "&nbsp</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

function prac6_task5()
{
    echo "<h4 class='d-block'> Задача №5 </h4>";
    $cust = [
        'cnum' => 2001,
        'cname' => 'Hoffman',
        'city' => 'London',
        'snum' => 1000,
        'rating' => 100
    ];
    echo "<span class='d-block'>Сортировка по значению, сначало строки в порядке сортировки, потом числа</span>";
    asort($cust);
    echo json_encode($cust);
    echo "<span class='d-block'>Сортировка по ключам, сортировка строк, ничего необычного</span>";
    ksort($cust);
    echo json_encode($cust);
    echo "<span class='d-block'>Сортировка по значению, но суть в том, что при sort() не сохраняются ассоциации ключ значение</span>";
    sort($cust);
    echo json_encode($cust);
    echo "<span class='d-block'>Для сортировки по убыванию у функции добавляется r, rsort(), arsort(), krsort()</span>";
}

//printPrac6();
?>
<!--7-->
<?php
// Практическая работа №7
function prac7_task1()
{
    echo "<h4 class='d-block'> Задача №1 </h4>";
    echo "
        <form method='GET'>
            <b class='d-block'>Выберите горизонтальное расположение:</b>
            <input type='radio' name='horizontal' value='left'> слева
            <input type='radio' name='horizontal' value='center'> по центру
            <input type='radio' name='horizontal' value='right'> справа
            <b class='d-block'>Выберите вертикальное расположение:</b>
            <input type='checkbox' name='vertical' value='top'> сверху
            <input type='checkbox' name='vertical' value='center'> посередине
            <input type='checkbox' name='vertical' value='bottom'> снизу
            <br>
            <input type='submit'>   
        </form>
    ";
    if (isset($_GET['horizontal'], $_GET['vertical'])) {
        echo "
        <span class='d-block'><---------------------------------------------------------></span>
        <table style='margin: 0 auto; width: unset;'>
            <td style='vertical-align:" . $_GET['vertical'] . "; text-align: " . $_GET['horizontal'] . ";' width='100px' height='100px'>Текст</td>
        </table>
        <a class='d-block' href='/'>Назад</a>
        ";
    }
}

function prac7_task2()
{
    echo "<h4 class='d-block'> Задача №2 </h4>";
    echo "
        <form method='GET'>
            <b class='d-block'>Выберите горизонтальное расположение:</b>
            <input type='radio' name='horizontal' value='left' checked> слева
            <input type='radio' name='horizontal' value='center'> по центру
            <input type='radio' name='horizontal' value='right'> справа
            <b class='d-block'>Выберите вертикальное расположение:</b>
            <input type='checkbox' name='vertical' value='top' checked> сверху
            <input type='checkbox' name='vertical' value='center'> посередине
            <input type='checkbox' name='vertical' value='bottom'> снизу
            <br>
            <input type='submit'>   
        </form>
    ";

    $horizontal = isset($_GET['horizontal']) ? $_GET['horizontal'] : "left";
    $vertical = isset($_GET['vertical']) ? $_GET['vertical'] : "top";

    echo "
    <span class='d-block'><---------------------------------------------------------></span>
    <table style='margin: 0 auto; width: unset;'>
        <td style='vertical-align:" . $vertical . "; text-align: " . $horizontal . ";' width='100px' height='100px'>Текст</td>
    </table>
    <a class='d-block' href='/'>Назад</a>
    ";

}

function prac7_task3()
{
    echo "<h4 class='d-block'> Задача №3 </h4>";

    $answers = ["6", "9", "4", "1", "3", "2", "5", "8", "7"];
    $questions = ['Mузeй Прадо', 'Рейхстаг', ' Oпepный театр Ла Скала', 'Meдный Всадник', 'Cтeнa Плача', 'Tpeтьяковскaя галерея', ' Tpиумфaльнaя Арка', 'Cтaтуя Свободы', 'Taуэp'];


    echo '
    <form method="get">
        <span class="d-block" style="font-weight: bold; font-size: 22px;">Города и памятники</span>
        <b class="d-block">Введите ваше имя:</b>
        <input type="text" name="name">
        <div><b>Определите, в каком городе находится данный памятник:</b></div>';
    for ($i = 0; $i < sizeof($questions); $i++) {
        $select = '
    <p><select name="city' . $i . '">
                <option selected value="">находится в городе</option>
                <option value="1">Caнкт-Пeтepбypг</option>
                <option value="2">Moсква</option>
                <option value="3">Иepуcaлим</option>
                <option value="4">Mилaн</option>
                <option value="5">Пapиж</option>
                <option value="6">Maдpид</option>
                <option value="7">Лондон</option>
                <option value="8">Hью-Йopк</option>
                <option value="9">Бepлин</option>
            </select></p>
    ';
        echo $questions[$i] . $select;
    }
    echo '
            <button type="submit">Отправить</button>
            <button href="/">Очистить</button>';
    echo '</form>';

    if (isset($_GET['name']) && strlen($_GET['name']) > 0) {
        echo "<---------------------------------------------------->";
        echo "<div>Имя: " . $_GET['name'] . "</div>";
        $count = 0;
        foreach ($questions as $key => $q) {
            if (isset($_GET['city' . $key]) && strlen($_GET['city' . $key]) > 0 && (string)$_GET['city' . $key] == $answers[$key]) {
                $count++;
            }
        }

        switch ($count) {
            case 9:
                echo "<div>великолепно знаете географию</div>";
                break;
            case 8:
                echo "<div>отлично знаете географию</div>";
                break;
            case 7:
                echo "<div>очень хорошо знаете географию</div>";
                break;
            case 6:
                echo "<div>хорошо знаете географию</div>";
                break;
            case 5:
                echo "<div>удовлетворительно знаете географию</div>";
                break;
            case 4:
                echo "<div>терпимо знаете географию</div>";
                break;
            case 3:
                echo "<div>плохо знаете географию</div>";
                break;
            case 2:
                echo "<div>очень плохо знаете географию</div>";
                break;
            default:
                echo "<div>вообще не знаете географию</div>";
                break;
        }
    }
}

//{
//    echo "<h4 class='d-block'> Задача №4 </h4>";
//}
function prac7_task5()
{
    echo "<h4 class='d-block'> Задача №5 </h4>";
    $list_sites = [
        'yandex.ru',
        'altavista.com',
        'rambler.ru',
        'yahoo.com',
        'google.com',
    ];
    echo "<form method='get'>";
    echo "<select name='site'>";
    foreach ($list_sites as $link) {
        echo "<option value='" . $link . "'>$link</option>";
    }
    echo "</select>";
    echo "<button type='submit'>Перейти</button>";
    echo "</form>";
    if (isset($_GET['site']) && strlen($_GET['site']) > 0) {
        $site = $_GET['site'];
//        exit(header("Location: http://$site/"));
//        die();
        echo("<script>location.href = 'http://$site/';</script>");
    }
}

function printPrac7()
{
    echo "<h4 class='d-block'> Практическая работа №7 </h4>";
    prac7_task1();
    prac7_task2();
    prac7_task3();
//    prac7_task4();
    prac7_task5();
}

?>
<!--8-->
<?php
// Практическая работа №8

function printPrac8()
{
    echo "<h4 class='d-block'> Практическая работа №8 </h4>";
    prac8_task1();
    prac8_task2();
    prac8_task3();
    prac8_task4();
}

function prac8_task1()
{
    echo "<h4 class='d-block'> Задача №1 </h4>";
    $pdo = new \PDO("sqlite:db.db");
    if ($pdo == false) {
        echo 'Whoops, could not connect to the SQLite database!';
        return;
    }
//    $pdo->query("DROP TABLE `notebook_br99`");
    $pdo->query("CREATE TABLE IF NOT EXISTS notebook_br99 (id INTEGER PRIMARY KEY AUTOINCREMENT , name varchar(50), city varchar(50), address varchar(50), birthday date, mail varchar(20));");
}

function prac8_task2()
{
    echo "<h4 class='d-block'> Задача №2 </h4>";
    echo "<form method='get' style='text-align: left; margin-left: 5%'>";
    echo "<div style='font-weight: bold'>Записная книжка</div>";
    echo "<div>Введите фамилию и имя [*]: <input type='text' name='name' required></div>";
    echo "<div>Введите город: <input type='text' name='city'></div>";
    echo "<div>Введите адрес: <input type='text' name='address'></div>";
    echo "<div>Введите дату рождения в формате ГГГГ-ММ-ДД: <input type='text' name='birthday'></div>";
    echo "<div>Введите e-mail [*]: <input type='email' name='email' required></div>";
    echo "<div><button type='submit'>Записать!</button></div>";
    echo "<input type='hidden' name='save'>";
    echo "</form>";
    if (isset($_GET['save'], $_GET['name'], $_GET['email']) && strlen($_GET['name']) > 0 && strlen($_GET['email']) > 0) {
        $pdo = new \PDO("sqlite:db.db");
        if ($pdo == false) {
            echo 'Whoops, could not connect to the SQLite database!';
            return;
        }
        $pdo->beginTransaction();
        $sql = "INSERT INTO `notebook_br99` (`name`, `mail`";
        $data = ["'" . $_GET['name'] . "'", "'" . $_GET['email'] . "'"];
        if (isset($_GET['city']) && strlen($_GET['city']) > 0) {
            $data[] = "'" . $_GET['city'] . "'";
            $sql .= ", 'city'";
        }
        if (isset($_GET['address']) && strlen($_GET['address']) > 0) {
            $data[] = "'" . $_GET['address'] . "'";
            $sql .= ", 'address'";
        }
        if (isset($_GET['birthday']) && strlen($_GET['birthday']) > 0) {
            $data[] = "date(" . $_GET['birthday'] . ")";
            $sql .= ", 'birthday'";
        }

        $sql .= ") values (" . implode(", ", $data) . ") ON CONFLICT DO NOTHING;";
        echo $sql;
        $stmt = $pdo->query($sql);
//        $stmt->execute();
        $pdo->commit();
    }
}

function prac8_task3()
{
    echo "<h4 class='d-block'> Задача №3 </h4>";
    $pdo = new \PDO("sqlite:db.db");
    if ($pdo == false) {
        echo 'Whoops, could not connect to the SQLite database!';
        return;
    }
    $stmt = $pdo->query("SELECT * FROM `notebook_br99`");
    $data = $stmt->fetchAll();
    ?>
    <table style="margin: 0 auto;" border="1">
        <tr>
            <th>id:</th>
            <th>Имя:</th>
            <th>Город:</th>
            <th>Адрес:</th>
            <th>Почта:</th>
        </tr>

        <?php
        foreach ($data as $row => $val) {
            echo '<tr>';
            echo '<td>' . $val['id'] . '</td>';
            echo '<td>' . $val['name'] . '</td>';
            echo '<td>' . $val['city'] . '</td>';
            echo '<td>' . $val['address'] . '</td>';
            echo '<td>' . $val['mail'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
}

function prac8_task4()
{
echo "<h4 class='d-block'> Задача №4 </h4>";
$pdo = new \PDO("sqlite:db.db");
if ($pdo == false) {
    echo 'Whoops, could not connect to the SQLite database!';
    return;
}
$stmt = $pdo->query("SELECT * FROM `notebook_br99`");
$data = $stmt->fetchAll();
?>
<form method="get">
    <table style="margin: 0 auto;" border="1">
        <tr>
            <th>id:</th>
            <th>Имя:</th>
            <th>Город:</th>
            <th>Адрес:</th>
            <th>Почта:</th>
            <th>Исправить:</th>
        </tr>

        <?php
        foreach ($data as $row => $val) {
            echo '<tr>';
            echo '<td>' . $val['id'] . '</td>';
            echo '<td>' . $val['name'] . '</td>';
            echo '<td>' . $val['city'] . '</td>';
            echo '<td>' . $val['address'] . '</td>';
            echo '<td>' . $val['mail'] . '</td>';
            echo '<td><input type="radio" name="fix" value="' . $val['id'] . '"></td>';

            echo '</tr>';
        }
        ?>
    </table>
    <button class="m-5" type="submit">Исправить</button>
</form>
<?php
if (isset($_GET['fix']) && strlen($_GET['fix']) > 0) {
?>
<table style="margin: 0 auto;" border="1">
    <tr>
        <th>id:</th>
        <th>Имя:</th>
        <th>Город:</th>
        <th>Адрес:</th>
        <th>Почта:</th>
    </tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM `notebook_br99` WHERE id = " . $_GET['fix'] . ";");
    $val = $stmt->fetch();
    echo '<tr>';
    echo '<td>' . $val['id'] . '</td>';
    echo '<td>' . $val['name'] . '</td>';
    echo '<td>' . $val['city'] . '</td>';
    echo '<td>' . $val['address'] . '</td>';
    echo '<td>' . $val['mail'] . '</td>';
    echo '</tr>';
    echo '</table>';
    ?>
    <form method="get">
        <select name="update">
            <option value="id"><?= $val['id'] ?></option>
            <option value="name"><?= $val['name'] ?></option>
            <option value="city"><?= $val['city'] ?></option>
            <option value="address"><?= $val['address'] ?></option>
            <option value="mail"><?= $val['mail'] ?></option>
        </select>
        <input type="text" name="val">
        <input type="hidden" name="id" value="<?= $val['id'] ?>">
        <button type="submit">Изменить</button>
    </form>
    <?php
    }
    if (isset($_GET['update'], $_GET['val'], $_GET['id']) && strlen($_GET['val']) > 0 && strlen($_GET['id']) > 0) {
        $stmt = $pdo->query("UPDATE `notebook_br99` SET `" . $_GET['update'] . "` = '" . $_GET['val'] . "' WHERE id = " . $_GET['id'] . ";");
        $stmt->execute();
        unset($_GET['update']);
        echo "<script>location.href = '/';</script>";
    }
    }

    ?>
    <!--9-->
    <?php
    // Практическая работа №9
    function printPrac9()
    {
        echo "<h4 class='d-block'> Практическая работа №9 </h4>";
        prac9_task1();
        prac9_task2();
    }

    function prac9_task1()
    {
        echo "<h4 class='d-block'> Задача №1 </h4>";
        echo "
<form method='get' action='/prac9/z10-2.php'>
    <table style='margin: 0 auto;'>
        <th>Таблицы</th>
        <th>Структура</th>
        <th>Содержимое</th>
         <tr>
            <td>Продавцы (sal)</td> 
            <td><input type='checkbox' name='sal' value='structure' ></td>
            <td><input type='checkbox' name='sal' value='content'></td>
        </tr>
        <tr>
            <td>Покупатели (cust)</td> 
            <td><input type='checkbox' name='cust' value='structure'></td>
            <td><input type='checkbox' name='cust' value='content'></td>
        </tr> 
        <tr>
            <td>Заказы (ord)</td> 
            <td><input type='checkbox' name='ord' value='structure'></td>
            <td><input type='checkbox' name='ord' value='content'></td>
        </tr>
    </table>
    <button style='margin-top: 15px;' type='submit'>Получить</button>
</form>
    ";
    }

    function prac9_task2()
    {
        echo "<h4 class='d-block'> Задача №2 </h4>";
        echo "
<form method='get' action='/prac9/index.php'>
    <table style='margin: 0 auto;'>
        <th>Таблицы</th>
        <th>Структура</th>
        <th>Содержимое</th>
         <tr>
            <td>Продавцы (sal)</td> 
            <td><input type='checkbox' name='structure' value='sal' ></td>
            <td><input type='checkbox' name='content' value='sal'></td>
        </tr>
        <tr>
            <td>Покупатели (cust)</td> 
            <td><input type='checkbox' name='structure' value='cust'></td>
            <td><input type='checkbox' name='content' value='cust'></td>
        </tr> 
        <tr>
            <td>Заказы (ord)</td> 
            <td><input type='checkbox' name='structure' value='ord'></td>
            <td><input type='checkbox' name='content' value='ord'></td>
        </tr>
    </table>
    <button style='margin-top: 15px;' type='submit'>Получить</button>
</form>
    ";
    }

    ?>
    <!--10-->
    <?php
    // Практическая работа №10
    function printPrac10()
    {
        echo "<h4 class='d-block'> Практическая работа №10 </h4>";
        prac10_task1();
        prac10_task2();

    }

    function prac10_task1()
    {
        /*
        CREATE TABLE IF NOT EXISTS notebook_br99 (id INTEGER PRIMARY KEY AUTOINCREMENT , name varchar(50), city varchar(50), address varchar(50), birthday date, mail varchar(20));
        INSERT INTO `notebook_br99` (`name`, `city`, `address`, `birthday`, `mail` ) values ('Иванов Иван', 'Новосибирск', 'Кирова, 86', '1982-02-03', 'a@mail.ru' ) ON CONFLICT DO NOTHING;
        INSERT INTO `notebook_br99` (`name`, `city`, `address`, `birthday`, `mail` ) values ( 'Петров Петр', 'Новосибирск', 'Кирова, 86', '1983-03-02', 'b@mail.ru' ) ON CONFLICT DO NOTHING;
        INSERT INTO `notebook_br99` (`name`, `city`, `address`, `birthday`, `mail` ) values ('Сидоров С', 'Новосибирск', 'Кирова, 86', '1983-04-03', 'c@mail.ru' ) ON CONFLICT DO NOTHING;
        */
        echo "<h4 class='d-block'> Задача №1 </h4>";
        $fileName = "notebook_br99.txt";
        if (file_exists($fileName)) {
            echo "<div>Файл существует</div>";
        } else {
            touch($fileName);
        }
        $pdo = new \PDO("sqlite:db.db");
        if ($pdo == false) {
            echo 'Whoops, could not connect to the SQLite database!';
            return;
        }
        $stmt = $pdo->query('select * from `notebook_br99`');
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $fp = fopen($fileName, "w") or die("Нельзя открыть $fileName");;
        foreach ($data as $row) {
            foreach ($row as $k => $v) {
                if ($k == "birthday") {
                    $reg = '/(?<y>\d{4})-(?<m>\d{2})-(?<d>\d{2})/m';
//                    $reg = '/(?<m>\d{2})-(?<d>\d{2})-(?<y>\d{4})/m';
                    $v = preg_replace($reg, '$3-$2-$1', $v);
                }
                fwrite($fp, $v . " | ");
            }
            fwrite($fp, "\n");
        }
        fclose($fp);

        $fp = fopen($fileName, "r")
        or die("Нельзя открыть $fileName");
        while (!feof($fp)) {
            $line = fgets($fp, 1024);
            print "$line<br>";
        }

    }

    function prac10_task2()
    {
        echo "<h4 class='d-block'> Задача №2 </h4>";

        $fileName = "notebook_br99.txt";

        if (file_exists($fileName)) {
            $file_array = file($fileName);
            echo "<table style='margin: 0 auto;' border='1'>";
            foreach ($file_array as $val) {
                echo "<tr><td>";
                $val = rtrim($val, " | \n");
                $val = preg_replace('/\|/m', ' </td><td> ', $val);
                $val = preg_replace('/(\S{1,}@\S+)/m', '<a href="mailto:$1">$1</a>', $val);
                echo $val;
                echo "</td></tr>";
            }
            echo "</table>";
            echo "<div>" . "Дата последнего изменения: " . date('D d MY H:i:s', filemtime($fileName)) . "</div>";
        }
    }

    ?>
    <!--ALL-->
    <?php
    printPrac4();
    printPrac5();
    printPrac6();
    printPrac7();
    printPrac8();
    printPrac9();
    printPrac10();
    ?>


</body>
</html>
