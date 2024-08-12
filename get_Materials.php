<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';



if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();

$sql = "SELECT 
*
 FROM materials  ";


$sql .= " ORDER BY materials.c_date  DESC  ;";

$result = $conn->query($sql);


$conn->close();

?>
