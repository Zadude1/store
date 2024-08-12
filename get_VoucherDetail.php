<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

$sql = "SELECT 
	id_e, materials.name as mater, materials.code, measr , quan_unite1, quan_frac1, quan_unite2, quan_frac2,
    price_units_f,price_units_d,price_all_f	,price_all_d, spent_writing	
 FROM exchange_details
INNER JOIN materials
ON exchange_details.id_m = materials.id_m
where exchange_details.id_e = " .$_SESSION["last_idV"]. ";";
$result = $conn->query($sql);


$sql = "SELECT * FROM exchange
INNER JOIN employees
ON exchange.Responsible = employees.id_s
where exchange.id_e = " .$_SESSION["last_idV"] . ";";
$receipt = $conn->query($sql);

$sql = "SELECT * FROM exchange
INNER JOIN employees
ON exchange.authorized = employees.id_s
;";
$exchanges = $conn->query($sql);

$sql = "SELECT * FROM employees";
$employees = $conn->query($sql);

$sql = "SELECT * FROM city";
$city = $conn->query($sql);

$sql = "SELECT * FROM college";
$college = $conn->query($sql);

$sql = "SELECT * FROM materials";
$materials = $conn->query($sql);

$sql = "SELECT * FROM materials";
$materialsEdit = $conn->query($sql);

/* $sql ="SELECT * FROM round";
$round = $conn->query($sql); */



$conn->close();
