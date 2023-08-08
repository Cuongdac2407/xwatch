<?php
    include('./control.php');
    $get_data = new data_product();
    $delete = $get_data -> delete_product($_GET['del']);
    if($delete) header('location: ./product.php');
    else echo "not delete";
?>