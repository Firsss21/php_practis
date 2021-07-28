<?php
$GLOBALS['pdo'] = new \PDO("sqlite:../db.db");
if ($GLOBALS['pdo'] == false) {
    echo 'Whoops, could not connect to the SQLite database!';
    return;
}