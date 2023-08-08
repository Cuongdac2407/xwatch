<?php
session_start();
include('./admin/control.php');
include('./control.php');
$user = (isset($_SESSION['username'])) ? $_SESSION['username'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thế giới đồng hồ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header">
        <!-- Topbar Start -->
        <div class="header-top bg-gray-900 py-2">
            <div class="container">
                <div class="row py-2">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-light px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-light px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-light px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-light px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-light pl-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <?php
                        if (isset($user['username'])) {
                        ?>
                            <div class="user ">
                                <div class="form-user d-inline-flex align-items-center text-light">
                                    <div class="user-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <span id="user-name" class="px-2"><?= $user['username'] ?></span>
                                </div>
                                <div class="options-user">
                                    <ul class="options-user__list">
                                        <li class="options-user__item">
                                            <a href="./logout.php" class="options-user__link">
                                                Đăng xuất
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="show login d-inline-flex align-items-center">
                                <a href="./login.php" class="text-light px-2">
                                    Đăng nhập
                                </a>
                                <a href="./registers.php" class="text-light pl-2">
                                    Đăng ký
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <div class="header-inner py-4 bg-gray-900">
            <div class="container">
                <div class="row align-items-center py-3">
                    <div class="col-lg-3 d-none d-lg-block">
                        <a href="./index.php" class="text-decoration-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span><span class="text-light">SHOP</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-6 col-6 text-left search-inner">
                        <form action="" class="w-100 position-relative">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for products">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-light">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>

                                <div class="search-history w-100 bg-light mt-2 rounded">
                                    <h5 class="p-3">
                                        Search history
                                    </h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Morbi leo risus</li>
                                        <li class="list-group-item">Porta ac consectetur ac</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                    </ul>

                                    <a href="" class="btn text-center w-100 p-2 btn-show-all">All</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-6 text-right">
                        <a href="" class="btn" style="font-size: 20px">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-light">0</span>
                        </a>
                        <a href="cart.php" class="btn" style="font-size: 20px">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge sum-cart text-light"><?= isset($_SESSION['shopping_cart']) ? array_sum(array_column($_SESSION['shopping_cart'], 'item_qty')) : 0 ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Navbar Start -->
        <div class="header-nav bg-gray-900">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg bg-gray-900 navbar-light py-3 py-lg-0 px-0">
                            <a href="" class="text-decoration-none d-block d-lg-none">
                                <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span>SHOP</h2>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0 w-100 d-flex justify-content-center">
                                    <a href="./index.php" class="nav-item nav-link position-relative text-uppercase mx-4">Trang chủ</a>
                                    <a href="./classic_watch.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Đồng hồ cổ điển</a>
                                    <a href="./modern_watch.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Đồng hồ điện tử</a>
                                    <a href="./repair.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Sửa chữa</a>
                                    <a href="./expertise.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Thẩm định</a>
                                    <a href="./feedback.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Phản hồi</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
    </header>
    <!-- Page Header End -->

    <?php
    $get_data = new data_product();
    $select = $get_data->select_product_id($_GET['sel']);
    foreach ($select as $se_product) {
    ?>
        <!-- Shop Detail Start -->
        <div class="container-fluid py-5">
            <div class="row px-xl-5 product-item">
                <div class="col-lg-5 pb-5">
                    <div id="product-slick-slide" class="slick slide">
                        <div class="product-slick-inner border position-relative">
                            <div class="product-slick-item">
                                <img class="product-thumbnail w-100 h-100" src="./img/<?php echo $se_product['img1'] ?>" alt="Image">
                            </div>
                            <div class="product-slick-item">
                                <img class="w-100 h-100" src="./img/<?php echo $se_product['img2'] ?>" alt="Image">
                            </div>
                            <div class="product-slick-item">
                                <img class="w-100 h-100" src="./img/<?php echo $se_product['img3'] ?>" alt="Image">
                            </div>
                            <div class="product-slick-item">
                                <img class="w-100 h-100" src="./img/<?php echo $se_product['img4'] ?>" alt="Image">
                            </div>
                        </div>

                        <div class="product-navfor-slick-inner border">
                            <div class="row w-100" id="slick-slide-navfor">
                                <div class="col-lg-3 mw-100">
                                    <div class="product-slick-item">
                                        <img class="w-100 h-100" src="./img/<?php echo $se_product['img1'] ?>" alt="Image">
                                    </div>
                                </div>

                                <div class="col-lg-3 mw-100">
                                    <div class="product-slick-item">
                                        <img class="w-100 h-100" src="./img/<?php echo $se_product['img2'] ?>" alt="Image">
                                    </div>
                                </div>

                                <div class="col-lg-3 mw-100">
                                    <div class="product-slick-item">
                                        <img class="w-100 h-100" src="./img/<?php echo $se_product['img3'] ?>" alt="Image">
                                    </div>
                                </div>

                                <div class="col-lg-3 mw-100">
                                    <div class="product-slick-item">
                                        <img class="w-100 h-100" src="./img/<?php echo $se_product['img4'] ?>" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-7 pb-5">
                    <h3 class="product-name font-weight-semi-bold">
                        <?php echo $se_product['tensanpham'] ?>
                    </h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(50 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">
                        <span class="text-muted"><del><?php echo $se_product['giaban'] ?> ₫</del></span><span class="ml-3"><?php echo $se_product['giagiam'] ?> ₫</span>
                    </h3>
                    <?php if ($se_product['soluong'] > 0): ?>
                        <p class="mb-4 text-danger">Số lượng: <?php echo $se_product['soluong'] ?></p>
                    <?php else: ?>
                        <p class="mb-4 text-danger">Hết hàng</p>
                    <?php endif; ?>
                    <p class="mb-4"><?php echo $se_product['thongtin'] ?></p>

                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-start">
                            <img src="https://img.icons8.com/external-anggara-basic-outline-anggara-putra/32/000000/external-shield-ecommerce-interface-anggara-basic-outline-anggara-putra.png" />

                            <p class="ml-2">Bảo hành chính hãng 2 năm tại các trung tâm bảo hành hãng</p>
                        </div>

                        <div class="col-lg-6 d-flex align-items-start">
                            <img src="https://img.icons8.com/wired/32/000000/renew-subscription.png" />

                            <p class="ml-2">Bảo hành có cam kết trong 12 tháng </p>
                        </div>

                        <div class="col-lg-6 d-flex align-items-start">
                            <img src="https://img.icons8.com/ios/32/000000/open-box.png" />
                            <p class="ml-2">Bộ sản phẩm gồm: Hướng dẫn sử dụng, Hộp, Phiếu bảo hành</p>
                        </div>

                        <div class="col-lg-6 d-flex align-items-start">
                            <img src="https://img.icons8.com/dotty/32/000000/truck--v1.png" />

                            <p class="ml-2">
                                TP.Hà Nội: Giao hàng nhanh chóng.<br />
                                Tỉnh thành khác: Giao hàng từ 2 - 10 ngày.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4 pt-2">
                        <button class="btn btn-primary btn-add-cart text-light px-3" onclick="addToCart(<?= $se_product['id'] ?>)" <?= $se_product['soluong'] < 1 ? 'disabled' : '' ?>><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    </div>
                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <?php
                            $data_danhgia = new dataComment();
                            $select_comment = $data_danhgia->select_comment_id($_GET['sel']);
                        ?>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">
                            Đánh giá
                        </a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Giới tính:</td>
                                                <td><?php echo $se_product['gioitinh'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Đường kính mặt:</td>
                                                <td><?php echo $se_product['duongkinh'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Dây đeo:</td>
                                                <td><?php echo $se_product['daydeo'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Khung viền:</td>
                                                <td><?php echo $se_product['khungvien'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Độ dày mặt:</td>
                                                <td><?php echo $se_product['dodaymat'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Xuất xứ:</td>
                                                <td><?php echo $se_product['xuatxu'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                    ?>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4 text-center">Để lại đánh giá</h4>
                                <form method="post">
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2 text-review">Đánh giá của bạn <span class="text-red ml-2"> * </span></p>
                                        <div class="text-primary ml-3">
                                            <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                                            <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                                            <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                                            <label class="star star-4" for="star-4" title="Tốt"></label>

                                            <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                                            <label class="star star-3" for="star-3" title="Tạm"></label>

                                            <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                                            <label class="star star-2" for="star-2" title="Khá"></label>

                                            <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                                            <label class="star star-1" for="star-1" title="Tệ"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Nhập nội dung đánh giá của bạn về sản phẩm: <span class="text-red">* </span></label>
                                        <textarea id="comment" name="comment" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group" hidden>
                                        <input type="text" name="date" value="<?php $date ?>">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="submit" value="Gửi đánh giá" class="btn btn-primary px-3">
                                    </div>
                                </form>     
                                <?php
                                if (isset($_POST['submit'])) {
                                    $comment = $_POST['comment'];
                                    $productId = $_GET['sel'];
                                    $sosao = $_POST['star'];
                                    $useId = $user['id'];
                                    $date = date('d/m/Y');
                                    if (isset($useId)) {
                                        $review = $data_danhgia->comment($productId, $useId, $sosao, $comment, $date);
                                        if ($review) {
                                        }
                                    } else {
                                        echo '<script>alert("Đăng nhập để bình luận")</script>';
                                    }
                                }
                                ?>                        
                            </div>

                            <div class="col-md-6">    
                                <?php foreach ($select_comment as $se_comment) { ?>    
                                    <div class="media mb-4 bor-bot">
                                        <?php
                                            $select_user = $data_danhgia->select_user_id($se_comment['idND']);
                                            foreach ($select_user as $se_user) {
                                        ?>
                                        <img src="img/<?= $se_user['avatar'] ?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">                                            
                                            <h6><?= $se_user['username'] ?><small> - <i><?= $se_comment['ngaythang'] ?></i></small></h6>
                                            <div class="text-primary mb-2">
                                            <div class="text-primary mb-2">
                                                <input type="text" class="input-sao" value="<?= $se_comment['sosao'] ?>" disabled hidden>
                                                <div class="rating"></div>
                                            </div>
                                            </div>
                                            <p><?= $se_comment['binhluan'] ?></p>
                                        </div>
                                    </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->



        <!-- Products Start -->
        <div class="container-fluid py-5">
            <div class="text-center mb-4">
                <h3 class="section-title px-5"><span class="px-2">Sản phẩm tương tự</span></h3>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        <?php
                        $select_all_product = $get_data->select_all_product();
                        foreach ($select_all_product as $se_all) {
                        ?>
                            <div class="card product-item border-0">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <a href="./detail.php?sel=<?php echo $se_all['id'] ?>">
                                        <img class="img-fluid w-100" src="./img/<?php echo $se_all['img1'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">
                                        <?php echo $se_all['tensanpham'] ?>
                                    </h6>
                                    <div class="d-flex justify-content-center">
                                        <h6 class="text-muted"><del><?php echo $se_all['giaban'] ?> ₫</del></h6>
                                        <h6 class="product-price ml-2"><?php echo $se_all['giagiam'] ?> ₫</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="./detail.php?sel=<?php echo $se_all['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products End -->


        <!-- Footer Start -->
        <div class="footer bg-gray-900">
            <div class="container text-light mt-5 pt-5">
                <div class="row  pt-5">
                    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                        <a href="" class="text-decoration-none">
                            <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">WATCH</span><span class="text-light">SHOP</span></h2>
                        </a>
                        <p class="text-justify">Đây là kênh bán sản phẩm chính hãng giá rẻ hàng đầu. Chúng tôi chỉ bán đồng hồ chính hãng & Chúng tôi bán đồng hồ với giá thấp hơn mọi cửa hàng tại Việt Nam.</p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-light mr-3"></i>81, Lê Thanh Nghị, Hà Nội</p>
                        <p class="mb-2"><i class="fa fa-envelope text-light mr-3"></i>info@example.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-light mr-3"></i>+012 345 6789</p>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-light mb-4">Hướng dẫn</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Bảo hành & Đổi trả</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Phương thức thanh toán</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Vận chuyển & Giao nhận</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Điều khoản sử dụng</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Bảo mật thông tin</a>
                                    <a class="text-light"><i class="fa fa-angle-right mr-2"></i>Trung tâm bảo hành</a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-light mb-4">THAM KHẢO</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Thông Báo Mới</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Điều Khoản Sử Dụng</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Bảo Mật Thông Tin</a>
                                    <a class="text-light mb-2"><i class="fa fa-angle-right mr-2"></i>Ngưng Hiện Quảng Cáo</a>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-light mb-4">Thông tin</h5>
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-0 py-4" placeholder="Tên của bạn" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control border-0 py-4" placeholder="Email của bạn" required="required" />
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">Đăng ký ngay</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
        <script src="js/cart.js"></script>
</body>

</html>