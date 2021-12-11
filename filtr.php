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
                <input type="text" placeholder="Введите номер предоставления услуг" name="number_usl" class="check2" id="number_usl"><br>
                <!--<input type="text" placeholder="Введите дату в формате yyyy-mm-dd" name="date" class="check2" id="date"><br>-->
                <input type="text" placeholder="Введите сотрудника" name="rabotnik" class="check2" id="rabotnik"><br>
                <input type="text" placeholder="Введите клиента" name="klient" class="check2" id="klient"><br>
                <input type="text" placeholder="Введите сумму" name="summ" class="check2" id="summ"><br>

                <p class="select_table">Выберите Тариф</p>
                <input type="checkbox" name="Tarifiche" value="Tarifiche" class="check" id="Tarifiche">Тарифище<br>
                <input type="checkbox" name="City" value="City" class="check" id="City">Городской<br>
                <input type="checkbox" name="Derevhya" value="Derevhya" class="check" id="Derevhya">Деревенский<br>
                <input type="checkbox" name="SvG" value="SvG" class="check" id="SvG">Связь G<br>

                <p class="select_table">Выберите отдельную услугу</p>
                <input type="checkbox" name="Internet" value="Internet" class="check" id="Internet">Интернет<br>
                <input type="checkbox" name="SMS" value="SMS" class="check" id="SMS">СМС<br>

                <p class="select_table">Выберите оператора</p>
                <input type="checkbox" name="Tele2" value="Tele2" class="check" id="Tele2">Теле2<br>
                <input type="checkbox" name="MTC" value="MTC" class="check" id="MTC">МТС<br>

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
                    include('index2.html');
                    exit();
                }

                if (!empty($_POST['number_usl'])) {$number_usl = '`Номер_предоставления_услуг`  = '.$_POST['number_usl'];} else {
                    $number_usl = '1';
                }
               // if (!empty($_POST['date'])) {$date = '`Дата` = '.$_POST['date'];} else {
                  //  $date = '1';
               // }
                if (!empty($_POST['rabotnik'])) {$rabotnik = "`ФИО`  LIKE '%".$_POST['rabotnik']."%'";} else {
                    $rabotnik = '1';
                }
                if (!empty($_POST['klient'])) {$klient = "`ФИО_клиента`  LIKE '%".$_POST['klient']."%'";} else {
                    $klient = '1';
                }
                if (!empty($_POST['summ'])) {$summ = "`Сумма_к_оплате` = ".$_POST['summ'];} else {
                    $summ = '1';
                }


                if (!empty($_POST['Tarifiche'])){$Tarifiche = "OR `Наименование` LIKE '%Тарифище%'";} else {
                    $Tarifiche = '';
                }
                if (!empty($_POST['City'])) {$City = "OR `Наименование` LIKE '%Городской%'";} else {
                    $City = '';
                }
                if (!empty($_POST['Derevhya'])) {$Derevhya = "OR `Наименование` LIKE '%Деревенский%'";} else {
                    $Derevhya = '';
                }
                if (!empty($_POST['SvG'])){$SvG = "OR `Наименование` LIKE '%Связь G%'"; } else {
                    $SvG = '';
                }
                if (empty($Tarifiche)&&empty($City)&&empty($Derevhya)&&empty($SvG)) {
                    $Tarifiche="OR 1";
                }


                if (!empty($_POST['Internet'])) {$Internet = "OR u LIKE '%интернет%'";} else {
                    $Internet = '';
                }
                if (!empty($_POST['SMS'])) {$SMS = "OR u LIKE '%СМС%'";} else {
                    $SMS = '';
                }

                if (empty($Internet)&&empty($SMS)) {
                    $Internet="OR 1";
                }


                if (!empty($_POST['Tele2'])) {$Tele2 = "OR CONCAT(COALESCE(oper1,''), COALESCE(oper2,'')) LIKE '%Теле2%'";} else {
                    $Tele2 = '';
                }
                if (!empty($_POST['MTC'])) {$MTC = "OR CONCAT(COALESCE(oper1,''), COALESCE(oper2,'')) LIKE '%МТС%'";} else {
                    $MTC = '';
                }

                if (empty($Tele2 )&&empty($MTC)) {
                    $Tele2 ="OR 1";
                }



                $sql = "SELECT 
	`Номер_предоставления_услуг`, 
	`Дата`, 
	`ФИО`, 
	`ФИО_клиента`, 
	CONCAT(COALESCE(oper1,''), COALESCE(oper2,'')) as 'Оператор' ,
	`Наименование`,
	u,
	`Сумма_к_оплате`
FROM 
	((((`предоставление_услуг`
			INNER JOIN `сотрудник` ON `предоставление_услуг`.`Номер_сотрудника` = `сотрудник`.`Номер_сотрудника`) 
			INNER JOIN `клиент` ON `предоставление_услуг`.`Номер_клиента` = `клиент`.`Номер_клиента`) 
			LEFT JOIN (SELECT `код_оператора`, `операторы`.`Наименование` as oper1, `тариф`.`Наименование` FROM `операторы` 
				INNER JOIN `тариф` on `операторы`.`Код_тарифа` = `тариф`.`Код_тарифа`) as s1 ON `предоставление_услуг`.`Код_оператора` = s1.`Код_оператора`)
            LEFT JOIN (SELECT `код_оператора`,  `операторы`.`Наименование` as oper2, `услуга`.`Наименование` as u FROM `операторы`
                INNER JOIN `услуга` on `операторы`.`Код_услуги` = `услуга`.`Код_услуги`) as s2 ON `предоставление_услуг`.`Код_оператора` = s2.`Код_оператора`)
                WHERE $number_usl AND $rabotnik AND $klient AND $summ AND ('1' LIKE '0' $Tarifiche"."  $City "."$Derevhya "." $SvG) AND ('1' LIKE '0' $Internet"."  $SMS) AND ('1' LIKE '0' $Tele2"."  $MTC)
ORDER BY `Номер_предоставления_услуг`
";




//echo $sql;


                if (mysqli_query($conn, $sql)) {

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер"
                            . "</th><th>" . "Дата"
                            . "</th><th>" . "Сотрудник"
                            . "</th><th>" . "Клиент"
                            . "</th><th>" . "Тариф"
                            . "</th><th>" . "Оператор"
                            . "</th><th>" . "Отдельная услуга"
                            . "</th><th>" . "Сумма к оплате"
                            . "</th>
                 </tr>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            echo
                                "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_предоставления_услуг"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Дата"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["ФИО"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["ФИО_клиента"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Наименование"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Оператор"]

                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["u"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Сумма_к_оплате"]
                                . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    }



                } else {
                    echo "Ошибка при подключении к бд";
                    include('index2.html');
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