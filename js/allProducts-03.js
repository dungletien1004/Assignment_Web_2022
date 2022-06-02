var all = document.querySelector('.menu-all');
var allIcon = document.querySelector('#all-icon');
var allHr = document.querySelector('.all-hr');
var shirt = document.querySelector('.menu-shirt');
var shirtIcon = document.querySelector('#shirt-icon');
var shirtHr = document.querySelector('.shirt-hr');
var pants = document.querySelector('.menu-pants');
var pantsIcon = document.querySelector('#pants-icon');
var pantsHr = document.querySelector('.pants-hr');
var shoes = document.querySelector('.menu-shoes');
var shoesIcon = document.querySelector('#shoes-icon');
var shoesHr = document.querySelector('.shoes-hr');
var bags = document.querySelector('.menu-bags');
var bagsIcon = document.querySelector('#bags-icon');
var bagsHr = document.querySelector('.bags-hr');
var userMenu = document.querySelector('.user-dropdown-menu');
var editMenu = document.querySelector('.edit-dropdown-menu');
var confirmDelete = document.querySelector('.confirm-delete-modal')

function allClick() {
    all.style.color = '#E70E0E';
    shirt.style.color = 'black';
    pants.style.color = 'black';
    shoes.style.color = 'black';
    bags.style.color = 'black';
    allHr.style.display = 'block';
    shirtHr.style.display = 'none';
    pantsHr.style.display = 'none';
    shoesHr.style.display = 'none';
    bagsHr.style.display = 'none';
    allIcon.style.display = 'inline';
    shirtIcon.style.display = 'none';
    pantsIcon.style.display = 'none';
    shoesIcon.style.display = 'none';
    bagsIcon.style.display = 'none';
}

function shirtClick() {
    all.style.color = 'black';
    shirt.style.color = '#E70E0E';
    pants.style.color = 'black';
    shoes.style.color = 'black';
    bags.style.color = 'black';
    allHr.style.display = 'block';
    shirtHr.style.display = 'block';
    pantsHr.style.display = 'none';
    shoesHr.style.display = 'none';
    bagsHr.style.display = 'none';
    allIcon.style.display = 'none';
    shirtIcon.style.display = 'inline';
    pantsIcon.style.display = 'none';
    shoesIcon.style.display = 'none';
    bagsIcon.style.display = 'none';
}

function pantsClick() {
    all.style.color = 'black';
    shirt.style.color = 'black';
    pants.style.color = '#E70E0E';
    shoes.style.color = 'black';
    bags.style.color = 'black';
    allHr.style.display = 'none';
    shirtHr.style.display = 'block';
    pantsHr.style.display = 'block';
    shoesHr.style.display = 'none';
    bagsHr.style.display = 'none';
    allIcon.style.display = 'none';
    shirtIcon.style.display = 'none';
    pantsIcon.style.display = 'inline';
    shoesIcon.style.display = 'none';
    bagsIcon.style.display = 'none';
}

function shoesClick() {
    all.style.color = 'black';
    shirt.style.color = 'black';
    pants.style.color = 'black';
    shoes.style.color = '#E70E0E';
    bags.style.color = 'black';
    allHr.style.display = 'none';
    shirtHr.style.display = 'none';
    pantsHr.style.display = 'block';
    shoesHr.style.display = 'block';
    bagsHr.style.display = 'none';
    allIcon.style.display = 'none';
    shirtIcon.style.display = 'none';
    pantsIcon.style.display = 'none';
    shoesIcon.style.display = 'inline';
    bagsIcon.style.display = 'none';
}

function bagsClick() {
    all.style.color = 'black';
    shirt.style.color = 'black';
    pants.style.color = 'black';
    shoes.style.color = 'black';
    bags.style.color = '#E70E0E';
    allHr.style.display = 'none';
    shirtHr.style.display = 'none';
    pantsHr.style.display = 'none';
    shoesHr.style.display = 'block';
    bagsHr.style.display = 'block';
    allIcon.style.display = 'none';
    shirtIcon.style.display = 'none';
    pantsIcon.style.display = 'none';
    shoesIcon.style.display = 'none';
    bagsIcon.style.display = 'inline';
}

function userHover(){
    userMenu.style.display = 'block';
}

function userLeave(){
    userMenu.style.display = 'none';
}

function editHover(){
    editMenu.style.display = 'block';
}

function editLeave(){
    editMenu.style.display = 'none';
}

function openConfirmDelete() {
    confirmDelete.style.display = 'block';
}

function closeConfirmDelete() {
    confirmDelete.style.display = 'none';
}