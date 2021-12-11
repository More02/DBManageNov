<meta charset="UTF-8">
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "Предоставление услуг телефонной связи");
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    printf("Соединение не удалось: %s\n", $conn->connect_error);
    include('index2.html');
    exit();
}

if (!empty($_POST['name_delete_table_dogovor'])) {
    $name_table = $_POST['name_delete_table_dogovor'];
}
if (!empty($_POST['name_delete_table_client'])) {
    $name_table = $_POST['name_delete_table_client'];
}
if (!empty($_POST['name_delete_table_predostav_uslug'])) {
    $name_table = $_POST['name_delete_table_predostav_uslug'];
}
if (!empty($_POST['name_delete_table_operator'])) {
    $name_table = $_POST['name_delete_table_operator'];
}
if (!empty($_POST['name_delete_table_salon'])) {
    $name_table = $_POST['name_delete_table_salon'];
}
if (!empty($_POST['name_delete_table_sotrudnik'])) {
    $name_table = $_POST['name_delete_table_sotrudnik'];
}
if (!empty($_POST['name_delete_table_uslug_tarif'])) {
    $name_table = $_POST['name_delete_table_uslug_tarif'];
}
if (!empty($_POST['name_delete_table_usluga'])) {
    $name_table = $_POST['name_delete_table_usluga'];
}
if (!empty($_POST['name_delete_table_tarif'])) {
    $name_table = $_POST['name_delete_table_tarif'];
}


if ($name_table=='Договор') {
    $number_dog = $_POST['number_dog'];
    $sql = "DELETE FROM `договор` WHERE `Номер_договора`=$number_dog";
}
if ($name_table=='Клиент') {
    $number_client = $_POST['number_client'];
    $sql = "DELETE FROM `клиент` WHERE `Номер_клиента`=$number_client";
}
if ($name_table=='Предоставление_услуг') {
    $name_predostav_uclug = $_POST['name_predostav_uclug'];
    $sql = "DELETE FROM `предоставление_услуг` WHERE `Номер_предоставления_услуг`=
'$name_predostav_uclug'";
}
if ($name_table=='Операторы') {
    $kode_operator = $_POST['kode_operator'];
    $sql = "DELETE FROM `операторы` WHERE `Код_оператора`=$kode_operator";
}
if ($name_table=='Салон') {
    $number_salon = $_POST['number_salon'];
    $sql = "DELETE FROM `салон` WHERE `Номер_салона`=$number_salon";
}
if ($name_table=='Сотрудник') {
    $number_sotrudnik = $_POST['number_sotrudnik'];
    $sql = "DELETE FROM `сотрудник` WHERE `Номер_сотрудника`=$number_sotrudnik";
}
if ($name_table=='Услуги_для_тарифа') {
    $kode_uslugi_tarifa = $_POST['kode_uslugi_tarifa'];
    $sql = "DELETE FROM `услуги_для_тарифа` WHERE `Код_услуги_тарифа`=$kode_uslugi_tarifa";
}

if ($name_table=='Услуга') {
    $kode_uslugi = $_POST['kode_uslugi'];
    $sql = "DELETE FROM `услуга` WHERE `Код_услуги`=$kode_uslugi";
}
if ($name_table=='Тариф') {
    $kode_tarif = $_POST['kode_tarif'];
    $sql = "DELETE FROM `тариф` WHERE `Код_тарифа`=$kode_tarif";
}




if (mysqli_query($conn, $sql)) {
    echo "Данные успешно удалены";
    include('delete.html');
} else {
    echo "Ошибка при подключении к бд";
    echo "name".$name_table;
    include('index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>