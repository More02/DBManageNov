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

if (!empty($_POST['name_update_table_dogovor'])) {
    $name_table = $_POST['name_update_table_dogovor'];
}
if (!empty($_POST['name_update_table_client'])) {
    $name_table = $_POST['name_update_table_client'];
}
if (!empty($_POST['name_update_table_predostav_uslug'])) {
    $name_table = $_POST['name_update_table_predostav_uslug'];
}
if (!empty($_POST['name_update_table_operator'])) {
    $name_table = $_POST['name_update_table_operator'];
}
if (!empty($_POST['name_update_table_salon'])) {
    $name_table = $_POST['name_update_table_salon'];
}
if (!empty($_POST['name_update_table_sotrudnik'])) {
    $name_table = $_POST['name_update_table_sotrudnik'];
}
if (!empty($_POST['name_update_table_uslug_tarif'])) {
    $name_table = $_POST['name_update_table_uslug_tarif'];
}
if (!empty($_POST['name_update_table_usluga'])) {
    $name_table = $_POST['name_update_table_usluga'];
}
if (!empty($_POST['name_update_table_tarif'])) {
    $name_table = $_POST['name_update_table_tarif'];
}




if ($name_table=='Договор') {
    $number_dogovor = $_POST['number_dogovor'];
    $new_document = $_POST['new_document'];
    $sql = "UPDATE `договор` SET `Документ`='$new_document' WHERE `Номер_договора`=$number_dogovor";
}
if ($name_table=='Клиент') {
    $number_client = $_POST['number_client'];
    $fio = $_POST['fio'];
    $addres = $_POST['addres'];
    $telf = $_POST['telf'];
    $sql = "UPDATE `клиент` SET `ФИО_клиента`='$fio',
`Адрес_клиента`='$addres',`Телефон_клиента`='$telf' WHERE `Номер_клиента`=$number_client";
}
if ($name_table=='Предоставление_услуг') {
    $number_predostav_uclug = $_POST['number_predostav_uclug'];
    $number_work = $_POST['number_work'];
    $number_klient = $_POST['number_klient'];
    $date_add = $_POST['date_add'];
    $summ = $_POST['summ'];
    $komment = $_POST['komment'];
    $number_dogovor = $_POST['number_dogovor'];
    $kod_operator = $_POST['kod_operator'];
    $sql = "UPDATE `предоставление_услуг` SET `Номер_сотрудника`=$number_work,
`Номер_клиента`=$number_klient,`Дата`='$date_add',`Сумма_к_оплате`=$summ,`Комментарий`='$komment',
`Номер_договора`=$number_dogovor,`Код_оператора`=$kod_operator WHERE 
`Номер_предоставления_услуг`=$number_predostav_uclug";
}
if ($name_table=='Операторы') {
    $kode_operator = $_POST['kode_operator'];
    $name_oper = $_POST['name_oper'];
    $kode_uslugi = $_POST['kode_uslugi'];
    $kode_tarifa = $_POST['kode_tarifa'];
    $kode_uslugi_tarifa = $_POST['kode_uslugi_tarifa'];
    $sql = "UPDATE `операторы` SET `Наименование`='$name_oper',
`Код_услуги`=$kode_uslugi,`Код_тарифа`=$kode_tarifa,`Код_услуги_тарифа`=$kode_uslugi_tarifa WHERE `Код_оператора`=$kode_operator";
}
if ($name_table=='Салон') {
    $number_salon = $_POST['number_salon'];
    $address_salon = $_POST['address_salon'];
    $raion_salona = $_POST['raion_salona'];
    $sql = "UPDATE `салон` SET `Адрес`='$address_salon',`Район`='$raion_salona' WHERE `Номер_салона`=$number_salon";
}
if ($name_table=='Сотрудник') {
    $number_sotrudnik = $_POST['number_sotrudnik'];
    $fio_worker = $_POST['fio_worker'];
    $date_birth_worker = $_POST['date_birth_worker'];
    $number_salon = $_POST['number_salon'];
    $kolvo_dogovor = $_POST['kolvo_dogovor'];
    $sql = "UPDATE `сотрудник` SET `ФИО`='$fio_worker',
`Дата_рождения`='$date_birth_worker',`Номер_салона`='$number_salon',`Количество_договоров`='$kolvo_dogovor' 
WHERE `Номер_сотрудника`=$number_sotrudnik";
}
if ($name_table=='Услуги_для_тарифа') {
    $kode_uslugi_tarifa = $_POST['kode_uslugi_tarifa'];
    $name_uslug = $_POST['name_uslug'];
    $kolvo_uslug = $_POST['kolvo_uslug'];
    $ed_izm = $_POST['ed_izm'];
    $sql = "UPDATE `услуги_для_тарифа` SET `Название`='$name_uslug',
`Количество`=$kolvo_uslug,`Единица_измерения`='$ed_izm' WHERE `Код_услуги_тарифа`=$kode_uslugi_tarifa ";
}

if ($name_table=='Услуга') {
    $kode_uslugi = $_POST['kode_uslugi'];
    $name_uslugi = $_POST['name_uslugi'];
    $cost = $_POST['cost'];
    $sql = "UPDATE `услуга` SET `Наименование`='$name_uslugi',`Стоимость`=$cost WHERE `Код_услуги`=$kode_uslugi";
}
if ($name_table=='Тариф') {
    $kode_tarif = $_POST['kode_tarif'];
    $cost_tarif = $_POST['cost_tarif'];
    $name_tarif = $_POST['name_tarif'];
    $sql = "UPDATE `тариф` SET `Стоимость_тарифа`=$cost_tarif,`Наименование`='$name_tarif' WHERE `Код_тарифа`=$kode_tarif";
}



if (mysqli_query($conn, $sql)) {
    echo "Данные успешно обновлены";
    include('update.html');
} else {
    echo "Ошибка при подключении к бд";
    include('index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>