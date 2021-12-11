<meta charset="UTF-8">
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "Предоставление услуг телефонной связи");
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    printf("Соединение не удалось: %s\n", $conn->connect_error);
    include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
    exit();
}

if (!empty($_POST['name_delete_table_dogovor'])) {
    $name_table = $_POST['name_delete_table_dogovor'];
}
if (!empty($_POST['name_delete_table_client'])) {
    $name_table = $_POST['name_delete_table_client'];
}
if (!empty($_POST['name_delete_table_function'])) {
    $name_table = $_POST['name_delete_table_function'];
}
if (!empty($_POST['name_delete_table_status_proj'])) {
    $name_table = $_POST['name_delete_table_status_proj'];
}
if (!empty($_POST['name_delete_table_status_nabor_function'])) {
    $name_table = $_POST['name_delete_table_status_nabor_function'];
}
if (!empty($_POST['name_delete_table_otdel'])) {
    $name_table = $_POST['name_delete_table_otdel'];
}
if (!empty($_POST['name_delete_table_rabotnik'])) {
    $name_table = $_POST['name_delete_table_rabotnik'];
}
if (!empty($_POST['name_delete_spec'])) {
    $name_table = $_POST['name_delete_spec'];
}
if (!empty($_POST['name_delete_table_tech_zad'])) {
    $name_table = $_POST['name_delete_table_tech_zad'];
}



if ($name_table=='Договор') {
    $number_dog = $_POST['number_dog'];
    $sql = "DELETE FROM `договор` WHERE `Номер_договора`=$number_dog";
}
if ($name_table=='Клиент') {
    $number_client = $_POST['number_client'];

    $sql = "DELETE FROM `клиент` WHERE `Номер_клиента`=$number_client";
}
if ($name_table=='Вид_функционала') {
    $number_function = $_POST['number_function'];

    $sql = "DELETE FROM `вид_функционала` WHERE `Номер_функции`=$number_function";
}
if ($name_table=='Готовность_проекта') {
    $number_status_proj = $_POST['number_status_proj'];

    $sql = "DELETE FROM `готовность_проекта` WHERE `Номер_статуса_готовности_проекта`=$number_status_proj";
}
if ($name_table=='Набор_функционала') {
    $number_nabor_func = $_POST['number_nabor_func'];

    $sql = "DELETE FROM `набор_функционала` WHERE `Номер_набора_функционала`=$number_nabor_func";
}
if ($name_table=='Отдел') {
    $number_otdel = $_POST['number_otdel'];

    $sql = "DELETE FROM `отдел` WHERE `Номер_отдела`=$number_otdel";
}
if ($name_table=='Работник') {
    $number_work = $_POST['number_work'];

    $sql = "DELETE FROM `работник` WHERE `Номер_работника`=$number_work";
}
if ($name_table=='Специализация') {
    $number_spec = $_POST['number_spec'];

    $sql = "DELETE FROM `специализация` WHERE `Номер_специализации`=$number_spec";
}
if ($name_table=='Техническое_задание') {
    $number_tz = $_POST['number_tz'];

    $sql = "DELETE FROM `техническое_задание` WHERE `Номер_технического_задания`=$number_tz";
}



if (mysqli_query($conn, $sql)) {
    echo "Данные успешно удалены";
    include('C:\OpenServer\domains\localhost\BDManageNov\delete.html');
} else {
    echo "Ошибка при подключении к бд";
    echo "name".$name_table;
    include('C:\OpenServer\domains\localhost\BDManageNov\index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>