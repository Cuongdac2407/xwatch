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
    <link rel="stylesheet" href="./css/repair.css">
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
                                    <a href="./modern_watch.php" class="nav-item nav-link position-relative text-uppercase mx-4">Đồng hồ hiện đại</a>
                                    <a href="./repair.php" class="nav-item nav-link position-relative text-uppercase mx-4 active">Sửa chữa</a>
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
    <div class="container">
        <div class="wrapper">
            <div class="wrapper_desc">
                <h1 class="wrapper_text">TẠI SAO NÊN CHỌN SỬA CHỮA ĐỒNG HỒ TẠI WATCHSHOP? </h1>
                <hr>
            </div>
            <div class="wrapper_content">

                <div class="wrapper_list">
                    <img class="wrapper_list_img" src="img/logorepair.PNG" alt="">
                    <div class="wrapper_item">
                        <i class="fa-solid fa-user-group"></i>
                        <div class="wrapper_item-content">
                            <span class="wrapper_title">ĐỘI NGŨ KỸ THUẬT</span>
                            <span class="wrapper_label">CHUYÊN GIA - TÂM HUYẾT</span>
                        </div>
                    </div>
                    <div class="wrapper_item">
                        <i class="fa-solid fa-medal"></i>
                        <div class="wrapper_item-content">
                            <span class="wrapper_title">CAM KẾT BẢO HÀNH SỬA CHỮA</span>
                            <span class="wrapper_label">CHUẨN CÁC BƯỚC</span>
                        </div>
                    </div>
                    <div class="wrapper_item">
                        <i class="fa-solid fa-trophy"></i>
                        <div class="wrapper_item-content">
                            <span class="wrapper_title">CƠ SỞ SỬA CHỮA </span>
                            <span class="wrapper_label">ĐẠT CHUẨN</span>
                        </div>
                    </div>
                    <div class="wrapper_item">
                        <i class="fa-solid fa-gear"></i>
                        <div class="wrapper_item-content">
                            <span class="wrapper_title">TRANG THIẾT BỊ</span>
                            <span class="wrapper_label">NHẬP KHẨU HIỆN ĐẠI</span>
                        </div>
                    </div>
                </div>

                <div class="wrapper_img">
                    <img class="wrapper_size-img" src="img/thamdinh2.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="procedure">
            <div class="procedure_content">
                <h2 class="procedure_text">QUY TRÌNH SỬA CHỮA ĐỒNG HỒ</h2>
                <hr>
                <div class="procedure_list">
                    <div class="procedure_item">
                        <img src="img/thamdinh1.jpg" alt="">
                        <p>THẨM ĐỊNH VÀ TIẾP NHẬN ĐỒNG HỒ</p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/thamdinh2.jpg" alt="">
                        <p>VỆ SINH $ LÀM MỚI DÂY VỎ</p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/thamdinhacv.jpg" alt="">
                        <p>THÁO, VỆ SINH CHI TIẾT MÁY</p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/thamdinh4.jpg" alt="">
                        <p>LAU CHẤM DẤU $ SỬA CHỮA</p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/thamdinh5.jpg" alt="">
                        <p>KHỬ TỬ - CĂN CHỈNH NHANH CHẬM</p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/repair1.jpg" alt="">
                        <p>TEST MÁY TRÊN AUTOMATIC - TEST</p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/repair2.jpg" alt="">
                        <p>KIỂM TRA ĐỘ CHỐNG NƯỚC </p>
                    </div>
                    <div class="procedure_item">
                        <img src="img/thamdinh6.jpg" alt="">
                        <p>KIỂM TRA THÔNG SỐ XUẤT XƯỞNG</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="replace">
            <div class="replace_content">
                <h2 class="replace_text">QUY TRÌNH THAY PIN ĐỒNG HỒ</h2>
                <hr>
                <div class="replace_list">
                    <div class="replace_item">
                        <img src="img/thamdinh1.jpg" alt="">
                        <p>THÁO PIN</p>
                    </div>
                    <div class="replace_item">
                        <img src="img/thamdinh2.jpg" alt="">
                        <p>ĐO PIN</p>
                    </div>
                    <div class="replace_item">
                        <img src="img/thamdinhacv.jpg" alt="">
                        <p>VỆ SINH</p>
                    </div>
                    <div class="replace_item">
                        <img src="img/thamdinh4.jpg" alt="">
                        <p>THAY PIN MỚI</p>
                    </div>
                    <div class="replace_item">
                        <img src="img/thamdinh5.jpg" alt="">
                        <p>VỆ SINH DAY VỎ</p>
                    </div>
                    <div class="replace_item">
                        <img src="img/repair1.jpg" alt="">
                        <p>LẮP RÁP</p>
                    </div>
                    <div class="replace_item">
                        <img src="img/repair2.jpg" alt="">
                        <p>KIỂM TRA ĐỘ KÍN KHÍT VỎ. NẮP </p>
                    </div>
                    <div class="replace_item">
                        <img src="img/thamdinh6.jpg" alt="">
                        <p>KIỂM TRA ĐỘ THẤM NƯỚC</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="maintenance">
            <div class="maintenance_content">
                <h2 class="maintenance_text">DỊCH VỤ BẢO DƯỠNG , SỬA CHỮA TẠI XWATCH</h2>
                <hr>
                <div class="maintenance_table">
                    <table border="1" class="table_content">
                        <tr>
                            <th class="tabel_th">Loại Máy</th>
                            <th class="tabel_th">loại đồng hồ</th>
                            <th colspan="2" class="tabel_th">Dịch Vụ</th>
                        </tr>
                        <tr>
                            <td rowspan="20">Nhật Bản</td>
                            <td rowspan="10">Pin</td>
                            <td rowspan="2">Dây lau <br>(bao gồm cả thay pin)</td>
                            <td>Đồng Hồ 3 kim</td>

                        </tr>
                        <tr>
                            <td class="tabel_color">Đồng hồ nhiều kim</td>
                        </tr>
                        <tr>
                            <td >Thay pin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="tabel_color">thay kính</td>
                            <td class="tabel_color">Kính Thường</td>

                        </tr>

                        <tr>
                            <td>Kính shapphia trắng</td>

                        </tr>
                        <tr>
                            <td class="tabel_color">Kính Shapphia cong</td>
                        </tr>
                        <tr>
                            <td rowspan="3">Đánh Bóng</td>
                            <td>toàn bộ dây vỏ</td>
                        </tr>
                        <tr>
                            <td class="tabel_color">Chỉ Dây hoặc Vỏ</td>
                        </tr>
                        <tr>
                            <td>Kính Thường</td>
                        </tr>
                        <tr>
                            <td >Thay IC</td>
                            <td class="tabel_color">.</td>
                        </tr>
                        <tr>
                            <td rowspan="10">Cơ</td>
                            <td rowspan="2">Lau dầu</td>
                            <td>Đồng Hồ Kim</td>
                        </tr>
                        <tr>
                            <td>Đồng Hồ 3 kim</td>
                        </tr>
                        <tr>
                            <td rowspan="3">thay kính</td>
                            <td>Kính Thường</td>
                        </tr>
                        <tr>
                            <td class="tabel_color">Kính Shapphia trắng</td>
                        </tr>
                        <tr>
                            <td>Kính Cong</td>
                        </tr>
                        <tr>
                            <td rowspan="3">Đánh Bóng</td>
                            <td class="tabel_color">toàn bộ dây vỏ</td>
                        </tr>
                        <tr>
                            <td>Chỉ Dây hoặc Vỏ</td>
                        </tr>
                        <tr>
                            <td class="tabel_color">Kính Thường</td>
                        </tr>
                        <tr>
                            <td colspan="2">Linh Kiện</td>
                        </tr>
                        <tr>
                            <td>Chỉnh nhanh chậm- khử tử</td>
                        </tr>
                        <tr>
                            <td rowspan="18">Thụy sĩ</td>
                            <td rowspan="10">Pin</td>
                            <td rowspan="2">Lau dầu <br>(Bao gồm cả thay pin)</td>
                            <td>Đồng Hồ 3 kim</td>
                        </tr>
                        <tr>
                            <td class="tabel_color">Đồng Hồ nhiều kim</td>
                        </tr>
                        <tr>
                            <td colspan="2">Thay Kính</td>
                        </tr>
                        <tr>
                            <td rowspan="3">thay kính</td>
                            <td class="tabel_color">Kính Thường</td>
                        </tr>
                        <tr>
                            <td>Kính Shapphia phẳng</td>
                        </tr>
                        <tr>
                            <td class="tabel_color">Kính Cong</td>
                        </tr>
                        <tr>
                            <td rowspan="3">Đánh Bóng</td>
                            <td>toàn bộ dây vỏ</td>
                        </tr>
                        <tr>
                            <td class="tabel_color"> Chỉ Dây hoặc Vỏ</td>
                        </tr>
                        <tr>
                            <td>Kính Thường</td>
                        </tr>
                        <tr>
                            <td >Thay IC</td>
                            
                        </tr>
                        <tr>
                            <td rowspan="8">Cơ</td>
                            <td rowspan="2">Lau dầu</td>
                            <td class="tabel_color">Đồng Hồ 3 kim</td>
                        </tr>
                        <tr>
                            <td>Đồng hồ nhiều kim</td>
                        </tr>
                        <tr>
                            <td rowspan="2">Thay Kính</td>
                            <td class="tabel_color">Kính Shapphia Phẳng</td>
                        </tr>
                        <tr>
                            <td>Kính shapphia cong</td>
                        </tr>
                        <tr>
                            <td rowspan="2">Đánh bóng</td>
                            <td class="tabel_color">Toàn Bộ dây vỏ</td>
                        </tr>
                        <tr>
                            <td>Chỉ Dây hoặc vỏ</td>
                        </tr>
                        <tr>
                            <td>Linh kiện(1 linh kiện)</td>
                            <td class="tabel_color"></td>
                        </tr>
                        <tr>
                            <td >Chỉnh Nhanh chậm - khử tử</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="calendar">
               <div class="calendar_content">
                <div class="calender_container">
                    <div class="calender_img">
                        <img src="./img/logocalender.PNG" alt="" class="calender_img_1">
                    </div>
                    <div class="calender_list">
                        <div class="calender_text">
                            <h2 class="list_desc">Sáng:9h-12h | Chiều : 13H - 18H</h2>
                             <h2 class="list_desc">THỜI GIAN: THỨ 2 - THỨ 7 HÀNG TUẦN</h2>
                        </div>
                        <div class="calender_desc">
                            <p>(*) Lưu ý:WATCHSHOP chỉ nhanh sửa chữa đối với khách hàng mang đồng hồ đến trực tiếp qua các cơ sở kỹ thuật, không nhận qua shipcode trừ một số trường hợp đặc biệt . Quý Khách hàng vui lòng liên hệ Xwatch để biết thêm chi tiết</p>
                        </div>
                    </div>
                </div>
               </div>
        </div>
    </div>
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