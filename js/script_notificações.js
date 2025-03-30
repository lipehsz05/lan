function toggleInformacoes() {
    var informacoesDiv = document.getElementById("informacoes");
    if (informacoesDiv.style.display === "block" || informacoesDiv.style.display === "") {
        informacoesDiv.style.display = "none";
    } else {
        informacoesDiv.style.display = "block";
    }
}

const unReadMessages = document.querySelectorAll('.unread');
const unReadMessagesCount = document.getElementById('num_notificacoes');
const markAll = document.getElementById('marcar_como_lidas');

unReadMessagesCount.innerText = unReadMessages.length;

unReadMessages.forEach((message) =>{
    message.addEventListener('click', () => {
        message.classList.remove('unread');
        const newUnreadMessages = document.querySelectorAll('.unread');
        unReadMessagesCount.innerText = newUnreadMessages.length;
    });
});

markAll.addEventListener('click', () => {
    unReadMessages.forEach((message) => {
        message.classList.remove('unread');
    });
    const newUnReadMessages = document.querySelectorAll('.unread');
    unReadMessagesCount.innerHTML = newUnReadMessages.length;
}); 