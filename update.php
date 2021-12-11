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
if (!empty($_POST['name_update_table_function'])) {
    $name_table = $_POST['name_update_table_function'];
}
if (!empty($_POST['name_update_table_status_proj'])) {
    $name_table = $_POST['name_update_table_status_proj'];
}
if (!empty($_POST['name_update_table_status_nabor_function'])) {
    $name_table = $_POST['name_update_table_status_nabor_function'];
}
if (!empty($_POST['name_update_table_otdel'])) {
    $name_table = $_POST['name_update_table_otdel'];
}
if (!empty($_POST['name_update_table_rabotnik'])) {
    $name_table = $_POST['name_update_table_rabotnik'];
}
if (!empty($_POST['name_update_spec'])) {
    $name_table = $_POST['name_update_spec'];
}
if (!empty($_POST['name_update_table_tech_zad'])) {
    $name_table = $_POST['name_update_table_tech_zad'];
}



if ($name_table=='Договор') {
    $number_dogovor = $_POST['number_dogovor'];
    $new_document = $_POST['new_document'];
    $sql = "UPDATE `договор` SET `Документ`='$new_document' WHERE `Номер_договора`=$number_dogovor";

}
if ($name_table=='Клиент') {
    $number_client = $_POST['number_client'];
    $surname = $_POST['new_surname'];
    $name = $_POST['new_name'];
    $last_name = $_POST['new_last_name'];
    $sql = "UPDATE `клиент` SET `Фамилия_клиента`='$surname',`Имя_клиента`='$name',
`Отчество_клиента`='$last_name' WHERE `Номер_клиента`=$number_client";
}
if ($name_table=='Вид_функционала') {
    $number_function = $_POST['number_function'];
    $type_function = $_POST['type_function'];
    $sql = "UPDATE `вид_функционала` SET `Описание_функции`='$type_function' 
WHERE `Номер_функции`=$number_function";
}
if ($name_table=='Готовность_проекта') {
    $number_status_proj = $_POST['number_status_proj'];
    $name_status_proj = $_POST['name_status_proj'];
    $sql = "UPDATE `готовность_проекта` SET `Название_статуса_готовности_проекта`=
'$name_status_proj' WHERE `Номер_статуса_готовности_проекта`=$number_status_proj";
}
if ($name_table=='Набор_функционала') {
    $number_nabor_func = $_POST['number_nabor_func'];
    $number_nabor = $_POST['number_nabor'];
    $komment_to_function = $_POST['komment_to_function'];
    $number_function = $_POST['number_function'];
    $sql = "UPDATE `набор_функционала` SET `Номер_набора`='$number_nabor',
`Комментарий_к_функционалу`='$komment_to_function',`Номер_функции`='$number_function' 
WHERE `Номер_набора_функционала`=$number_nabor_func";
}
if ($name_table=='Отдел') {
    $number_otdel = $_POST['number_otdel'];
    $name_otdel = $_POST['name_otdel'];
    $sql = "UPDATE `отдел` SET `Наименование_отдела`='$name_otdel' WHERE 
`Номер_отдела`=$number_otdel";
}
if ($name_table=='Работник') {
    $number_work = $_POST['number_work'];
    $number_spec = $_POST['number_spec'];
    $number_otdel = $_POST['number_otdel'];
    $surname_work = $_POST['surname_work'];
    $name_work = $_POST['name_work'];
    $last_name_work = $_POST['last_name_work'];
    $number_open_proj = $_POST['number_open_proj'];
    $sql = "UPDATE `работник` SET `Номер_специализации`='$number_spec',
`Номер_отдела`='$number_otdel',`Фамилия_работника`='$surname_work',
`Имя_работника`='$name_work',`Отчество_работника`='$last_name_work',
`Количество_открытых_проектов`=$number_open_proj WHERE `Номер_работника`=$number_work";
}
if ($name_table=='Специализация') {
    $number_spec = $_POST['number_spec'];
    $name_spec = $_POST['name_spec'];
    $sql = "UPDATE `специализация` SET `Название_специализации`='$name_spec'
WHERE `Номер_специализации`=$number_spec";
}
if ($name_table=='Техническое_задание') {
    $number_tz = $_POST['number_tz'];
    $komment_to_tz = $_POST['komment_to_tz'];
    $number_rabotnik = $_POST['number_rabotnik'];
    $number_nub_func = $_POST['number_nub_func'];
    $number_klient = $_POST['number_klient'];
    $sql = "UPDATE `техническое_задание` SET `Комментарий`= '$komment_to_tz',
`Номер_работника`=$number_rabotnik,`Номер_набора_функционала`=$number_nub_func,
`Номер_клиента`=$number_klient WHERE `Номер_технического_задания`=$number_tz";
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