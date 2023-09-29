"use strict";
// Get the button of change theme
const toggleButton = document.getElementById('toggleMode');
// Get the body of the document
const body = document.body;

toggleButton.addEventListener('click', (event) => {
    body.classList.toggle('dark-mode');
    const isDarkMode = body.classList.contains('dark-mode');
    // Save on localstorage the preference of the theme
    localStorage.setItem('darkMode', isDarkMode);
    
    if (body.classList.contains('dark-mode')) {
        toggleButton.innerText = "Modo Claro";
        // TODO: Cambiar el tema de botón
    }else{
        toggleButton.innerText = "Modo Oscuro";
    }
});

// Check i fthe dark mode is active in the localstorage on reload page
if (localStorage.getItem('darkMode') === 'true') {
    body.classList.add('dark-mode');
}