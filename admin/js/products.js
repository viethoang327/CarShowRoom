// SHOW ADD CAT FORM MODAL
var showAddCatForm = document.querySelector('#btn-add-cat');
var hideAddCatForm = document.querySelector('.js-addform-close');
var addCatFormModal = document.querySelector('.js-addform');
var formModalCtn = document.querySelector('.js-addform-ctn');
showAddCatForm.addEventListener('click',()=>{
   addCatFormModal.classList.add('addCatForm-open');
});
hideAddCatForm.addEventListener('click',()=>{
   addCatFormModal.classList.remove('addCatForm-open');
});
addCatFormModal.addEventListener('click',()=>{
   addCatFormModal.classList.remove('addCatForm-open');
});
formModalCtn.addEventListener('click',(e)=>{
   e.stopPropagation();
});
// SHOW ADD PRODUCT FORM MODAL
var showAddProductForm = document.querySelector('#btn-add-pro');
var hideAddProductForm = document.querySelector('.js-addproduct-close');
var addProductFormModal = document.querySelector('.js-addproduct');
var formProductCtn = document.querySelector('.js-addproduct-ctn');
showAddProductForm.addEventListener('click',()=>{
    addProductFormModal.classList.add('addProductForm-open');
});
hideAddProductForm.addEventListener('click',()=>{
    addProductFormModal.classList.remove('addProductForm-open');
});
addProductFormModal.addEventListener('click',()=>{
    addProductFormModal.classList.remove('addProductForm-open');
});
formProductCtn.addEventListener('click',(e)=>{
    e.stopPropagation();
 });
 // SHOW EDIT PRODUCT FORM MODAL
 var showEditProductForm = document.querySelectorAll('.btn-edit-product');
 var hideEditproductForm = document.querySelector('.js-editproduct-close');
 var editProductFormModal = document.querySelector('.js-editproduct');
 var formProductCtn = document.querySelector('.js-editproduct-ctn');
 for(var edit of showEditProductForm){
    edit.addEventListener('click',()=>{
      editProductFormModal.classList.add('editProductForm-open');
   });
 }
 hideEditproductForm.addEventListener('click',()=>{
   editProductFormModal.classList.remove('editProductForm-open');
});
editProductFormModal.addEventListener('click',()=>{
   editProductFormModal.classList.remove('editProductForm-open');
});
formProductCtn.addEventListener('click',(e)=>{
   e.stopPropagation();
});

 