<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';



if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();

$sql = "SELECT 
*
 FROM employees
INNER JOIN city
ON employees.city_id = city.city_id
INNER JOIN college
ON employees.college_id = college.college_id  ";


$sql .= " ORDER BY employees.c_date  DESC  ;";

$result = $conn->query($sql);


$conn->close();

?>
