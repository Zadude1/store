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

// Function to fetch and display purchase request details
function displayPurchaseRequest($conn, $id_pr) {
    global $ask_by, $member1, $member2, $admin, $beneficiary, $details, $total_sum;

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

    // Display the purchase request
    ?>
    <!DOCTYPE html>
    <html lang="ar">
    <head>
        <meta charset="UTF-8">
        <title>مستند طلب شراء</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            @media print {
                @page {
                    size: A4 landscape;
                    margin: 1cm;
                }
                .page-break {
                    page-break-before: always;
                }
            }
            .container {
                display: flex;
                justify-content: center;
                margin-bottom: 50px;
            }
            .left {
                width: 20%;
                padding-right: 20px;
            }
            .right {
                width: 80%;
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            .text-right {
                float: right;
                text-align: right;
                font-size: 24px;
                font-weight: bold;
                padding-top: 20px;
            }
            .title-center {
                text-align: center;
                font-size: 32px;
                margin-bottom: 20px;
            }
            .signature {
                font-size: 20px;
                margin-top: 10px;
                text-align: right;
            }
            .details-container {
                margin-top: 40px;
                padding: 20px;
                border: 1px solid #ddd;
                background-color: #f9f9f9;
                display: flex;
                justify-content: space-between; /* Ensure space between details and beneficiary */
            }
            .details-left {
                width: 100%; /* Make details table full-width */
                padding-right: 20px;
            }
            .beneficiary-container {
                margin-top: 20px;
                float: right;
                width: 100%;
            }
            .beneficiary-table {
                border-collapse: collapse;
                width: 100%;
            }
            .beneficiary-table th, .beneficiary-table td {
                padding: 6px 10px;
                border: 1px solid #ddd;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="page-break">
            <h1 class="title-center">مستند طلب شراء</h1>
            <div class="container">
                <div class="left">
                    <table>
                        <tr>
                            <th>العدد</th>
                            <th>التاريخ</th>
                        </tr>
                        <tr>
                            <td><?php echo $id_pr; ?></td>
                            <td><?php echo $row_basic["pr_date"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="right">
                <div class="text-right" style="text-align: right;">
    وزارة التعليم العالي والبحث العلمي
    <?php if ($ask_by) { ?>
        <div class="signature">جامعة العين العراقية</div>
        <div class="signature">السيد رئيس الجامعة المحترم : يرجى التفضل بالموافقة على شرائ المواد التالية.... مع التقدير</div>
        <div class="signature"><?php echo $ask_by; ?> منظم الطلب وتوقيعه</div>
    <?php } ?>
</div>

                </div>
            </div>
            
            <?php if ($member1 || $member2 || $admin) { ?>
                <div class="details">
                    <?php if ($member1) { ?><?php echo $member1; ?> عضو <br><?php } ?>
                    <?php if ($member2) { ?> <?php echo $member2; ?> عضو <br>  <?php } ?>
                    <?php if ($admin) { ?> <?php echo $admin; ?> رئيس اللجنة <?php } ?>
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
                                <td colspan="7" style="text-align: right; font-weight: bold;">المجموع الكلي:</td>
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
        </div>
    </body>
    </html>
    <?php

    // Clear details for the next iteration
    $details = [];
    $total_sum = 0;
}

// Check if id_pr or range (from_id, to_id) is provided in the URL
if (isset($_GET['id_pr'])) {
    $id_pr = intval($_GET['id_pr']);
    displayPurchaseRequest($conn, $id_pr);
} elseif (isset($_GET['from_id']) && isset($_GET['to_id'])) {
    $from_id = intval($_GET['from_id']);
    $to_id = intval($_GET['to_id']);
    
    // Display purchase requests in the range
    for ($id = $from_id; $id <= $to_id; $id++) {
        displayPurchaseRequest($conn, $id);
    }
} else {
    echo "Please provide valid id_pr or from_id/to_id parameters.";
}

$conn->close();
?>
