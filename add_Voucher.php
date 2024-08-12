<?php

ob_start();

session_start();

require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;




if ($_SERVER["REQUEST_METHOD"] == "POST") {




    $sql = "INSERT INTO exchange(number_e,date_e,account_number,receipt_name,
     receipt_date, number_parag, writing, add_user, update_user,
     note,Responsible , authorized ) VALUES
     ('" . $_POST["number_e"] . "','" . $_POST["date_e"] . "','" . $_POST["account_number"] .
        "','" . $_POST["receipt_name"] . "','" . $_POST["receipt_date"] .
        "','" . $_POST["number_parag"] .
        "','" . $_POST["writing"] . "','" . $_SESSION["id"] .
        "','" . $_SESSION["id"] . "','" . $_POST["note"] .
        "','" . $_POST["Responsible"] . "','" . $_POST["authorized"] . "');";

    if (mysqli_query($conn, $sql)) {
        $last_id = $conn->insert_id;
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);


$_SESSION["last_idV"] = $last_id;


ob_flush();


?>

<form id="myForm" action="addVoucherDetail.php" method="post">
    <?php
    foreach ($_POST as $a => $b) {
        echo '<input type="hidden" name="' . htmlentities($a) . '" value="' . htmlentities($b) . '">';
    }
    echo '<input type="hidden" name="last_id" value="' . htmlentities($last_idV) . '">';
    ?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>