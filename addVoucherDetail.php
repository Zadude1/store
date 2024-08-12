



<?php
require_once 'inc/header.php';

session_start();
if (isset($_SESSION['type'])) {
  if ($_SESSION['type'] == '3' || $_SESSION['type'] == '2'  || $_SESSION['type'] == '1') {
  } else {
    header("Location: ../welcome");
  }
} else {
  header("Location: ../login");
}

define('TITLE', "ادخال تفاصيل مستند صرف");
//include '../assets/layouts/header.php';
//check_verified();
include 'get_VoucherDetail.php';
?>

<?php
    if ($receipt->num_rows > 0) {
      // output data of each row
      while ($row = $receipt->fetch_assoc()) {

    ?>
<?php


include 'class/apiVoucher.php';

$db = new apiVoucher();
$read = $db->read("exchange_details",$row['id_e']);
?>

<div class="">
  <div class="row">
    <div class="alert alert-danger body_message" style="display:none;"></div>



        <form action="">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="number_e">رقم المستند</label>
              <input type="text" class="form-control" id="number_e" value=<?php echo $row['number_e'] ?> name="number_e">
            </div>
            <div class="form-group col-md-4">
              <label for="date_e"> تاريخ المستند</label>
              <input type="text" class="form-control" id="date_e" value=<?php echo $row['date_e'] ?> name="date_e">

            </div>
            <div class="form-group col-md-4">
              <label for="order_number">رقم الطلب </label>
              <input type="text" class="form-control" id="account_number" name="account_number" value=<?php echo $row['account_number'] ?>>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="id_e">معرف المستند</label>
              <input type="text" class="form-control" id="id_e" value=<?php echo $_SESSION["last_idV"] ?> name="id_e">
            </div>
            <div class="form-group col-md-4">
              <label for="date_e"> تاريخ المستند</label>
              <input type="text" class="form-control" id="date_e" value=<?php echo $row['date_e'] ?> name="date_e">

            </div>
            <div class="form-group col-md-4">
              <label for="account_number">رقم الطلب </label>
              <input type="text" class="form-control" id="account_number" name="account_number" value=<?php echo $row['account_number'] ?>>
            </div>
          </div>
          <input id="id_rA" name="id_rA" type="hidden" value=<?php echo $row["id_e"]; ?>>


          
      <?php }
    } ?>
        </form>
  </div>



  <div class="col-lg-12 col-md-12 col-sm-12" 
  
  ="right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">اضافة</button></div>
  <div class="col-lg-12 col-md-12 col-sm-12">
    <table id="example"  class="table-primary" width="100%">
      <thead>
        <tr>
          <th>ت</th>
          <th>المادة</th>
          <th>تفاصيل المادة</th>
          <th>وحدة القياس</th>
          <th>الكمية المطلوبة كتابة</th>
          <th>وحدات ك م</th>
          <th>كسور ك م </th>
          <th> ك مصروف وحدات</th>
          <th> ك مصروف كسور</th>
          <th> المصروفة كتابة</th>
          <th>سعر الوحدة ف </th>
          <th>سعر الوحدة د</th>
          <th>القيمة الكلية ف</th>
          <th>القيمة الكلية د </th>
          <th>المستخدم اضافة</th>
          <th> تعديل</th>
          <th>اجراءات</th>

        </tr>
      </thead>
      <tbody>
        <?php
        if ($read) {
          $i = 1;
          while ($row = $read->fetch_assoc()) {
        ?>
            <tr>
              <td><?= $i ?></td>
              <td><?= $row["mater"] ?></td>
              <td><?= $row["code"] ?></td>
              <td><?= $row["measr"] ?></td>
              <td><?= $row["required_writing"] ?></td>
              <td><?= $row["quan_unite1"] ?></td>
              <td><?= $row["quan_frac1"] ?></td>
              <td><?= $row["quan_unite2"] ?></td>
              <td><?= $row["quan_frac2"] ?></td>
              <td><?= $row["price_units_f"] ?></td>
              <td><?= $row["price_units_d"] ?></td>
              <td><?= $row["price_all_f"] ?></td>
              <td><?= $row["price_all_d"] ?></td>
              <td><?= $row["spent_writing"] ?></td>
              <td><?= $row["add_user"] ?></td>
              <td><?= $row["update_user"] ?></td>
              <td><button type="button" class="btn btn-warning edit_popup" data-id="<?= $row['id_ed'] ?>" data-toggle="modal" data-target="#editModal">Edit</button></span> &nbsp; <button type="button" class="btn btn-danger delete_action" data-id="<?= $row['id_ed'] ?>">حذف</button></td>
            </tr>
          <?php $i++;
          }
        } else { ?>
          <tr>
            <td colspan="4" align="center" valign="middle">لا توجد قيود</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>




<?php require_once 'inc/footerVoucher.php'; ?>
<?php

//include '../assets/layouts/footer.php'

?>