<?php
session_start();

if (isset($_SESSION['type'])) {
  if ($_SESSION['type'] == '1' || $_SESSION['type'] == '4' || $_SESSION['type'] == '6' || $_SESSION['type'] == '3') {
  } else {
    header("Location: ../welcome");
  }
} else {
  header("Location: ../login");
}

define('TITLE', "تعديل البيانات");
include '../assets/layouts/header.php';

check_verified();
include 'get_MaterialForUpdate.php';

?>


<main role="main">
  <?php insert_csrf_token();



  if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

  ?>

    <section class="jumbotron text-center py-5">
      <div class="container">
        <h1 class="jumbotron-heading mb-4"> واجهة تعديل بيانات المواد</h1>
        <p class="text-muted">
      </div>

      <form action="update_MateralSql.php" method="post">


        <div class="form-row">


          <div class="form-group col-md-4">
            <label for="name">اسم المادة</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم الكامل" value=<?php echo $row['name'] ?> required>
          </div>
          <div class="form-group col-md-8">
            <label for="code"> الكود </label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Emp-1001" value=<?php echo $row['code'] ?>>
          </div>
          <input type="hidden" id="id_m" value=<?php echo $row['id_m'] ?> name="id_m">

        </div>

        <div class="form-row">

          <div class="form-group col-md-12">
            <label for="note">الملاحظات</label>
            <input type="text" class="form-control" id="note" name="note" value=<?php echo $row['note'] ?>>
          </div>
        </div>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
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



      <button type="submit" class="btn btn-warning edit_popup">تعديل</button>
      </form>

</main>




<?php

include '../assets/layouts/footer.php'

?>