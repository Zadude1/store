<form id="myForm" action="addReceiptDetail.php" method="post">
<?php
session_start();
    $last_id = $_GET['id'];
    $_SESSION["last_id"]=$last_id;
    ?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>