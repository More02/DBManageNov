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
                <select name="show_table" id="show_table">
                    <option value="Договор">Договор</option>
                    <option value="Клиент">Клиент</option>
                    <option value="Предоставление_услуг">Предоставление услуг</option>
                    <option value="Операторы">Операторы</option>
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
                        include('index2.html');
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
                                    . "</th><th>" . "Документ"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Документ"]
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
                                    . "</th><th>" . "ФИО клиента"
                                    . "</th><th>" . "Адрес клиента"
                                    . "</th><th>" . "Телефон клиента"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["ФИО_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Адрес_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Телефон_клиента"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Предоставление_услуг') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер сотрудника"
                                    . "</th><th>" . "Номер клиента"
                                    . "</th><th>" . "Дата"
                                    . "</th><th>" . "Сумма к оплате"
                                    . "</th><th>" . "Комментарий"
                                    . "</th><th>" . "Номер договора"
                                    . "</th><th>" . "Код оператора"
                                    . "</th><th>" . "Номер предоставления услуг"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_сотрудника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Дата"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Сумма_к_оплате"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Комментарий"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_оператора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_предоставления_услуг"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Операторы') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Код оператора"
                                    . "</th><th>" . "Наименование"
                                    . "</th><th>" . "Код услуги"
                                    . "</th><th>" . "Код тарифа"
                                    . "</th><th>" . "Код услуги тарифа"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_оператора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Наименование"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_услуги"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_тарифа"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_услуги_тарифа"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Салон') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер салона"
                                    . "</th><th>" . "Адрес"
                                    . "</th><th>" . "Район"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_салона"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Адрес"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Район"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Сотрудник') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер сотрудника"
                                    . "</th><th>" . "ФИО"
                                    . "</th><th>" . "Дата рождения"
                                    . "</th><th>" . "Номер салона"
                                    . "</th><th>" . "Количество договоров"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_сотрудника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["ФИО"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Дата_рождения"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_салона"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Количество_договоров"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Услуги_для_тарифа') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Код услуги тарифа"
                                    . "</th><th>" . "Название"
                                    . "</th><th>" . "Количество"
                                    . "</th><th>" . "Единица измерения"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_услуги_тарифа"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Количество"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Единица_измерения"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Услуга') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Код услуги"
                                    . "</th><th>" . "Наименование"
                                    . "</th><th>" . "Стоимость"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_услуги"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Наименование"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Стоимость"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Тариф') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Код тарифа"
                                    . "</th><th>" . "Стоимость тарифа"
                                    . "</th><th>" . "Наименование"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_тарифа"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Стоимость_тарифа"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Наименование"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }







                    } else {
                        echo "Ошибка при подключении к бд";
                        include('index2.html');
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