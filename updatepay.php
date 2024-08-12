<?php
session_start();
if (isset($_SESSION['type'])) {
  if ($_SESSION['type'] == '1' || $_SESSION['type'] == '3' || $_SESSION['type'] == '5') {

  } else {
      header("Location: ../welcome");
  
  }
} else {
  header("Location: ../login");
}

define('TITLE', "تعديل اقساط");
include '../assets/layouts/header.php';
check_verified();
include 'get_pay_student.php';

?>



<main role="main">
<?php insert_csrf_token();




if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    ?>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> واجهة تعديل البيانات المالية</h1>
            <p class="text-muted">
            </div>
            <form action="update_pay.php" method="post">
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="name">الاسم الرباعي الكامل</label>
      <input type="text" class="form-control" id="name" value=" <?php echo $row['name'] ?>"
       name="name" placeholder="الاسم الكامل">
    </div>
    <input type="hidden" id="id" value= <?php echo $row['id_s'] ?>
       name="id">

    <div class="form-group col-md-6">
      <label for="college">اسم الكلية</label>
      <input type="text" class="form-control" id="college"
      name="college" value= '<?php echo $row['college'] ?>'
      >
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="av">المعدل</label>
    <input type="text" class="form-control" id="av"
    name="av" value= <?php echo $row['av'] ?>
     >
  </div>
  <div class="form-group col-md-6">
    <label for="graduation">فرع التخرج</label>
    <input type="text" class="form-control" id="graduation"
    name="graduation" value= '<?php echo $row['graduation'] ?>'
     >
  </div>

  </div>

  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="money">القسط الكلي</label>
    <input type="text" class="form-control" id="money"
    name="money" value= <?php echo $row['money'] ?>
     >
  </div>

  <div class="form-group col-md-4">
      <label for="dis">التخفيظ</label>
      <input type="etextmail" class="form-control" id="dis"
      name="dis" value= <?php echo $row['dis'] ?>
       >
    </div>
    <div class="form-group col-md-4">
      <label for="pay">المدفوع الان</label>
      <input type="text" class="form-control" id="pay"
      name="pay" value= <?php echo $row['pay'] ?>
       >
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="note">الملاحظات</label>
      <input type="text" class="form-control" id="note"
      name="note" value= '<?php echo $row['paymentnote'] ?>'>
    </div>
    </div>



  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        تم التدقيق من قبلي
      </label>
    </div>
  </div>



  <?php

} else {
    echo "0 results";
}
?>


  <button type="submit" class="btn btn-warning edit_popup" >تعديل</button>
</form>


</main>




    <?php

include '../assets/layouts/footer.php'

?>