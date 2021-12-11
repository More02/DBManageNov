<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Предоставление услуг телефонной связи</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once('ConnectDB.php'); ?>
<div id="page">
    <div id="header">

        <ul>
            <li><a href="index_add.html">Добавление</a></li>
            <li><a href="delete.html">Удаление</a></li>
            <li><a href="update.html">Обновление</a></li>
            <li><a href="look.php">Просмотр</a></li>
            <li><a href="filtr.php">Фильтрация</a></li>
        </ul>

        <h1>Предоставление услуг телефонной связи</h1>
    </div>
    <div id="middle">
        <div id="add">
            <p>Просмотр данных в таблице</p>
            <p class="select_table">Выберите таблицу для просмотра данных:</p>
            <form method="post" action="look.php">
                <select name="add_table" id="add_table">
                    <option value="Договор">Договор</option>
                    <option value="Клиент">Клиент</option>
                    <option value="Операторы">Операторы</option>
                    <option value="Предоставление_услуг">Предоставление услуг</option>
                    <option value="Салон">Салон</option>
                    <option value="Сотрудник">Сотрудник</option>
                    <option value="Услуги_для_тарифа">Услуги для тарифа</option>
                    <option value="Услуга">Услуга</option>
                    <option value="Тариф">Тариф</option>
                </select><br>
                <input type="submit" name="type[look_send]"  id="look_button" value="Отобразить данные из таблицы">
                <style>
                    #look_button {
                        margin-top: 10px;
                        margin-left: 0px;
                        width: 300px;
                    }


                </style>
                <meta charset="UTF-8">
                <?php
                error_reporting(0);

                if (array_keys($_POST['type'])[0]=='look_send') {
                    define("DB_HOST", "localhost");
                    define("DB_USER", "root");
                    define("DB_PASSWORD", "");
                    define("DB_DATABASE", "разработка_программных_продуктов");
                    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

                    if ($conn->connect_error) {
                        printf("Соединение не удалось: %s\n", $conn->connect_error);
                        include('C:\OpenServer\domains\localhost\BDManageNov\index2.html');
                        exit();
                    }

                    $name_table = $_POST['show_table'];
                    echo "<p style='text-align: left;'>Выбрана таблица: ";
                    echo $name_table."</p>";
                    $sql = "SELECT * FROM `$name_table` WHERE 1";



                    if (mysqli_query($conn, $sql)) {
                        if ($name_table=='Договор') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер договора"
                                    . "</th><th>" . "Номер технического задания"
                                    . "</th><th>" . "Номер статуса готовности проекта"
                                    . "</th><th>" . "Название продукта"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_технического_задания"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_статуса_готовности_проекта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_продукта"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Клиент') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер клиента"
                                    . "</th><th>" . "Фамилия клиента"
                                    . "</th><th>" . "Имя клиента"
                                    . "</th><th>" . "Отчество клиента"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Фамилия_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Имя_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Отчество_клиента"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Вид_функционала') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер функции"
                                    . "</th><th>" . "Описание функции"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_функции"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Описание_функции"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Готовность_проекта') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер статуса готовности проекта"
                                    . "</th><th>" . "Название статуса готовности проект"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_статуса_готовности_проекта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_статуса_готовности_проекта"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Набор_функционала') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер набора функционала"
                                    . "</th><th>" . "Номер набора"
                                    . "</th><th>" . "Комментарий к функционалу"
                                    . "</th><th>" . "Номер функции"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_набора_функционала"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_набора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Комментарий_к_функционалу"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_функции"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Отдел') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер отдела"
                                    . "</th><th>" . "Наименование отдела"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_отдела"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Наименование_отдела"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Работник') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер специализации"
                                    . "</th><th>" . "Номер отдела"
                                    . "</th><th>" . "Фамилия работника"
                                    . "</th><th>" . "Имя работника"
                                    . "</th><th>" . "Отчество работника"
                                    . "</th><th>" . "Количество открытых проектов"
                                    . "</th><th>" . "Номер работника"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_специализации"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_отдела"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Фамилия_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Имя_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Отчество_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Количество_открытых_проектов"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_работника"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Специализация') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер специализации"
                                    . "</th><th>" . "Название специализации"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_специализации"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_специализации"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Техническое_задание') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер технического задания"
                                    . "</th><th>" . "Комментарий"
                                    . "</th><th>" . "Номер работника"
                                    . "</th><th>" . "Номер набора функционала"
                                    . "</th><th>" . "Номер клиента"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_технического_задания"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Комментарий"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_набора_функционала"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_клиента"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }







                    } else {
                        echo "Ошибка при подключении к бд";
                        include('C:\OpenServer\domains\localhost\BDManageNov\index2.html');
                        printf(mysqli_error($conn));
                    }

                    mysqli_close($conn);
                }


                ?>
            </form>



        </div>



    </div>
    <div id="footer">

    </div>
</div>

</body>
</html>