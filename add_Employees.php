<?php

ob_start();

session_start();


require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $sql = "INSERT INTO employees(name, number,
 birthday, phone1, phone2, Email, motherName, college_id,
  city_id, note, add_user, update_user)
    VALUES
     ('" . $_POST["name"] . "','" . $_POST["number"] .
      "','" . $_POST["birthday"] . "','" . $_POST["phone1"] . "','"
       . $_POST["phone2"] . "','" . $_POST["Email"] . "','" .
        $_POST["motherName"] . "','" . $_POST["college"] . "','" .
         $_POST["city"] ."','" . $_POST["note"] . "'," . $_SESSION["id"] 
            ."," . $_SESSION["id"] . ");";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

mysqli_close($conn);

header("Location: ./listEmployees.php");

ob_flush();

?>
