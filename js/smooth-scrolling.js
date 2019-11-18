// Smooth scrolling for anchor links
const anchors = document.querySelectorAll('a[href^="#"]');
for(let i = 0; i < anchors.length; i++) {
    anchors[i].addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
}