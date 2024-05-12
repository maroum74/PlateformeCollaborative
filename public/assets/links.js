// links.js

// Intégration des liens
const links = document.createElement('link');
links.href = 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap';
links.rel = 'stylesheet';
document.head.appendChild(links);

const bootstrapCSS = document.createElement('link');
bootstrapCSS.href = 'assets/bootstrap/css-bootstrap/bootstrap.min.css';
bootstrapCSS.rel = 'stylesheet';
document.head.appendChild(bootstrapCSS);

const customCSS = document.createElement('link');
customCSS.href = 'assets/style.css';
customCSS.rel = 'stylesheet';
document.head.appendChild(customCSS);

const polyFont = document.createElement('link');
polyFont.href = 'https://fonts.googleapis.com/css2?family=Poly:ital@0;1&display=swap';
polyFont.rel = 'stylesheet';
document.head.appendChild(polyFont);

const bootstrapJS = document.createElement('script');
bootstrapJS.src = 'assets/bootstrap/js/bootstrap.min.js';
document.body.appendChild(bootstrapJS);
