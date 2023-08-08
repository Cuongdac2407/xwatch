<?php
    session_start();
    include('./control.php');

    if (empty($_SESSION['name']))
        header('location: ./login.php');
    else {
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
                <div class="navbar-item navbar-active">
                    <a href="./user_acc.php">Người dùng</a>
                </div>
                <div class="navbar-item">
                    <a href="./feedback.php">Tin nhắn</a>
                </div>
                <div class="navbar-item">
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
                <a href="./logout.php" class="delete-btn">Đăng xuất</a>
            </div>
        </section>
    </header>
    <section class="accounts">
        <h1 class="heading">tài khoản người dùng</h1>
        <div class="box-container">
            <?php
                $get_data = new accounts();
                $select = $get_data->select_user_acc();
                foreach ($select as $se_acc) {
            ?>
            <div class="box">
                <p> ID : <span><?= $se_acc['id']; ?></span> </p>
                <p> Email : <span><?= $se_acc['email']; ?></span> </p>
                <p> Tên : <span><?= $se_acc['username']; ?></span> </p>
                <p> Mật khẩu : <span><?= $se_acc['password']; ?></span> </p>
                <a href="users_accounts.php" class="delete-btn">xóa</a>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
<?php
    }
?>
<script src="../js/admin_script.js"></script>
</body>
</html>