const MESSAGES_REPLIES = [
    "Mensagem para Preço e Pagamento",
    "Mensagem para Segurança e Privacidade",
    "Mensagem para Suporte ao Cliente",
    "Mensagem para Quais são as opções de pagamentos?",
    "Mensagem para Posso cancelar meus pedido?",
    "Mensagem para É seguro fazer compras neste site?",
    "Mensagem para Qual a política de reembolso?",
    "Mensagem para Quais são os termos de uso do site?",
    "Mensagem para O site oferece cupons de descontos?",
];
const PREDEFINED_MESSAGES = [
    "Preço e Pagamento",
    "Segurança e Privacidade",
    "Suporte ao Cliente",
    "Quais são as opções de pagamentos?",
    "Posso cancelar meus pedido?",
    "É seguro fazer compras neste site?",
    "Qual a política de reembolso?",
    "Quais são os termos de uso do site?",
    "O site oferece cupons de descontos?",
];

const conversations = [
    {
        title: "Vem ser LAN",
        description: "Chat para dúvidas",
        imgSrc: "imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png",
        warnings: [
            "Espaço reservado para tirar dúvidas de forma rápida e prática. Escolha uma das opções abaixo para mais informações.",
        ],
        messages: [],
    },
];

const $conversationsUl = document.querySelector(".conversas");
const $conversationTitle = document.querySelector(
    ".conversa-aberta .conteudo-topo"
);
const $messagesUl = document.querySelector(".conversa-aberta .mensagens");
const $predefinedMessagesUl = document.querySelector(".mensagens-predefinidas");
const $textInputContainer = document.querySelector(".caixa-de-texto-container");
const $textInput = document.querySelector(".caixa-de-texto");
const $sendMessageButton = document.querySelector(".mandar-mensagem-botao");

let currentConversationIndex = 0;

function renderConversations(conversations) {
    $conversationsUl.innerHTML = "";
    conversations.forEach((conversation) =>
        $conversationsUl.appendChild(createConversation(conversation))
    );
}

function renderConversation({ title, warnings, messages }) {
    $conversationTitle.textContent = title;
    $messagesUl.innerHTML = "";
    warnings.forEach((warning) =>
        $messagesUl.appendChild(createWarning(warning))
    );
    messages.forEach((message) =>
        $messagesUl.appendChild(createMessage(message))
    );
}

function renderPredefinedMessages(predefinedMessages) {
    predefinedMessages.forEach((predefinedMessage) =>
        $predefinedMessagesUl.appendChild(
            createPredefinedMessage(predefinedMessage)
        )
    );
}

function createConversation({ title, description, imgSrc }) {
    const conversationElement = document.createElement("li");
    const conversationButtonElement = document.createElement("button");
    const conversationImgContainerElement = document.createElement("div");
    const conversationDetailsElement = document.createElement("div");
    const conversationImgElement = document.createElement("img");
    const conversationNameElement = document.createElement("h2");
    const conversationDescriptionElement = document.createElement("span");

    conversationElement.classList.add("conversa");
    conversationImgContainerElement.classList.add("img-container");
    conversationDetailsElement.classList.add("detalhes");
    conversationNameElement.classList.add("nome");
    conversationDescriptionElement.classList.add("descricao");
    conversationImgElement.setAttribute("src", imgSrc);

    conversationNameElement.textContent = title;
    conversationDescriptionElement.textContent = description;

    conversationImgContainerElement.appendChild(conversationImgElement);
    conversationDetailsElement.appendChild(conversationNameElement);
    conversationDetailsElement.appendChild(conversationDescriptionElement);
    conversationButtonElement.appendChild(conversationImgContainerElement);
    conversationButtonElement.appendChild(conversationDetailsElement);
    conversationElement.appendChild(conversationButtonElement);

    return conversationElement;
}

