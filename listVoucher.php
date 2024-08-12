<?php
session_start();
if (isset($_SESSION['type'])) {
  if($_SESSION['type'] == '1' || $_SESSION['type'] == '3'  || $_SESSION['type'] == '5' ){
  
  }
  else{
    header("Location: ../welcome");
  
  }
} else {
  header("Location: ../login");
}

define('TITLE', "قائمة مستندات الاستلام");
include '../assets/layouts/header.php';
include  'get_Voucher.php';
check_verified();

?>


<main role="main">
<?php insert_csrf_token();


?>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> قائمة مستندات الصرف</h1>
            <p class="text-muted">
            </div>
            <form>

            <div class="form-row">
        <div class="form-group col-md-12">
          <a href="./addVoucher.php " class="btn btn-info edit_popup" role="button">اضافة مستند صرف</a>
        </div>
      </div>

 
  <!--Table-->
<table  id="example" class="display nowrap" width="100%"> 

<!--Table head-->
<thead>
  <tr>
  <th>اجراءات</th>
    <th>#</th>
    <th>رقم م</th>
    <th>تاريخ م</th>
    <th>تاريخ الوصول</th>
    <th>رقم الطلبية</th>
    <th>تاريخ الطلبية</th>
    <th>قيمة دينار</th>
    <th>قيمة دولار</th>
    <th> مستخدم</th>
    <th>مستخدم</th>
    <th>ملاحظات</th>
    <th>رقم تسلسلي للمجهز</th>
    <th> تاريخها</th>
    <th>عضو 1</th>
    <th>عضو 2</th>
    <th>عضو 3</th>
    <th>عضو 4</th>
    <th>المحافظة</th>
    <th>المعدل</th>
    <th>رئيس اللجنة</th>
  

  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
<?php
if ($exchanges->num_rows > 0) {
    // output data of each row
    while ($row = $exchanges->fetch_assoc()) {

        ?>

  <tr class="table-info">
  <td>
  <a href="./VDisplay.php?id=<?php echo $row['id_e']?> "
  class="btn btn-info edit_popup" 
  role="button">عرض</a>
  </span> &nbsp;
  <a href="./VDisplay.php?id=<?php echo $row['id_e']?> "
  class="btn btn-danger delete_action" 
  role="button">تعديل</a>
  </span> &nbsp;
  <a href="./VDisplay.php?id=<?php echo $row['id_e']?> "
  class="btn btn-warning edit_popup " 
  role="button">طبع</a>
  
  </td>
  <th scope="row"><?php $row['id_e']?><?php echo $row['id_e'] ?></th>
  <td><?php echo $row['number_e'] ?></td>  
  <td><?php echo $row['date_e'] ?></td>
    <td><?php echo $row['account_number']?></td>
    <td><?php echo $row['receipt_name']?></td>
    <td><?php echo $row['receipt_date']?></td>
    <td><?php echo $row['number_parag']?></td>
    <td><?php echo $row['writing']?></td>
    <td><?php echo $row['add_user']?></td>
    <td><?php echo $row['update_user']?></td>
    <td><?php echo $row['c_date']?></td>
    <td><?php echo $row['u_date']?></td>
    <td><?php echo $row['note']?></td>
    <td><?php echo $row['authorized']?></td>
    <td><?php echo $row['Responsible']?></td>
    <td><?php echo $row['Responsible']?></td>
    <td><?php echo $row['Responsible']?></td>
    <td><?php echo $row['Responsible']?></td>
    <td><?php echo $row['Responsible']?></td>
    <td><?php echo $row['Responsible']?></td>
    
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
