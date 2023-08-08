<?php
    session_start();
    include('control.php');
    $get_data = new data;
    $err = [];
    if (isset($_POST['txtsub'])) {
        //Lấy dữ liệu nhập vào
        $email = $_POST['txtemail'];
        $pw = $_POST['txtpw'];
        $sql = " SELECT * FROM nguoidung WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkEmail = mysqli_num_rows($query);    
        $login_user = $get_data -> login_user($email);
            if (mysqli_num_rows($login_user) == 0) {
                $err['txtemail'] = 'Email không tồn tại';
            } else {
                // Kiểm tra mật khẩu
                $login = $get_data -> login($email, $pw);
                if (mysqli_num_rows($login) == 0) {
                    $err['txtpw'] = 'Mật khẩu không đúng';
                } else {
                    //Đăng nhập vào
                    $_SESSION['username'] = $data; 
                    sleep(1);
                    header("location: ./index.php");
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
    <title>Đăng nhập</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="POST" id="form-login">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input type="email" name="txtemail" required class="form-input" autocomplete="off" placeholder="Nhập email">               
                </div>
                <div class="err">
                    <?php echo (isset($err['txtemail']))?$err['txtemail']: ''?>
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" name="txtpw" required  class="form-input" placeholder="Mật khẩu">
                    <div class="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <div class="err">
                    <?php echo (isset($err['txtpw']))?$err['txtpw']: ''?>
                </div>
            </div>  
            <input type="submit" name="txtsub" value="Đăng nhập" class="form-submit">
            <div class="options">
                <div class="options-forget-pass">
                    <a href="">Quên mật khẩu</a>
                </div>
                <button class="options-btn">
                    <a href="./registers.php" class="options-link">Đăng ký</a>
                </button>
                
            </div>
        </form>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="./js/login.js"></script>
</html>