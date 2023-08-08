<?php
include('control.php');
$err = [];
if (isset($_POST['txtsub'])) {
    $email  = $_POST['txtemail'];
    $user   = $_POST['txtuser'];
    $pw     = $_POST['txtpw'];
    $repw   = $_POST['txtrepw'];

    $get_data = new data;
    $check_user = $get_data->login_user($user);

    // Kiểm tra tên đăng nhập tồn tại
    if (mysqli_num_rows($check_user) > 0) {
        $err['txtuser'] = 'Tên đăng nhập đã tồn tại!';
    }

    // Kiểm tra mật khẩu trùng nhau
    else if ($pw !== $repw) {
        $err['txtrepw'] = 'Mật khẩu không trùng khớp!';
    } else {  
        $register = $get_data->register($email, $user, $pw);
        if ($register) {
            echo '<script>alert("Đăng ký thành công.")</script>';
            sleep(1);
            header("Refresh: 0.1; url=./login.php");
        } else {
            echo '<script>alert("Đăng ký không thành công.")</script>';
        }
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Đăng ký</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="POST" id="form-login" autocomplete="off">
            <h1 class="form-heading">Đăng ký</h1>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="far fa-envelope"></i>
                    <input type="email" name="txtemail" required class="form-input" placeholder="Nhập email">
                </div>
                <div class="err">
                    <?php echo (isset($err['txtemail'])) ? $err['txtemail'] : '' ?>
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input type="text" name="txtuser" required class="form-input" placeholder="Tên người dùng">
                </div>
                <div class="err">
                    <?php echo (isset($err['txtuser'])) ? $err['txtuser'] : '' ?>
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" name="txtpw" required class="form-input" placeholder="Mật khẩu">
                    <div class="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <div class="err">
                    <?php echo (isset($err['txtpw'])) ? $err['txtpw'] : '' ?>
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" name="txtrepw" required class="form-input" placeholder="Nhập lại mật khẩu">
                    <div class="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <div class="err">
                    <?php echo (isset($err['txtrepw'])) ? $err['txtrepw'] : '' ?>
                </div>
            </div>
            <input type="submit" name="txtsub" value="Đăng ký" class="form-submit">
            <div class="options">
                <div class="options-forget-pass">
                    <a href="">Quên mật khẩu</a>
                </div>
                <button class="options-btn">
                    <a href="./login.php" class="options-link">Đăng nhập</a>
                </button>
            </div>
        </form>
    </div>


    <!-- Link js -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/login.js"></script>

</body>

</html>