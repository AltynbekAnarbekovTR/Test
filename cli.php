<?php

require __DIR__ . "/vendor/autoload.php";

use Framework\Database;

$db = new Database('mysql', [
  'host' => 'localhost',
  'port' => 3306,
  'dbname' => 'good_mood2'
], 'root', 'root');

$sqlFile = file_get_contents("./database.sql");

$db->query($sqlFile);
