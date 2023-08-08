<?php
    include('./control.php');
    session_start();
    $data = [];
    $productIds = $_POST['product'];
    $qty = $_POST['qty'];
    foreach ($productIds as $k => $v) {
        $data[$k]['product_id'] = $v;
        $data[$k]['qty'] = $qty[$k];
    }

    $productErr = [];

    foreach ($data as $item) {
        $id = $item['product_id'];
        $sql = "SELECT * FROM sanpham WHERE id = {$id}";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        if ($product['soluong'] < $item['qty']) {
            $productErr[] = $product['tensanpham'];
        } else {
            $_SESSION['shopping_cart'][$id]['item_qty'] = $item['qty'];
        }
    }

    if (count($productErr) > 0) {
        $productErrStr = implode(', ', $productErr);
        echo '<script>
            alert("Sản phẩm ' . $productErrStr . ' không thể cập nhật do không đủ số lượng !");
        </script>';
    }

    echo '<script>
        window.location.href = "cart.php";
    </script>';

