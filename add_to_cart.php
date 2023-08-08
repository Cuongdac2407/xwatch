<?php
    include 'connect.php';
    session_start();
    $id = $_POST['id'];
    $sql = "SELECT * FROM sanpham WHERE id = {$id}";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    $totalQty = isset($_SESSION['shopping_cart']) ? array_sum(array_column($_SESSION['shopping_cart'], 'item_qty')) : 0;
    if ($product['soluong'] < $totalQty + 1) {
        echo json_encode([
            'status' => 400,
            'msg' => 'Số lượng sản phẩm không đủ'
        ]);
        die();
    }

    if (isset($_SESSION['shopping_cart'])) {
        $productIds = array_column($_SESSION['shopping_cart'], 'item_id');
        if (!in_array($_POST['id'], $productIds)) {
            $item_array = [
                'item_id' => $_POST['id'],
                'item_name' => $product['tensanpham'],
                'item_price' => (int) $product['giagiam'],
                'item_qty' => 1,
            ];
            $_SESSION['shopping_cart'][$_POST['id']] = $item_array;
        } else {
            $_SESSION['shopping_cart'][$_POST['id']]['item_qty'] += 1;
        }
    } else {
        $item_array = [
            'item_id' => $_POST['id'],
            'item_name' => $product['tensanpham'],
            'item_price' => (int) $product['giagiam'],
            'item_qty' => 1,
        ];
        $_SESSION['shopping_cart'][$_POST['id']] = $item_array;
    }

    $totalQty = array_sum(array_column($_SESSION['shopping_cart'], 'item_qty'));

    echo json_encode([
        'status' => 200,
        'qty' => $totalQty,
    ]);
