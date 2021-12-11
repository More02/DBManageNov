<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();

if (array_keys($_POST['type'])[0]=='register_butt') {
    // json response array
    $response = array("error" => FALSE);

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

        // receiving the post params
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check if user is already existed with the same email
        if ($db->isUserExisted($email)) {
            // user already existed
            $response["error"] = TRUE;
            $response["error_msg"] = "Пользователь с данным email " . $email . " уже существует";
            echo json_encode($response);
        } else {
            // create a new user
            $user = $db->storeUser($name, $email, $password);
            if ($user) {
                include('C:\OpenServer\domains\localhost\BD_Proj\index_add.html');
            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "При регистрации возникла ошибка";
                echo json_encode($response);
            }
        }
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Необходимые параметры не введены";
        echo json_encode($response);
    }
}
if (array_keys($_POST['type'])[0]=='login_butt') {
    include('C:\OpenServer\domains\localhost\BD_Proj\login.html');
}

?>