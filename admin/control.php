<?php
    include('connect.php');
    class data_login {
        function login_user($name) {
            global $conn;
            $sql = "select * from admin where name = '$name'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function login($name, $pass) {
            global $conn;
            $sql = "select * from admin where name = '$name' and password = '$pass'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }

    class data_product {
        function add_product($tensanpham, $giaban, $giagiam, $img1, $img2, $img3, $img4, $thuonghieu, $thongtin, 
                        $loai, $gioitinh, $duongkinh, $daydeo, $xuatxu, $khungvien, $dodaymat, $soluong) {
            global $conn;
            $sql = "insert into sanpham(tensanpham, giaban, giagiam, img1, img2, img3, img4, thuonghieu, 
                                thongtin, loai, gioitinh, duongkinh, daydeo, xuatxu, khungvien, dodaymat, soluong) 
                    values ('$tensanpham','$giaban','$giagiam','$img1','$img2','$img3','$img4','$thuonghieu','$thongtin',
                            '$loai','$gioitinh','$duongkinh','$daydeo','$xuatxu','$khungvien','$dodaymat', $soluong)";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function select_product_box($tensanpham, $giaban, $giagiam, $img1) {
            global $conn;
            $sql = "select * from sanpham where tensanpham = '$tensanpham', giaban = '$giaban', giagiam = '$giagiam', img1 = '$img1' ";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function select_all_product() {
            global $conn;
            $sql = "select * from sanpham";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function delete_product($id_product) {
            global $conn;
            $sql = "delete from sanpham where id='$id_product'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function select_product_id($id_product) {
            global $conn;
            $sql = "select * from sanpham where id= $id_product";
            $run = mysqli_query($conn, $sql);
            return $run;
        }   
        function update_product($tensanpham, $giaban, $giagiam, $thuonghieu, $thongtin, $loai, $gioitinh, $duongkinh, $daydeo, $xuatxu, $khungvien, $dodaymat, $id, $soluong) {
            global $conn;
            $sql = "update sanpham set tensanpham = '$tensanpham' ,giaban = '$giaban', giagiam = '$giagiam', thuonghieu = '$thuonghieu',
                 thongtin = '$thongtin', loai = '$loai', gioitinh = '$gioitinh',  duongkinh = '$duongkinh', daydeo = '$daydeo',
                  xuatxu = '$xuatxu', khungvien = '$khungvien', dodaymat = '$dodaymat', soluong = $soluong where id = '$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function update_img1($img1, $id) {
            global $conn;
            $sql = "update sanpham set img1 = '$img1' where id = '$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function update_img2($img2, $id) {
            global $conn;
            $sql = "update sanpham set img2 = '$img2' where id = '$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function update_img3($img3, $id) {
            global $conn;
            $sql = "update sanpham set img3 = '$img3' where id = '$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function update_img4($img4, $id) {
            global $conn;
            $sql = "update sanpham set img4 = '$img4' where id = '$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }
    
    class accounts {
        function select_admin_acc() {
            global $conn;
            $sql = "select * from admin";
            $run = mysqli_query($conn, $sql);
            return $run;
        } 
        function select_user_acc() {
            global $conn;
            $sql = "select * from nguoidung";
            $run = mysqli_query($conn, $sql);
            return $run;
        } 
    }

    class phanhoi {
        function select_feed() {
            global $conn;
            $sql = "select * from phanhoi";
            $run = mysqli_query($conn, $sql);
            return $run;
        } 
        function delete_feed($id) {
            global $conn;
            $sql = "delete from phanhoi where id='$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }

?>