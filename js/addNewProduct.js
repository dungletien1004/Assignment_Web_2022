var userMenu = document.querySelector('.user-dropdown-menu');
var sale = document.querySelector('.price-decrease-percent');
var price = document.querySelector('#product-price');
var decreasePrice = document.querySelector('#product-decrease-price');

function userHover(){
    userMenu.style.display = 'block';
}

function userLeave(){
    userMenu.style.display = 'none';
}

function caculate(){
    var tmp = 100 - ((Number(decreasePrice.value)/Number(price.value))*100);
    var temp = tmp.toFixed();
    if ((decreasePrice.value == 0) || (Number(decreasePrice.value) == Number(price.value))){
        sale.innerHTML = '0%';
    }
    else{
        sale.innerHTML = '-' + String(temp) + '%';
    }
}