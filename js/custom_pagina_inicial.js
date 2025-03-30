document.addEventListener("DOMContentLoaded", function () {
  const scrollLeftButtons = document.querySelectorAll(".scroll-button.scroll-left");
  const scrollRightButtons = document.querySelectorAll(".scroll-button.scroll-right");
  const conteudos = document.querySelectorAll(".conteudo");

  scrollLeftButtons.forEach((scrollLeftButton, index) => {
      const scrollRightButton = scrollRightButtons[index];
      const conteudo = conteudos[index];

      scrollLeftButton.addEventListener("click", function () {
          conteudo.scrollLeft -= 1400; 
      });

      scrollRightButton.addEventListener("click", function () {
          conteudo.scrollLeft += 1400; 
      });
  });
});

//Refresh da pagina

window.onload = function() {
    window.scrollTo(0, 0);
  };

  //Slides automatico
  
  let currentSlide = 1;
        const totalSlides = 5;

        function nextSlide() {
            currentSlide++;
            if (currentSlide > totalSlides) {
                currentSlide = 1;
            }
            document.querySelector(`#slide${currentSlide}`).checked = true;
        }

        setInterval(nextSlide, 7000);
