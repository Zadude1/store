<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ask_by = "";
$member1 = "";
$member2 = "";
$admin = "";
$details = [];
$total_sum = 0; // Initialize total sum variable
$beneficiary = "";

if (isset($_GET['id_pr'])) {
    $id_pr = intval($_GET['id_pr']);
    
    // Fetch basic data from purchase_request table
    $sql_basic = "SELECT id_pr, pr_date, ask_by, member1, member2, member_a, beneficiary FROM purchase_request WHERE id_pr = $id_pr";
    $result_basic = $conn->query($sql_basic);
    if ($result_basic->num_rows > 0) {
        $row_basic = $result_basic->fetch_assoc();
        $ask_by = $row_basic['ask_by'];
        $member1 = $row_basic['member1'];
        $member2 = $row_basic['member2'];
        $admin = $row_basic['member_a'];
        $beneficiary = $row_basic['beneficiary'];
    }

    // Fetch detailed data from purchase_request_details table
    $sql_details = "SELECT item, description, measurement_unit, quantity, cause, unit_cost FROM purchase_request_details WHERE id_pr = $id_pr";
    $result_details = $conn->query($sql_details);
    if ($result_details->num_rows > 0) {
        while ($row_details = $result_details->fetch_assoc()) {
            $row_details['total'] = $row_details['quantity'] * $row_details['unit_cost'];
            $total_sum += $row_details['total']; // Accumulate total sum
            $details[] = $row_details;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchase Requests</title>
    <link rel="stylesheet" type="text/css" href="stylenew.css">
    <link rel="stylesheet" type="text/css" href="stylepr.css">

</head>
<body>
    <h1 class="title-center">مستند طلب شراء</h1>
    <div class="container">
        <div class="left">
           
            <table>
                <tr>
                    <th>العدد</th>
                    <th>التاريخ</th>
                </tr>
                <?php
                if ($result_basic->num_rows > 0) {
                    echo "<tr><td>" . $row_basic["id_pr"] . "</td><td>" . $row_basic["pr_date"] . "</td></tr>";
                } else {
                    echo "<tr><td colspan='2'>No results found</td></tr>";
                }
                ?>
            </table>
        </div>
        <div class="right">
            <div class="text-right">
                وزارة التعليم العالي والبحث العلمي
                <?php if ($ask_by) { ?>
                    <div class="signature">جامعة العين العراقية</div>
                    <div class="signature">السيد رئيس الجامعة المحترم : يرجى التفضل بالموافقة على شرائ المواد التالية.... مع التقدير</div>
                    <div class="signature"> <?php echo $ask_by; ?>منظم الطلب وتوقيعه</div>

                <?php } ?>
                
            </div>
        </div>
    </div>
    <?php if ($member1 || $member2 || $admin) { ?>
                    <div class="details">
                        <?php if ($member1) { ?><?php echo $member1; ?> عضو <br><?php } ?>
                        <?php if ($member2) { ?> <?php echo $member2; ?> عضو <br>  <?php } ?>
                        <?php if ($admin) { ?> <?php echo $admin; ?> رئيس اللجنة <?php }  ?>
                    </div>
                <?php } ?>
    <div class="details-container">
        <div class="details-left">
            <?php if (!empty($details)) { ?>
                <table>
    <tr>
        <th>اجمال كلفة الفقرة </th>
        <th>الكلفة التخمينية للوحدة</th>
        <th>الغرض من الشراء</th>
        <th>الكمية المطلوبة رقما</th>
        <th>وحدة القياس</th>
        <th>مواصفاته</th>
        <th>اسم المادة</th>
        <th>ت</th>
    </tr>
    <?php 
    $counter = 1; // Initialize counter variable
    foreach ($details as $detail) { ?>
        <tr>
            <td><?php echo $detail['total']; ?></td>
            <td><?php echo $detail['unit_cost']; ?></td>
            <td><?php echo $detail['cause']; ?></td>
            <td><?php echo $detail['quantity']; ?></td>
            <td><?php echo $detail['measurement_unit']; ?></td>
            <td><?php echo $detail['description']; ?></td>
            <td><?php echo $detail['item']; ?></td>
            <td><?php echo $counter; ?></td>
        </tr>
    <?php 
    $counter++; // Increment counter for next row
    } ?>
    
    <tr class="total-sum-row">
        
        <td><?php echo number_format($total_sum, 2); ?></td>
        <td colspan="7" style="text-align: right; font-weight: bold;">Total Sum:</td>
    </tr>
</table>

            <?php } ?>
        </div>
    </div>
    
    <div class="beneficiary-container">
        <?php if ($beneficiary) { ?>
            <div style="margin-top: 20px;">
                <table class="beneficiary-table">
                    <tr>
                        <th>الموافقة على الشراء</th>
                        <th>تاييد توفر التخصيص المالي</th>
                        <th>تاييد توفر المادة في المخازن</th>
                        <th>Beneficiary <?php echo $beneficiary; ?></th>
                    </tr>
                    <tr>
                        <td>موافق</td>
                        <td>نؤيد توفر التخصيص المالي</td>
                        <td>عدم توفر المادة في المخازن</td>
                        <td>مصادقة الجهة المستفيدة على المواصفات</td>
                    </tr>
                </table>
            </div>
        <?php } ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
