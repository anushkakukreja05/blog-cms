document.addEventListener('DOMContentLoaded',function() {
    const replyBtn = document.querySelectorAll('.reply');
    console.log(replyBtn);
    replyBtn.forEach((btn)=> btn.addEventListener('click', handleReply));


});
function handleReply() {

    const commentId = this.dataset.commentId;

    const inputAttr = document.querySelector('#commentId');
    inputAttr.setAttribute('value', commentId);

    console.log("Reply Pressed!!");
}
