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
                    <div class="navbar-item">
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
                    <a href="./logout.php" class="delete-btn">đăng xuất</a>
                </div>
            </section>
        </header>
        <?php
            $get_data = new data_product();
            $select = $get_data->select_product_id($_GET['sel']);
            foreach ($select as $se_product) {
        ?>
        <section class="show-products">
            <div class="name-product">
                <?php echo $se_product['tensanpham'] ?>
            </div>
            <div class="box-container">
                <div class="box-img-wrapper">
                    <img class="box-img" src="../img/<?php echo $se_product['img1'] ?>" alt="">
                </div>
                <div class="box-img-wrapper">
                    <img class="box-img" src="../img/<?php echo $se_product['img2'] ?>" alt="">
                </div>
                <div class="box-img-wrapper">
                    <img class="box-img" src="../img/<?php echo $se_product['img3'] ?>" alt="">
                </div>
                <div class="box-img-wrapper">
                    <img class="box-img" src="../img/<?php echo $se_product['img4'] ?>" alt="">
                </div>
            </div>
            <div class="detail">
                <h4 class="detail-header">Thông tin</h4>
                <p class="detail-content">
                    <?php echo $se_product['thongtin']; ?>
                </p>
                <table class="table">
                    <tbody>
                        <tr class="table-item">
                            <td class="table-header">Loại đồng hồ:</td>
                            <td><?php echo $se_product['loai']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Thương hiệu:</td>
                            <td><?php echo $se_product['thuonghieu']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Giới tính:</td>
                            <td><?php echo $se_product['gioitinh']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Đường kính mặt:</td>
                            <td><?php echo $se_product['duongkinh']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Dây đeo:</td>
                            <td><?php echo $se_product['daydeo']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Xuất xứ:</td>
                            <td><?php echo $se_product['xuatxu']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Khung viền:</td>
                            <td><?php echo $se_product['khungvien']; ?></td>
                        </tr>
                        <tr class="table-item">
                            <td class="table-header">Độ dày mặt:</td>
                            <td><?php echo $se_product['dodaymat']; ?></td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </section>
<?php         
            }     
    }
?>
    <script src="../js/admin_script.js"></script>
    </body>
    </html>