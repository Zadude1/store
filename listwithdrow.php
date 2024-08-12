<?php
session_start();
if (isset($_SESSION['type'])) {
  if($_SESSION['type'] == '1' || $_SESSION['type'] == '3' || $_SESSION['type'] == '4'  || $_SESSION['type'] == '6' ){
  
  }
  else{
    header("Location: ../welcome");
  
  }
} else {
  header("Location: ../login");
}


define('TITLE', "الطلبة المنسحبين  ");
include '../assets/layouts/header.php';
include 'get_dataWithdrow.php';
check_verified();

?>


<main role="main">
<?php insert_csrf_token();



?>



    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4">  الطلبة المنسحبين</h1>
            <p class="text-muted">
            </div>

            

            <form>
 

  <div class="form-row">
  <div class="form-group col-md-12">
  <a href="./inputData.php "
  class="btn btn-info edit_popup"
  role="button">اضافة طالب</a>
    </div>
    </div>
  


  

  <!--Table-->
  
<table id="example" class="display nowrap" width="100%">

<!--Table head-->
<thead>
  <tr>
  <th>اجراءات</th>
    <th>#</th>
    <th>الحالة </th>
    <th>الاسم</th>
    <th>فرع التخرج</th>
    <th>الرقم الامتحاني</th>
    <th>الرقم السري</th>
    <th>رقم الهاتف 1</th>
    <th>رقم الهاتف 2</th>
    <th>الايميل</th>
    <th>اسم الام</th>
    <th>الكلية</th>
    <th>المحافظة</th>
    <th>المعدل</th>
    <th>المجموع</th>
    <th>الدور</th>
    <th>رقم الحساب</th>
    <th>اسم المستخدم</th>
    <th>باسورد</th>
    <th>البوابة</th>
    <th>قناة القبول</th>
    <th>سنة التخرج</th>
    <th>الملاحظات</th>

  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
<?php
if ($result !== false && $result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        ?>

  <tr >
  <td>
  <a href="./showStudent.php?id=<?php echo $row['id_s'] ?> "
  class="btn btn-info edit_popup"
  role="button">عرض</a>
  </span> &nbsp;
  <a href="./updateData.php?id=<?php echo $row['id_s'] ?> "
  class="btn btn-warning edit_popup"
  role="button">تعديل</a>
  </span> &nbsp;
  <a href="./updateData.php?id=<?php echo $row['id_s'] ?> "
  class="btn btn-danger delete_action"
  role="button">حذف</a>

  </td>
    <th scope="row"><?php $row['id_s']?></th>
    <td><?php echo
        ($row['dis'] != null) ?
        "<i  class='fas fa-check-circle'
     style='font-size:24px;color:green'>
     </i>" : "<i  class='fas fa-times-circle'
      style='font-size:24px;color:red'></i>";
        ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['branch'] ?></td>
    <td><?php echo $row['number'] ?></td>
    <td><?php echo $row['secret'] ?></td>
    <td><?php echo $row['phone1'] ?></td>
    <td><?php echo $row['phone2'] ?></td>
    <td><?php echo $row['Email'] ?></td>
    <td><?php echo $row['motherName'] ?></td>
    <td><?php echo $row['college'] ?></td>
    <td><?php echo $row['city'] ?></td>
    <td><?php echo $row['av'] ?></td>
    <td><?php echo $row['sum'] ?></td>
    <td><?php echo $row['round'] ?></td>
    <td><?php echo $row['phoneCon'] ?></td>
    <td><?php echo $row['userName'] ?></td>
    <td><?php echo $row['password'] ?></td>
    <td><?php echo $row['gate'] ?></td>
    <td><?php echo $row['chanel'] ?></td>
    <td><?php echo $row['graduation'] ?></td>
    <td><?php echo $row['note'] ?></td>
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