function createWarning(content) {
    const warningElement = document.createElement("li");
    const warningIconElement = document.createElement("i");
    const warningContentElement = document.createElement("span");

    warningIconElement.classList.add("bx", "bx-error-circle");
    warningElement.classList.add("aviso");
    warningContentElement.textContent = content;

    warningElement.appendChild(warningIconElement);
    warningElement.appendChild(warningContentElement);

    return warningElement;
}

function createPredefinedMessage(content) {
    const predefinedMessageElement = document.createElement("li");
    const predefinedMessageButtonElement = document.createElement("button");

    predefinedMessageButtonElement.textContent = content;
    predefinedMessageElement.appendChild(predefinedMessageButtonElement);
    return predefinedMessageElement;
}

function createMessage({ sent, content, details }) {
    const messageElement = document.createElement("li");
    const messageContentElement = document.createElement("span");
    const messageDetailsElement = document.createElement("span");
    const messageDate = new Date(details);
    const now = new Date();
    const wasSentToday =
        messageDate.getUTCDate() == now.getUTCDate() &&
        messageDate.getUTCMonth() == now.getUTCMonth() &&
        messageDate.getUTCFullYear() == now.getUTCFullYear();

    messageElement.classList.add("mensagem", sent ? "enviada" : "recebida");
    messageContentElement.classList.add("conteudo");
    messageDetailsElement.classList.add("detalhes");

    messageContentElement.textContent = content;
    messageDetailsElement.textContent =
        (!wasSentToday ? messageDate.toLocaleDateString("pt-BR") + " " : "") +
        messageDate.toLocaleTimeString("pt-BR").slice(0, 5);

    messageElement.appendChild(messageContentElement);
    messageElement.appendChild(messageDetailsElement);

    return messageElement;
}

function createEmptyConversation() {
    return {
        title: "Nome e Sobrenome",
        description: "Profissão",
        imgSrc: "imagens_pagina_incial/pngwing.com.png",
        warnings: ["Conversa Vazia! Envie uma mensagem."],
        messages: [],
    };
}

function sendMessage(content, conversationIndex) {
    conversations[conversationIndex].messages.push({
        sent: true,
        details: new Date().toUTCString(),
        content,
    });
    renderConversation(conversations[conversationIndex]);
    $messagesUl.scrollTop = $messagesUl.scrollHeight;
}

conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());
conversations.push(createEmptyConversation());

renderConversations(conversations);
renderConversation(conversations[currentConversationIndex]);
renderPredefinedMessages(PREDEFINED_MESSAGES);

const $conversationButtons = document.querySelectorAll(
    ".conversas .conversa button"
);
const $predefinedMessageButtons = document.querySelectorAll(
    ".mensagens-predefinidas li button"
);

$conversationButtons.forEach((button, index) => {
    button.onclick = () => {
        $conversationButtons.forEach((another) =>
            another.parentElement.classList.remove("selecionada")
        );
        button.parentElement.classList.add("selecionada");
        currentConversationIndex = index;
        $predefinedMessagesUl.style.display = !index ? "flex" : "none";
        $textInputContainer.style.display = index ? "flex" : "none";
        renderConversation(conversations[currentConversationIndex]);
        $messagesUl.scrollTop = $messagesUl.scrollHeight;
    };
});

$predefinedMessageButtons.forEach((button, index) => {
    button.onclick = () => {
        sendMessage(button.textContent, currentConversationIndex);
        conversations[currentConversationIndex].messages.push({
            sent: false,
            details: new Date().toUTCString(),
            content: MESSAGES_REPLIES[index],
        });
    };
});

$sendMessageButton.onclick = () => {
    if ($textInput.value.length > 0)
        sendMessage($textInput.value, currentConversationIndex);
    $textInput.value = "";
};

$textInput.onkeydown = (e) => {
    if (e.keyCode === 13) $sendMessageButton.click();
};

$conversationButtons[currentConversationIndex].click();

setInterval(
    () => renderConversation(conversations[currentConversationIndex]),
    200
);
