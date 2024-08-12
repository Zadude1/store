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

define('TITLE', "ادخال البيانات");
//include '../assets/layouts/header.php';
//check_verified();
include 'get_ReceiptDetail.php';
?>

<?php
if ($receipt->num_rows > 0) {
  // output data of each row
  while ($row = $receipt->fetch_assoc()) {

?>

    <?php


    include 'class/settings.php';

    $db = new Settings();
    $read = $db->read("receipt_details", $row['id_r']);
    ?>

    <div class="container">
      <div class="row">
        <div class="alert alert-danger body_message" style="display:none;"></div>




        <form action="">
          <div class="form-row">
            <div class="form-group col-md-12">
              <a href="./listReceipt.php " class="btn btn-info " role="button"> قائمة مستندات الاستلام</a>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="number_r">رقم المستند</label>
              <input type="text" class="form-control" id="number_r" value=<?php echo $row['number_r'] ?> name="number_r">
            </div>
            <div class="form-group col-md-4">
              <label for="date_r"> تاريخ المستند</label>
              <input type="text" class="form-control" id="date_r" value=<?php echo $row['date_r'] ?> name="date_r">

            </div>
            <div class="form-group col-md-4">
              <label for="order_number">رقم الطلب </label>
              <input type="text" class="form-control" id="order_number" name="order_number" value=<?php echo $row['order_number'] ?>>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="id_r">معرف المستند</label>
              <input type="text" class="form-control" id="id_r" value=<?php echo $_SESSION["last_id"] ?> name="id_r">
            </div>
            <div class="form-group col-md-4">
              <label for="date_r"> تاريخ المستند</label>
              <input type="text" class="form-control" id="date_r" value=<?php echo $row['date_r'] ?> name="date_r">

            </div>
            <div class="form-group col-md-4">
              <label for="order_number">رقم الطلب </label>
              <input type="text" class="form-control" id="order_number" name="order_number" value=<?php echo $row['order_number'] ?>>
            </div>
          </div>
          <input id="id_rA" name="id_rA" type="hidden" value=<?php echo $row["id_r"]; ?>>



      <?php }
  } ?>
        </form>
      </div>



      <div class="col-lg-12 col-md-12 col-sm-12" align="right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">اضافة</button>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <table id="example" class="table table-bordered table-striped"  width="100%">  
          <thead>
            <tr>
              <th>ت</th>
              <th>المادة</th>
              <th>تفاصيل المادة</th>
              <th>وحدة القياس</th>
              <th>وحدات ك م</th>
              <th>كسور ك م </th>
              <th> ك م وحدات</th>
              <th> ك م كسور</th>
              <th>القيمة دينار</th>
              <th>وحدات </th>
              <th>القيمة م كتابة</th>
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
                  <td><?= $row["quan_unite1"] ?></td>
                  <td><?= $row["quan_frac1"] ?></td>
                  <td><?= $row["quan_unite2"] ?></td>
                  <td><?= $row["quan_frac2"] ?></td>
                  <td><?= $row["price"] ?></td>
                  <td><?= $row["units"] ?></td>
                  <td><?= $row["quan_receiv"] ?></td>
                  <td>
                    <button type="button" class="btn btn-warning edit_popup" data-id="<?= $row['id_rd'] ?>" data-toggle="modal" data-target="#editModal">Edit</button></span> &nbsp;
                    <button type="button" class="btn btn-danger delete_action" data-id="<?= $row['id_rd'] ?>">حذف</button>
                  </td>
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




    <?php require_once 'inc/footer.php'; ?>
    <?php

    //include '../assets/layouts/footer.php'

    ?>