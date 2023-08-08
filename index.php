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
                        <a href="./index.php" class="text-decoration-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold">
                            <span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span><span class="text-light">SHOP</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-6 col-12 text-left search-inner">
                        <form action="search.php" class="w-100 position-relative" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="keyword">
                                <div class="input-group-append">
                                    <button class="input-group-text bg-primary text-light"  name="timkiem">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                                <div class="search-history w-100 bg-light mt-2 rounded">
                                    <h5 class="p-3">
                                        Lịch sử tìm kiếm
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
                    <div class="col-lg-3 col-12 d-flex align-items-center justify-content-lg-end justify-content-sm-between">
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
                                <h2 class="m-0 display-5 font-weight-semi-bold">    
                                <span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span>SHOP</h2>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0 w-100 d-flex justify-content-center">
                                    <a href="./index.php" class="nav-item nav-link position-relative text-uppercase mx-4 active">Trang chủ</a>
                                    <a href="./classic_watch.php" class="nav-item nav-link position-relative text-uppercase mx-4">Đồng hồ cổ điển</a>
                                    <a href="./modern_watch.php" class="nav-item nav-link position-relative text-uppercase mx-4">Đồng hồ điện tử</a>
                                    <a href="./repair.php" class="nav-item nav-link position-relative text-uppercase mx-4">Sửa chữa</a>
                                    <a href="./expertise.php" class="nav-item nav-link position-relative text-uppercase mx-4">Thẩm định</a>
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

    <div class="slider-main bg-dark-200 mt-0 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div id="header-slider" class="slick slide w-100">
                        <div class="slider-inner position-relative">
                            <div class="slider-item d-flex justify-content-between">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-primary font-weight-bolder text-uppercase font-weight-medium mb-3">Watch shop</h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Classic watches</h3>
                                        <p class="text-light">Lorem Ipsum chỉ đơn giản là văn bản giả của ngành công nghiệp in ấn và sắp chữ. Lorem Ipsum đã trở thành văn bản giả tiêu chuẩn của ngành kể từ những năm 1500, khi một nhà in không rõ danh tính lấy một bộ sưu tập kiểu chữ và xáo trộn nó để tạo thành một cuốn sách mẫu.</p>
                                        <a href="" class="btn btn-outline-primary--light rounded-sm py-2 px-3">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item d-flex justify-content-between">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-primary font-weight-bolder text-uppercase font-weight-medium mb-3">Watch shop</h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Classic watches</h3>
                                        <p class="text-light">Lorem Ipsum chỉ đơn giản là văn bản giả của ngành công nghiệp in ấn và sắp chữ. Lorem Ipsum đã trở thành văn bản giả tiêu chuẩn của ngành kể từ những năm 1500, khi một nhà in không rõ danh tính lấy một bộ sưu tập kiểu chữ và xáo trộn nó để tạo thành một cuốn sách mẫu.</p>
                                        <a href="" class="btn btn-outline-primary--light rounded-sm py-2 px-3">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-item d-flex justify-content-between">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-primary font-weight-bolder text-uppercase font-weight-medium mb-3">Watch shop</h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Classic watches</h3>
                                        <p class="text-light">Lorem Ipsum chỉ đơn giản là văn bản giả của ngành công nghiệp in ấn và sắp chữ. Lorem Ipsum đã trở thành văn bản giả tiêu chuẩn của ngành kể từ những năm 1500, khi một nhà in không rõ danh tính lấy một bộ sưu tập kiểu chữ và xáo trộn nó để tạo thành một cuốn sách mẫu.</p>
                                        <a href="" class="btn btn-outline-primary--light rounded-sm py-2 px-3">Mua ngay</a>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offer Start -->
    <div class="container offer pt-5">
        <div class="row">
            <div class="col-md-6 pb-4">
                <div class="offer-item position-relative bg-dark-200 text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/titoni-83919-s-612-nam-1-600x600-removebg-preview.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-light mb-3">20% off the all order</h5>
                        <h1 class="mb-4 text-light font-weight-semi-bold">CỔ ĐIỂN</h1>
                        <a href="" class="btn btn-outline-primary--light py-md-2 px-md-3">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="offer-item position-relative bg-dark-200 text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/61TzjMeU3mS._AC_SL1500_-removebg-preview.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-light mb-3">20% off the all order</h5>
                        <h1 class="mb-4 text-light font-weight-semi-bold">HIỆN ĐẠI</h1>
                        <a href="" class="btn btn-outline-primary--light py-md-2 px-md-3">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    
    <!-- Products Start -->
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm nổi bật</span></h2>
        </div>
        <div class="row pb-3 he900">  
            <?php
                $get_data = new data_product();
                $select = $get_data->select_all_product();
                foreach ($select as $se_product) {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4" data-index="1">
               
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    
                        <a href="./detail.php?sel=<?php echo $se_product['id']?>">
                            <img class="product-thumbnail img-fluid w-100" src="./img/<?php echo $se_product['img1'] ?>" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="product-name text-truncate mb-3"><?php echo $se_product['tensanpham'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6 class="text-muted"><del><?php echo $se_product['giaban'] ?> ₫</del></h6><h6 class="product-price ml-2"><?php echo $se_product['giagiam'] ?> ₫</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="./detail.php?sel=<?php echo $se_product['id']?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <button class="btn btn-sm text-dark p-0" onclick="addToCart(<?= $se_product['id'] ?>)"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</button>
                        
                    </div>
                   
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    <!-- Products End -->
    


    <!-- Subscribe Start -->
    <div class="subcribe bg-gray-900">
        <div class="container my-5">
            <div class="row justify-content-md-center py-5 ">
                <div class="col-md-6 col-12 py-5">
                    <div class="text-center mb-2 pb-2">
                        <h2 class=" text-light px-5 mb-3">ĐĂNG KÝ</h2>
                        <p class="text-light">Đăng ký để nhận thêm ưu đãi từ phía chúng tôi.</p>
                    </div>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4" placeholder="Email...">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4 text-light">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <!-- Products Start -->
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Các sản phẩm</span></h2>
        </div>
        <div class="row  pb-3 he900">
            <?php
                $get_data = new data_product();
                $select = $get_data->select_all_product();
                foreach ($select as $se_product) {
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
           
                <div class="card product-item border-0 mb-4" data-index="9">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <a href="./detail.php?sel=<?php echo $se_product['id']?>">
                            <img class="product-thumbnail img-fluid w-100" src="./img/<?php echo $se_product['img1'] ?>" alt="">
                        </a>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="product-name text-truncate mb-3"><?php echo $se_product['tensanpham'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6 class="text-muted"><del><?php echo $se_product['giaban'] ?> ₫</del></h6><h6 class="product-price ml-2"><?php echo $se_product['giagiam'] ?> ₫</h6>
                        </div>
                        
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <a href="cart.php"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</a>
                    </div>
                </div>
                
            </div> 
                  
            <?php 
                }
            ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container py-5">
        <div class="row ">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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
                    <p class="mb-0"><i class="fa fa-phone-alt text-light mr-3"></i>+012 345 6789</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">Hướng dẫn</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Bảo hành & Đổi trả</a>
                                <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Phương thức thanh toán</a>
                                <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Vận chuyển & Giao nhận</a>
                                <a class="text-light mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Điều khoản sử dụng</a>
                                <a class="text-light mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Bảo mật thông tin</a>
                                <a class="text-light" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Trung tâm bảo hành</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">THAM KHẢO</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Thông Báo Mới</a>
                                <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Điều Khoản Sử Dụng</a>
                                <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Bảo Mật Thông Tin</a>
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
        <p class="text-light p-3">Sản phẩm đã được thêm vào giỏ hàng</p>
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
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="js/cart.js"></script>
</body>

</html>