// JavaScript for navbar

const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
  link.addEventListener('click', () => {
    // Add code here to handle link clicks
    console.log(`Clicked link: ${link.textContent}`);
  });
});
