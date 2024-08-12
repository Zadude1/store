<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();


$sql = "SELECT * FROM student
INNER JOIN branch
ON student.branch_id = branch.branch_id
INNER JOIN college
ON student.college_id = college.college_id
INNER JOIN city
ON student.city_id = city.city_id
INNER JOIN round
ON student.round_id = round.round_id
INNER JOIN gate
ON student.gate_id = gate.gate_id
INNER JOIN chanel
ON student.chanel_id  = chanel.chanel_id 
where student.id_s = ".$_GET['id'].";";
$result = $conn->query($sql);

$sql ="SELECT * FROM branch";
$branch = $conn->query($sql);

$sql ="SELECT * FROM chanel";
$chanel = $conn->query($sql);

$sql ="SELECT * FROM city";
$city = $conn->query($sql);

$sql ="SELECT * FROM college";
$college = $conn->query($sql);

$sql ="SELECT * FROM gate";
$get = $conn->query($sql);

$sql ="SELECT * FROM round";
$round = $conn->query($sql);




$conn->close();
