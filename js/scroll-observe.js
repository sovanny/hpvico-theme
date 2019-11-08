// Checks when element is in viewport, and adds class is-visible for animations
const callback = function (entries) {
    entries.forEach(entry => {
        if(entry.intersectionRatio > 0.25){
            entry.target.classList.add("is-visible");
          }
          else{
            //entry.target.classList.remove("is-visible");
          }
    });
};


const observer = new IntersectionObserver(callback, { threshold: 0.25 });
// Only observes elements with scroll-observe class
const targets = document.querySelectorAll(".scroll-observe");
targets.forEach(function (target) {
    observer.observe(target);
});

// Smooth scrolling for anchor elements
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});