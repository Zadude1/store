<?php
session_start();
if (isset($_SESSION['type'])) {
  if($_SESSION['type'] == '1' || $_SESSION['type'] == '4' || $_SESSION['type'] == '3' || $_SESSION['type'] == '2' ){
  
  }
  else{
    header("Location: ../welcome");
  }
} else {
  header("Location: ../login");
}

define('TITLE', "قائمة بيانات الطلبة");
include '../assets/layouts/header.php';
include 'get_dataFor_dashbord.php';
check_verified();

?>


<main role="main">
<?php insert_csrf_token();



?>



    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> واجهة عرض احصائية الطلبة</h1>
            <p class="text-muted">
            </div>

            

            <form>
 

  
  


  

  <!--Table-->
  
<table id="example" class="display nowrap" width="100%">

<!--Table head-->
<thead>
  <tr>
  
    <th>#</th>
    
    <th>العدد</th>
    
    <th>الكلية</th>
    

  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
<?php
if ($count->num_rows > 0) {
    // output data of each row
    $in=1;
    while ($row = $count->fetch_assoc()) {

        ?>

  <tr >
 

 
    <td><?php echo $in ?></td>
    <td><?php echo $row['number'] ?></td>
    <td><?php echo $row['college'] ?></td>
    <?php $in++ ?>
    <?php
}
} else {
    echo "0 results";
}
?>
  </tr>
  

</tbody>
<!--Table body-->


</table>
<!--Table-->

<div class="container">
            <h1 class="jumbotron-heading mb-4"> واجهة عرض احصائية المسجلين اليوم</h1>
            <p class="text-muted">
            </div>

<!--Table-->
  
<table id="example1" class="display nowrap" width="100%">

<!--Table head-->
<thead>
  <tr>
  
    <th>#</th>
    
    <th>العدد</th>
    
    <th>الكلية</th>
    

  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
<?php
if ($count1->num_rows > 0) {
    // output data of each row
    $in=1;
    while ($row = $count1->fetch_assoc()) {

        ?>

  <tr >
 

 
    <td><?php echo $in ?></td>
    <td><?php echo $row['number'] ?></td>
    <td><?php echo $row['college'] ?></td>
    <?php $in++ ?>
    <?php
}
} else {
    echo "0 results";
}
?>
  </tr>
  

</tbody>
<!--Table body-->


</table>
<!--Table-->








<!--Table-->

<div class="container">
            <h1 class="jumbotron-heading mb-4"> واجهة عرض احصائية المنسحبين</h1>
            <p class="text-muted">
            </div>

<!--Table-->
  
<table id="example2" class="display nowrap" width="100%">

<!--Table head-->
<thead>
  <tr>
  
    <th>#</th>
    
    <th>العدد</th>
    
    <th>الكلية</th>
    

  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
<?php
if ($count2->num_rows > 0) {
    // output data of each row
    $in=1;
    while ($row = $count2->fetch_assoc()) {

        ?>

  <tr >
 

 
    <td><?php echo $in ?></td>
    <td><?php echo $row['number'] ?></td>
    <td><?php echo $row['college'] ?></td>
    <?php $in++ ?>
    <?php
}
} else {
    echo "0 results";
}
?>
  </tr>
  

</tbody>
<!--Table body-->


</table>
<!--Table-->



</form>
</main>







    <?php

include '../assets/layouts/footer.php'
?>
