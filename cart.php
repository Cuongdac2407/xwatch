
<?php 
    session_start();
    include('./admin/control.php');
    include('./control.php');
    $user = (isset($_SESSION['username'])) ? $_SESSION['username'] : [] ;
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
    
    <!-- Libraries Stylesheet-->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
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
                                <span id="user-name" class="px-2"><?= $user['username']?></span>
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
                        <?php } else {?>
                        <div class="show login d-inline-flex align-items-center">
                            <a href="./login.php" class="text-light px-2" >
                                Đăng nhập
                            </a>
                            <a href="./registers.php" class="text-light pl-2" >
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
                        <a href="" class="text-decoration-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span><span class="text-light">SHOP</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-6 col-12 text-left search-inner">
                        <form action="search.php" class="w-100 position-relative" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="keyword">
                                <div class="input-group-append">
                                    <button class="input-group-text bg-primary text-light" name="timkiem">
                                        <i class="fa fa-search"></i>
                                    </button>
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
                                    <a href="index.php" class="nav-item nav-link position-relative text-uppercase mx-4">Trang chủ</a>
                                    <a href="classic_watch.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Đồng hồ nam</a>
                                    <a href="modern_watch.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Đồng hồ nữ</a>
                                    <a href="./repair.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Sửa chữa</a>
                                    <a href="./expertise.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Thẩm định</a>
                                    <a href="contact.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Thông tin</a>
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


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <form action="update_cart.php" method="POST">
                    <table id="listSanPham" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="table text-center mb-0 display" >
                        <thead class="bg-gray-200 text-dark">
                            <tr>
                                <th>STT</th>
                                <th width="250">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php if (!empty($_SESSION['shopping_cart'])): ?>
                                <?php $count = 1; foreach ($_SESSION['shopping_cart'] as $row): ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td class="text-hidden-2"><?= $row['item_name'] ?></td>
                                        <td><?= number_format($row['item_price'],-3,',',',') ?> ₫</td>
                                        <td>
                                            <input type="hidden" name="product[]" value="<?= $row['item_id'] ?>">
                                            <div class="input-group quantity" style="width: 180px;margin: 0 auto;">
                                                <div class="input-group-btn">
                                                    <a href="decrease_cart.php?id=<?= $row['item_id'] ?>" class="btn btn-primary btn-minus">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <input type="number" class="form-control bg-gray-200 text-center" name="qty[]" value="<?= $row['item_qty'] ?>" min=1>
                                                <div class="input-group-btn">
                                                    <a href="increase_cart.php?id=<?= $row['item_id'] ?>" class="btn btn-primary btn-plus">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= number_format($row['item_price'] * $row['item_qty'],-3,',',',') ?> ₫</td>
                                        <td>
                                            <a href="delete_cart.php?id=<?= $row['item_id'] ?>" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php $count++; endforeach; ?>
                                <tr>
                                    <td colspan="6">
                                        <button type="submit" class="btn btn-primary float-right">Cập nhật số lượng</button>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">Hiện chưa có sản phẩm nào</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </form>
                <div class="row">
                    <div class="col-md-8">
                        <a href="index.php" class="btn btn-primary mt-3"><i class="fa-solid fa-arrow-left mr-2"></i> TIẾP TỤC MUA SẮM</a>
                    </div>
                    <?php if (!empty($_SESSION['shopping_cart'])): ?>
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><h4>Tổng tiền :</h4></td>
                                            <td><h4>
                                            <?= 
                                                number_format(array_reduce($_SESSION['shopping_cart'], 
                                                function($total, $item) {
                                                    $total += $item['item_price'] * $item['item_qty'];
                    
                                                    return $total;
                                                }, 
                                                0
                                                ),-3,'.','.')
                                            ?> ₫
                                            </h4></td>
                                        </tr>
                                        <tr>
                                            <?php if (isset($_SESSION['username'])): ?>
                                                <td>
                                                    <a href="checkout.php" class="btn btn-primary">Đặt Hàng</a>
                                                </td>
                                            <?php else: ?>
                                                <td>
                                                    <a href="login.php" class="btn btn-primary">Vui lòng đăng nhập</a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <div class="footer bg-gray-900">
        <div class="container text-light mt-5 pt-5">
            <div class="row  pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <a href="" class="text-decoration-none">
                        <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">WATCH</span><span class="text-light">SHOP</span></h2>
                    </a>
                    <p>Đây là kênh bán sản phẩm chính hãng giá rẻ hàng đầu. Chúng tôi chỉ bán đồng hồ chính hãng & Chúng tôi bán đồng hồ với giá thấp hơn mọi cửa hàng tại Việt Nam.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-light mr-3"></i>81, Lê Thanh Nghị, Hà Nội</p>
                    <p class="mb-2"><i class="fa fa-envelope text-light mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-light mr-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">Hướng dẫn</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Bảo hành & Đổi trả</a>
                                <a class="text-light mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Phương thức thanh toán</a>
                                <a class="text-light mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Vận chuyển & Giao nhận</a>
                                <a class="text-light mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Điều khoản sử dụng</a>
                                <a class="text-light mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Bảo mật thông tin</a>
                                <a class="text-light" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Trung tâm bảo hành</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">THAM KHẢO</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Thông Báo Mới</a>
                                <a class="text-light mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Điều Khoản Sử Dụng</a>
                                <a class="text-light mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Bảo Mật Thông Tin</a>
                                <a class="text-light mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Ngưng Hiện Quảng Cáo</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">Thông tin</h5>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                        required="required" />
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

    <div class="toast-message">
        <p class="text-light p-3">Vui lòng thêm sản phẩm vào giỏ hàng của bạn</p>
    </div>


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

    <script>
        //datatables cart
        $('#table-cart').DataTable({});
    </script>
    <script src="js/cart.js"></script>
</body>

</html>