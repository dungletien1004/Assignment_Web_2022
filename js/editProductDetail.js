var userMenu = document.querySelector('.user-dropdown-menu');
var img = document.querySelector('.product-master-img');
var img1 = document.querySelector('#product-slave-img-01');
var img2 = document.querySelector('#product-slave-img-02');
var tmp1 = img1.src;
var tmp2 = img2.src;
var editMenu = document.querySelector('.edit-dropdown-menu');
var confirmDelete = document.querySelector('.confirm-delete-modal');
var changeImg = document.querySelector('.change-img-modal');
var productImg = document.querySelector('.product-img-link');
var sale = document.querySelector('.price-decrease-pecent');
var price = document.querySelector('#product-price');
var decreasePrice = document.querySelector('#product-decrease-price');

function userHover(){
    userMenu.style.display = 'block';
}

function userLeave(){
    userMenu.style.display = 'none';
}

function changeImg1(){
    img1.style.border = '1.5px black solid';
    img2.style.border = 'none';
    img.src = tmp1;
}

function changeImg2(){
    img2.style.border = '1.5px black solid';
    img1.style.border = 'none';
    img.src = tmp2;
}

function editHover(){
    editMenu.style.display = 'block';
}

console.log(productImg);

function editLeave(){
    editMenu.style.display = 'none';
}

function openConfirmDelete(){
    confirmDelete.style.display = 'block';
    productImg.value = img.src;
}

function closeConfirmDelete(){
    confirmDelete.style.display = 'none';
}

function openChangeImg(){
    changeImg.style.display = 'block';
    productImg.value = img.src;
}

function closeChangeImg(){
    changeImg.style.display = 'none';
}

function caculate(){
    var tmp = (Number(decreasePrice.value)/Number(price.value))*100;
    sale.innerHTML = String(tmp) + '%';
}