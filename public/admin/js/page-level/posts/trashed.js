document.addEventListener('DOMContentLoaded',function() {
    const deleteBtn = document.querySelectorAll('.delete-post');
    deleteBtn.forEach((btn)=> btn.addEventListener('click', deletePost));

    const restoreBtn = document.querySelectorAll('.restore-post');
    restoreBtn.forEach((btn)=> btn.addEventListener('click', restorePost));
});
function deletePost() {

    const route = this.dataset.deleteRoute;

    const deleteForm = document.querySelector('#deleteForm');
    deleteForm.setAttribute('action', route);
    const deleteModal = new bootstrap.Modal('#deleteModal');
    deleteModal.show();
    // console.log("Delete Pressed!!");
}

function restorePost() {

    const route = this.dataset.restoreRoute;


    const restoreForm = document.querySelector('#restoreForm');
    restoreForm.setAttribute('action', route);
    const restoreModal = new bootstrap.Modal('#restoreModal');
    restoreModal.show();
    // console.log("Restore Pressed!!");
}
