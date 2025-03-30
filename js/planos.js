const URL_TO_POST = "http://httpbin.org/post";

const nav = document.querySelector("nav");
const menu = document.querySelector("nav .menu");
const menuButton = document.getElementById("menuButton");
const menuButtons = document.querySelectorAll("nav .menu a");
const feedbackButton = document.getElementById("feedbackButton");
const feedbackWrapper = document.getElementById("feedbackWrapper");
const allStar = document.querySelectorAll(".avaliar .star");

// Nav JS
window.onscroll = () =>
    (nav.style.backgroundColor =
        window.scrollY <= 100 ? "transparent" : "#fff");

// Menu JS

function menuMobileClose() {
    menuButton.className =
        menu.style.right === "-100%" ? "bx bx-x" : "bx bx-menu";
    menu.style.right = menu.style.right === "-100%" ? "0" : "-100%";
}

menuButton.onclick = menuMobileClose;
menuButtons.forEach((btn) => {
    btn.onclick = menuMobileClose;
});

// Feedback JS

feedbackButton.onclick = () => {
    menuMobileClose();
    feedbackWrapper.style.top =
        feedbackWrapper.style.top === "-100%" ? "50%" : "-100%";
};

allStar.forEach((item, idx) => {
    item.addEventListener("click", function () {
        let click = 0;

        allStar.forEach((i) => {
            i.classList.replace("bxs-star", "bx-star");
            i.classList.remove("active");
        });

        for (let i = 0; i <= idx; i++) {
            allStar[i].classList.replace("bx-star", "bxs-star");
            allStar[i].classList.add("active");
        }
    });
});
