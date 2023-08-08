<?php
    include('./control.php');
    $get_data = new phanhoi();
    $delete = $get_data -> delete_feed($_GET['del']);
    if($delete) 
        header('location: ./feebback.php');
    else 
        echo "not delete";
?>