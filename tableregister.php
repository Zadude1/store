<?php

define('TITLE', "عرض بيانات");
include '../assets/layouts/header.php';
check_verified();

?>



<main role="main">

    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading mb-4"> واجهة ادخال البيانات</h1>
            <p class="text-muted">

            <form class="switch" action="<?php echo URLROOT; ?>/admin/voyages/voyage-admin/updateLive" method="POST">
<table id="trips" class="table table-bordered text-secondary">
  <thead>
    <tr class="bg-msp-lightgrey">
      <th width="5%">
        Active
      </th>
      <th>
        Name
      </th>
      <th>
        Start
      </th>
      <th>
        End
      </th>
      <th>
        Type
      </th>
      <th class="text-center">
        Places
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['voyageData'] as $voyage): ?>
      <tr>
        <td class="text-center">
            <div class="custom-control custom-switch">
              <input value="1" type="checkbox" class="custom-control-input" name="<?php echo $voyage->voyage_id; ?>" id="<?php echo $voyage->voyage_id; ?>" <?php echo ($voyage->voyage_live) ? 'checked' : ''; ?>>
              <label class="custom-control-label" for="<?php echo $voyage->voyage_id; ?>"></label>
            </div>
        </td>
        <td>
          <?php echo ($voyage->voyage_featured == 1) ? '<i class="fas fa-star text-msp-orange"></i> ' : '<i class="fas fa-star text-msp-lightgrey"></i> ';
echo $voyage->voyage_name; ?>
        </td>
        <td data-sort="<?php echo date('Y-m-d', strtotime($voyage->voyage_startDate)); ?>">
          <?php echo date('jS M Y', strtotime($voyage->voyage_startDate)); ?>
        </td>
        <td data-sort="<?php echo date('Y-m-d', strtotime($voyage->voyage_endDate)); ?>">
          <?php echo date('jS M Y', strtotime($voyage->voyage_endDate)); ?>
        </td>
        <td>
          <?php echo $voyage->voyagetype_name; ?>
        </td>
        <td class="text-center">
          <?php echo $voyage->voyage_crewBerth; ?> | <?php echo $voyage->voyage_Afterguard; ?>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
  <tfoot>
    <tr class="bg-msp-lightgrey">
      <th>
        <button type="submit" class="btn btn-sm btn-msp-orange text-white">UPDATE</button>
      </th>
      <th colspan="5">

      </th>
    </tr>
  </tfoot>
</table>
</form>

    </div>

    </main>




    <?php

    include '../assets/layouts/footer.php'

    ?>