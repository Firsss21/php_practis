<?php
function vid_content($content)
{
    echo "<h4 style='display: block; text-align: center'>Содержимое таблицы $content</h4>";
    $stmt = $GLOBALS['pdo']->query("PRAGMA table_info(`$content`);");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    printTable($data);
}

function vid_structure($structure)
{
    echo "<h4 style='display: block; text-align: center'>Структура таблицы $structure</h4>";
    $stmt = $GLOBALS['pdo']->query("SELECT * FROM `$structure`;");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    printTable($data);
}

function printTable($data)
{

    $rus_name = [
        'city' => 'Город',
        'sname' => 'Имя',
        'cname' => 'Имя',
        'rating' => 'Рейтинг',
        'comm' => 'Комиссия продавца',
        'snum' => 'Идентификатор продавца',
        'cnum' => 'Идентификатор покупателя',
        'onum' => 'Номер заказа',
        'odate' => 'Дата заказа',
        'amt' => 'Сумма заказа'
    ];

    echo "<table style='margin:60px auto;' border='1'>";
    $cols = $data[sizeof($data) - 1];
    foreach ($cols as $k => $v) {
        echo "<th>$k<br>" . $rus_name[$k] . "</th>";
    }
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";

    }
    echo "</table>";
}

if (isset($_GET['structure'])) {
    vid_structure($_GET['structure']);
}
if (isset($_GET['content'])) {
    vid_content($_GET['content']);
}
?>
<a style="text-align: center; display: block" href="/index.php">
    <button>Назад</button>
</a>
