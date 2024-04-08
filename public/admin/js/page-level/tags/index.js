document.addEventListener('DOMContentLoaded',function() {
    const deleteBtn = document.querySelectorAll('.delete-tag');
    deleteBtn.forEach((btn)=> btn.addEventListener('click', deleteTag));
});
function deleteTag() {
    // const tagId = this.dataset.tagId;
    const route = this.dataset.deleteRoute;
    // const route = `/tags/${tagId}`;
    const deleteForm = document.querySelector('#deleteForm');
    deleteForm.setAttribute('action', route);
    const deleteModal = new bootstrap.Modal('#deleteModal');
    deleteModal.show();
    // console.log("Delete Pressed!!");
}

