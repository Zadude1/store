<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';



if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();

$sql = "SELECT 
withdrawnstudent.id_s,withdrawnstudent.name,withdrawnstudent.number,withdrawnstudent.secret,withdrawnstudent.phone1,
withdrawnstudent.phone2,withdrawnstudent.av,withdrawnstudent.graduation,
withdrawnstudent.motherName,withdrawnstudent.sum,withdrawnstudent.phoneCon,withdrawnstudent.userName,
withdrawnstudent.password,
withdrawnstudent.Email,branch.branch,city.city,college.college,round.round,
gate.gate,chanel.chanel,payment.id_m,payment.dis,withdrawnstudent.note , withdrawnstudent.college_id 
FROM withdrawnstudent
INNER JOIN branch
ON withdrawnstudent.branch_id = branch.branch_id
INNER JOIN college
ON withdrawnstudent.college_id = college.college_id
INNER JOIN city
ON withdrawnstudent.city_id = city.city_id
INNER JOIN round
ON withdrawnstudent.round_id = round.round_id
INNER JOIN gate
ON withdrawnstudent.gate_id = gate.gate_id
INNER JOIN chanel
ON withdrawnstudent.chanel_id = chanel.chanel_id
left JOIN payment 
on withdrawnstudent.id_s = payment.id_s  ;";

// if ($_SESSION['type'] == '6') {
//     $sql .= " where  student.college_id = '" . $_SESSION['college_id']  . "'  ;";
//     # code...
// }
$result = $conn->query($sql);


$conn->close();

?>
