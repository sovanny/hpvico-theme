// Checks when element is in viewport, and adds class is-visible for animations
const callback = function (entries) {
  for(var i = 0; i < entries.length; i++) {
    if(entries[i].intersectionRatio > 0.25){
      entries[i].target.classList.add("is-visible");
    }
  }
};

const observer = new IntersectionObserver(callback, { threshold: 0.25 });
// Only observes elements with scroll-observe class
const targets = document.querySelectorAll(".scroll-observe");
for(var i = 0; i < targets.length; i++) {
  observer.observe(targets[i]);
}