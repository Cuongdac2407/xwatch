<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    function getRevenueByDate($conn, $date)
    {
        $data = [];
        $sql = "SELECT * FROM donhang a, chitietdonhang b WHERE a.id = b.order_id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sanpham WHERE id = " . $row['product_id']));
            if (date('Y-m-d', strtotime($row['created_at'])) == $date) {
                if (!isset($data[$product['tensanpham']])) {
                    $data[$product['tensanpham']] = [
                        'total' => $product['giagiam'] * $row['qty']
                    ];
                } else {
                    $data[$product['tensanpham']]['total'] += $row['giagiam'] * $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getRevenueByMonthYear($conn, $month, $year)
    {
        $data = [];
        $sql = "SELECT * FROM donhang a, chitietdonhang b WHERE a.id = b.order_id";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sanpham WHERE id = " . $row['product_id']));
            if (date('m', strtotime($row['created_at'])) == $month && date('Y', strtotime($row['created_at'])) == $year) {
                if (!isset($data[$product['tensanpham']])) {
                    $data[$product['tensanpham']] = [
                        'total' => $product['giagiam'] * $row['qty']
                    ];
                } else {
                    $data[$product['tensanpham']]['total'] += $row['giagiam'] * $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getRevenueEachDay($conn)
    {
        $data = [];
        $sql = "SELECT * FROM donhang a, chitietdonhang b WHERE a.id = b.order_id";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sanpham WHERE id = " . $row['product_id']));
            if (date('Y-m-d', strtotime($row['created_at'])) == date('Y-m-d')) {
                if (!isset($data[$product['tensanpham']])) {
                    $data[$product['tensanpham']] = [
                        'total' => $product['giagiam'] * $row['qty']
                    ];
                } else {
                    $data[$product['tensanpham']]['total'] += $row['giagiam'] * $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getRevenueEachMonth($conn)
    {
        $data = [];
        $sql = "SELECT * FROM donhang a, chitietdonhang b WHERE a.id = b.order_id";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sanpham WHERE id = " . $row['product_id']));
            if (date('m', strtotime($row['created_at'])) == date('m') && date('Y', strtotime($row['created_at'])) == date('Y')) {
                if (!isset($data[$product['tensanpham']])) {
                    $data[$product['tensanpham']] = [
                        'total' => $product['giagiam'] * $row['qty']
                    ];
                } else {
                    $data[$product['tensanpham']]['total'] += $row['giagiam'] * $row['qty'];
                }
            }
        }

        return json_encode($data);
    }
