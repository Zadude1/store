<?php


session_start();
if (isset($_SESSION['type'])) {
  if ($_SESSION['type'] == '3' || $_SESSION['type'] == '2'  || $_SESSION['type'] == '1') {
  } else {
    header("Location: ../welcome");
  }
} else {
  header("Location: ../login");
}

define('TITLE', "ادخال مستند صرف");
include '../assets/layouts/header.php';
check_verified();
include 'get_emp.php';
?>


<main role="main">
  <?php insert_csrf_token();






  ?>

  <section class="jumbotron text-center py-5">
    <div class="container">
      <h1 class="jumbotron-heading mb-4"> واجهة ادخال البيانات مستند صرف</h1>
      <p class="text-muted">
    </div>
    <form action="add_Voucher.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="number_e">رقم المستند </label>
          <input type="text" class="form-control" id="number_e" name="number_e" placeholder="رقم المستند">
        </div>

        <div class="form-group col-md-4">
          <label for="date_e"> تاريخ المستند </label>

          <input type="date" class="form-control" id="date_e" name="date_e">
        </div>
        <div class="form-group col-md-4">
          <label for="account_number"> رقم الحساب </label>
          <input type="text" class="form-control" id="account_number" name="account_number">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="receipt_name"> اسم المستلم </label>
          <input type="text" class="form-control" id="receipt_name" name="receipt_name" placeholder="100">
        </div>
        <div class="form-group col-md-4">
          <label for="receipt_date">   تاريخ الاستلام </label>
          <input type="date" class="form-control" id="receipt_date" name="receipt_date">
        </div>

        <div class="form-group col-md-4">
          <label for="number_parag"> عدد الفقرات </label>
          <input type="text" class="form-control" id="number_parag" name="number_parag" required>
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="writing">عدد الفقرات كتابة   </label>
          <input type="text" class="form-control" id="writing" name="writing" required>
        </div>

        <div class="form-group col-md-4">
          <label for="note">الملاحظات </label>
          <input type="text" class="form-control" id="note" name="note" required>
        </div>
        
      </div>

      <div class="form-row">
       
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="Responsible">المسؤول</label>
          <select id="Responsible" name="Responsible" class="form-control">

            <?php
            while ($employeesrow1 = $employees1->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow1["id_s"]; ?>"><?php echo $employeesrow1["name"]; ?></option>
            <?php } ?>


          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="authorized">المخول</label>
          <select id="authorized" name="authorized" class="form-control">

            <?php
            while ($employeesrow2 = $employees2->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow2["id_s"]; ?>"><?php echo $employeesrow2["name"]; ?></option>
            <?php } ?>


          </select>
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






      <button type="submit" class="btn btn-primary">أضافة</button>
    </form>
</main>




<?php

include '../assets/layouts/footer.php'

?>