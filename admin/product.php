<?php
    session_start();

    include('./control.php');
    if (empty($_SESSION['name']))
    header('location: ./login.php');
    else {
    $get_data = new data_product();
    if (isset($_POST['add_product'])) {
        move_uploaded_file($_FILES['img1']['tmp_name'], '../img/' . $_FILES['img1']['name']);
        move_uploaded_file($_FILES['img2']['tmp_name'], '../img/' . $_FILES['img2']['name']);
        move_uploaded_file($_FILES['img3']['tmp_name'], '../img/' . $_FILES['img3']['name']);
        move_uploaded_file($_FILES['img4']['tmp_name'], '../img/' . $_FILES['img4']['name']);
        $insert = $get_data->add_product(
            $_POST['tensanpham'],
            $_POST['giaban'],
            $_POST['giagiam'],
            $_FILES['img1']['name'],
            $_FILES['img2']['name'],
            $_FILES['img3']['name'],
            $_FILES['img4']['name'],
            $_POST['thuonghieu'],
            $_POST['thongtin'],
            $_POST['loai'],
            $_POST['gioitinh'],
            $_POST['duongkinh'],
            $_POST['daydeo'],
            $_POST['xuatxu'],
            $_POST['khungvien'],
            $_POST['dodaymat'],
            $_POST['soluong']
        );
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
                    <div class="navbar-item navbar-active">
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

        <section class="add-products">
            <h1 class="heading">Thêm sản phẩm</h1>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="flex">
                    <div class="inputBox">
                        <span>Tên sản phẩm</span>
                        <input type="text" class="box" required placeholder="Nhập tên sản phẩm" name="tensanpham">
                    </div>
                    <div class="inputBox">
                        <span>Giá sản phẩm (Đồng)</span>
                        <input type="text" min="0" class="box" required placeholder="Nhập giá sản phẩm" name="giaban">
                    </div>
                    <div class="inputBox">
                        <span>Giá giảm còn (Đồng)</span>
                        <input type="text" min="0" class="box" required placeholder="Nhập giá giảm sản phẩm" name="giagiam">
                    </div>
                    <div class="inputBox">
                        <span>Số lượng</span>
                        <input type="number" min="1" class="box" required placeholder="Nhập số lượng sản phẩm" name="soluong">
                    </div>
                    <div class="inputBox">
                        <span>Thông tin sản phẩm</span>
                        <textarea name="thongtin" placeholder="Nhập chi tiết sản phẩm" class="box" required maxlength="500" cols="30" rows="10"></textarea>
                    </div>
                    <div class="inputBox">
                        <span>Thương hiệu</span>
                        <input type="text" name="thuonghieu" placeholder="Thương hiệu" class="box" required></input>
                    </div>
                    <div class="inputBox">
                        <span>Loại</span>
                        <select name="loai" id="" class="box">
                            <option value="Cổ điển">Cổ điển</option>
                            <option value="Hiện đại">Hiện đại</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Giới tính</span>
                        <select name="gioitinh" id="" class="box">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Nam/Nữ">Nam/Nữ</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Đường kính đồng hồ (mm)</span>
                        <input type="text" min="0" class="box" required placeholder="Nhập đường kính" name="duongkinh">
                    </div>
                    <div class="inputBox">
                        <span>Loại dây đeo</span>
                        <input type="text" min="0" class="box" required placeholder="Nhập loại dây" name="daydeo">
                    </div>
                    <div class="inputBox">
                        <span>Xuất xứ</span>
                        <input type="text" min="0" class="box" required placeholder="Xuất xứ" name="xuatxu">
                    </div>
                    <div class="inputBox">
                        <span>Khung viền</span>
                        <input type="text" min="0" class="box" required placeholder="Nhập khung viền" name="khungvien">
                    </div>
                    <div class="inputBox">
                        <span>Độ dày mặt đồng hồ (mm)</span>
                        <input type="text" min="0" class="box" required placeholder="Nhập độ dày" name="dodaymat">
                    </div>
                    <div class="inputBox">
                        <span>Ảnh 1</span>
                        <div class="box flex">
                            <input type="file" class="fileimg" name="img1" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                            <label class="fileLabel"></label>
                        </div>                 
                    </div>
                    <div class="inputBox">
                        <span>Ảnh 2</span>
                        <div class="box flex">
                            <input type="file" class="fileimg" name="img2" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                            <label class="fileLabel"></label>
                        </div>                  
                    </div>
                    <div class="inputBox">
                        <span>Ảnh 3</span>
                        <div class="box flex">
                            <input type="file" class="fileimg" name="img3" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                            <label class="fileLabel"></label>
                        </div>   
                    </div>
                    <div class="inputBox">
                        <span>Ảnh 4</span>
                        <div class="box flex" style="width: 49%">
                        <input type="file" class="fileimg" name="img4" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
                            <label class="fileLabel"></label>
                        </div>
                        
                    </div>

                </div>
                <input type="submit" value="Thêm sản phẩm" class="btn" name="add_product">
            </form>

        </section>

        <section class="show-products">
            <h1 class="heading">Sản phẩm đã thêm</h1>
            <div id="box-container" class="box-container">
                <?php
                    $select_product = $get_data -> select_all_product();
                    foreach ($select_product as $se_product) {
                ?>
                <div class="box-item">
                    <div class="box">          
                        <a href="product_detail.php?sel=<?php echo $se_product['id']?>">
                            <img src="../img/<?php echo $se_product['img1'] ?>" alt="">
                            <div class="name"><?php echo $se_product['tensanpham'] ?></div>
                            <div class="price">
                                <span class="price-sale"><?php echo $se_product['giaban'] ?> ₫</span>
                                <span><?php echo $se_product['giagiam'] ?> ₫</span>
                            </div>
                            <div class="name" style="margin-bottom: 10px;color: red;">Số lượng: <?php echo $se_product['soluong'] ?></div>
                            <div class="flex-btn options-btn">
                                <a href="product_update.php?up=<?php echo $se_product['id'] ?>" class="option-btn">sửa</a>
                                <a href="product_delete.php?del=<?php echo $se_product['id'] ?>" class="delete-btn">Xóa</a>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-3" id="page">
                </ul>
            </nav>
        </section>
    <?php              
        }
    ?>
    <script src="../js/admin_script.js"></script>
    </body>

</html>