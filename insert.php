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

if (!empty($_POST['name_add_table_dogovor'])) {
    $name_table = $_POST['name_add_table_dogovor'];
}
if (!empty($_POST['name_add_table_client'])) {
    $name_table = $_POST['name_add_table_client'];
}
if (!empty($_POST['name_add_table_predostav_uslug'])) {
    $name_table = $_POST['name_add_table_predostav_uslug'];
}
if (!empty($_POST['name_add_table_operator'])) {
    $name_table = $_POST['name_add_table_operator'];
}
if (!empty($_POST['name_add_table_salon'])) {
    $name_table = $_POST['name_add_table_salon'];
}
if (!empty($_POST['name_add_table_sotrudnik'])) {
    $name_table = $_POST['name_add_table_sotrudnik'];
}
if (!empty($_POST['name_add_table_uslug_tarif'])) {
    $name_table = $_POST['name_add_table_uslug_tarif'];
}
if (!empty($_POST['name_add_table_usluga'])) {
    $name_table = $_POST['name_add_table_usluga'];
}
if (!empty($_POST['name_add_table_tarif'])) {
    $name_table = $_POST['name_add_table_tarif'];
}



if ($name_table=='Договор') {
    $document = $_POST['document'];
    $sql = "INSERT INTO `договор`(`Документ`) VALUES ('$document')";
}
if ($name_table=='Клиент') {
    $fio = $_POST['fio'];
    $addres = $_POST['addres'];
    $telf = $_POST['telf'];
    $sql = "INSERT INTO `клиент`(`ФИО_клиента`, `Адрес_клиента`, `Телефон_клиента`) 
VALUES ('$fio','$addres','$telf')";
}
if ($name_table=='Предоставление_услуг') {
    $number_work = $_POST['number_work'];
    $number_klient = $_POST['number_klient'];
    $date_add = $_POST['date_add'];
    $summ = $_POST['summ'];
    $komment = $_POST['komment'];
    $number_dogovor = $_POST['number_dogovor'];
    $kod_operator = $_POST['kod_operator'];
    $sql = "INSERT INTO `предоставление_услуг`(`Номер_сотрудника`, 
`Номер_клиента`, `Дата`, `Сумма_к_оплате`, `Комментарий`, `Номер_договора`, 
`Код_оператора`) VALUES ($number_work,$number_klient,
'$date_add',$summ,'$komment',$number_dogovor,$kod_operator)";
}
if ($name_table=='Операторы') {
    $name_oper = $_POST['name_oper'];
    $kode_uslugi = $_POST['kode_uslugi'];
    $kode_tarifa = $_POST['kode_tarifa'];
    $kode_uslugi_tarifa = $_POST['kode_uslugi_tarifa'];
    $sql = "INSERT INTO `операторы`(`Наименование`, `Код_услуги`, `Код_тарифа`, 
`Код_услуги_тарифа`) VALUES ('$name_oper',$kode_uslugi,$kode_tarifa,$kode_uslugi_tarifa)";
}
if ($name_table=='Салон') {
    $address_salon = $_POST['address_salon'];
    $raion_salona = $_POST['raion_salona'];
    $sql = "INSERT INTO `салон`( `Адрес`, `Район`)
 VALUES ('$address_salon','$raion_salona')";
}
if ($name_table=='Сотрудник') {
    $fio_worker = $_POST['fio_worker'];
    $date_birth_worker = $_POST['date_birth_worker'];
    $number_salon = $_POST['number_salon'];
    $kolvo_dogovor = $_POST['kolvo_dogovor'];
    $sql = "INSERT INTO `сотрудник`(`ФИО`, 
`Дата_рождения`, `Номер_салона`, `Количество_договоров`) 
VALUES ('$fio_worker','$date_birth_worker',$number_salon,'$kolvo_dogovor')";
}
if ($name_table=='Услуги_для_тарифа') {
    $name_uslug = $_POST['name_uslug'];
    $kolvo_uslug = $_POST['kolvo_uslug'];
    $ed_izm = $_POST['ed_izm'];
    $sql = "INSERT INTO `услуги_для_тарифа`( `Название`, 
`Количество`, `Единица_измерения`) VALUES ('$name_uslug',$kolvo_uslug,'$ed_izm')";
}

if ($name_table=='Услуга') {
    $name_uslugi = $_POST['name_uslugi'];
    $cost = $_POST['cost'];
    $sql = "INSERT INTO `услуга`(`Наименование`, `Стоимость`) 
VALUES ('$name_uslugi','$cost')";
}
if ($name_table=='Тариф') {
    $cost_tarif = $_POST['cost_tarif'];
    $name_tarif = $_POST['name_tarif'];
    $sql = "INSERT INTO `тариф`(`Стоимость_тарифа`, `Наименование`) 
VALUES ($cost_tarif,'$name_tarif')";
}








if (mysqli_query($conn, $sql)) {
    echo "Данные успешно добавлены";
    include('index_add.html');
} else {
    echo "Ошибка при подключении к бд";
    echo "name".$name_table;
    include('index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>