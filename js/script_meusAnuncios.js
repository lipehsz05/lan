const activeAnnouncement = document.querySelectorAll(".actived");
const expiredAnnouncement = document.querySelectorAll(".expired");
const allAnnouncements = document.querySelectorAll(".conteudo-anuncio");
const activeAnnouncementCount = document.getElementById("num_anuncios");

activeAnnouncementCount.innerText = activeAnnouncement.length;

activeAnnouncement.forEach((apagar_anuncio) => {
    const buttonElement = apagar_anuncio.querySelector("#apagar_anuncio");
    const linkElement = apagar_anuncio.querySelector("a");

    buttonElement.addEventListener("click", (event) => {
        event.preventDefault();

        apagar_anuncio.classList.remove("actived");
        apagar_anuncio.classList.add("expired");
        activeAnnouncementCount.innerText =
            Number(activeAnnouncementCount.innerText) - 1;
        if (activeAnnouncementCount.innerText < 0) {
            activeAnnouncementCount.innerText = 0;
        }

        if (apagar_anuncio.classList.contains("expired")) {
            buttonElement.style.display = 'none';
        }
    });

    linkElement.addEventListener("click", (event) => {
        if (apagar_anuncio.classList.contains("expired")) {
            event.preventDefault();
        }
    });
});

expiredAnnouncement.forEach((expired_anuncio) => {
    const linkElement = expired_anuncio.querySelector("a");

    linkElement.addEventListener("click", (event) => {
        event.preventDefault();
    });
});

markAll.addEventListener("click", () => {
    allAnnouncements.forEach((message) => {
        message.classList.remove("actived");
        message.classList.add("expired");
    });

    for (let i = 0; i < allAnnouncements.length; i++) {
        const message = allAnnouncements[i];
        const messageButton = message.querySelector("#apagar_anuncio");

        if (messageButton && messageButton.style.display !== 'none') {
            messageButton.style.display = 'none';
        }
    }
    activeAnnouncementCount.innerHTML = 0;
});

function toggleInformacoes() {
    var informacoesDiv = document.getElementById("informacoes");
    if (informacoesDiv.style.display === "block" || informacoesDiv.style.display === "") {
        informacoesDiv.style.display = "none";
    } else {
        informacoesDiv.style.display = "block";
    }
}
