<form id="myForm" action="addVoucherDetail.php" method="post">
<?php
session_start();
    $last_id = $_GET['id'];
    $_SESSION["last_idV"]=$last_id;
    ?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>