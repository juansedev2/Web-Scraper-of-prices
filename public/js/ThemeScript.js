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
        // Add the class light button style and remove the dark
        toggleButton.classList.remove("btn-dark");
        toggleButton.classList.add("btn-light");
    }else{
        toggleButton.innerText = "Modo Oscuro";
        // Add the class dark button style and remove the light
        toggleButton.classList.remove("btn-light");
        toggleButton.classList.add("btn-dark");
    }
});

// Check i fthe dark mode is active in the localstorage on reload page
if (localStorage.getItem('darkMode') === 'true') {
    body.classList.add('dark-mode');
}