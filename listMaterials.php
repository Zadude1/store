<?php
session_start();
if (isset($_SESSION['type'])) {
  if ($_SESSION['type'] == '1' || $_SESSION['type'] == '3' || $_SESSION['type'] == '4'  || $_SESSION['type'] == '6') {
  } else {
    header("Location: ../welcome");
  }
} else {
  header("Location: ../login");
}


define('TITLE', "قائمة بيانات الموظفين");
include '../assets/layouts/header.php';
include 'get_Materials.php';
check_verified();

?>


<main role="main">
  <?php insert_csrf_token();



  ?>



  <section class="jumbotron text-center py-5">
    <div class="container">
      <h1 class="jumbotron-heading mb-4"> واجهة عرض بيانات المواد</h1>
      <p class="text-muted">
    </div>



    <form>


      <div class="form-row">
        <div class="form-group col-md-12">
          <a href="./addMaterials.php " class="btn btn-info edit_popup" role="button">اضافة مادة</a>
        </div>
      </div>





      <!--Table-->

      <table id="example" class="display nowrap" width="100%">

        <!--Table head-->
        <thead>
          <tr>
            <th>اجراءات</th>
            <th>#</th>
            <th>اسم المادة</th>
            <th>الكود التعريفي </th>
            <th> الملاحظات</th>
            <th> اسم المستخدم</th>
            <th>تحديث المستخدم</th>
            <th> وقت الاضافة</th>
            <th> اخر تعديل</th>


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

              <tr <?php





                  ?>>
                <td>
                  <a href="./updateMaterials.php?id=<?php echo $row['id_m'] ?> " class="btn btn-info edit_popup" role="button">عرض</a>
                  </span> &nbsp;
                  <a href="./updateMaterials.php?id=<?php echo $row['id_m'] ?> " class="btn btn-warning edit_popup" role="button">تعديل</a>
                  </span> &nbsp;
                  <a href="./updateMaterials.php?id=<?php echo $row['id_m'] ?> " class="btn btn-danger delete_action" role="button">حذف</a>

                </td>
                <th scope="row"><?php $row['id_m'] ?><?php echo $row['id_m'] ?></th>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['code'] ?></td>


                <td><?php echo $row['note'] ?></td>
                <td><?php echo $row['add_user'] ?></td>
                <td><?php echo $row['update_user'] ?></td>
                <td><?php echo $row['c_date'] ?></td>
                <td><?php echo $row['u_date'] ?></td>




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