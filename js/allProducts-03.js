var userMenu = document.querySelector('.user-dropdown-menu');
var confirmDelete = document.querySelector('.confirm-delete-modal')
var id = document.querySelector('.product-ID')

function userHover(){
    userMenu.style.display = 'block';
}

function userLeave(){
    userMenu.style.display = 'none';
}

function openConfirmDelete(p_id){
    confirmDelete.style.display = 'block';
    id.value = p_id;
}

function closeConfirmDelete(){
    confirmDelete.style.display = 'none';
}