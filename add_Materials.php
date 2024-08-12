<?php

ob_start();

session_start();


require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $sql = "INSERT INTO materials(name, code,
 
  note, add_user, update_user)
    VALUES
     ('" . $_POST["name"] . "','" . $_POST["number"] .
      "','" . $_POST["note"] . "'," . $_SESSION["id"] 
            ."," . $_SESSION["id"] . ");";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

mysqli_close($conn);

header("Location: ./listMaterials.php");

ob_flush();

?>
