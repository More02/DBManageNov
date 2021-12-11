<?php
require_once 'DB_Functions.php';
$db = new DB_Functions();

if (array_keys($_POST['type'])[0]=='login_butt') {
    // json response array
    $response = array("error" => FALSE);

    if (isset($_POST['email']) && isset($_POST['password'])) {

        // receiving the post params
        $email = $_POST['email'];
        $password = $_POST['password'];

        // get the user by email and password
        $user = $db->getUserByEmailAndPassword($email, $password);

        if ($user != false) {
            include('index_add.html');
            echo json_encode($response);
        } else {
            // user is not found with the credentials
            $response["error"] = TRUE;
            $response["error_msg"] = "Пользователь с данным email не найден";
            echo json_encode($response);
        }
    } else {
        // required post params is missing
        $response["error"] = TRUE;
        $response["error_msg"] = "Необходимые данные не введены";
        echo json_encode($response);
    }
}

?>