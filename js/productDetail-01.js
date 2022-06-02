var userMenu = document.querySelector('.user-dropdown-menu');
var number = document.querySelector('#number');
var minus = document.querySelector('.minus');
var m = document.querySelector('.m-size');
var l = document.querySelector('.l-size');
var xl = document.querySelector('.xl-size');
var size = document.querySelector('#product-size');
var img = document.querySelector('.product-master-img');
var img1 = document.querySelector('#product-slave-img-01');
var img2 = document.querySelector('#product-slave-img-02');
var tmp1 = img1.src;
var tmp2 = img2.src;
var productNumber = document.getElementById('number').value;

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

function mSize(){
    m.style.backgroundColor = 'black';
    m.style.color = 'white';
    l.style.backgroundColor = 'white';
    l.style.color = 'black';
    xl.style.backgroundColor = 'white';
    xl.style.color = 'black';
    size.value = 'M';
}

function lSize(){
    l.style.backgroundColor = 'black';
    l.style.color = 'white';
    m.style.backgroundColor = 'white';
    m.style.color = 'black';
    xl.style.backgroundColor = 'white';
    xl.style.color = 'black';
    size.value = 'L';
}

function xlSize(){
    xl.style.backgroundColor = 'black';
    xl.style.color = 'white';
    l.style.backgroundColor = 'white';
    l.style.color = 'black';
    m.style.backgroundColor = 'white';
    m.style.color = 'black';
    size.value = 'XL';
}

function increaseNumber(){
    productNumber = Number(productNumber) + 1;
    number.value = productNumber;
    if (Number(productNumber) > 1){
        minus.style.color = 'black';
    }
}

function decreaseNumber(){
    if (Number(productNumber) >= 2){
        productNumber = Number(productNumber) - 1;
    }
    number.value = productNumber;
    if (Number(productNumber) == 1){
        minus.style.color = '#6F6F6F';
    }
}
