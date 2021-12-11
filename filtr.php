<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Разработка программных продуктов</title>
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

        <h1>Разработка программных продуктов</h1>
    </div>
    <div id="middle">
        <div id="add">
            <p>Фильтрация данных</p>

            <form method="post" id="filtr_form">
                <p class="select_table">Выберите поля для фильтрации</p>
                <input type="text" placeholder="Номер договора" name="number_dog" class="check2" id="number_dog"><br>
                <input type="text" placeholder="Введите работника" name="rabotnik" class="check2" id="rabotnik"><br>
                <input type="text" placeholder="Введите клиента" name="klient" class="check2" id="klient"><br>
                <input type="text" placeholder="Название продукта" name="nazv_prod" class="check2" id="nazv_prod"><br>
                <input type="text" placeholder="Номер набора функции" name="number_nab_func" class="check2" id="number_nab_func"><br>

                <p class="select_table">Выберите статус готовности</p>
                <input type="checkbox" name="Ready" value="Ready" class="check" id="Ready">Готово<br>
                <input type="checkbox" name="Developing" value="Developing" class="check" id="Developing">В разработке<br>
                <input type="checkbox" name="Testing" value="Testing" class="check" id="Testing">Тестируется<br>
                <input type="checkbox" name="OnServer" value="OnServer" class="check" id="OnServer">Размещение на серв<br>
                <input type="checkbox" name="Podd" value="Podd" class="check" id="Podd">Поддержка<br>
                <input type="submit" name="type[filtr_button]"  id="filtr_button" value="Найти">
            </form>
            <?php
            error_reporting(0);

            if (array_keys($_POST['type'])[0]=='filtr_button') {
                define("DB_HOST", "localhost");
                define("DB_USER", "root");
                define("DB_PASSWORD", "");
                define("DB_DATABASE", "Предоставление услуг телефонной связи");
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

                if ($conn->connect_error) {
                    printf("Соединение не удалось: %s\n", $conn->connect_error);
                    include('C:\OpenServer\domains\localhost\BDManageNov\index2.html');
                    exit();
                }

                if (!empty($_POST['number_dog'])) {$number_dog = '`Номер_договора` = '.$_POST['number_dog'];} else {
                    $number_dog = '1';
                }
                if (!empty($_POST['rabotnik'])) {$rabotnik = "r LIKE '%".$_POST['rabotnik']."%'";} else {
                    $rabotnik = '1';
                }
                if (!empty($_POST['klient'])) {$klient = "k LIKE '%".$_POST['klient']."%'";} else {
                    $klient = '1';
                }
                if (!empty($_POST['nazv_prod'])) {$nazv_prod = "`Название_продукта` LIKE '%".$_POST['nazv_prod']."%'";} else {
                    $nazv_prod = '1';
                }
                if (!empty($_POST['number_nab_func'])) {$number_nab_func = '`Номер_набора` = '.$_POST['number_nab_func'];} else {
                    $number_nab_func = '1';
                }
                if (!empty($_POST['Ready'])){$Ready = "OR `Название_статуса_готовности_проекта` LIKE '%Готово%'";} else {
                    $Ready = '';
                }
                if (!empty($_POST['Developing'])) {$Developing = "OR `Название_статуса_готовности_проекта` LIKE '%В разработке%'";} else {
                    $Developing = '';
                }
                if (!empty($_POST['Testing'])) {$Testing = "OR `Название_статуса_готовности_проекта` LIKE '%Тестируется%'";} else {
                    $Testing = '';
                }
                if (!empty($_POST['OnServer'])){$OnServer = "OR `Название_статуса_готовности_проекта` LIKE '%Размещение на серв%'"; } else {
                    $OnServer = '';
                }
                if (!empty($_POST['Podd'])) {$Podd = "OR `Название_статуса_готовности_проекта` LIKE '%Поддержка%'";} else {
                    $Podd = '';
                }
                if (empty($Podd)&&empty($OnServer)&&empty($Testing)&&empty($Developing)&&empty($Ready)) {
                    $Ready="OR 1";
                }


                $sql = "SELECT 
	`Номер_договора`,
	r,
	k,
 `Название_продукта`,
	`Номер_набора`  ,
	`Название_статуса_готовности_проекта` 
    FROM 
	((((`договор`  
		INNER JOIN (SELECT `техническое_задание`.`Номер_технического_задания`, `техническое_задание`.`номер_работника`, concat(`Фамилия_работника`,' ', `Имя_работника`,' ', `Отчество_работника`) as r FROM `техническое_задание`
			INNER JOIN `работник` on `техническое_задание`.`Номер_работника` = `работник`.`Номер_работника`) as s1 ON `договор`.`Номер_технического_задания` = s1.`Номер_технического_задания`)
		INNER JOIN (SELECT `техническое_задание`.`Номер_технического_задания`, `техническое_задание`.`Номер_клиента`, concat(`Фамилия_клиента`,' ',`Имя_клиента`,' ',`Отчество_клиента`) as k FROM `техническое_задание`
			INNER JOIN `клиент` on `техническое_задание`.`Номер_клиента`=`клиент`.`Номер_клиента`) as s2 ON `договор`.`Номер_технического_задания`=s2.`Номер_технического_задания`)
		INNER JOIN (SELECT `техническое_задание`.`Номер_технического_задания`, `техническое_задание`.`Номер_набора_функционала`, `Номер_набора` FROM `техническое_задание`INNER JOIN `набор_функционала` on `техническое_задание`.`Номер_набора_функционала`=`набор_функционала`.`Номер_набора_функционала`) as s3 ON `договор`.`Номер_технического_задания`=s3.`Номер_технического_задания`)
		INNER JOIN `готовность_проекта` ON `договор`.`Номер_статуса_готовности_проекта`=`готовность_проекта`.`Номер_статуса_готовности_проекта`)
WHERE $number_dog AND $rabotnik AND $klient AND $nazv_prod AND $number_nab_func AND ('1' LIKE '0' $Ready"."  $Developing "."$Testing "." $OnServer "." $Podd)
ORDER BY `Номер_договора`";


//echo $sql;


                if (mysqli_query($conn, $sql)) {

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер"
                            . "</th><th>" . "Работник"
                            . "</th><th>" . "Клиент"
                            . "</th><th>" . "Название продукта"
                            . "</th><th>" . "Номер набора функций"
                            . "</th><th>" . "Статус проекта"
                            . "</th>
                 </tr>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            echo
                                "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["r"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["k"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_продукта"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_набора"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_статуса_готовности_проекта"]
                                . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    }



                } else {
                    echo "Ошибка при подключении к бд";
                    include('C:\OpenServer\domains\localhost\BDManageNov\index2.html');
                    printf(mysqli_error($conn));
                }

                mysqli_close($conn);
            }


            ?>
            <style>
                .check {
                    width: 20px;
                    height: 20px;
                    margin-left: -15px;
                }
                .check2 {
                    margin-left: -15px;
                }
                #filtr_form {
                    text-align: left;


                }
            </style>



        </div>


    </div>
    <div id="footer">

    </div>
</div>

</body>
</html>