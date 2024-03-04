const messages = document.querySelectorAll('.message');
const forms = document.querySelectorAll('.form');
const chatMessages = document.querySelectorAll('.chat-message');
const editDivs = document.querySelectorAll('.edit-div');
const saveDivs = document.querySelectorAll('.save-div');
const edits = document.querySelectorAll('.edit');
const saves = document.querySelectorAll('.save');
const cancels = document.querySelectorAll('.cancel');
const deletes = document.querySelectorAll('.delete');
const destroys = document.querySelectorAll('.destroy');

const toggle = index => {
    messages[index].classList.toggle('active');
    chatMessages[index].classList.toggle('active');
    editDivs[index].classList.toggle('active');
    saveDivs[index].classList.toggle('active');
    messages[index].style.height = '';
    messages[index].style.height = messages[index].scrollHeight + 1 + "px";
}

edits.forEach((edit, index) => edit.onclick = () => toggle(index));
cancels.forEach((cancel, index) => cancel.onclick = () => toggle(index));

saves.forEach((save, index) => save.onclick = () => forms[index].submit());

deletes.forEach((deletex, index) => deletex.onclick = () => destroys[index].submit());

