<?php
ob_start();
session_start();

require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';
require '../assets/includes/auth_functions.php';
require '../assets/includes/security_functions.php';

if (isset($_SESSION['auth'])) {
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;
}

generate_csrf_token();
check_remember_me();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     

    $sql = "UPDATE materials SET update_user='" . $_SESSION["id"] . "',

            name='" . $_POST["name"] . "'
            code='" . $_POST["code"] . "'
            note='" . $_POST["note"] . "'
            where id_s= " . $_POST["id"] . ";";

    if (mysqli_query($conn, $sql)) {
        echo " record UPDATE successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 


    
    

    mysqli_close($conn);
    header("Location: ./listMaterials.php");
    ob_flush();
}
