const files = [];
const dropbox = document.querySelector(".dropbox");
const dropboxInput = document.querySelector(".dropbox input");
const dropboxList = document.querySelector(".dropbox-container ul");

dropbox.onclick = () => dropboxInput.click();
dropboxInput.onchange = () => {
    for (const file of dropboxInput.files)
        if (
            !files.some((f) => f.name === file.name) &&
            file.type.startsWith("image")
        )
            files.push(file);
    showImages();
};

dropbox.ondrop = (e) => {
    e.preventDefault();
    for (const file of e.dataTransfer.files)
        if (
            !files.some((f) => f.name === file.name) &&
            file.type.startsWith("image")
        )
            files.push(file);
    showImages();
};

function showImages() {
    let images = "";
    files.forEach(
        (file, i) =>
            (images += `<li class="details"><span class="nome">${file.name}</span><i class="bx bx-x" onclick="deleteImage(${i})"></i></li>`)
    );
    dropboxList.innerHTML = images;
}

function deleteImage(index) {
    files.splice(index, 1);
    showImages();
}
