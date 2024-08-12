<?php



require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';


if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();



$sql ="SELECT COUNT(student.college_id) as number, student.college_id,college.college
 FROM student INNER JOIN college 
 ON student.college_id = college.college_id 
 GROUP BY student.college_id 
 ORDER BY student.college_id DESC";

$count = $conn->query($sql);


$sql ="SELECT COUNT(student.college_id) as number, student.college_id,college.college
FROM student
INNER JOIN college ON student.college_id = college.college_id

WHERE   DATE(student.c_date) =   DATE(now())

GROUP BY student.college_id

ORDER BY student.college_id DESC";

$count1 = $conn->query($sql);



$sql ="SELECT COUNT(withdrawnstudent.college_id) as number, withdrawnstudent.college_id,college.college
 FROM withdrawnstudent INNER JOIN college 
 ON withdrawnstudent.college_id = college.college_id 
 GROUP BY withdrawnstudent.college_id 
 ORDER BY withdrawnstudent.college_id DESC";

$count2 = $conn->query($sql);

$conn->close();
