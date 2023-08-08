(function ($) {
    "use strict";
 
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }

        if($(this).scrollTop() > 240) {
            $('.header-nav').addClass('header-nav-fixed');
        } else {
            $('.header-nav').removeClass('header-nav-fixed');
        }

    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    }, 200);


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 500,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    },200);

    // addDataCart();
    // getDataCart();
    // updateCart();
    // deleteCart();
    // handleCheckout();


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

    // Silder main
    $(".slider-inner").slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: "ease-in-out",
        prevArrow: '<a type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></a>',
        nextArrow: '<a type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></a>'
    })


    //Product detail slider
    $(".product-slick-inner").slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        easing: "linner",
        prevArrow: '<a type="button" class="slick-product-prev"><i class="fa-solid fa-chevron-left"></i></a>',
        nextArrow: '<a type="button" class="slick-product-next"><i class="fa-solid fa-chevron-right"></i></a>',
        asNavFor: "#slick-slide-navfor"
    });

    $("#slick-slide-navfor").slick({
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrow: false,
        focusOnSelect: true,
        asNavFor: ".product-slick-inner"
    })
    
})(jQuery);

//Hiển thị mật khẩu login
$(document).ready(function(){
    $('.eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});

//thêm số sao
var inputSao = document.getElementsByClassName('input-sao');
for(let i = 0; i < inputSao.length; i++) {
    console.log(i)
    var rating = "";
    if (inputSao[i].value > 0) {
        rating = inputSao[i].value;
        console.log(rating);
        for (var j = 1; j <= 5; j++) {
            if (j <= rating) {
                document.getElementsByClassName('rating')[i].innerHTML += `<i class="fa fa-star"></i>`
            } else {
                document.getElementsByClassName('rating')[i].innerHTML += `<i class="fa fa-star-o"></i>`
            }
        }
    }
}
// Phân trang
    var products = [];
    var itemsPerPage = 9; 
    var productList = document.getElementsByClassName("product-item__wrapper");
    for(let i = 0; i < productList.length; i++) {
        products.push(productList[i]);
    }
    function displayProducts(pageNumber) {
    var startIndex = (pageNumber - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;

    var productList = document.getElementById("product-list");
    productList.innerHTML = ""; // Xóa nội dung hiện tại của danh sách sản phẩm

    for (var i = startIndex; i < endIndex && i < products.length; i++) {
        var product = products[i];
        productList.appendChild(product);
    }
    }

    function createPagination() {
    var totalPages = Math.ceil(products.length / itemsPerPage);

    var pagination = document.getElementById("page");
    pagination.innerHTML = ""; // Xóa nội dung hiện tại của phân trang

    for (var i = 1; i <= totalPages; i++) {
        var pageItem = document.createElement("li");
        pageItem.classList.add("page-item")
        var pageLink = document.createElement("a");
        pageLink.classList.add("page-link")
        pageLink.href = "#";
        pageLink.textContent = i;
        pageItem.appendChild(pageLink);
        
        pageLink.addEventListener("click", function (event) {
            event.preventDefault();
            var pageNumber = parseInt(event.target.textContent);
            displayProducts(pageNumber);
        });
        pagination.appendChild(pageItem);
    }
    document.getElementsByClassName("page-item")[0].classList.add("active")
    }
    displayProducts(1);
    createPagination();

    // Thêm active vào thẻ li
    var liElements = document.getElementsByClassName("page-item");

    function handleClick() {
        for (var i = 0; i < liElements.length; i++) {
            liElements[i].classList.remove("active");
        }
        this.classList.add("active");
        
        
        $('.page-item').click(function () {
            $('html, body').animate({scrollTop: 0}, 0);
            return false;
        });
    }

    // Gán sự kiện click cho từng phần tử <li>
    for (var i = 0; i < liElements.length; i++) {
        liElements[i].addEventListener("click", handleClick);
    }

//href
    document.addEventListener('DOMContentLoaded', function() {
        var smoothLinks = document.getElementsByTagName('a');
        for (var i = 0; i < smoothLinks.length; i++) {
          smoothLinks[i].addEventListener('click', smoothRedirect);
        }
      
        function smoothRedirect(e) {
          e.preventDefault();
          var targetUrl = this.getAttribute('href');
            
          setTimeout(function() {
            window.location.href = targetUrl;
          }, 300); 
        }
      });
      
      
      
      
      
      
      
