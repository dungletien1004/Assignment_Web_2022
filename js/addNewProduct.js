var userMenu = document.querySelector('.user-dropdown-menu');
var sale = document.querySelector('.price-decrease-pecent');
var price = document.querySelector('#product-price');
var decreasePrice = document.querySelector('#product-decrease-price');

function userHover(){
    userMenu.style.display = 'block';
}

function userLeave(){
    userMenu.style.display = 'none';
}

function caculate(){
    var tmp = (Number(decreasePrice.value)/Number(price.value))*100;
    sale.innerHTML = String(tmp) + '%';
}