const myProfileButton = document.querySelector(".meu-perfil-container button");
const menu = document.querySelector(".menu");

myProfileButton.onclick = () => {
    menu.style.opacity = menu.style.opacity === "1" ? "0" : "1";
    menu.style.visibility =
        menu.style.visibility === "visible" ? "hidden" : "visible";
    myProfileButton.lastElementChild.style.transform =
        myProfileButton.lastElementChild.style.transform === "rotate(180deg)"
            ? "rotate(0deg)"
            : "rotate(180deg)";
};
