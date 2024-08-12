<?php
ob_start();
session_start();

require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';
require '../assets/includes/auth_functions.php';
require '../assets/includes/security_functions.php';

if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   

    
    $sql = "INSERT INTO deletpayment (SELECT * FROM payment where id_s=".$_POST["id"].");";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      
      
    
    
    
    $sql = "UPDATE deletpayment SET update_user='" . $_SESSION["id"] . "',
    
        u_date='" . date('Y-m-d H:i:s') . "'
          where id_s= " . $_POST["id"] . ";";
    
        if (mysqli_query($conn, $sql)) {
            echo " record UPDATE successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        $sql = "UPDATE payment SET
        money='" . $_POST["money"] . "',
        dis='" . $_POST["dis"] . "',pay='" . $_POST["pay"] . "',
        note='" . $_POST["note"] . "',
        update_user='" . $_SESSION["id"] . "',
        u_date='" . date('Y-m-d H:i:s') . "'  WHERE  id_s = " . $_POST["id"] . ";";
    
        if (mysqli_query($conn, $sql)) {
            echo "New record UPDATE successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    mysqli_close($conn);
    header("Location: ./print_s.php?id=". $_POST["id"]);
    ob_flush();
}




