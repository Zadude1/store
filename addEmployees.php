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
      <h1 class="jumbotron-heading mb-4"> واجهة ادخال الموظفين</h1>
      <p class="text-muted">
    </div>

    <form action="add_Employees.php" method="post">
      <div class="form-row">
        

        <div class="form-group col-md-4">
          <label for="name">الاسم الرباعي الكامل</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="الاسم الكامل" required>
        </div>
        <div class="form-group col-md-4">
          <label for="number"> الكود الوظيفي</label>
          <input type="text" class="form-control" id="number" name="number" placeholder="Emp-1001">
        </div>
        <div class="form-group col-md-4">
          <label for="birthday"> مواليد </label>

          <input type="date" class="form-control" id="birthday" name="birthday">
        </div>

      </div>

      


      <div class="form-row">

        <div class="form-group col-md-4">
          <label for="phone1">رقم الهاتف 1</label>
          <input type="text" class="form-control" id="phone1" name="phone1" placeholder="07800000000" required>
        </div>
        <div class="form-group col-md-4">
          <label for="phone2">رقم الهاتف 2</label>
          <input type="text" class="form-control" id="phone2" name="phone2" placeholder="07800000000">
        </div>
        <div class="form-group col-md-4">
          <label for="Email">الايميل</label>
          <input type="email" class="form-control" id="Email" name="Email" placeholder="الايميل">
        </div>
      </div>

      <div class="form-row">


        <div class="form-group col-md-4">
          <label for="motherName">اسم الام</label>
          <input type="text" class="form-control" id="motherName" name="motherName">
        </div>
        <div class="form-group col-md-4">
          <label for="college">الكلية</label>
          <select id="college" name="college" class="form-control">
          <option value="1" selected>رئاسة الجامعة </option>
            <option value="2" selected>الطب البشري</option>
            <option value="3">طب الاسنان</option>
            <option value="4">الصيدلة</option>
            <option value="5">تقنيات التخدير </option>
            
            <option value="6">تقنيات الاشعة </option>
           
            <option value="7">تقنيات المختبرات </option>
           
            <option value="8">تقنيات صناعة الاسنان </option>
            
            <option value="9">تقنيات البصريات </option>
            
            <option value="10">هندسة النفط </option>
            
            <option value="11">هندسة الحاسوب </option>
            
            <option value="12">هندسة الاجهزة الطبية </option>
            
            <option value="13"> التربية البدنية و علوم الرياضة </option>
            
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="city">المحافظة</label>
          <select id="city" name="city" class="form-control">
            <option value="1" selected>ذي قار</option>
            <option value="2">البصرة</option>
            <option value="3">بغداد</option>
            <option value="4">المثنى</option>
            <option value="5">ميسان</option>
            <option value="6">القادسية</option>
            <option value="7">واسط</option>
            <option value="8">النجف</option>
            <option value="9">كربلاء</option>
            <option value="10">بابل</option>
            <option value="11">ديالى</option>
            <option value="12">الرمادي</option>
            <option value="13">صلاح الدين</option>
            <option value="14">كركوك</option>
            <option value="15">الموصل</option>
            <option value="16">السليمانية</option>
            <option value="17">اربيل</option>
            <option value="18">دهوك</option>
            <option value="19">خارج العراق</option>
          </select>
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