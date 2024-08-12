<?php
session_start();
if (isset($_SESSION['type'])) {
  if ($_SESSION['type'] == '1' || $_SESSION['type'] == '4'  || $_SESSION['type'] == '3') {
  } else {
    header("Location: ../welcome");
  }
} else {
  header("Location: ../login");
}

define('TITLE', "ادخال البيانات");
include '../assets/layouts/header.php';
check_verified();

?>


<main role="main">
  <?php insert_csrf_token(); ?>

  <section class="jumbotron text-center py-5">
    <div class="container">
      <h1 class="jumbotron-heading mb-4"> واجهة ادخال المواد</h1>
      <p class="text-muted">
    </div>

    <form action="add_Materials.php" method="post">
      <div class="form-row">
        

        <div class="form-group col-md-4">
          <label for="name">اسم  المادة</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="الاسم الكامل" required>
        </div>
        <div class="form-group col-md-8">
          <label for="number"> الكود </label>
          <input type="text" class="form-control" id="number" name="number" placeholder="Emp-1001">
        </div>
       

      </div>

      


     

      

     

     
        


      <div class="form-row">
        
        <div class="form-group col-md-12">
          <label for="note">الملاحظات</label>
          <input type="text" class="form-control" id="note" name="note">
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






      <button type="submit" class="btn btn-primary">أضافة</button>
    </form>

</main>




<?php

include '../assets/layouts/footer.php'

?>