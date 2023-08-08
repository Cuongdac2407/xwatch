let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

let mainImage = document.querySelector('.update-product .image-container .main-image img');
let subImages = document.querySelectorAll('.update-product .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});

// update product

var inputValue = document.getElementsByClassName("fileimg")
var labelValue = document.getElementsByClassName("fileLabel");

for(let i = 0; i < inputValue.length; i++) {
   if(labelValue[i].textContent != "") {
      inputValue[i].onchange = function(e) {
         if (inputValue[i].value != "") {
            let theSplit = e.target.value.split('\\');
            labelValue[i].innerHTML = theSplit[theSplit.length-1];
         }
      }
      if (inputValue[i].value == "") {
         labelValue[i].innerHTML = `${labelValue[i].textContent}`;
      }  
   } else {
      inputValue[i].onchange = function(e) {
         let theSplit = e.target.value.split('\\');
         labelValue[i].innerHTML = theSplit[theSplit.length-1];
      }
   }
}

// Phân trang
var products = [];
var itemsPerPage = 8; 
var productList = document.getElementsByClassName("box-item");
for(let i = 0; i < productList.length; i++) {
    products.push(productList[i]);
}

function displayProducts(pageNumber) {
var startIndex = (pageNumber - 1) * itemsPerPage;
var endIndex = startIndex + itemsPerPage;

var productList = document.getElementById("box-container");
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

var liElements = document.getElementsByClassName("page-item");

    function handleClick() {
        for (var i = 0; i < liElements.length; i++) {
            liElements[i].classList.remove("active");
        }
        this.classList.add("active");
        
    }
for (var i = 0; i < liElements.length; i++) {
   liElements[i].addEventListener("click", handleClick);       
}


