document.addEventListener('DOMContentLoaded',function() {
    const deleteBtn = document.querySelectorAll('.delete-post');
    deleteBtn.forEach((btn)=> btn.addEventListener('click', deletePost));

    const publishBtn = document.querySelectorAll('.publish-post');
    publishBtn.forEach((btn)=> btn.addEventListener('click', publishPost));
});
function deletePost() {
  
    const route = this.dataset.deleteRoute;
   
    const deleteForm = document.querySelector('#deleteForm');
    deleteForm.setAttribute('action', route);
    const deleteModal = new bootstrap.Modal('#deleteModal');
    deleteModal.show();
    // console.log("Delete Pressed!!");
}
function publishPost() {
   
    const route = this.dataset.publishRoute;
    
    const deleteForm = document.querySelector('#publishForm');
    deleteForm.setAttribute('action', route);
    const deleteModal = new bootstrap.Modal('#publishModal');
    deleteModal.show();
    console.log("Console Pressed!!");
}

