<?php
    session_start();
    include './control.php';
    
    $get_data = new data_login();
    if(isset($_POST['sub'])){
        $name = $_POST['name'];
        $pw   = $_POST['pass'];
            
        // Kiểm tra tên đăng nhập
        $login_user = $get_data -> login_user($name);
        if (mysqli_num_rows($login_user) == 0) {
            $err['name'] = 'Tên đăng nhập không tồn tại!';
        } else {

            // Kiểm tra mật khẩu
            $login = $get_data -> login($name, $pw);
            if (mysqli_num_rows($login) == 0) {
                $err['pass'] = 'Mật khẩu không đúng!';
            } else {
                //Đăng nhập vào
                $_SESSION['name'] = $name;
                header("Refresh: 0; url= ./index.php");
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
   <title>login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
    <section class="form-container">
        <form action="" method="post" autocomplete="off">
            <h3>Đăng nhập</h3>
            <input type="text" name="name" required placeholder="Tài khoản" maxlength="20"  class="box">        
            <div class="err">
                <?php echo (isset($err['name']))?$err['name']: ''?>
            </div>
            <input type="password" name="pass" required placeholder="Mật khẩu" maxlength="20"  class="box">
            <div class="err">
                <?php echo (isset($err['pass']))?$err['pass']: ''?>
            </div>
            <input type="submit" value="đăng nhập" class="btn" name="sub">
        </form>
    </section>
   
</body>
</html>