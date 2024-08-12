<?php
require 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}

$username = $_SESSION['username'];
$account_type = $_SESSION['account_type'];

$buttons = ($account_type === 'admin') ? 10 : 5;
?>

<!DOCTYPE html>
<html>
<head>
    <title>برنامج ادارة المخازن</title>
    <link rel="stylesheet" type="text/css" href="admin_css.css">
</head>
<body>
    <header>
        <h1>برنامج ادارة المخازن</h1>
        <nav>
            <ul>
                <li><a href="logout.php">تسجيل الخروج</a></li>
            </ul>
        </nav>
    </header>
    <br>
        <br>
        <br>
       
        <br>
    <main>
        <h2>اهلا, <?php echo htmlspecialchars($username); ?></h2>
        
        <div class="button-container">
            <?php if ($_SESSION['account_type'] === 'admin'): ?>
                <!-- Show 10 buttons for admin -->
                <button onclick="location.href='add_pr.php';">اضافة طلب شراء</button>
                <button onclick="location.href='insert_grn_pr.php';">اضافة ادخال مخزني</button>
                <button onclick="location.href='voucher_insert.php';">اضافة مستند صرف مخزني</button>
                <button onclick="location.href='search_voucher_range.php';">طباعة مستند صرف حسب الرقم</button>
                <button onclick="location.href='search_voucher_date_range.php';">طباعة مستند صرف حسب التاريخ</button>
                <button onclick="location.href='search_pr_range.php';"> طباعة طلب شراء حسب الرقم</button>
                <button onclick="location.href='search_purchase_requests_dates.php';">طباعة طلب شراء حسب التاريخ</button>
                <button onclick="location.href='search_grn_range.php';">طباعة ادخال مخزني حسب الرقم   </button>
                <button onclick="location.href='search_grn_range_date.php';">طباعة ادخال مخزني حسب التاريخ</button>
                <button onclick="location.href='voucher_edit.php?voucher_id=1';">التعديل على مستند صرف مخزني</button>
                <button onclick="location.href='edit_pr.php?id_pr=1';">التعديل على طلب شراء</button>    
                <button onclick="location.href='edit_grn.php?grn_id=1';">التعديل على مستند ادخال مخزني</button>
                <button onclick="location.href='admin_dashboard.php';">اضافة مستخدم</button>
                <button onclick="location.href='add_item.php';">اضافة مادة جديدة</button>
                <button onclick="location.href='item_master_sheet.php';">ورقة استاذ المادة  </button>
                <button onclick="location.href='acc_n.php';"> اضافة رقم دليل محاسبي</button>
                <button onclick="location.href='item_name_update.php';"> تحديث اسم مادة - خاصية مؤقتة </button>

                <button onclick="location.href='pr_detail_search.php';">تقرير وبحث امر الشراء</button>
                <button onclick="location.href='search_detail_grn.php';"> تقارير و بحث عن ادخال مخزني </button>
                <button onclick="location.href='search_voucher.php';">تقارير مستندات الصرف </button>

                <button onclick="location.href='add_item.php';">اضافة موظف جديد</button>

            <?php elseif ($_SESSION['account_type'] === 'user1'): ?>
                <!-- Show 5 buttons for user1 -->
                <button onclick="location.href='add_pr.php';">اضافة طلب شراء</button>
                <button onclick="location.href='insert_grn_pr.php';">اضافة ادخال مخزني</button>

                <button onclick="location.href='voucher_insert.php';">اضافة مستند صرف مخزني</button>
                <button onclick="location.href='search_voucher_range.php';">طباعة مستند صرف حسب الرقم</button>
                <button onclick="location.href='search_voucher_date_range.php';">طباعة مستند صرف حسب التاريخ</button>
                <button onclick="location.href='search_pr_range.php';"> طباعة طلب شراء حسب الرقم</button>
                <button onclick="location.href='search_purchase_requests_dates.php';">طباعة طلب شراء حسب التاريخ</button>
                <button onclick="location.href='search_grn_range.php';">طباعة ادخال مخزني حسب الرقم   </button>
                <button onclick="location.href='search_grn_range_date.php';">طباعة ادخال مخزني حسب التاريخ</button>
                <button onclick="location.href='update_grn_members.php';">تحديث لجنة ادخال مخزني</button>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 done by: Ali Hussein Qasim Almufadl, and all rights reserved to Al Ayen Iraqi Univirsty</p>
        
    </footer>
</body>
</html>


