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
include  'get_Receipt.php';
check_verified();

?>


<main role="main">
<?php insert_csrf_token();


?>

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> قائمة مستندات الاستلام</h1>
            <p class="text-muted">
            </div>
            <form>

            <div class="form-row">
        <div class="form-group col-md-12">
          <a href="./addReceipt.php " class="btn btn-info edit_popup" role="button">اضافة مستند استلام</a>
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
if ($receipts->num_rows > 0) {
    // output data of each row
    while ($row = $receipts->fetch_assoc()) {

        ?>

  <tr class="table-info">
  <td>
  <a href="./TDisplay.php?id=<?php echo $row['id_r']?> "
  class="btn btn-info edit_popup" 
  role="button">عرض</a>
  </span> &nbsp;
  <a href="./TDisplay.php?id=<?php echo $row['id_r']?> "
  class="btn btn-danger delete_action" 
  role="button">تعديل</a>
  </span> &nbsp;
  <a href="./TDisplay.php?id=<?php echo $row['id_r']?> "
  class="btn btn-warning edit_popup " 
  role="button">طبع</a>
  
  </td>
  <th scope="row"><?php $row['id_r']?><?php echo $row['id_r'] ?></th>
  <td><?php echo $row['number_r'] ?></td>  
  <td><?php echo $row['date_r'] ?></td>
    <td><?php echo $row['date_arrive']?></td>
    <td><?php echo $row['order_number']?></td>
    <td><?php echo $row['date_order']?></td>
    <td><?php echo $row['value_din']?></td>
    <td><?php echo $row['value_do']?></td>
    <td><?php echo $row['add_user']?></td>
    <td><?php echo $row['update_user']?></td>
    <td><?php echo $row['c_date']?></td>
    <td><?php echo $row['u_date']?></td>
    <td><?php echo $row['note']?></td>
    <td><?php echo $row['providerLN']?></td>
    <td><?php echo $row['date_pln']?></td>
    <td><?php echo $row['member1']?></td>
    <td><?php echo $row['member2']?></td>
    <td><?php echo $row['member3']?></td>
    <td><?php echo $row['member4']?></td>
    <td><?php echo $row['memberch']?></td>
    
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
