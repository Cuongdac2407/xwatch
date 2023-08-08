<?php
    include('./control.php');
    session_start();
    $id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id = {$id}";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
    if ($product['soluong'] < $_SESSION['shopping_cart'][$id]['item_qty'] + 1) {
        echo '<script>
            alert("Sản phẩm ' . $product['tensanpham'] . ' không thể cập nhật do không đủ số lượng !");
            window.location.href = "cart.php";
        </script>';
        die();
    }
    foreach($_SESSION['shopping_cart'] as $key => $value){
        if($id == $key){
            $_SESSION['shopping_cart'][$key]['item_qty'] += 1;
        }
    }

    echo '<script>
        window.location.href = "cart.php";
    </script>';
