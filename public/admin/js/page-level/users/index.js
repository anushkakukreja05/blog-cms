document.addEventListener('DOMContentLoaded',function() {
    const revokeBtn = document.querySelectorAll('.revoke-admin');
    revokeBtn.forEach((btn)=> btn.addEventListener('click', revokeAdmin));

    const makeAdminBtn = document.querySelectorAll('.make-admin');
    makeAdminBtn.forEach((btn)=> btn.addEventListener('click', makeAdmin));
});
function revokeAdmin() {

    const route = this.dataset.changeRoleRoute;
    console.log(route);

    const authorForm = document.querySelector('#authorForm');
    authorForm.setAttribute('action', route);
    const deleteModal = new bootstrap.Modal('#revokeAdmin');
    deleteModal.show();
    // console.log("Delete Pressed!!");
}

function makeAdmin() {

    const route = this.dataset.changeRoleRoute;
    console.log(route);

    const adminForm = document.querySelector('#adminForm');
    adminForm.setAttribute('action', route);
    const restoreModal = new bootstrap.Modal('#makeAdmin');
    restoreModal.show();
    // console.log("Restore Pressed!!");
}
