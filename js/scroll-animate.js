const callback = function (entries) {
    entries.forEach(entry => {
        //entry.target.classList.toggle("is-visible");
        if(entry.intersectionRatio > 0.25){
            entry.target.classList.add("is-visible");
          }
          else{
            //entry.target.classList.remove("is-visible");
          }
    });
};


const observer = new IntersectionObserver(callback, { threshold: 0.25 });

const targets = document.querySelectorAll(".scroll-animate");
targets.forEach(function (target) {
    observer.observe(target);
});
