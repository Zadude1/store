<?php
ob_start();
session_start();

require '../assets/setup/env.php';
require '../assets/setup/db.inc.php';
require '../assets/includes/auth_functions.php';
require '../assets/includes/security_functions.php';

if (isset($_SESSION['auth'])) {
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;
}

generate_csrf_token();
check_remember_me();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $sql = "INSERT INTO deletstudent (SELECT * FROM student where id_s=" . $_POST["id"] . ");";

    if (mysqli_query($conn, $sql)) {
        echo "Record insert successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    $sql = "UPDATE deletstudent SET update_user='" . $_SESSION["id"] . "',

        u_date='" . date('Y-m-d H:i:s') . "'
          where id_s= " . $_POST["id"] . ";";

    if (mysqli_query($conn, $sql)) {
        echo " record UPDATE successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 


     echo (" status1 ".$_POST['status1']." status2 ".$_POST['status2']."  status3 ".$_POST['status3']);
    
  
    echo (" status1 ".isset($_POST['status1'])." status2 ".isset($_POST['status2'])."  status3 ".isset($_POST['status3']));
     
     foreach ($_POST as $key => $value) {
        
        echo "  ";
        echo $key;
        echo " ";
       
        echo $value;
        echo "  ";
        echo "  ";
    } 
    
   

    
$stat1=0;
$stat2=0;
$stat3=0;
echo  " befor stat   ". $stat1 ;
echo  " befor stat   ". $stat2 ;
echo  " befor stat   ". $stat3 ;

if(($_SESSION["type"] == '4'  || $_SESSION["type"] == '1' ) && !isset($_POST['status1']) )
{
    $stat1=1;
    
    echo  " in 1 stat   ". $stat1 ;
}

if(($_SESSION["type"] == '3' || $_SESSION["type"] == '1' ) && !isset($_POST['status2'])  && $_POST['s1']== '1' )
{
    $stat2=1;
    echo  " in 2 stat   ". $stat2 ;
}


if(($_SESSION["type"] == '4' || $_SESSION["type"] == '1' ) && !isset($_POST['status3'])  && $_POST['s2']== '1'  )
{
    $stat3=1;
    echo  " in 3 stat   ". $stat3 ;
}

echo  " after all stat1   ". $stat1 ;
echo  " after all stat2   ". $stat2 ;
echo  " after all stat3   ". $stat3 ;

echo  " _SESSION id   ". $_SESSION["type"] ;

    if ($stat3 == 1){

        $sql = "INSERT INTO withdrawnstudent (SELECT * FROM student where id_s=" . $_POST["id"] . ");";

        if (mysqli_query($conn, $sql)) {
            echo "Record insert successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        $sql = "UPDATE withdrawnstudent SET update_user='" . $_SESSION["id"] . "',

        u_date='" . date('Y-m-d H:i:s') . "'
        where id_s= " . $_POST["id"] . ";";

        if (mysqli_query($conn, $sql)) {
            echo " record UPDATE successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

       


    }else{

        $sql = "UPDATE student SET
        number_id='". $_POST["number_id"] . "',
        name='" . $_POST["name"] . "',
        branch_id='" . $_POST["branch"] . "',number='" . $_POST["number"] . "',
        secret='" . $_POST["secret"] . "',birthday='" . $_POST["birthday"] 
        . "',phone1='" . $_POST["phone1"] . "',
        phone2='" . $_POST["phone2"] . "',Email='" . $_POST["Email"] . "',
        motherName='" . $_POST["motherName"] . "',college_id='" . $_POST["college"] . "',
        city_id='" . $_POST["city"] . "',av='" . $_POST["av"] . "',
        sum = '" . $_POST["sum"] . "',
        round_id='" . $_POST["round"] . "',phoneCon='" . $_POST["phoneCon"] . "',
        userName='" . $_POST["userName"] . "',password='" . $_POST["password"] . "',
        gate_id='" . $_POST["gate"] . "',chanel_id='" . $_POST["chanel"] . "',
        graduation='" . $_POST["graduation"] . "',note='" . $_POST["note"] . "',
        cash='" . $_POST["cash"] . "',select_c='" . $_POST["select_c"] . "',
        active_c='" . $_POST["active_c"]  . "',";

        if ($stat1==1) {
            $sql .= " status1='" . $stat1 . "',";
            # code...
        }

        if ($stat2==1) {
            $sql .= " status2='" . $stat2 . "',";
            # code...
        }


        $sql .= " update_user='" . $_SESSION["id"] . "',
        u_date='" . date('Y-m-d H:i:s') . "'  WHERE  id_s = " . $_POST["id"] . ";";

    } 

    if (mysqli_query($conn, $sql)) {
        echo "New record UPDATE successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

    mysqli_close($conn);
    header("Location: ./index.php");
    ob_flush();
}
