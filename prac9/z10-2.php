<?php

$pdo = new \PDO("sqlite:../db.db");
if ($pdo == false) {
    echo 'Whoops, could not connect to the SQLite database!';
    return;
}


if(isset($_GET['sal'])) {
    if ($_GET['sal'] == 'content') {
        $stmt = $pdo->query("SELECT * FROM `sal`;");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        printTable($data);
    }

    if ($_GET['sal'] == 'structure') {
        echo "<span style='text-align: center;display: block;'>Тк это sqlite, он использует упрощенные типы</span>";
        $stmt = $pdo->query("PRAGMA table_info(`sal`);");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        printTable($data);
    }
}

if(isset($_GET['cust'])) {
    if ($_GET['cust'] == 'content') {
        $stmt = $pdo->query("SELECT * FROM `cust`;");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        printTable($data);
    }

    if ($_GET['cust'] == 'structure') {
        echo "<span style='text-align: center;display: block;'>Тк это sqlite, он использует упрощенные типы</span>";

        $stmt = $pdo->query("PRAGMA table_info(`cust`);");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        printTable($data);
    }
}

if(isset($_GET['ord'])) {
    if ($_GET['ord'] == 'content') {
        $stmt = $pdo->query("SELECT * FROM `ord`");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        printTable($data);
    }

    if ($_GET['ord'] == 'structure') {
        echo "<span style='text-align: center;display: block;'>Тк это sqlite, он использует упрощенные типы</span>";

        $stmt = $pdo->query("PRAGMA table_info(`ord`);");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        printTable($data);
    }

}
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
function printTable($data) {
    echo "<table style='margin:60px auto;' border='1'>";
    $cols = $data[sizeof($data) - 1];
    foreach ($cols as $k => $v) {
        echo "<th>$k</th>";
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

?>

     <a style="text-align: center; display: block" href="/index.php"><button>Назад</button></a>

