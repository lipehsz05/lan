const mode = document.getElementById('mode_icon');

mode.addEventListener('click', () => {
    const form = document.getElementById('perfil_form');

    if(mode.classList.contains('fa-moon')) {
        mode.classList.remove('fa-moon');
        mode.classList.add('fa-sun');

        form.classList.add('dark');
        return ;
    }
    
    mode.classList.remove('fa-sun');
    mode.classList.add('fa-moon');

    form.classList.remove('dark');
});

document.querySelector('.account-settings-fileinput').addEventListener('change', function(event) {
    event.preventDefault(); // Impede o envio do formulário
    // Você pode adicionar lógica adicional aqui, se necessário
});