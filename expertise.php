<?php 
    session_start();
    include('./admin/control.php');
    include('./control.php');
    $user = (isset($_SESSION['username'])) ? $_SESSION['username'] : [] ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế Giới đồng hồ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/expertise.css">
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
                            <h2 class="m-0 display-5 font-weight-semi-bold">
                            <span class="text-primary font-weight-bold border px-3 mr-1">WATCH</span><span class="text-light">SHOP</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-6 col-12 text-left search-inner">
                        <form action="" class="w-100 position-relative">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-light">
                                        <i class="fa fa-search"></i>
                                    </span>
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
                                    <a href="./index.php" class="nav-item nav-link position-relative text-uppercase mx-4">Trang chủ</a>
                                    <a href="./classic_watch.php" class="nav-item nav-link position-relative text-uppercase mx-4">Đồng hồ cổ điển</a>
                                    <a href="./modern_watch.php" class="nav-item nav-link position-relative text-uppercase mx-4">Đồng hồ điện tử</a>
                                    <a href="./repair.php" class="nav-item nav-link position-relative text-uppercase mx-4">Sửa chữa</a>
                                    <a href="./expertise.php" class="nav-item nav-link position-relative text-uppercase mx-4 active">Thẩm định</a>
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
    <!--Container Start-->
    <div class="container">
        <div class="expertise">
            <div class="expertise_banner">
                <div class="expertise_top">
                    <hr class="expertise_hr">
                    <div class="expertise_bottom">
                        <h1 class="expertise_title">Thẩm Định Đồng Hồ</h1>
                        <hr class="expertise_bottom_hr">

                    </div>
                    <div class="expertise_bgr">
                        <div class="expertise_bgr_img">
                            <div class="expertise_total">
                                <div class="expertise_left">
                                    <img class="expertise_img" src="/img/imgdongho.PNG" alt="">
                                </div>
                                <div class="expertise_right">
                                    <div class="expertise_text">
                                        <h3 class="exper_title">TRẢ LẠI SỰ <span>TRONG SẠCH & GIÁ TRỊ THẬT </span> CHO
                                            THỊ TRƯỜNG ĐỒNG HỒ VIỆT NAM</h3>
                                        <p class="exper_desc">Là đơn vị tiên phong <span class="desc_b">"Tẩy chay đồng
                                                hồ fake" </span> , Xwatch vẫn luôn dùng hành động để thực hiện lời nói
                                            của mình</p>
                                        <p class="exper_desc">Kiên định với hành trình : <span class="desc_b">"Treo cổ
                                                đồng hồ fake - bài trừ gian thương - Bảo vệ người tiêu dùng."</span>
                                            Đồng thời, tiêu hủy hàng trăm cỗ máy giả mạo và giúp khách hàng thẩm định
                                            <span class="desc_color">Miễn Phí</span> hơn <span
                                                class="desc_color">50.000</span> đồng hồ thật - giả, trong đó có đến
                                            <span class="desc_color">12.000</span> trường hợp là fake
                                        </p>
                                        <p class="exper_desc">Mong rằng , những hàng động nhỏ của Xwatch sẽ góp phần
                                            mang lại <span class="desc_b">SỰ TRONG SẠCH</span> cho thị trường , giúp cho
                                            người chơi đồng hồ chính hãng <span class="desc_b">AN TÂM</span>với lựa chọn
                                            của mình</p>
                                        <p class="exper_desc">Cảm ơn bạn đã luôn tin tưởng và đồng hành , cùng Xwatch
                                            lan tỏa <span class="desc_b">GIÁ TRỊ THẬT</span> đến với Cộng Đồng!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="wrapper_content">
                <h2 class="wrapper_text">THẨM ĐỊNH ĐỒNG HỒ TẠI XWATCH</h2>
                <hr>
                <div class="wrapper_list">
                    <div class="wrapper_item">
                        <img src="img/thamdinh1.jpg" alt="">
                        <p>Đồng hồ GiẢ GIỐNG THẬT 90% - LÀM SAO ĐỂ PHÁT HIỆN?</p>
                    </div>
                    <div class="wrapper_item">
                        <img src="img/thamdinh2.jpg" alt="">
                        <p>Đồng hồ GiẢ GIỐNG THẬT 90% - LÀM SAO ĐỂ PHÁT HIỆN?</p>
                    </div>
                    <div class="wrapper_item">
                        <img src="img/thamdinhacv.jpg" alt="">
                        <p>6 DẤU BIẾT "VẠCH MẶT " ĐỒNG HỒ TISSOT FAKER!</p>
                    </div>
                    <div class="wrapper_item">
                        <img src="img/thamdinh4.jpg" alt="">
                        <p>SỐC: ĐỒNG HỒ ROLEX FAKE 200 TRIỆU, VÀNG KHÓI rất tinh vi</p>
                    </div>
                    <div class="wrapper_item">
                        <img src="img/thamdinh5.jpg" alt="">
                        <p>SỐC : HOBLOT FAKE SIÊU TINH VI, GIỐNG THẬT</p>
                    </div>
                    <div class="wrapper_item">
                        <img src="img/thamdinh6.jpg" alt="">
                        <p>PHÁT HIỆN LONGIES GIẢ 80 TRIỆU - GIÁ TỪ NGOÀI VÀO TRONG</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="media">
            <div class="media_content">
                <h2 class="media_text">TRUYỀN THÔNG NÓI GÌ VỀ CHIẾN DỊCH</h2>
                <hr>
                <div class="media_list">
                    <div class="media_item">
                        <img src="img/media1.jpg" alt="">
                        <h4>CHƯƠNG TRÌNH "TIÊU HỦY ĐỒNG HỒ GIẢ" CỦA XWATCH </h4>
                        <p>Thẩm định đồng hồ giả thật qua website: thamdinhdongho.vn .Ngày 23/4 chiếc xe lu 650kg đã cán
                            vỡ tung những chiếc đồng hồ giả</p>
                        <span>VTV.vn</span>
                    </div>
                    <div class="media_item">
                        <img src="img/media4.jpg" alt="">
                        <h4>CHƯƠNG TRÌNH "TIÊU DIỆT ĐỒNG HỒ FAKE" CỦA XWATCH </h4>
                        <p>Thẩm định đồng hồ giả thật qua website: thamdinhdongho.vn .Ngày 6/1 XWATCH đã tiêu hủy những
                            chiếc đồng hồ giả</p>
                        <span>VTC.vn</span>
                    </div>
                    <div class="media_item">
                        <img src="img/media2.jpg" alt="">
                        <h4>CHƯƠNG TRÌNH "CẢNH BÁO LỪA ĐẢO " CỦA XWATCH </h4>
                        <p>Thẩm định đồng hồ giả thật qua website: thamdinhdongho.vn .Ngày 11/4 XWATCH đã liên hệ với
                            phía công an về việc những chiếc đồng hồ fake được bán tràn lan</p>
                        <span>XWATCH.vn</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="organnit">
            <div class="organnit_content">
                <h2 class="organnit_text">ĐƠN VỊ TỔ CHỨC</h2>
                <hr>
                <div class="organnit_wrapper">
                    <div class="organnit_logo">
                        <img class="organnit_img" src="./img/logoxwacth.jpg" alt="">
                    </div>
                    <div class="organnit_desc">
                        <h2>Đơn Vị Chính XWATCH</h2>
                        <hr>
                        <p>XWatch là hệ thống cửa hàng phân phối đồng hồ chính hãng uy tín tại Việt Nam. Với khẩu hiệu
                            “Tiêu diệt gian thương – Bài trừ hàng Fake”, X-Watch là đơn vị tiên phong trong việc đẩy lùi
                            hàng fake, bảo vệ những lợi ích chính đáng của khách hàng. Ngày 2/12/2015, đơn vị này vinh
                            dự được nhận cúp vàng: Hàng thật – Thương hiệu chính hãng từ Viện Sở hữu trí tuệ Quốc tế.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="feedback">
            <div class="feedback_content">
                <h2 class="feedback_text">Chia Sẻ Của những người tham gia</h2>
                <hr>
                <div class="feedback_list">
                    <div class="feedback_item">
                        <div class="feedback_desc">
                            <p>Thấy 1 bên rao em đồng hồ LeCoultre trên mạng, ưng quá. Gửi ảnh chụp của họ sang chương
                                trình thẩm định miễn phí. Nhận được phản hồi là hàng chuẩn thì múc luôn. Mua được vợ
                                đẹp, vợ chuẩn đúng là cảm ơn bác Trường</p>
                        </div>
                        <div class="feedback_img">
                            <img class="fb_img" src="img/feedback1.jpg" alt="">
                            <h4 class="feedback_name">Nguyễn Văn An</h4>
                        </div>
                    </div>
                    <div class="feedback_item">
                        <div class="feedback_desc">
                            <p>Thấy 1 bên rao em đồng hồ LeCoultre trên mạng, ưng quá. Gửi ảnh chụp của họ sang chương
                                trình thẩm định miễn phí. Nhận được phản hồi là hàng chuẩn thì múc luôn. Mua được vợ
                                đẹp, vợ chuẩn đúng là cảm ơn bác Trường</p>
                        </div>
                        <div class="feedback_img">
                            <img class="fb_img" src="img/feedback2.jpg" alt="">
                            <h4 class="feedback_name">Lê Ngọc Thắng</h4>
                        </div>
                    </div>
                    <div class="feedback_item">
                        <div class="feedback_desc">
                            <p>Thấy 1 bên rao em đồng hồ LeCoultre trên mạng, ưng quá. Gửi ảnh chụp của họ sang chương
                                trình thẩm định miễn phí. Nhận được phản hồi là hàng chuẩn thì múc luôn. Mua được vợ
                                đẹp, vợ chuẩn đúng là cảm ơn bác Trường</p>
                        </div>
                        <div class="feedback_img">
                            <img class="fb_img" src="img/feedback3.jpg" alt="">
                            <h4 class="feedback_name">Nguyễn Văn Bình</h4>
                        </div>
                    </div>
                    <div class="feedback_item">
                        <div class="feedback_desc">
                            <p>Thấy 1 bên rao em đồng hồ LeCoultre trên mạng, ưng quá. Gửi ảnh chụp của họ sang chương
                                trình thẩm định miễn phí. Nhận được phản hồi là hàng chuẩn thì múc luôn. Mua được vợ
                                đẹp, vợ chuẩn đúng là cảm ơn bác Trường</p>
                        </div>
                        <div class="feedback_img">
                            <img class="fb_img" src="img/feedback4.jpg" alt="">
                            <h4 class="feedback_name">Trần Hữu Đạt</h4>
                        </div>
                    </div>
                    <div class="feedback_item">
                        <div class="feedback_desc">
                            <p>Thấy 1 bên rao em đồng hồ LeCoultre trên mạng, ưng quá. Gửi ảnh chụp của họ sang chương
                                trình thẩm định miễn phí. Nhận được phản hồi là hàng chuẩn thì múc luôn. Mua được vợ
                                đẹp, vợ chuẩn đúng là cảm ơn bác Trường</p>
                        </div>
                        <div class="feedback_img">
                            <img class="fb_img" src="img/feedback3.jpg" alt="">
                            <h4 class="feedback_name">Đỗ Ngọc Chính</h4>
                        </div>
                    </div>
                    <div class="feedback_item">
                        <div class="feedback_desc">
                            <p>Thấy 1 bên rao em đồng hồ LeCoultre trên mạng, ưng quá. Gửi ảnh chụp của họ sang chương
                                trình thẩm định miễn phí. Nhận được phản hồi là hàng chuẩn thì múc luôn. Mua được vợ
                                đẹp, vợ chuẩn đúng là cảm ơn bác Trường</p>
                        </div>
                        <div class="feedback_img">
                            <img class="fb_img" src="img/feedback6.jpg" alt="">
                            <h4 class="feedback_name">Tran Thị Bình</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Contaner End-->
    <div class="footer bg-gray-900">
        <div class="container text-light mt-5 pt-5">
            <div class="row  pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <a href="" class="text-decoration-none">
                        <h2 class="mb-4 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border border-white px-3 mr-1">WATCH</span><span
                                class="text-light">SHOP</span></h2>
                    </a>
                    <p>Đây là kênh bán sản phẩm chính hãng giá rẻ hàng đầu. Chúng tôi chỉ bán đồng hồ chính hãng & Chúng
                        tôi bán đồng hồ với giá thấp hơn mọi cửa hàng tại Việt Nam.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-light mr-3"></i>81, Lê Thanh Nghị, Hà Nội</p>
                    <p class="mb-2"><i class="fa fa-envelope text-light mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-light mr-3"></i>+012 345 6789</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">Hướng dẫn</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Bảo
                                    hành & Đổi trả</a>
                                <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Phương
                                    thức thanh toán</a>
                                <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Vận
                                    chuyển & Giao nhận</a>
                                <a class="text-light mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Điều
                                    khoản sử dụng</a>
                                <a class="text-light mb-2" href="checkout.html"><i
                                        class="fa fa-angle-right mr-2"></i>Bảo mật thông tin</a>
                                <a class="text-light" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Trung
                                    tâm bảo hành</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">THAM KHẢO</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Thông
                                    Báo Mới</a>
                                <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Điều
                                    Khoản Sử Dụng</a>
                                <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Bảo
                                    Mật Thông Tin</a>
                                <a class="text-light mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Ngưng
                                    Hiện Quảng Cáo</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-light mb-4">Thông tin</h5>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                        required="required" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block border-0 py-3" type="submit">Đăng ký
                                        ngay</button>
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

</body>

</html>