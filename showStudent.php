<?php

define('TITLE', "تعديل البيانات");
include '../assets/layouts/header.php';

check_verified();
include 'get_data_student.php';

?>

<main role="main">
<?php insert_csrf_token();

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    ?>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> واجهة عرض بيانات الطالب</h1>
            <p class="text-muted">
</div>

            <form action="add_data.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">الاسم الرباعي الكامل</label>
      <input type="text" class="form-control" id="name" value= <?php echo $row['name'] ?>
       name="name" placeholder="الاسم الكامل">
    </div>
    <div class="form-group col-md-4">
      <label for="branch">فرع التخرج</label>
      <select id="branch" name="branch" class="form-control">

        <?php
while ($branchrow = $branch->fetch_assoc()) {

        ?>
        <option value="<?php echo $branchrow["branch_id"]; ?>"
        <?php if ($branchrow["branch_id"] == $row["branch_id"]) {echo "selected";}?>
         ><?php echo $branchrow["branch"]; ?></option>
         <?php }?>
      </select>

    </div>
    <div class="form-group col-md-4">
      <label for="number">الرقم الامتحاني</label>
      <input type="text" class="form-control" id="number"
      name="number" placeholder="22021"  value= <?php echo $row['number'] ?>>
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="secret">الرقم السري</label>
    <input type="text" class="form-control" 
    id="secret" name="secret" placeholder="435623434" value= <?php echo $row['secret'] ?>>
  </div>
  <div class="form-group col-md-4">
    <label for="phone1">رقم الهاتف 1</label>
    <input type="text" class="form-control" 
    id="phone1" name="phone1" placeholder="07800000000" value= <?php echo $row['phone1'] ?>>
  </div>
  <div class="form-group col-md-4">
    <label for="phone2">رقم الهاتف 2</label>
    <input type="text" class="form-control" 
    id="phone2"  name="phone2" placeholder="07800000000" value= <?php echo $row['phone2'] ?>>
  </div>
  </div>

  <div class="form-row">

  <div class="form-group col-md-4">
      <label for="Email">الايميل</label>
      <input type="email" class="form-control"
       id="Email" name="Email" placeholder="الايميل"  value= <?php echo $row['Email'] ?>>
    </div>
    <div class="form-group col-md-4">
      <label for="motherName">اسم الام</label>
      <input type="text" class="form-control"
       id="motherName" name="motherName"  value= <?php echo $row['motherName'] ?>>
    </div>
    <div class="form-group col-md-4">
      <label for="college">الكلية</label>
      <select id="college" name="college" class="form-control">

      <?php
while ($collegerow = $college->fetch_assoc()) {

        ?>
        <option value="<?php echo $collegerow["college_id"]; ?>"
        <?php if ($collegerow["college_id"] == $row["college_id"]) {echo "selected";}?>
         ><?php echo $collegerow["college"]; ?></option>
         <?php }?>


      </select>
    </div>
</div>

    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="city">المحافظة</label>
      <select id="city" name="city" class="form-control">


      <?php
          while ($cityrow = $city->fetch_assoc()) {

        ?>
        <option value="<?php echo $cityrow["city_id"]; ?>"
        <?php if ($cityrow["city_id"] == $row["city_id"]) {echo "selected";}?>
         ><?php echo $cityrow["city"]; ?></option>
         <?php }?>


      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="av">المعدل</label>
      <input type="number" class="form-control"
       id="av" name="av" placeholder="100"  value= <?php echo $row['av'] ?>>
    </div>
    <div class="form-group col-md-4">
      <label for="sum">المجموع</label>
      <input type="number" class="form-control"
       id="sum" name="sum" placeholder="600"  value= <?php echo $row['sum'] ?>>
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="round">الدور</label>
      <select id="round" name="round" class="form-control">

      <?php
        while ($roundrow = $round->fetch_assoc()) {

        ?>
        <option value="<?php echo $roundrow["round_id"]; ?>"
        <?php if ($roundrow["round_id"] == $row["round_id"]) {echo "selected";}?>
         ><?php echo $roundrow["round"]; ?></option>
         <?php }?>

      </select>
    </div>
  <div class="form-group col-md-4">
    <label for="phoneCon">رقم الهاتف المتربط بالحساب</label>
    <input type="text" class="form-control"
     id="phoneCon" name="phoneCon" placeholder="07800000000"  value= <?php echo $row['phoneCon'] ?>>
  </div>
  <div class="form-group col-md-4">
    <label for="userName">اسم المستخدم</label>
    <input type="text" class="form-control"
     id="userName" name="userName" placeholder="Mohamed_Ali"  value= <?php echo $row['userName'] ?>>
  </div>
  </div>


  <div class="form-row">

  <div class="form-group col-md-4">
    <label for="password">باسورد</label>
    <input type="text" class="form-control"
     id="password" name="password" placeholder="07800000000"  value= <?php echo $row['password'] ?>>
  </div>

    <div class="form-group col-md-4">
      <label for="gate">البوابة</label>
      <select id="gate" name="gate" class="form-control">


      <?php
          while ($getrow = $get->fetch_assoc()) {

        ?>
        <option value="<?php echo $getrow["gate_id"]; ?>"
        <?php if ($getrow["gate_id"] == $row["gate_id"]) {echo "selected";}?>
         ><?php echo $getrow["gate"]; ?></option>
         <?php }?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="chanel">قناة القبول</label>
      <select id="chanel" name="chanel" class="form-control">

            
      <?php
          while ($chanelrow = $chanel->fetch_assoc()) {

        ?>
        <option value="<?php echo $chanelrow["chanel_id"]; ?>"
        <?php if ($chanelrow["chanel_id"] == $row["chanel_id"]) {echo "selected";}?>
         ><?php echo $chanelrow["chanel"]; ?></option>
         <?php }?>
      </select>
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-4">
    <label for="graduation">سنة التخرج</label>
    <input type="text" class="form-control"
     id="graduation" name="graduation" placeholder="2020_2021"  value= <?php echo $row['graduation'] ?>>
  </div>
    <div class="form-group col-md-8">
      <label for="note">الملاحظات</label>
      <input type="text" class="form-control"
       id="note" name="note" value= <?php echo $row['note'] ?>>
    </div>
    </div>



 


  <?php

} else {
    echo "0 results";
}
?>



  
</form>

</main>




    <?php

include '../assets/layouts/footer.php'

?>
