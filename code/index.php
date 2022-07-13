<?php

namespace index;

require './bootstrap.php';

use config\Config;
use PDO;
use PDOException;

new Config(__DIR__ . '/.env');
echo "OK, Otus!";

//var_dump($_ENV);
//phpinfo();
$servername = 'db';
$username   = 'root';
$password   = $_ENV['MYSQL_ROOT_PASSWORD'];
$db         = $_ENV['MYSQL_DATABASE'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully';
    $conn = null;
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "\t\nPGSQL\t\n";
$pg_servername = 'host.docker.internal';
$pg_db         = $_ENV['PGSQL_DATABASE'];
$pg_username   = $_ENV['PGSQL_DB_USERNAME'];
$pg_password   = $_ENV['PGSQL_DB_PASSWORD'];
try {
    $dsn = "pgsql:host=$pg_servername;port=5432;dbname=$pg_db;";
    var_dump($dsn);
    var_dump($pg_username);
    var_dump($pg_password);
    // make a database connection
    $pdo = new PDO($dsn, $pg_username, $pg_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pdo) {
        echo "Connected to the $pg_db database successfully!";
    }
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}
/*function print_reverse($string) {
    if ($string) {
        return print_reverse(substr($string,1)).substr(0,1);
    }
    return '';
}*/
/*
function print_reverse(string $s): string {
    if( $s === '') {
        return '';
    }

    return print_reverse(substr($s, strlen($s) - 1));
}
$s = 'abc';
print print_reverse($s); // cba

$days = [4, 16, 19, 31, 2]; // 4
$days2=[29,4,7,12,15,17,24,1]; //3
foreach ($days as $day) {
    $count_odd = 0;
    $count_even = 0;
    if ($day % 2 == 0) {
        $count_odd++;
    } else {
        $count_even++;
    }
    if ($count_odd>$count_even) {
        echo 3;
    } else {
        echo 4;
    }

}
$term1 = 1;
$term2 = 3;
$index = 5;
 echo ($term2 - $term1) * $index - $term1;*/
