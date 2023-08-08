function addToCart(id) {
    $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: {
            'id': id,
        },
        success: function(response) {
            var response = JSON.parse(response);
            if(response.status == 200) {
                $(".sum-cart").html(response.qty);
                swal({ title: 'Thêm giỏ hàng thành công', type: 'success' });
            } else {
                swal({ title: response.msg, type: 'error' });
            }
        }
    });
}