<?php
    session_start();

    include('./control.php');
    include('./helper.php');
    if (empty($_SESSION['name']))
        header('location: ./login.php');
    else {
        $revenueEachDay = @getRevenueEachDay($conn);
        $revenueEachMonth = @getRevenueEachMonth($conn);
        $date = date('Y-m-d');
        $month = date('m');
        $year = date('Y');
        if (isset($_GET['filter-day'])) {
            $date = $_GET['date'];
            $revenueEachDay = @getRevenueByDate($conn, $date);
        } elseif (isset($_GET['filter-month-year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $revenueEachMonth = @getRevenueByMonthYear($conn, $month, $year);
        }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
    <header class="header">
        <section class="flex">
            <a href="./index.php" class="logo">Admin<span>Panel</span></a>
            <nav class="navbar">
                <div class="navbar-item">
                    <a href="./index.php">Trang chủ</a>
                </div>
                <div class="navbar-item">
                    <a href="./product.php">Sản phẩm</a>
                </div>
                <div class="navbar-item">
                    <a href="">Đơn hàng</a>
                </div>
                <div class="navbar-item">
                    <a href="./admin_acc.php">Admin</a>
                </div>
                <div class="navbar-item">
                    <a href="./user_acc.php">Người dùng</a>
                </div>
                <div class="navbar-item">
                    <a href="./feedback.php">Tin nhắn</a>
                </div>
                <div class="navbar-item navbar-active">
                  <a href="./dashboard.php">Doanh thu</a>
                </div>
            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>
            <div class="profile">
                <p class="profile-name">
                    <?php
                    echo "Hello: " . $_SESSION['name'];
                    ?>
                </p>
                <a href="./logout.php" class="delete-btn">đăng xuất</a>
            </div>
        </section>
    </header>

    <section class="add-products">
        <div style="text-align: center; font-size: 20px">Thống kê doanh thu ngày <?= $date ?> của từng sản phẩm</div>
        <form action="" method="GET">
            <div class="flex">
                <div class="inputBox">
                    <span>Ngày</span>
                    <input type="date" class="box" name="date" value="<?= $date ?>" required>
                </div>
            </div>
            <button type="submit" name="filter-day" class="option-btn">Lọc</button>
        </form>
        <div id="revenueDayColumnChart" style="width: 100%;margin: 20px 0;"></div>
        <div style="text-align: center; font-size: 20px; margin-top: 20px;">Thống kê doanh thu tháng <?= $month ?> năm <?= $year ?> của từng sản phẩm</div>
        <form action="" method="GET">
            <div class="flex">
                <span>Tháng:</span>
                <select name="month" class="box" required>
                    <option value="">Chọn tháng</option>
                    <?php for ($i = 1;$i <= 12;$i++): ?>
                        <option value="<?= $i ?>" <?= $month == $i ? 'selected' : '' ?>>Tháng <?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <span>Năm:</span>
                <select name="year" class="box" required>
                    <option value="">Chọn năm</option>
                    <?php $currentYear = date('Y'); for ($i = $currentYear - 3;$i <= $currentYear + 3;$i++): ?>
                        <option value="<?= $i ?>" <?= $year == $i ? 'selected' : '' ?>>Năm <?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" name="filter-month-year" class="option-btn">Lọc</button>
        </form>
        <div id="revenueMonthColumnChart" style="width: 100%;margin: 20px 0;"></div>
    </section>
    <?php       
    }
    ?>
<script src="../js/admin_script.js"></script>
<input type="hidden" id="data1" value='<?= $revenueEachDay ?>' />
<input type="hidden" id="data2" value='<?= $revenueEachMonth ?>' />
<!-- /.container-fluid -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var arr = [['Sản phẩm', 'Doanh thu', { role: "style" }]];
    var orders = JSON.parse(document.getElementById("data1").value);
    if (orders.length < 1) {
        arr.push(['', 0, '#3366CC']);
    }
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    for(x in orders){
        arr.push([x, parseInt(orders[x].total),'#3366CC'])
    }  
    function drawChart() {

        var data = google.visualization.arrayToDataTable(
            arr
        );

        var options = {
            title: 'Thống kê doanh thu ngày <?= $date ?> của từng sản phẩm',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('revenueDayColumnChart'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    var arr1 = [['Sản phẩm', 'Doanh thu', { role: "style" }]];
    var orders = JSON.parse(document.getElementById("data2").value);
    if (orders.length < 1) {
        arr1.push(['', 0, '#3366CC']);
    }
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    for(x in orders){
        arr1.push([x, parseInt(orders[x].total),'#3366CC'])
    }  
    function drawChart() {

        var data = google.visualization.arrayToDataTable(
            arr1
        );

        var options = {
            title: 'Thống kê doanh thu tháng <?= $month ?> năm <?= $year ?> của từng sản phẩm',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('revenueMonthColumnChart'));

        chart.draw(data, options);
    }
</script>
</body>
</html>