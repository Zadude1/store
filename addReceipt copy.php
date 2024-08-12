



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

define('TITLE', "ادخال البيانات");
include '../assets/layouts/header.php';
check_verified();
include 'get_emp.php';
?>


<main role="main">
  <?php insert_csrf_token();






  ?>

  <section class="jumbotron text-center py-5">
    <div class="container">
      <h1 class="jumbotron-heading mb-4"> واجهة ادخال البيانات مستند القبض</h1>
      <p class="text-muted">
    </div>
    <form action="add_Receipt.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="number_r">رقم المستند </label>
          <input type="text" class="form-control" id="number_r" name="number_r" placeholder="رقم المستند">
        </div>

        <div class="form-group col-md-4">
          <label for="date_r"> تاريخ المستند </label>

          <input type="date" class="form-control" id="date_r" name="date_r">
        </div>
        <div class="form-group col-md-4">
          <label for="date_arrive"> تاريخ الاستلام </label>

          <input type="date" class="form-control" id="date_arrive" name="date_arrive">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="order_number">رقم طلب الشراء</label>
          <input type="text" class="form-control" id="order_number" name="order_number" placeholder="100">
        </div>
        <div class="form-group col-md-4">
          <label for="date_order"> تاريخ طلب الشراء </label>

          <input type="date" class="form-control" id="date_order" name="date_order">
        </div>

        <div class="form-group col-md-4">
          <label for="value_din">القيمة الكلية بالدينار </label>
          <input type="text" class="form-control" id="value_din" name="value_din" required>
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="value_do">القيمة الكلية بالدولار </label>
          <input type="text" class="form-control" id="value_do" name="value_do" required>
        </div>

        <div class="form-group col-md-4">
          <label for="providerLN">رقم قائمة المجهز</label>
          <input type="text" class="form-control" id="providerLN" name="providerLN" required>
        </div>
        <div class="form-group col-md-4">
          <label for="date_pln"> تاريخها</label>
          <input type="date" class="form-control" id="date_pln" name="date_pln" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="note">الملاحظات</label>
          <input type="text" class="form-control" id="note" name="note">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="member1">عضو 1</label>
          <select id="member1" name="member1" class="form-control">

            <?php
            while ($employeesrow1 = $employees1->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow1["id_s"]; ?>"><?php echo $employeesrow1["name"]; ?></option>
            <?php } ?>


          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="member2">عضو 2</label>
          <select id="member2" name="member2" class="form-control">

            <?php
            while ($employeesrow2 = $employees2->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow2["id_s"]; ?>"><?php echo $employeesrow2["name"]; ?></option>
            <?php } ?>


          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="member3">عضو 3</label>
          <select id="member3" name="member3" class="form-control">

            <?php
            while ($employeesrow3 = $employees3->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow3["id_s"]; ?>"><?php echo $employeesrow3["name"]; ?></option>
            <?php } ?>


          </select>
        </div>


      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="member4">عضو 4</label>
          <select id="member4" name="member4" class="form-control">

            <?php
            while ($employeesrow1 = $employees4->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow1["id_s"]; ?>"><?php echo $employeesrow1["name"]; ?></option>
            <?php } ?>


          </select>
        </div>

        <div class="form-group col-md-4">
          <label for="memberch">رئيس اللجنة</label>
          <select id="memberch" name="memberch" class="form-control">

            <?php
            while ($employeesrow1 = $employees5->fetch_assoc()) {


            ?>
              <option value="<?php echo $employeesrow1["id_s"]; ?>"><?php echo $employeesrow1["name"]; ?></option>
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