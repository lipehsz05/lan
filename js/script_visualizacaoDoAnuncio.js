function toggleInformacoes() {
    var informacoesDiv = document.getElementById("informacoes");
    if (informacoesDiv.style.display === "block" || informacoesDiv.style.display === "") {
        informacoesDiv.style.display = "none";
    } else {
        informacoesDiv.style.display = "block";
    }
}
