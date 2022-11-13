// show addform modal
var showAddForm = document.querySelector('#btn-add-form');
var hideAddForm = document.querySelector('.js-addform-close');
var addFormModal = document.querySelector('.js-addform');
var formModalCtn = document.querySelector('.js-addform-ctn');
showAddForm.addEventListener('click',()=>{
   addFormModal.classList.add('addform-open');
});
hideAddForm.addEventListener('click',()=>{
   addFormModal.classList.remove('addform-open');
});
addFormModal.addEventListener('click',()=>{
   addFormModal.classList.remove('addform-open');
});
formModalCtn.addEventListener('click',(e)=>{
   e.stopPropagation();
});
// show edit form modal
var showEditForms = document.querySelectorAll('.btn-edit-form');
var hideEditForm = document.querySelector('.js-editform-close');
var editFormModal = document.querySelector('.js-editform');
var editformModalCtn = document.querySelector('.js-editform-ctn');
for(var showEditForm of showEditForms){
   showEditForm.addEventListener('click',()=>{
      editFormModal.classList.add('editform-open');
   });
}
hideEditForm.addEventListener('click',()=>{
   editFormModal.classList.remove('editform-open');
});
editFormModal.addEventListener('click',()=>{
   editFormModal.classList.remove('editform-open');
});
editformModalCtn.addEventListener('click',(e)=>{
   e.stopPropagation();
});
