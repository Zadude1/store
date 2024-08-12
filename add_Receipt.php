<?php

ob_start();

session_start();

require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;




if ($_SERVER["REQUEST_METHOD"] == "POST") {




    $sql = "INSERT INTO receipt(number_r,date_r,date_arrive,order_number,
     date_order, value_din, value_do, add_user, update_user,
     note,providerLN , date_pln ,member1,member2,member3,member4,memberch) VALUES
     ('" . $_POST["number_r"] . "','" . $_POST["date_r"] . "','" . $_POST["date_arrive"] .
        "','" . $_POST["order_number"] . "','" . $_POST["date_order"] .
        "','" . $_POST["value_din"] .
        "','" . $_POST["value_do"] . "','" . $_SESSION["id"] .
        "','" . $_SESSION["id"] . "','" . $_POST["note"] .
        "','" . $_POST["providerLN"] . "','" . $_POST["date_pln"] .
        "','" . $_POST["member1"] . "','" . $_POST["member2"] .
        "','" . $_POST["member3"] . "','" . $_POST["member4"] .
        "','" .  $_POST["memberch"] . "');";

    if (mysqli_query($conn, $sql)) {
        $last_id = $conn->insert_id;
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);


$_SESSION["last_id"] = $last_id;


ob_flush();


?>

<form id="myForm" action="addReceiptDetail.php" method="post">
    <?php
    foreach ($_POST as $a => $b) {
        echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
    }
    echo '<input type="hidden" name="last_id" value="' . htmlentities($last_id) . '">';
    ?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>