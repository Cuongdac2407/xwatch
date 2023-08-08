<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include('connect.php');
    class data
    {
        function register($email, $user, $pw)
        {
            global $conn;
            $sql = "insert into nguoidung(email, username, password) 
                                values ('$email','$user','$pw')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function login_user($email)
        {
            global $conn;
            $sql = "select * from nguoidung where email = '$email'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function login($email, $pass)
        {
            global $conn;
            $sql = "select * from nguoidung where email = '$email' and password = '$pass'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }

    class dataProduct
    {
        function watch_classic()
        {
            global $conn;
            $sql = "select * from sanpham where loai = 'Cổ điển'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function watch_modern()
        {
            global $conn;
            $sql = "select * from sanpham where loai = 'Hiện đại'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }

    class dataMessage
    {
        function mess($hoten, $email, $sdt, $tinnhan)
        {
            global $conn;
            $sql = "insert into message(hoten, email, sdt, tinnhan) values('$hoten', '$email', '$sdt', '$tinnhan')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }

    class dataComment
    {
        function comment($productId, $userId, $sosao,$comment, $date)
        {
            global $conn;
            $sql = "insert into danhgia(idSP, idND, sosao,binhluan, ngaythang) values('$productId', '$userId', '$sosao','$comment', '$date')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function select_comment_id($idSP)
        {
            global $conn;
            $sql = "select * from danhgia where idSP = '$idSP'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function select_user_id($idND)
        {
            global $conn;
            $sql = "select * from nguoidung where id = '$idND'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }
   
    function ketnoidb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
         $dbname = "dongho";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;  
       } catch(PDOException $e) {
       return $e->getMessage();
     }


    }
