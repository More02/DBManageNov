<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "Предоставление услуг телефонной связи");
$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if ($connect->connect_error) {
    printf("Соединение не удалось: %s\n", $connect->connect_error);
    exit();
}
?>